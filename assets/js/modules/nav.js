let menuBg = false;

function initMainMenu() {
    $(window).scroll(function() {
        controlMenuBg();
    });
    $(document).ready(function() {
        controlMenuBg();
    });
}

function controlMenuBg() {
    if (menuBg == false && $(window).scrollTop() > 175) {
        menuBg = true;
        $('.nav-background').addClass('animate-in').removeClass('animate-out');
    } else if (menuBg == true && $(window).scrollTop() < 175) {
        menuBg = false;
        $('.nav-background').addClass('animate-out').removeClass('animate-in');
    }
}

module.exports = {
    initMainMenu: initMainMenu,
}
