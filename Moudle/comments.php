<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Moudle/comments.css'); ?>">
</head>
<div class="comments" id="comments">
    <?php $this->comments()->to($comments); ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <h2 id="response">添加新评论</h2>
            <form class="comment-form" method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()): ?>
                    <p>已登录的身份<a
                            href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a
                            href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else: ?>
                    <div class="comment-form-information">
                        <div>
                            <input placeholder="昵称" type="text" name="author" id="author" class="text"
                                value="<?php $this->remember('author'); ?>" required />
                        </div>
                        <div>
                            <input placeholder="邮箱" type="email" name="mail" id="mail" class="text"
                                value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                        </div>
                        <div>
                            <input placeholder="博客地址" type="url" name="url" id="url" class="text"
                                value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                        </div>
                    </div>
                <?php endif; ?>
                <div>
                    <textarea placeholder="评论内容" rows="8" cols="50" name="text" id="textarea" class="textarea"
                              required><?php $this->remember('text'); ?></textarea>
                </div>
                <div>
                    <button type="submit" class="submit">提交评论</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <h2>评论未开放</h2>
    <?php endif; ?>

    <div class="comments-box">
        <?php if ($comments->have()): ?>
            <?php $comments->listComments(); ?>
            <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        <?php endif; ?>
    </div>


</div>