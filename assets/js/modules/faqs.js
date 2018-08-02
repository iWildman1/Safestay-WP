function initFaqs() {
    const titles = $('.faq-list .title');
    const descriptions = $('.faq-list .description');
    const tabControls = $('.faq-tabs').children();


    $(tabControls).each(function() {
        $(this).click(function() {
            $(this).addClass('tab-active');
            $(this).siblings().removeClass('tab-active');

            let list = $(this).data('list');

            $('.faq-list').each(function() {
                if ($(this).data('list') == list) {
                    $(this).removeClass('inactive');
                    $(this).siblings().addClass('inactive');
                }
            })
        })
    })


    titles.each(function() {
        $(this).click(function() {
            let target = $(this).data('target');
            $(descriptions).each(function() {
                if ($(this).data('attribute') == target) {
                    $(this).addClass('active');
                    $(this).siblings().removeClass('active');
                }
            })
        })
    })
}

module.exports = {
    initFaqs: initFaqs
}