# SimpleRR - 简洁 · 不简单

这个主题是为了我的博客设计的，所以一切可能会以我的需求为主。不过如果有建议也欢迎提出，我会视情况采纳  

因为 Typecho 没有提供主题的设置接口，所以有的内容就只能硬编码到主题中了。不过我会尽可能让其方便修改。  

## 为文章设置封面的方法
- 准备一张封面图，图片格式为 PNG 。推荐分辨率为 710x284px （主题设计上封面图的最大大小）。
- 将图片重命名为 `cover.png` 
- 将图片上传至文章的“附件”中。（无需将url写在页面上）
- 发布文章，即可看到封面图。

## 修改封面图显示函数（更换 404 样式，修改默认封面图名称）
- 进入主题根目录，并编辑 `functions.php` 。
- 找到并修改（如下注释）

``` php
/**
 * 文章封面图显示函数
 * 调用：<?php echo thumb($this); ?>
 */

function thumb($obj)
{	
	$thumb = Helper::options()->themeUrl . '/Image/404Cover.png';
	// 设置默认封面（404 页面）
	$defaultCover = "cover.png";
	// 设置自定义封面名称

	$attach = $obj->attachments(1)->attachment;
	if (isset($attach) == false) {
		return $thumb;
	}
	foreach ($attach as $value) {
		if (isset($attach->isImage) && $attach->isImage == 1 && $attach->name == $defaultCover) {
			$thumb = $attach->url;
			break;
		}
	}
	return $thumb;
}
```

## TODO
- 移动端折叠菜单
- About 页面模板
- 主题切换