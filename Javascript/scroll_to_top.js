// 获取按钮元素并赋值到 backToTopBtn
backToTopBtn = document.getElementById("backToTop");

// 检查页面滚动量
document.addEventListener('DOMContentLoaded', chenkScroll);
window.addEventListener("scroll", chenkScroll);
// 在按钮点击时触发滚动
backToTopBtn.addEventListener('click', scrollToTop);


// 滚动到页面顶部
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

// 调整按钮可见性
function chenkScroll() {
    if (document.documentElement.scrollTop > 300) {
        backToTopBtn.style.display = "";
    } else {
        backToTopBtn.style.display = "none";
    }
}