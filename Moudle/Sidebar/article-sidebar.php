<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/sidebar.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Moudle/Sidebar/article_sidebar.css'); ?>">
</head>

<aside class="sidebar" id="Sidebar">
    <div class="sidebar-box">
        <?php $this->need('./Moudle/Sidebar/sidebar-classify.php'); ?>
        <div id="sidebarArticleIndex" class="article-sidebar-index card bottom-margin">
            <h2>目录</h2>
        </div>
        <?php $this->need('./Moudle/Sidebar/scroll-to-top.php'); ?>
    </div>
</aside>

<script src="<?php $this->options->themeUrl('./Javascript/article_index.js'); ?>"></script>