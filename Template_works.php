<?php

/**
 * 【模板】Works
 *
 * @package custom
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<!DOCTYPE HTML>

<head>
    <?php $this->need('./Moudle/header.php'); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/article/article.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/article/article_style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/Template_works/works.css'); ?>">
    
</head>

<body class="body">
    <?php $this->need('./Moudle/navbar.php'); ?>
    <section class="content-box article-box">
        <img class="article-TopImg" src="<?php echo thumb($this, $this->options->defaultCover, $this->options->coverName); ?>"/>
        <div class="card">
            <!-- <h1 class="article-title"><?php $this->title() ?></h1> -->
            <div class="article-content">
                <div class="post-content"><?php $this->content(); ?></div>
            </div>
        </div>
    </section>
    
</body>