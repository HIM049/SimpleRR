<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
	$setupTime = new \Typecho\Widget\Helper\Form\Element\Text(
		'setupTime',
        null,
        null,
		_t('建站时间')
	);
    $form->addInput($setupTime);
    // $this->options->setupTime()

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

function thumb($obj)
{	
	$thumb = Helper::options()->themeUrl . '/Image/404Cover.png';
	// 设置默认封面
	$defaultCover = "cover.png";
	// 设置自定义封面名称

	$attach = $obj->attachments(1)->attachment;
	// 获取特定文章附件集合

	if (isset($attach) == false) {
		// 如文章没有附件便返回默认封面
		return $thumb;
	}

	foreach ($attach as $value) {
		// 遍历附件集合
		if (isset($attach->isImage) && $attach->isImage == 1 && $attach->name == $defaultCover) {
			// 如 ( 值不为空 | 是图片 | 符合名称 )
			$thumb = $attach->url;
			break;
			// 赋值给 $thumb 后跳出循环
		}
	}
	return $thumb;
}

/**
 * blog运行时间
 * 调用：<?php echo getBuildTime($this); ?>
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