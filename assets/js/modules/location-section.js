function initLocationSections() {

    $('.city-details .details-links li').on('click', function() {

        target = $(this).attr('data-location-target');

        $(this).addClass('detail-link-active').siblings().removeClass('detail-link-active');

        $('.city-details .details-lower').each(function(){

            container = $(this).attr('data-location-section');

            if ( target == container ) {

                $(this).removeClass('details-inactive');

            } else {

                $(this).addClass('details-inactive');

            }

        });

    });
    
}

module.exports = {
    initLocationSections: initLocationSections
}
