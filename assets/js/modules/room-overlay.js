function initRoomOverlay() {

    const rooms = $('.room');
    const buttons = $('.room .button.more-info');
    const overlay = $('.room-overlay');

    let overlayActive = false;

    //Open overlay
    buttons.click(function(e) {
        e.preventDefault();

        $(overlay).removeClass('inactive');
        overlayActive = true;

        let overlaySlug = $(this).data('room-target');

        //Setup overlay data
        
        let cost;
        let title;
        let description;
        let features;
        let img;


        $(rooms).each(function() {
            if ($(this).data('room-slug') == overlaySlug) {
                cost = $(this).find('.cost>span').text();
                title = $(this).find('h4').text();
                description = $(this).find('.info-container>p').text();
                img = $(this).find('img').attr('src');
                features = $(this).find('.room-facility-list').html();

                
            }
        })

        let output = `
        
        <div class="grid-item half room-overlay-left no-margin-right no-padding">
            <div class="room-info-inner">
                <p class="offer-price">${cost}</p>
                <h1 class="underline-dark">${title}</h1>
                <p>${description}</p>
                <ul class="room-facility-list">
                    ${features}
                </ul>
                <a href="/" class="button button-overlay-book">Book Now</a>
            </div>
        </div>
        <div class="grid-item half room-overlay-right no-margin-left no-margin-sides no-padding">
            <img class="fill-grid" src="${img}" alt="">
            <img src="../dist/img/left-arrow-slide.png" alt="" class="left-arrow">
            <img src="../dist/img/right-arrow-slide.png" alt="" class="right-arrow">
        </div>

        
        `;

        $('.room-overlay .row').html(output);
    })

    //Close overlay
    $(document).keyup(function(e) {
        if (e.keyCode == 27 && overlayActive) {
            overlayActive = false;
            $(overlay).addClass('inactive');
        }
    })
    

}

module.exports = {
    initRoomOverlay: initRoomOverlay
}