window.$.velocity = require('velocity-animate/velocity.js')

function initExploreCarousel() {

    

    let x = 0;
    let curOffset = 0;
    let inDragExplore = false;
    let finalYDist = 0;

    const slider = $('.explore-slider');
    const slides = slider.children();

    const sliderControlCode = `<div class="control"></div>`;
    let output = "";

    slides.each(() => {
        output += sliderControlCode;
    })

    $('.slider-controls').html(output);
    $($('.slider-controls').children()[0]).addClass('control-active');

    slider.mousedown((e) => {
        inDragExplore = true;
        x = e.pageX;
        curOffset = parseInt(slider.css('transform').split(',')[4]);
    })

    $(document).mouseup(() => {

        if (inDragExplore) {
            inDragExplore = false;

            let closestElementOffset = 0;
            let closestElement;
            let closestElementIndex = 0;

            slides.each(function (i) {

                let xoffset = parseInt(slider.css('transform').split(',')[4]);

                let pos = ($(this).position().left) + xoffset;

                if (pos < 0) {
                    pos = -(pos);
                }

                if (pos < closestElementOffset || closestElementOffset == 0) {
                    closestElementOffset = pos;
                    closestElement = $(this)
                    closestElementIndex = i;
                }
            })

            curOffset = parseInt(slider.css('transform').split(',')[4]);

            if (curOffset < 0) {
                slider.velocity({
                    translateX: [(-(closestElement.position().left)) + "px", parseInt(slider.css('transform').split(',')[4]) + "px"]
                }, 300)
            } else {
                slider.velocity({
                    translateX: [closestElement.position().left + "px", parseInt(slider.css('transform').split(',')[4]) + "px"]
                }, 300)
            }

            $('.control.control-active').removeClass('control-active');
            const controls = $('.slider-controls').children();
            $(controls[closestElementIndex]).addClass('control-active');



        }
    })

    slider.mousemove((e) => {
        if (inDragExplore) {

            let offset = 0;

            if (isNaN(curOffset)) {
                offset = -(x - e.pageX);
            } else {
                offset = (curOffset) + (-(x-e.pageX));
            }

            slider.css('transform', 'translateX(' + offset + 'px)');

            finalYDist = ($(slides[slides.length - 1]).position().left + (parseInt(slider.css('transform').split(',')[4]))) + $(slides[slides.length - 1]).width();

            if (finalYDist < ($(slider).width() - 300)) {
                $(document).mouseup();
            }

            let startXDist = ($(slides[0]).position().left) + (parseInt(slider.css('transform').split(',')[4]));

            if (startXDist > 175) {
                $(document).mouseup();
            }
        }
    })

}

module.exports = {
    initExploreCarousel: initExploreCarousel
}