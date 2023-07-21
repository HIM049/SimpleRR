<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Moudle/Sidebar/sidebar_classify.css'); ?>">
</head>
<div class="index-sidebar-classify">
    <h2>分类</h2>
    <ul>
        <?php $this->widget('Widget_Metas_Category_List@options','ignore=21')
        ->parse('<a href="{permalink}" class="index-sidebar-classify-button"><li class="index-sidebar-classify-li"><p class="index-sidebar-classify-button-name">{name}</p><p>（{count}）</p></li></a>'); 
        ?>
    </ul>
</div>