window.$.velocity = require('velocity-animate/velocity.js')

function initExploreCarousel() {

    const slider = $('.explore-slider');

    slider.each(function() {
        let x = 0;
        let curOffset = 0;
        let inDragExplore = false;
        let finalYDist = 0;

        const slides = $(this).children();
        const slider = $(this);


        const sliderControlCode = `<div class="control"></div>`;
        let output = "";

        slides.each(() => {
            output += sliderControlCode;
        });

        let controls = slider.parent().parent().find('.slider-controls');

        $(controls).html(output);
        $($(controls).children()[0]).addClass('control-active');

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
                    offset = (curOffset) + (-(x - e.pageX));
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
    })

    
}

function initHomeCarousel() {
    let slider = $('.header-carousel');
    let slides = $('.header-slide');

    $('.header-total').html('0' +slides.length);

    $('.header-slider-left').click(function() {
        prevHeaderSlide();
    })

    $('.header-slider-right').click(function() {
        nextHeaderSlide();
    })

    if (slides.length > 1) {

        slides.each(function (i) {
            if (i == 0) {
                $(this).addClass('slide-active');
                let image = $(this).find('.bg-img-link').data('bg-img');

                $('.header-slider').css('background-image', 'url(' + image + ')');
            } else {
                $(this).addClass('slide-inactive');
            }
        })

        setInterval(function () {


            if ($('.slide-active').next('.slide-inactive').length == 0) {
                $('.slide-active').addClass('slide-inactive').removeClass('slide-active');
                $('.header-slide').first().addClass('slide-active').removeClass('slide-inactive');
            } else {
                $('.slide-active').addClass('slide-inactive').removeClass('slide-active').next('.slide-inactive').addClass('slide-active').removeClass('slide-inactive');
            }

            let image = $('.slide-active').find('.bg-img-link').data('bg-img');
            $('.header-slider').css('background-image', 'url(' + image + ')')

            slides.each(function (i) {
                if ($(this).hasClass('slide-active')) {
                    $('.header-current').html('0' + (i + 1));
                }
            })

        }, 6000);

    }
}

function nextHeaderSlide() {
    if ($('.slide-active').next('.slide-inactive').length == 0) {
        $('.slide-active').addClass('slide-inactive').removeClass('slide-active');
        $('.header-slide').first().addClass('slide-active').removeClass('slide-inactive');
    } else {
        $('.slide-active').addClass('slide-inactive').removeClass('slide-active').next('.slide-inactive').addClass('slide-active').removeClass('slide-inactive');
    }

    let image = $('.slide-active').find('.bg-img-link').data('bg-img');
    $('.header-slider').css('background-image', 'url(' + image + ')')

    let index = $('.slide-active').index();
    $('.header-current').html('0' + (index + 1));
}

function prevHeaderSlide() {
    if ($('.slide-active').prev('.slide-inactive').length == 0) {
        $('.slide-active').addClass('slide-inactive').removeClass('slide-active');
        $('.header-slide').last().addClass('slide-active').removeClass('slide-inactive');
    } else {
        $('.slide-active').addClass('slide-inactive').removeClass('slide-active').prev('.slide-inactive').addClass('slide-active').removeClass('slide-inactive');
    }

    let image = $('.slide-active').find('.bg-img-link').data('bg-img');
    $('.header-slider').css('background-image', 'url(' + image + ')')

    let index = $('.slide-active').index();
    $('.header-current').html('0' + (index + 1));
}

module.exports = {
    initExploreCarousel: initExploreCarousel,
    initHomeCarousel: initHomeCarousel
}