window.$.velocity = require('velocity-animate/velocity.js');

let menuBg = false;

function initLocationsMenu() {

    $('.locations-open-toggle').each(function() {
        $(this).click(() => {
            $('.locations-overlay-1').velocity({
                translateX: ['0%', '-100%']
            }, 400)
        })
    })

    

    $('.locations-close-toggle').click(() => {
        $('.locations-overlay-1').velocity({
            translateX: ['-100%', '0%']
        }, 400)
    })
}

function initMainMenu() {


    $('.toggle-navigation').click(() => {
        $('.main-menu').velocity({
            translateY: ['0%', '-100%']
        }, 400)
    })

    $('.menu-close-toggle').click(() => {
        $('.main-menu').velocity({
            translateY: ['-100%', '0%']
        }, 400)
    })

    $(window).scroll(function() {
        controlMenuBg();
    })

    $(document).ready(function() {
        controlMenuBg();
    })
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
    initLocationsMenu: initLocationsMenu,
    initMainMenu: initMainMenu
}