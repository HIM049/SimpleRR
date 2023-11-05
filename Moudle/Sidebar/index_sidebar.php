<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/sidebar.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/index_sidebar.css'); ?>">
</head>

<aside class="sidebar index-sidebar" id="Sidebar">
    <div class="sidebar-box">
        <?php $this->need('./Moudle/Sidebar/sidebar-classify.php'); ?>
        <?php $this->need('./Moudle/Sidebar/sidebar-tags.php'); ?>
        <?php $this->need('./Moudle/Sidebar/scroll-to-top.php'); ?>
    </div>
</aside>