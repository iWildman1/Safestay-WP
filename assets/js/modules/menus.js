window.$.velocity = require('velocity-animate/velocity.js')

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
}

module.exports = {
    initLocationsMenu: initLocationsMenu,
    initMainMenu: initMainMenu
}