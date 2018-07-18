
function initHomepageExplore() {
    
    const scrollingBanner = $('.scrolling-banner');
    let activeElement = scrollingBanner.find('.active');
    let activeCountry = $(activeElement).data('target-country')
    
    
    scrollingBanner.mouseup(function() {
        setTimeout(function() {
            let activeElement = scrollingBanner.find('.active');
            let activeCountry = $(activeElement).data('target-country')
            

            $('.expore').children().each(function() {
                if ($(this).data('country') != activeCountry) {
                    $(this).addClass('explore-country-inactive');
                    $(this).removeClass('explore-country-active');
                } else {
                    $(this).addClass('explore-country-active');
                    $(this).removeClass('explore-country-inactive');
                }
            })

        }, 50)
    })

    $('.expore').children().each(function() {
        if ($(this).data('country') != activeCountry) {
            $(this).addClass('explore-country-inactive');
        }
    })
}

module.exports = {
    initHomepageExplore: initHomepageExplore
}