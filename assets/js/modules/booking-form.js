const flatpickr = require('flatpickr');

function initBookingForm() {

    $('.booking-form #check-in').flatpickr({
        minDate: 'today'
    });
    $('.booking-form #check-out').flatpickr({
        minDate: 'today'
    });

    $('#checkin').flatpickr({
        minDate: 'today'
    });
    $('#checkout').flatpickr({
        minDate: 'today'
    });

}

module.exports = {
    initBookingForm: initBookingForm
}