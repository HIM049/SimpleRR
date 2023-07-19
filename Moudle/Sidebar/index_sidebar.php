<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/Sidebar/index_sidebar.css'); ?>">
</head>

<aside class="index-sidebar" id="IndexSidebar">
    <div class="index-sidebar-classify">
        <h2>分类</h2>
        <ul>
            <?php $this->widget('Widget_Metas_Category_List@options','ignore=21')
            ->parse('<a href="{permalink}" class="index-sidebar-classify-button"><li class="index-sidebar-classify-li"><p class="index-sidebar-classify-button-name">{name}</p><p>（{count}）</p></li></a>'); 
            ?>
        </ul>
    </div>
    <!-- <div class="index-sidebar-tag">
        <div class="index-sidebar-tag-h2"><h2>标签</h2></div>
        <div class="index-sidebar-tags">
            <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1')->to($tags); ?>
            <?php if($tags->have()) {while ($tags->next()): ?>
                <a href="<?php $tags->permalink();?>"><span class="sidebar-tag-tags">#<?php $tags->name(); ?>#</span></a>
            <?php endwhile;}?>
        </div>
    </div> -->
</aside>

<script src="<?php $this->options->themeUrl('./Javascript/sidebar.js'); ?>"></script>