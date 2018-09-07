window.$.velocity = require('velocity-animate/velocity.js');

let menuBg = false;
let groupsOpen = false;

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

function initGroupsMenu() {
    $('.groups-open-toggle').click(function(e) {

        e.preventDefault();

        if (groupsOpen == false) {
            $('.group-overlay').removeClass('inactive')
            groupsOpen = true;
        } else {
            $('.group-overlay').addClass('inactive');
            groupsOpen = false;
        }
    })

    $('.group-overlay .close-btn').click(function() {
        $('.group-overlay').addClass('inactive');
        groupsOpen = false;
    })
}

function initMenuMenuScroll() {
    const slider = $('.main-menu .slider-row');
    let sliding = false;
    let offset;
    let activated = false;
    let edgeOffset = $(slider).offset().left;
    let initialOffset = 0;

    const preSlides = document.querySelectorAll('.main-menu .slider-row a');

    //Prevent image and anchor drag
    preSlides.forEach(function() {
        this.ondragstart = function() {
            return false;
        }
    })

    $(slider).mousedown(function(e) {
        sliding = true;
        initialOffset = (e.pageX - edgeOffset);

    })

    $(slider).mousemove(function(e) {

        if (sliding) {
            let distance = initialOffset - (e.pageX - edgeOffset);

            if (activated) {
                distance = distance + -(offset);
            }

            $(slider).css('transform', 'translateX(' + -(distance) + 'px)')
        }

    })

    $(document).mouseup(function() {
        if (sliding) {
            sliding = false;
            activated = true;
            offset = parseInt(slider.css('transform').split(',')[4]);
        }
    })
}

function initMainMenuLocator() {
    const selector = $('.main-menu .selector select');

    mainMenuFilter($(selector).val());

    $(selector).change(function() {
        mainMenuFilter($(selector).val());
    })
}

function mainMenuFilter(activeLocation) {
    const items = $('.main-menu .slider-row li');

    items.each(function() {
        item = $(this);
        loc = sanitizeLocation($(this).data('location'));

        if (loc != activeLocation) {
            $(this).css('display', 'none');
        } else {
            $(this).css('display', 'inline-block');
        }
    })
}

function sanitizeLocation(loc) {
    loc = loc.toLowerCase();
    let locArray = loc.split(" ");
    loc = locArray.join("-");
    return loc;

}

module.exports = {
    initLocationsMenu: initLocationsMenu,
    initMainMenu: initMainMenu,
    initGroupsMenu: initGroupsMenu,
    initMenuMenuScroll: initMenuMenuScroll,
    initMainMenuLocator: initMainMenuLocator
}
