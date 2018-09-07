const ScrollMagic = require('scrollmagic');

const scrollController = new ScrollMagic.Controller();

function initSeqLoad() {

    const sections = $('section');

    sections.each(function() {
        let section = $(this);
        const scrollDetection = new ScrollMagic.Scene({
            triggerElement: $(this)[0],
            triggerHook: 0.75,
            duration: '100%'
        })
        .on('enter', function() {
            showSection(section)
        })
        .addTo(scrollController)
    })

}

function showSection(object) {
    $(object).addClass('in-view');
}

module.exports = {
    initSeqLoad: initSeqLoad
}
