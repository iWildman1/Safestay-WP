//Load SCSS
import '../scss/app.scss';

//Load jQuery
window.jQuery = window.$ = require('jquery');

//Load modules
const carousels     = require('./modules/carousels');
const bookingForm   = require('./modules/booking-form');
const relocations   = require('./modules/redirections');
const menus         = require('./modules/menus');
const banners       = require('./modules/scrolling-banners');
const explore       = require('./modules/explore');
const locSection    = require('./modules/location-section');

//Activate modules

if (document.querySelector('.explore-slider')) {
    carousels.initExploreCarousel();
}

if (document.querySelector('.header-slider')) {
    carousels.initHomeCarousel();
}

if (document.querySelector('.booking-slider')) {
    carousels.initBookingSlider();
}

if (document.querySelector('.booking-form')) {
    bookingForm.initBookingForm();
}

if (document.querySelector('.relocate-group-booking')) {
    relocations.initBookingFormRelocation();
}

if (document.querySelector('.locations-open-toggle')) {
    menus.initLocationsMenu();
}

if (document.querySelector('.main-menu')) {
    menus.initMainMenu();
}

if (document.querySelector('.scrolling-banner')) {
    banners.initHomepageScrollingBanner();
}

if (document.querySelector('.expore')) {
    explore.initHomepageExplore();
}

if (document.querySelector('.city-details')) {
    locSection.initLocationSections();
}

