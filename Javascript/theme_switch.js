// TIPS: 此处匹配颜色使用了 switch 是因为考虑到可能的多主题需求。方便后续添加和修改。

// 获取根元素
rootElement = document.documentElement;
// 获取按钮元素
toggleButton = document.getElementById('toggle-button');
// 得到主题值
theme = (localStorage.getItem('themeSetting') === null) ? (getBrowserTheme()) : (localStorage.getItem('themeSetting'));
// 文档加载完成后检查保存的值
document.addEventListener('readystatechange', function() {
    if (theme === 'light') {
        rootElement.removeAttribute('data-theme');
    } else {
        rootElement.setAttribute('data-theme', 'dark');
    }
});

// 监听按钮点击事件，触发函数切换
toggleButton.addEventListener('click', changeTheme);


function changeTheme() {
    if ('light' === (localStorage.getItem('themeSetting') || theme)) {
        // 如果本地设置或当前设置为 light
        rootElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('themeSetting', 'dark');
    } else {
        rootElement.removeAttribute('data-theme');
        localStorage.setItem('themeSetting', 'light');
    }
}

function getBrowserTheme() {
    console.log("查询浏览器主题")
        // 检测是否支持 prefers-color-scheme 媒体查询
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // 用户当前使用的是深色主题
        return "dark";
    } else {
        // 用户当前使用的是浅色主题
        return "light";
    }
}