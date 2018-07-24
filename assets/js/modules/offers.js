function initOfferSingleToggles() {
    const toggles = $('.booking-toggles').children();
    const sections =  $('.offer-info-inner');

    toggles.each(function() {
        
        $(this).click(function() {
            let button = $(this);

            $(sections).each(function() {
                if ($(button).data('offer-target') === $(this).data('offer-type')) {
                    $(this).siblings().addClass('offer-info-inactive');
                    $(this).removeClass('offer-info-inactive');

                    $(button).addClass('toggle-active');
                    $(button).siblings().removeClass('toggle-active');
                }
            })
        })

    })
}

module.exports = {
    initOfferSingleToggles: initOfferSingleToggles
}