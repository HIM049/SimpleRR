<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>
<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/article/article.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/article/article_style.css'); ?>">
    <!-- highlightjs: https://www.fenxianglu.cn/highlightjs/docs/start/ -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script> -->
</head>
<img class="article-TopImg" src="<?php if ($this->fields->cover) 
    {
        echo $this->fields->cover();
    } elseif (in_array('displayCover', $this->options->useDefaultCover)) 
    {
        echo $this->options->defaultCover;
    }
?>" />
<div class="article-body card bottom-margin">
    <h1 class="article-title"><?php $this->title() ?></h1>
    <div class="article-content">
        <div class="post-content"><?php $this->content(); ?></div>
    </div>
</div>

<!-- <script>
  hljs.highlightAll();
</script> -->
