function initOverrides() {
    const contactEmailInput = $('#wpforms-228-field_1');
    contactEmailInput.attr('style', 'border: 1px solid #ccc !important;');
}

module.exports = {
    initOverrides: initOverrides
}