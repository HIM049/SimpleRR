<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Moudle/Sidebar/sidebar_tags.css'); ?>">
</head>


<div class="card bottom-margin sidebar-tag">
    <div class="tag-title"><h2>标签</h2></div>
    <div class="tags">
    <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1')->to($tags); ?>
        <?php if($tags->have()) {while ($tags->next()): ?>
            <a href="<?php $tags->permalink();?>"><span class="sidebar-tag-tags">#<?php $tags->name(); ?>#</span></a>
        <?php endwhile;}?>
    </div>
</div>