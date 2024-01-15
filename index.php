<?php

/**
 * 由HIM049制作的极简主题
 * 
 * @package SimpleRR 
 * @author HIM049
 * @version 1.8.1
 * @link https://blog.him.usla.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<!DOCTYPE html>
<head>
    <?php $this->need('./Moudle/header.php'); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/index.css'); ?>">
</head>

<body class="body index-body">
    <?php $this->need('./Moudle/navbar.php'); ?>

    <section class="content-box article-list">
        <?php while ($this->next()) : ?>
            <a href="<?php $this->permalink() ?>">
                <div class="article-box card">
                    <div class="article-img-div">
                        <img src="<?php echo thumb($this, $this->options->defaultCover, $this->options->coverName, in_array('displayCover', $this->options->useDefaultCover)); ?>" />
                    </div>
                    <h2><?php $this->title() ?></h2>
                    <div class="article">
                        <p>
                            <!-- 简介部分 -->
                            <?php 
                                if($this->fields->intro) {
                                    $this->fields->intro();
                                }
                            ?>
                        </p>
                    </div>
                    <p class="article-date"><?php $this->category(' '); ?> | <?php $this->date('Y-m-d'); ?></p>
                </div>
            </a>
        <?php endwhile; ?>
        <div class="article-list-nav card"><?php $this->pageNav(); ?></div><!-- 翻页按键 -->
        <?php $this->need('./Moudle/Sidebar/index_sidebar.php'); ?>
    </section>
    <?php $this->need('./Moudle/footer.php'); ?>
</body>
