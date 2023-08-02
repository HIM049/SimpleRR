<?php

/**
 * 【模板】About
 *
 * @package custom
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<!DOCTYPE HTML>

<head>
    <?php $this->need('./Moudle/header.php'); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/Template_about/about.css'); ?>">
</head>

<body class="body">
    <?php $this->need('./Moudle/navbar.php'); ?>
    <section class="article-box">
        <?php $this->need('./Moudle/article.php'); ?>  
    </section>
    
</body>