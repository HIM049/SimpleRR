// TIPS: 此处匹配颜色使用了 switch 是因为考虑到可能的多主题需求。方便后续添加和修改。

// 获取按钮元素
toggleButton = document.getElementById('toggle-button');
// 文档加载完成后检查保存的值
document.addEventListener('DOMContentLoaded', checkTheme);
// 监听按钮点击事件，触发函数切换
toggleButton.addEventListener('click', toggleTheme);

// 保存颜色设置
function saveThemeSettings(color) {
    localStorage.setItem('themeSetting', color);
}

// 从获取颜色设置
function getThemeSettings() {
    if (localStorage.getItem('themeSetting') == null) {
        console.log("没有保存的值！使用浏览器主题")
            // 检测是否支持 prefers-color-scheme 媒体查询
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            // 用户当前使用的是深色主题
            return "dark";
        } else {
            // 用户当前使用的是浅色主题
            return "dark";
        }
    }
    return localStorage.getItem('themeSetting');
}

// 切换到保存的颜色
function checkTheme() {
    setTo(getThemeSettings());
}

// 进行颜色切换
function setTo(theme) {
    rootElement = document.documentElement;
    console.log(`切换到颜色${theme}`);
    switch (theme) {
        case "dark":
            rootElement.setAttribute('data-theme', 'dark');
            saveThemeSettings("dark");
            break;
        case "light":
        default:
            rootElement.removeAttribute('data-theme');
            saveThemeSettings("light");
            break;
    }
}

// 监听按钮点击事件，触发函数切换
function toggleTheme() {
    choice = getThemeSettings();
    switch (choice) {
        case "light":
            setTo("dark");
            break;
        case "dark":
            setTo("light");
            break;
    }
}