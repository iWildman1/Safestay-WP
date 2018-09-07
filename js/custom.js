// Google map
    function new_map( $el ) {
    	var $markers = $el.find('.marker');
    	var args = {
    		zoom		: 16,
    		center		: new google.maps.LatLng(0, 0),
    		mapTypeId	: google.maps.MapTypeId.ROADMAP
    	};
    	var map = new google.maps.Map( $el[0], args);
    	map.markers = [];
    	$markers.each(function(){
        	add_marker( $(this), map );
    	});
    	center_map( map );
    	return map;
    }
    function add_marker( $marker, map ) {
    	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    	var marker = new google.maps.Marker({
    		position	: latlng,
    		map			: map
    	});
    	map.markers.push( marker );
    	if( $marker.html() ) {
    		var infowindow = new google.maps.InfoWindow({
    			content		: $marker.html()
    		});
    		google.maps.event.addListener(marker, 'click', function() {
    			infowindow.open( map, marker );
    		});
    	}
    }
    function center_map( map ) {
    	var bounds = new google.maps.LatLngBounds();
    	$.each( map.markers, function( i, marker ){
    		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
    		bounds.extend( latlng );
    	});
    	if( map.markers.length == 1 ) {
    	    map.setCenter( bounds.getCenter() );
    	    map.setZoom( 16 );
    	} else {
    		map.fitBounds( bounds );
    	}
    }
    var map = null;
// Google map


// When loaded
$(document).ready(function(){
    $('.email .wpcf7 .wpcf7-submit').hover(function(){
        $('.email .wpcf7 .circle').toggleClass('hover');
    });

    // Booking form large functionality
        function BookingFormLarger () {
            $('.book-now #location').val('0');
            target = $('.book-now select#booking-country').val();
            $('.book-now select#location option').each(function() {
                container = $(this).attr('data-country');
                if ( target == container ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        BookingFormLarger();

        $('.book-now select#booking-country').on('change', function(){
            BookingFormLarger();
        })
    // Booking form large functionality

    $('.acf-map').each(function(){
        // create map
        map = new_map( $(this) );
    });
    // Main menu functionality
        $('.nav-toggle.toggle-navigation').on('click', function() {
            $('.main-menu').addClass('active');
            setTimeout(function(){
                $('.main-menu').addClass('finished');
            },1000);
        });
        $('.menu-close-toggle').on('click', function(){
            $('.main-menu').removeClass('active');
            $('.main-menu').removeClass('finished');
        });
    // Main menu functionality


    // Group bookings locations dropdown
        $('.country-select-wrapper .country-list').hide();
        $('.country-select-wrapper .country').hide();
        $('.country-select-wrapper .country-select').on('click', function() {
            $('.country-select-wrapper .country-list').slideToggle();
        });
        $('.country-select-wrapper .name').on('click', function(){
            $(this).toggleClass('active').siblings('.name').removeClass('active');
            target = $(this).attr('data-target');
            $('.country-select-wrapper .country').each(function() {
                toggle = $(this).attr('data-toggle');
                if ( target == toggle ) {
                    $(this).slideToggle().siblings('.country').slideUp();
                }
            })
        });
    // Group bookings locations dropdown


    // Locations overlay functionality
        $('.locations-open-toggle').on('click', function(e){
            e.preventDefault();
            $('.locations-overlay-1').addClass('active');
            setTimeout(function(){
                $('.locations-overlay-1').addClass('finished');
            },1000);
            LocationsMenuHostelFade();
        });
        $('.locations-close-toggle').on('click', function(){
            $('.locations-overlay-1').removeClass('active');
            $('.locations-overlay-1').removeClass('finished');
            $('.locations-overlay-1').animate({
                scrollTop: 0
            }, 'slow');
            LocationsMenuHostelFade();
        });
    // Locations overlay functionality


    // Group lightbox functionality
        $('#toggle-group-lightbox').on('click', function() {
            $('#group-lightbox').addClass('active');
            $('#toggle-group-lightbox').fadeOut();
        });
        $('.close-group-lightbox').on('click', function() {
            $('#group-lightbox').removeClass('active');
            $('#toggle-group-lightbox').fadeIn();
        });
    // Group lightbox functionality


    // Close rooms
        $('.close-room-overlay').on('click', function () {
            $('.room-overlay').addClass('inactive');
        });
        $('.room-overlay').on("click.Bst", function(event){
            if ( !$('.room-overlay').hasClass('inactive') ) {
                if ( $(this).find('.room-overlay-inner').has(event.target).length == 0 && !$(this).find('.room-overlay-inner').is(event.target) ) {
                    $('.room-overlay').addClass('inactive');
                }
            }
		});
    // Close rooms


    // Group overlay functionality
        $('.groups-open-toggle').on('click', function(e){
            e.preventDefault();
            $('.group-overlay').addClass('active');
            setTimeout(function(){
                $('.group-overlay').addClass('finished');
            },1000);
        });
        $('.toggle-calendar').on('click', function(){
            $('.booknowmenu').fadeToggle('500');
        });
        $('.groups-close-toggle').on('click', function(){
            $('.group-overlay').removeClass('active');
            $('.group-overlay').removeClass('finished');
        });
    // Group overlay functionality

    // Group overlay button showing
        function showGroupToggleBtn () {
            if ( $('#toggle-group-lightbox').length ) {
                var distance = $('.contact-us-block').offset().top,
                $window = $(window);
                if ( $window.scrollTop() >= distance && !$('#group-lightbox').hasClass('active') ) {
                    $('#toggle-group-lightbox').fadeIn();
                } else {
                    $('#toggle-group-lightbox').fadeOut();
                }
            }
        }
        showGroupToggleBtn();
        $(window).scroll(function(){
            showGroupToggleBtn();
        });
    // Group overlay button showing

    // Group menu additional
        $('.group-overlay .click-wrapper').on('click', function() {
            current = $(this).closest('.contact-item');
            target = $(this).attr('data-toggle');
            if ( target ) {
                $(this).closest('.contact-item').toggleClass('active').siblings().removeClass('active');
                if ( $(current).hasClass('active') ) {
                    $('.group-overlay .overlay-right').addClass('faded');
                    $('.group-overlay .contact-item').addClass('faded');
                    $(this).closest('.contact-item').toggleClass('faded');
                } else {
                    $('.group-overlay .overlay-right').removeClass('faded');
                    $('.group-overlay .contact-item').removeClass('faded');
                }
                $('.group-overlay .additional').each(function() {
                    if ( $(this).attr('data-target') == target ) {
                        $(this).toggleClass('active').siblings().removeClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });
            } else {
                $('.group-overlay .additional').removeClass('active');
                $('.group-overlay .overlay-right').removeClass('faded');
                $('.group-overlay .contact-item').removeClass('faded');
            }
        });
        $('.group-overlay .close-additional').on('click', function() {
            $('.group-overlay .overlay-right').removeClass('faded');
            $('.group-overlay .contact-item').removeClass('faded');
            $('.group-overlay .additional').removeClass('active');
        });
    // Group menu additional


    // Main menu locations
        var select,location,locationCarousel;
        function MainMenuLocations (){
            select = $('select#locations').val();
            $('.main-menu .locations-carousel-group .location-carousel').each(function(){
                location = $(this).attr('data-location');
                if ( select == location ) {
                    $(this).addClass('active').siblings().removeClass('active');
                    locationCarousel = $(this);
                }
            });
        }
        MainMenuLocations()
        $('select#locations').on('change', function(){
            select = $(this).val();
            MainMenuLocations();
        });
        $(document).keyup(function(e){
            if (e.keyCode == 37 ) { // left key maps to keycode `37`
                locationCarousel.trigger('prev.owl');
            }
            if (e.keyCode == 39 ) { // right key maps to keycode `39`
                locationCarousel.trigger('next.owl');
            }
        });
    // Main menu locations

    // Groups menu Locations
        function GroupMenuLocations (){
            select = $('select#group-locations').val();
            $('.group-overlay .locations-carousel-group .location-carousel').each(function(){
                location = $(this).attr('data-location');
                if ( select == location ) {
                    $(this).addClass('active').siblings().removeClass('active');
                }
            });
        }

        var pathname = window.location.pathname;
        if ( pathname.indexOf('locations') > -1 ) {
            trim = pathname.replace('/locations/', '').replace('/','');
            $('.group-overlay .location button').each(function(){
                city = $(this).attr('data-place');
                if ( trim == city ) {
                    $(this).parent('.location').addClass('active');
                    country = $(this).closest('.location-carousel').attr('data-location');
                    $('select#group-locations').val(country);
                }
            });
            GroupMenuLocations();
        }

        GroupMenuLocations()
        $('select#group-locations').on('change', function(){
            select = $(this).val();
            GroupMenuLocations();
        });
    // Groups menu Locations


    // The explorer page filter
        function filterPosts () {
            if ( $('.explorer-filters').length ) {
                selectedCity = $('.explorer-filters select#city-select').val();
                selectedHastag = $('.explorer-filters select#hastag-select').val();
                $('.explorer-grid-main .post').each(function(){
                    city = $(this).attr('data-city');
                    hastag = $(this).attr('data-hashtag');
                    if ( ( selectedCity == "all" || selectedCity == city ) && ( selectedHastag == "all" || selectedHastag == hastag ) ) {
                        $(this).fadeIn();
                        $(this).addClass('active');
                    } else {
                        $(this).hide();
                        $(this).removeClass('active');
                        $(this).addClass('explorer-grid-item');
                        $(this).removeClass('explorer-featured');
                    }
                });
                $('.explorer-grid-main .post.active').first().removeClass('explorer-grid-item');
                $('.explorer-grid-main .post.active').first().addClass('explorer-featured');
            }
        }

        filterPosts();

        $('.explorer-filters select').on('change', function(){
            filterPosts();
        });
    // The explorer page filter


    // Offers page filter
        function filterOffersPosts () {
            /*
            if ( $('.offers-toggles').length ) {
                selectedType = $('.offers-toggles select#type').val();
                $('.offers-section').each(function(){
                    type = $(this).attr('data-type');
                    if ( (selectedType == "all" || selectedType == type ) ) {
                        $(this).fadeIn();
                        $(this).addClass('active');
                    } else {
                        $(this).hide();
                        $(this).removeClass('active');
                    }
                })
                selectedCity = $('.offers-toggles select#city').val();
                $('.offers-section .offer').each(function(){
                    city = $(this).attr('data-city');
                    if ( (selectedCity == "all" || selectedCity == city) ) {
                        $(this).fadeIn();
                        $(this).addClass('active');
                    } else {
                        $(this).hide();
                        $(this).removeClass('active');
                    }
                });
            }
            */
        }

        filterOffersPosts();

        $('.offers-toggles select').on('change', function () {
            filterOffersPosts();
        });
    // Offers page filter


    // Location menu Hostel class ading
        function LocationsMenuHostelFade () {
            if ($('.locations-overlay-1').hasClass('active')) {
                $('.locations-overlay-1 .locations-grid .place').each(function(){
                    $item_to_top = $(this).offset().top - $(window).scrollTop();
                    $win_height = $(window).height();
                    if ( $win_height > $item_to_top ) {
                        $(this).addClass('active');
                    }
                });
            } else {
                $('.locations-overlay-1 .locations-grid .place').each(function(){
                    $(this).removeClass('active');
                });
            }
        }

        LocationsMenuHostelFade();

        $('.locations-overlay-1').scroll(function () {
            LocationsMenuHostelFade();
        });
    // Location menu Hostel class ading


    // Bookings functionality
        $('.individual-booking-toggle').on('click',function(e){
            e.preventDefault();
            $(this).addClass('toggle-active').siblings().removeClass('toggle-active');
            $('.individual-booking').addClass('active').siblings().removeClass('active');
        });

        $('.group-booking-toggle').on('click',function(e){
            e.preventDefault();
            $(this).addClass('toggle-active').siblings().removeClass('toggle-active');
            $('.group-booking').addClass('active').siblings().removeClass('active');
        });
    // Bookings functionality


    // Single hostel gallery
        $('.header-info a.gallery').on('click', function(e){
            e.preventDefault();
            $('#gallery-wrapper').addClass('active');
        });
        $('.close-gallery-button').on('click', function(e){
            e.preventDefault();
            $('#gallery-wrapper').removeClass('active');
        });
        $('#gallery-wrapper').on("click.Bst", function(event){
            if ( $('#gallery-wrapper').hasClass('active') ) {
                if ( $(this).find('.hostel-gallery').has(event.target).length == 0 && !$(this).find('.hostel-gallery').is(event.target) ) {
                    $('#gallery-wrapper').removeClass('active');
                }
            }
		});
    // Single hostel gallery


    // Single hostel room lightbox
        $('.toggle-room-lightbox').on('click', function(e){
            e.preventDefault();
            target = $(this).attr('data-room-target');
            if ( target != "" ) {
                $('.room-overlay').removeClass('inactive');
                $('.room-overlay .room-overlay-inner').each(function(){
                    container = $(this).attr('data-room-container');
                    if ( container == target ) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            } else {
                $('.room-overlay').addClass('inactive');
            }
        });
    // Single hostel room lightbox


    // Group bookings overlay functionality
        $('#group-lightbox .overlay').hide();
        $('#group-lightbox .click-wrapper').on('click', function(){
            target = $(this).attr('data-target');
            $('#group-lightbox .overlay').each(function(){
                container = $(this).attr('data-container');
                if ( target == container ) {
                    $('#group-lightbox .overlays').addClass('active');
                    $(this).show().siblings('.overlay').hide();
                }
            });
        });
        $('.overlays .close-group-overlay').on('click', function(){
            $('#group-lightbox .overlays').removeClass('active');
        });
    // Group bookings overlay functionality


    // Room tabs in Room hostel taxonomy
        if ( $('.our-rooms').length ) {
            $('.our-rooms .select-types .inner-select-type').first().addClass('active');
            $('.our-rooms .types .type').first().show().siblings().hide();
            $('.our-rooms .select-types .inner-select-type').on('click', function () {
                $('.our-rooms .select-types .inner-select-type').removeClass('active');
                $(this).addClass('active');
                target = $(this).attr('data-target');
                $('.our-rooms .types .type').each(function(){
                    container = $(this).attr('data-container');
                    if ( target == container ) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                })
            });
        }
    // Room tabs in Room hostel taxonomy


    // Explore carousel
        var owl = $('.explore-controls-carousel');
        owl.owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoWidth: true,
            items: 4,
            margin: 50,
            URLhashListener: true,
            startPosition: 'URLHash',
        });

        function explorerCurrent () {
            if ( $('.explore-controls-carousel').length ) {
                $('.explore-controls-carousel .owl-item').each(function() {
                    active = $('.explore-controls-carousel .owl-item.active').first();
                    target = $(active).find('.banner-item').attr('data-target-country');

                    $('.explore-controls-carousel .owl-item').find('.banner-item').removeClass('active');
                    $(active).find('.banner-item').addClass('active');

                    $('.expore .container').each(function(){
                        if ( target == $(this).attr('data-country') ) {
                            $(this).removeClass('explore-country-inactive').siblings().addClass('explore-country-inactive');
                        }
                    });
                });
            }
        }

        explorerCurrent();

        owl.on('translated.owl.carousel', function(){
            explorerCurrent();
        });
    // Explore carousel

    //
    $('.review-row.owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        dots: true,
        navText: ['<span class="left"><i class="fa fa-arrow-left"></i></span>','<span class="right"><i class="fa fa-arrow-right"></i></span>'],
        items: 3,
        margin: 10,
    });
    //

    // Single Hostels Carousels
        $('.single-hostels-carousel').each(function(){
            dotsContainer = $(this).closest('.explorer').find('.slider-controls');
            $(this).owlCarousel({
                loop: false,
                nav: false,
                dots: true,
                dotsContainer: dotsContainer,
                autoWidth: true,
                items: 2,
            });
        });
        $('.foods-beverages.owl-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            items: 2,
            margin: 10,
        });

    // Hostel carousel
        $('.hostel-gallery').owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            items: 1,
        });
    // Hostel carousel


    // Room carousel
        $('.rooms-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: true,
            items: 2,
            margin: 20,
        });
    // Room carousel

    // Main menu location slider
        $('.location-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            autoWidth:true,
            items: 2,
        });
    // Main menu location slider


    // Explorer scrolling banner
        function ExplorerScrollingBanner () {
            if ( $('.scrolling-banner').length ) {
                $('.scrolling-banner h1').each(function(){
                    var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                    var bottom_of_window = $(window).scrollTop() + $(window).height();
                    if( bottom_of_window > bottom_of_object ){
                        $(this).addClass('inView');
                    }
                });
            }
        }

        ExplorerScrollingBanner();

        $(window).scroll(function(){
            ExplorerScrollingBanner();
        });
    // Explorer scrolling banner

    // Carousels
        $('.footer-instagram-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 3,
                },
                1200: {
                    items: 6,
                }
            }
        });
        $('.group-types-carousel').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 3,
                }
            }
        });
        $('.header-carousel').each(function(){
            carouselNav = $(this).closest('.homepage-header').find('.slider-toggles');
            carouselDots = $(this).closest('.homepage-header').find('.slider-page-info');
            $(this).owlCarousel({
                loop: true,
                nav: true,
                navText: ['<span class="header-slider-left"><i class="fa fa-arrow-left"></i></span>','<span class="header-slider-right"><i class="fa fa-arrow-right"></i></span>'],
                navContainer: carouselNav,
                dots: true,
                dotsContainer: carouselDots,
                items: 1,
            });
        });
        $('.explore-carousel').each(function(){
            carouselDots = $(this).closest('.container').children('.carousel-controls');
            $(this).owlCarousel({
                loop:false,
                nav:false,
                dots:true,
                dotsContainer: carouselDots,
                items:2,
            });
        });
        $('.booking-carousel').owlCarousel({
            margin: 10,
            loop: false,
            nav: false,
            dots: false,
            items: 3,
        });
    // End of Carousels

    // ESC functionality
        $(document).keyup(function(e) {
            if (e.keyCode == 27 ) { // escape key maps to keycode `27`
                if ( $('.main-menu').hasClass('active') ) {
                    $('.main-menu').removeClass('active');
                    $('.main-menu').removeClass('finished');
                }
                if ( $('.group-overlay').hasClass('active') ) {
                    $('.group-overlay').removeClass('active');
                    $('.group-overlay').removeClass('finished');
                }
                if ( $('.room-overlay').hasClass('inactive') == false ) {
                    $('.room-overlay').addClass('inactive');
                }
                if ( $('.locations-overlay-1').hasClass('active') ) {
                    $('.locations-overlay-1').removeClass('active');
                    $('.locations-overlay-1').removeClass('finished');
                    LocationsMenuHostelFade();
                    $('.locations-overlay-1').animate({
                        scrollTop: 0
                    }, 'slow');
                }
                if ( $('#gallery-wrapper').hasClass('active') ) {
                    $('#gallery-wrapper').removeClass('active');
                }
                if ( $('#toggle-group-lightbox').hasClass('active') ) {
                    $('#group-lightbox').removeClass('active');
                }
                if ( $('#group-lightbox .overlays').hasClass('active') ) {
                    $('#group-lightbox .overlays').removeClass('active');
                }
            }
        });
    // ESC functionality
});
