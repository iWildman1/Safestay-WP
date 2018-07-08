

function initBookingFormRelocation() {
    $('.relocate-group-booking').click(() => {
        document.location = "/group-bookings.html"
    })
}

module.exports = {
    initBookingFormRelocation: initBookingFormRelocation
}