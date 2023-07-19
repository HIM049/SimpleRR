window.addEventListener('scroll', chooseStyle);
window.addEventListener('resize', setSidebaRight)
document.addEventListener("DOMContentLoaded", setSidebaRight)
document.addEventListener('DOMContentLoaded', console.log(navigator.userAgent))

function setSidebarStyle() {
    console.log(`滚动量${Math.round(window.pageYOffset)}`)
    if (Math.round(window.pageYOffset) >= 100) {
        IndexSidebar.classList.add("index-sidebar-fix")
        IndexSidebar.style.top = ""
    } else {
        IndexSidebar.classList.remove("sidebar-fix")
        IndexSidebar.style.top = `${120 - Math.round(window.pageYOffset)}px`
    }
}

function setSidebaRight() {
    console.log(`窗口宽度${Math.round(window.innerWidth)}`)
    if (Math.round(window.innerWidth) <= 1048) {
        IndexSidebar.style.right = "20px"
    } else {
        IndexSidebar.style.right = `${window.innerWidth / 2 - 510}px`
    }
}

function chooseStyle() {
    if (window.innerWidth < 750) {
        return
    } else {
        setSidebarStyle()
    }
}