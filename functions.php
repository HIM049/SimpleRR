<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{	
	// 网站主题色设置
	$primaryColour = new \Typecho\Widget\Helper\Form\Element\Text(
		'primaryColour',
        null,
        '#00A7DB',
		_t('网站主题色'),
		_t('主题色用于顶导航栏、侧边栏、链接按钮等位置作点缀色')
	);
    $form->addInput($primaryColour);

	// 导航栏首页位置字样
	$navBarHome = new \Typecho\Widget\Helper\Form\Element\Text(
		'navBarHome',
        null,
        '首页',
		_t('“首页”按钮字样'),
		_t('导航栏首页位置字样')
	);
    $form->addInput($navBarHome);
	
	// 封面图 404 URL 设置
	$defaultCover = new \Typecho\Widget\Helper\Form\Element\Text(
		'defaultCover',
        null,
        '/Image/404Cover.png',
		_t('文章默认封面图'),
		_t('设置文章默认 (404) 封面图')
	);
    $form->addInput($defaultCover);

	// 文章封面图名称设置
	$coverName = new \Typecho\Widget\Helper\Form\Element\Text(
		'coverName',
		null,
		'cover.png',
		_t('文章封面图名称'),
		_t('设置文章附件中检测封面图的名称')
	);
	$form->addInput($coverName);

	// 设置建站时间（页脚） $this->options->setupTime()
	$setupTime = new \Typecho\Widget\Helper\Form\Element\Text(
		'setupTime',
        null,
        '2021-10-05',
		_t('建站时间'),
		_t('日期格式：YEAR-MM-DD（例：2021-10-05）')
	);
    $form->addInput($setupTime);

    // $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
    //     'sidebarBlock',
    //     [
    //         'ShowRecentPosts'    => _t('显示最新文章'),
    //         'ShowRecentComments' => _t('显示最近回复'),
    //         'ShowCategory'       => _t('显示分类'),
    //         'ShowArchive'        => _t('显示归档'),
    //         'ShowOther'          => _t('显示其它杂项')
    //     ],
    //     ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
    //     _t('侧边栏显示')
    // );

    // $form->addInput($sidebarBlock->multiMode());
}

function art_count($cid)
{
	$db = Typecho_Db::get();
	$rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?', $cid)->order('table.contents.cid', Typecho_Db::SORT_ASC)->limit(1));
	echo mb_strlen($rs['text'], 'UTF-8');
}

/**
 * 文章封面图显示函数
 * 调用：<?php echo thumb($this); ?>
 */

function thumb($obj, $cover404, $coverName)
{	
	// 设置默认封面
	$thumb = Helper::options()->themeUrl . $cover404;
	// 获取特定文章附件集合
	$attach = $obj->attachments(1)->attachment;

	// 如文章没有附件便返回默认封面
	if (isset($attach) == false) {
		return $thumb;
	}

	// 遍历附件集合
	foreach ($attach as $value) {
			// 如 ( 值不为空 | 是图片 | 符合名称 )
		if (isset($attach->isImage) && $attach->isImage == 1 && $attach->name == $coverName) {
			// 赋值给 $thumb 后跳出循环
			$thumb = $attach->url;
			break;
		}
	}
	return $thumb;
}

/**
 * blog运行时间
 * 调用：<?php echo thumb($this, $this->options->defaultCover, $this->options->coverName); ?>
 */
date_default_timezone_set('Asia/Shanghai');

function getBuildTime($bulidTime)
{
	// 在下面按格式输入本站创建的时间
	$site_create_time = strtotime($bulidTime);
	$time = time() - $site_create_time;
	if (is_numeric($time)) {
		$value = array(
			"years" => 0, "days" => 0,
		);
		if ($time >= 31556926) {
			$value["years"] = floor($time / 31556926);
			$time = ($time % 31556926);
		}
		if ($time >= 86400) {
			$value["days"] = floor($time / 86400);
			$time = ($time % 86400);
		}

		return '' . $value['years'] . 'Year 	 / ' . $value['days'] . 'Day ';
	} else {
		return '';
	}
}