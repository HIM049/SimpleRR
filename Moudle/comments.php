<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!-- 自定义评论结构 -->
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
 
<!-- 单条评论者信息及内容 -->
<li id="li-<?php $comments->theId(); ?>" class="comment-body <?php 
    if ($comments->_levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass; 
?>">
    <div id="<?php $comments->theId(); ?>">
        <!-- 评论者信息 -->
        <div class="comment-meta">
            <div class="comment-author">
                <svg t="1695541697400" class="svg-icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4016" width="35" height="35"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667zM288 810.666667c0-123.733333 100.266667-224 224-224S736 686.933333 736 810.666667c-61.866667 46.933333-140.8 74.666667-224 74.666666s-162.133333-27.733333-224-74.666666z m128-384c0-53.333333 42.666667-96 96-96s96 42.666667 96 96-42.666667 96-96 96-96-42.666667-96-96z m377.6 328.533333c-19.2-96-85.333333-174.933333-174.933333-211.2 32-29.866667 51.2-70.4 51.2-117.333333 0-87.466667-72.533333-160-160-160s-160 72.533333-160 160c0 46.933333 19.2 87.466667 51.2 117.333333-89.6 36.266667-155.733333 115.2-174.933334 211.2-55.466667-66.133333-91.733333-149.333333-91.733333-243.2 0-204.8 168.533333-373.333333 373.333333-373.333333S885.333333 307.2 885.333333 512c0 93.866667-34.133333 177.066667-91.733333 243.2z" fill="#2c2c2c" p-id="4017"></path></svg>
                <cite class="fn"><?php $comments->author(); ?></cite>
            </div>
            <div>
                <p><?php $comments->date('Y-m-d'); ?> <span class="comment-reply"><?php $comments->reply("回复"); ?></span></p>
            </div>
        </div>
        <div class="content">
            <?php $comments->content(); ?>
        </div>
    </div>

    <!-- 嵌套评论判断 -->
    <?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
    <?php } ?>
</li>
<?php } ?>
<!-- 自定义评论结构结束 -->

<head>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Moudle/comments.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./Style/Page/article/article_style.css'); ?>">
</head>

<div class="comments-box">
    <?php $this->comments()->to($comments); ?>

    <!-- 允许评论 -->
    <?php if ($this->allow('comment')): ?>

        <!-- 添加评论 -->
        <div class="card bottom-margin">
            <div id="<?php $this->respondId(); ?>" class="respond">
                <div class="cancel-comment-reply">
                    <?php $comments->cancelReply(); ?>
                </div>

                <h3 id="response" class="title"><?php _e('New Comment'); ?></h3>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                    <?php if ($this->user->hasLogin()): ?>
                        <div class="has-login">
                            <p>
                                已登录: 
                                <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
                                <a class="text red" href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                            </p>
                        </div>
                    <?php else: ?>
                        <div>
                            <input type="text" name="author" id="author" class="input user-inf" placeholder="昵称" value="<?php $this->remember('author'); ?>" required/>
                            <input type="email" name="mail" id="mail" class="input user-inf" placeholder="电子邮件" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                            <input type="url" name="url" id="url" class="input user-inf" placeholder="主页地址" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                        </div>
                    <?php endif; ?>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="input input-content" placeholder="评论内容" required><?php $this->remember('text'); ?></textarea>
                    <button type="submit" class="button t1"><?php _e('提交评论'); ?></button>
                </form>
            </div>
        </div>
        
        <!-- 评论列表 -->
        <div id="comments" class="comments card">
            <h3 class="title">Comments</h3>
            <p class="count"><?php $this->commentsNum(_t('暂无评论'), _t('已有 %d 条评论')); ?></p>
            
            <?php if ($comments->have()): ?>
                <?php $comments->listComments(); ?>
                <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            <?php endif; ?>
        </div>

    <!-- 评论未开启 -->
    <?php else: ?>
        <!-- 是否显示关闭提示 -->
        <?php if (!empty($this->options->commentsBlock) && in_array('ShowCommentsState', $this->options->commentsBlock) && !($this->allow('comment'))): ?>
            <div class="card">
                <h3 class="title"><?php _e('评论已关闭'); ?></h3>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>