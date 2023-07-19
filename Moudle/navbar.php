<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/navbar.css'); ?>">
</head>

<header class="navbar">
    <div class="navbar-box">
        <div>
            <a href="<?php $this->options->siteUrl(); ?>" class="navbar-title">
                <?php $this->options->title() ?>
            </a>
        </div>
        <div class="navbar-nav">
            <ul>
                <li><a href="<?php $this->options->siteUrl(); ?>"><div class="navbar-nav-button">首页</div></a></li>
                <?php $this->widget('Widget_Contents_Page_List') ->parse('<li><a href="{permalink}"><div class="navbar-nav-button">{title}</div></a></li>'); ?>
            </ul>
            <div class="change-theme">
                <a href=""><svg t="1689237294339" class="change-theme-icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1222" width="27" height="27"><path d="M512 85.333333C277.333333 85.333333 85.333333 277.333333 85.333333 512s192 426.666667 426.666667 426.666667 426.666667-192 426.666667-426.666667S746.666667 85.333333 512 85.333333z m0 768c-187.733333 0-341.333333-153.6-341.333333-341.333333s153.6-341.333333 341.333333-341.333333 341.333333 153.6 341.333333 341.333333-153.6 341.333333-341.333333 341.333333z" fill="#000000" p-id="1223"></path><path d="M512 768c140.8 0 256-115.2 256-256s-115.2-256-256-256v512z" fill="#000000" p-id="1224"></path></svg></a>
                
            </div>
        </div>
    </div>
</header>