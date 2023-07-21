// 代码参考下面的文章，在此感谢作者
// https://www.misterma.com/archives/857/

//  给 h2 到 h5 增加一个 content-title 的 class
$('.post-content h2').addClass('content-title');
$('.post-content h3').addClass('content-title');
$('.post-content h4').addClass('content-title');
$('.post-content h5').addClass('content-title');
//  给 h2 到 h5 增加一个 data-index 的自定义属性
$('.post-content h2').attr('data-index', 2);
$('.post-content h3').attr('data-index', 3);
$('.post-content h4').attr('data-index', 4);
$('.post-content h5').attr('data-index', 5);

//  函数的一个参数是标题级别，第二个参数是第一个标题的索引值
function atalog(titleIndex, start) {
    //  存储 HTML 和当前的索引值
    var el = {
        el: '',
        index: start
    };
    var current = 0; //  已遍历的数量

    for (var i = start; i < $('.content-title').length; i++) {
        if (i < current) {
            //  如果当前 i 的值小于已遍历的数量就跳过
            continue;
        }
        if ($('.content-title').eq(i).attr('data-index') > titleIndex) {
            //  如果是更小一级的标题就调用自身继续查找
            var result = atalog($('.content-title').eq(i).attr('data-index'), i);
            //  把返回的 HTML 添加到当前函数的 el 中
            el.el += '<li> ' + result.el + '</li>';
            current = result.index + 1; //  设置已遍历的数量
            el.index = result.index; //  设置索引
            continue; //  跳过本次循环
        }
        if ($('.content-title').eq(i).attr('data-index') < titleIndex) {
            //  如果是更大一级的标题就返回已生成的 HTML 目录
            el.el = '<ul class="mb-2">' + el.el + '</ul>';
            return el;
        }
        //  生成 HTML 目录
        el.el += '<a data-index="' + i + '" href="javascript:;"><div class="tag-box"><li>' + $('.content-title').eq(i).text() + '</li></div></a>';
        el.index = i; //  设置当前的索引值为 i
    }
    //  添加列表的外层 ul
    el.el = '<ul class="mb-2"> ' + el.el + '</ul>';
    return el; //  返回生成的 HTML 目录
}

//  调用生成目录的函数，从第 0 个 h2 开始
var el = atalog(2, 0);
//  把生成的目录插入
sidebarArticleIndex.insertAdjacentHTML('beforeend', '<div class="atalog">' + el.el + '</div>');
//  给生成的目录添加点击事件
$('.article-sidebar-index .atalog a').on('click', function() {
    //  设置滚动条的高度为标题的 offsetTop
    $(document).scrollTop($('.content-title').eq($(this).attr('data-index')).offset().top);
});