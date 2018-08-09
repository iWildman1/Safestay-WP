$(document).ready(function(){
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
    $('.header-carousel').each(function(){
        carouselNav = $(this).closest('.homepage-header').children('.slider-toggles');
        carouselDots = $(this).closest('.homepage-header').children('.slider-page-info');
        $(this).owlCarousel({
            loop: true,
            nav: true,
            navText: ['<span class="header-slider-left"><img src="http://safestay.kishandchips.com/wp-content/themes/safestay/dist/img/arrow_left.png" alt=""></span>','<span class="header-slider-right"><img src="http://safestay.kishandchips.com/wp-content/themes/safestay/dist/img/arrow_right.png" alt=""></span>'],
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
});
(function($) {
    function new_map( $el ) {
    	// var
    	var $markers = $el.find('.marker');
    	// vars
    	var args = {
    		zoom		: 16,
    		center		: new google.maps.LatLng(0, 0),
    		mapTypeId	: google.maps.MapTypeId.ROADMAP
    	};
    	// create map
    	var map = new google.maps.Map( $el[0], args);
    	// add a markers reference
    	map.markers = [];
    	// add markers
    	$markers.each(function(){
        	add_marker( $(this), map );
    	});
    	// center map
    	center_map( map );
    	// return
    	return map;
    }
    function add_marker( $marker, map ) {
    	// var
    	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    	// create marker
    	var marker = new google.maps.Marker({
    		position	: latlng,
    		map			: map
    	});
    	// add to array
    	map.markers.push( marker );
    	// if marker contains HTML, add it to an infoWindow
    	if( $marker.html() )
    	{
    		// create info window
    		var infowindow = new google.maps.InfoWindow({
    			content		: $marker.html()
    		});
    		// show info window when marker is clicked
    		google.maps.event.addListener(marker, 'click', function() {
    			infowindow.open( map, marker );
    		});
    	}
    }
    function center_map( map ) {
    	// vars
    	var bounds = new google.maps.LatLngBounds();
    	// loop through all markers and create bounds
    	$.each( map.markers, function( i, marker ){
    		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
    		bounds.extend( latlng );
    	});
    	// only 1 marker?
    	if( map.markers.length == 1 ) {
    		// set center of map
    	    map.setCenter( bounds.getCenter() );
    	    map.setZoom( 16 );
    	} else {
    		// fit to bounds
    		map.fitBounds( bounds );
    	}
    }
    var map = null;
    $(document).ready(function(){
    	$('.acf-map').each(function(){
    		// create map
    		map = new_map( $(this) );
    	});
    });
})(jQuery);
