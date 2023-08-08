<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>

<head>
    <?php $this->need('./Moudle/header.php'); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/post.css'); ?>">
</head>

<body class="body">
    <?php $this->need('./Moudle/navbar.php'); ?>  
    <section class="article-box">
        <?php $this->need('./Moudle/article.php'); ?>  
        <?php $this->need('./Moudle/comments.php'); ?>
        <?php $this->need('./Moudle/Sidebar/article-sidebar.php'); ?>
    </section>
    <?php $this->need('./Moudle/footer.php'); ?>
</body>