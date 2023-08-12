<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->header(); ?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang='zh-cn'>

<link rel="icon" href="<?php $this->options->themeUrl('./Image/icon.png'); ?>"/>
<title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>

<!-- CSS -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/public.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/theme.css'); ?>">
<style>
    :root{
        --primaryColour: <?php $this->options->primaryColour(); ?>
    }
</style>

<!-- Javascript -->
<script src="<?php $this->options->themeUrl('./Javascript/jquery-3.5.1.min.js'); ?>"></script>
