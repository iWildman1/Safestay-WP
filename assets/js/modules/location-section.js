function initLocationSections() {

    const links = $('.details-links').children();
    const sections = $('.details-lower');

    links.each(function() {
        $(this).click(function() {
            let target = $(this).data('location-target');
            let link = $(this);

            $(sections).each(function() {
                if ($(this).data('location-section') === target) {
                    $(this).siblings().addClass('details-inactive');
                    $(this).removeClass('details-inactive');

                    $(link).siblings().removeClass('detail-link-active');
                    $(link).addClass('detail-link-active');
                }
            })


        })
    })

}

module.exports = {
    initLocationSections: initLocationSections
}