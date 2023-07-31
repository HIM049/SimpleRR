// TIPS: 此处匹配颜色使用了 switch 是因为考虑到可能的多主题需求。方便后续添加和修改。

// 设置颜色设置到localStorage
function saveThemeSettings(color) {
    localStorage.setItem('themeSetting', color);
}

// 从localStorage获取颜色设置
function getThemeSettings() {
    if (localStorage.getItem('themeSetting') == null) {
        saveThemeSettings("dark");
        return "light";
    }
    return localStorage.getItem('themeSetting');
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


// 文档加载完成后检查保存的值
document.addEventListener('DOMContentLoaded', checkTheme);

function checkTheme() {
    setTo(getThemeSettings());
}


// 监听按钮点击事件，触发函数切换
toggleButton = document.getElementById('toggle-button');
toggleButton.addEventListener('click', toggleTheme);

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