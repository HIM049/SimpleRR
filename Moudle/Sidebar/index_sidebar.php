<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/sidebar.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/index_sidebar.css'); ?>">
</head>

<aside class="sidebar index-sidebar" id="Sidebar">
    <?php $this->need('./Moudle/Sidebar/sidebar-classify.php'); ?>
    <!-- <div class="index-sidebar-tag">
        <div class="index-sidebar-tag-h2"><h2>标签</h2></div>
        <div class="index-sidebar-tags">
            <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1')->to($tags); ?>
            <?php if($tags->have()) {while ($tags->next()): ?>
                <a href="<?php $tags->permalink();?>"><span class="sidebar-tag-tags">#<?php $tags->name(); ?>#</span></a>
            <?php endwhile;}?>
        </div>
    </div> -->
    <?php $this->need('./Moudle/Sidebar/scroll-to-top.php'); ?>
</aside>

<script src="<?php $this->options->themeUrl('./Javascript/sidebar.js'); ?>"></script>