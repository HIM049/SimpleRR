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
	
	// 是否显示 404 封面图设置
	$useDefaultCover = new \Typecho\Widget\Helper\Form\Element\Checkbox(
		'useDefaultCover',
		[
			'displayCover'    => _t('未检测到封面时使用文章默认封面图')
		],
		['displayCover'],
		_t('文章默封面图设置')
	);
    $form->addInput($useDefaultCover->multiMode());

	// 封面图 404 URL 设置
	$defaultCover = new \Typecho\Widget\Helper\Form\Element\Text(
		'defaultCover',
        null,
        '/Image/404Cover.png',
		_t(''),
		_t('设置文章默认 (404) 封面图')
	);
    $form->addInput($defaultCover);

	// 设置建站时间（页脚） $this->options->setupTime()
	$setupTime = new \Typecho\Widget\Helper\Form\Element\Text(
		'setupTime',
        null,
        '2021-10-05',
		_t('建站时间'),
		_t('日期格式：YEAR-MM-DD（例：2021-10-05）')
	);
    $form->addInput($setupTime);

	// 设置 404 页面显示字样
	$pageText = new \Typecho\Widget\Helper\Form\Element\Text(
		'pageText',
		null,
		'Oops! 文章不见了',
		_t('404 页面字样')
	);
	$form->addInput($pageText);

	// 评论设置
    $commentsBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'commentsBlock',
        [
            'ShowCommentsState'    => _t('显示“评论已关闭”提示')
        ],
        ['ShowCommentsState'],
        _t('评论设置')
    );

    $form->addInput($commentsBlock->multiMode());
}

/**
 * blog运行时间
 * 调用：<?php echo getBuildTime($this->options->setupTime); ?>
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