<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/sidebar.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Moudle/Sidebar/article_sidebar.css'); ?>">
</head>

<aside class="sidebar article-sidebar" id="Sidebar">
    <?php $this->need('./Moudle/Sidebar/sidebar-classify.php'); ?>

</aside>

<script src="<?php $this->options->themeUrl('./Javascript/sidebar.js'); ?>"></script>