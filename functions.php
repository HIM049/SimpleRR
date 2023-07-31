<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

define('THE_TIME', '2021-10-05 00:00:00');

function art_count($cid)
{
	$db = Typecho_Db::get();
	$rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?', $cid)->order('table.contents.cid', Typecho_Db::SORT_ASC)->limit(1));
	echo mb_strlen($rs['text'], 'UTF-8');
}
/**
 * 重写评论显示函数
 */
function threadedComments($comments, $options)
{
	$html = TeComment_Plugin::parseCommentHtml($comments, $options);

	$children = '';
	if ($comments->children) {
		ob_start();
		$comments->threadedComments();
		$children = ob_get_contents();
		ob_end_clean();
	}
	$html = str_replace('>{children}<', '>' . $children . '<', $html);
	echo $html;
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

function getBuildTime()
{
	// 在下面按格式输入本站创建的时间
	$site_create_time = strtotime(THE_TIME);
	$time = time() - $site_create_time;
	if (is_numeric($time)) {
		$value = array(
			"years" => 0, "days" => 0, "hours" => 0,
			"minutes" => 0, "seconds" => 0,
		);
		if ($time >= 31556926) {
			$value["years"] = floor($time / 31556926);
			$time = ($time % 31556926);
		}
		if ($time >= 86400) {
			$value["days"] = floor($time / 86400);
			$time = ($time % 86400);
		}
		if ($time >= 3600) {
			$value["hours"] = floor($time / 3600);
			$time = ($time % 3600);
		}
		if ($time >= 60) {
			$value["minutes"] = floor($time / 60);
			$time = ($time % 60);
		}
		$value["seconds"] = floor($time);

		echo '' . $value['years'] . 'Year 	 / ' . $value['days'] . 'Day ';
	} else {
		echo '';
	}
}