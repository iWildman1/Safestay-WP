window.$.velocity = require('velocity-animate/velocity.js')

function initHomepageScrollingBanner() {
    let x = 0;
    let curOffset = 0;
    let inDragHomeBanner = false;

    const banner = $('.scrolling-banner');
    const bannerItems = banner.children();

    banner.mousedown((e) => {
        inDragHomeBanner = true;
        x = e.pageX;
        curOffset = parseInt(banner.css('transform').split(',')[4]);
    })

    $(document).mouseup((e) => {
        if (inDragHomeBanner) {
            inDragHomeBanner = false;

            let sliderLeftEdge = $(bannerItems[0]).position().left + (parseInt(banner.css('transform').split(',')[4]));
            let midpoint = Math.floor(($(window).width()) / 2);
            
            let closestItem = $(bannerItems[0]);
            let closestPos = 0;
            let closestSigned = 0;

            bannerItems.each(function(i) {
                let bannerOffset = (parseInt(banner.css('transform').split(',')[4]));
                let itemOffset = $(this).position().left;
                let offset = bannerOffset + itemOffset;
                let midOffset = (offset + ($(this).width() / 2));

                let distance = midOffset - midpoint;
                let distanceSigned = distance;

                if (distance < 0) {
                    distance = -(distance);
                }

                if (distance < closestPos || closestPos == 0) {
                    closestPos = distance;
                    closestItem = $(this);
                    closestSigned = distanceSigned;
                }
            })

            let itemOffsetLeft = ($(closestItem).position().left) + (parseInt(banner.css('transform').split(',')[4]));
        
            let newPosition = (parseInt(banner.css('transform').split(',')[4])) + -(closestSigned);

            if (isNaN(closestPos)) {
                closestPos = 0;
            }

            banner.velocity({
                translateX: [newPosition, (parseInt(banner.css('transform').split(',')[4]))]
            })

            $(closestItem).siblings().each(function() {
                $(this).removeClass('active');
            })
            
            $(closestItem).addClass('active');

        }
    })

    banner.mousemove((e) => {

        let offset = 0;

        if (isNaN(curOffset)) {
            offset = -(x - e.pageX);
        } else {
            offset = (curOffset) + (-(x - e.pageX));
        }

        if (inDragHomeBanner) {
            banner.css('transform', 'translateX(' + offset + 'px)')
        }
    })
}

module.exports = {
    initHomepageScrollingBanner: initHomepageScrollingBanner
}