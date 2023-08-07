# SimpleRR - 简洁 · 不简单

这个主题是为了我的博客设计的，所以设计和功能性会更加偏向我的个人需求。不过也欢迎提出修改意见，我会视情况处理。

---

### 注意：主题目前并未最终确定样式，不排除后期修改整体页面样式的可能

---

## 统一的外观设置位置
- 进入控制台
- 设置外观
- 启用 SimpleRR
- 点击顶部多出的 “设置外观” 按钮

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
