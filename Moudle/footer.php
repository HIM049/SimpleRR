<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/Moudle/footer.css'); ?>">
</head>

<footer class="footer">
    <div class="footer-text">
        <div class="footer-text-line1">
            <p><?php $this->options->title()?> - <?php $this->options->description() ?></p> 
        </div>
        <div class="footer-text-line2">
            <p>
                <?php echo getBuildTime($this->options->setupTime); ?> |
                <a href="https://github.com/him049/simpleRR">About Theme</a> | 
                Powered by <a href="https://typecho.org/">Typecho</a>
            </p>
        </div>
    </div>
</footer>   