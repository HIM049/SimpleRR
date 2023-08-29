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
            <!-- 导航项 -->
            <ul class="nav-list">
                <!-- “首页”按钮 -->
                <li class="nav-button"><a href="<?php $this->options->siteUrl(); ?>"><div class="navbar-nav-button"><?php $this->options->navBarHome() ?></div></a></li>
                <!-- 导航栏标签 -->
                <?php $this->widget('Widget_Contents_Page_List') ->parse('<li class="nav-button"><a href="{permalink}"><div class="navbar-nav-button">{title}</div></a></li>'); ?>
                <!-- 主题切换按钮 -->
                <li class="nav-button"><a id="toggle-button"><svg t="1689237294339" class="svg-button" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1222" width="30" height="30"><path d="M512 85.333333C277.333333 85.333333 85.333333 277.333333 85.333333 512s192 426.666667 426.666667 426.666667 426.666667-192 426.666667-426.666667S746.666667 85.333333 512 85.333333z m0 768c-187.733333 0-341.333333-153.6-341.333333-341.333333s153.6-341.333333 341.333333-341.333333 341.333333 153.6 341.333333 341.333333-153.6 341.333333-341.333333 341.333333z" fill="#000000" p-id="1223"></path><path d="M512 768c140.8 0 256-115.2 256-256s-115.2-256-256-256v512z" fill="#000000" p-id="1224"></path></svg></a></li>
            </ul>
            <!-- “菜单”按钮 -->
            <div class="nav-menu-button">
                <a href="javascript:void(0);" onclick="navMenu()"><svg t="1693300953835" class="svg-button" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4039" width="30" height="30"><path d="M867.995 459.647h-711.99c-27.921 0-52.353 24.434-52.353 52.353s24.434 52.353 52.353 52.353h711.99c27.921 0 52.353-24.434 52.353-52.353s-24.434-52.353-52.353-52.353z" p-id="4040" fill="#2c2c2c"></path><path d="M867.995 763.291h-711.99c-27.921 0-52.353 24.434-52.353 52.353s24.434 52.353 52.353 52.353h711.99c27.921 0 52.353-24.434 52.353-52.353s-24.434-52.353-52.353-52.353z" p-id="4041" fill="#2c2c2c"></path><path d="M156.005 260.709h711.99c27.921 0 52.353-24.434 52.353-52.353s-24.434-52.353-52.353-52.353h-711.99c-27.921 0-52.353 24.434-52.353 52.353s24.434 52.353 52.353 52.353z" p-id="4042" fill="#2c2c2c"></path></svg></a>
            </div>
        </div>
    </div>
</header>

<script src="<?php $this->options->themeUrl('./Javascript/theme_switch.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./Javascript/nav_menu.js'); ?>"></script>
