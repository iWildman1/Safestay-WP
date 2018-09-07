// Load more
function filterPosts () {
	selectedCity = $('.explorer-filters select#city-select').val();
	selectedHastag = $('.explorer-filters select#hastag-select').val();
	$('.explorer-grid-row .post').each(function(){
		city = $(this).attr('data-city');
		hastag = $(this).attr('data-hashtag');
		if ( (selectedCity == "all" || selectedCity == city) && (selectedHastag == "all" || selectedHastag == hastag ) ) {
			$(this).show();
			$(this).addClass('active');
		} else {
			$(this).hide();
			$(this).removeClass('active');
			$(this).addClass('explorer-grid-item');
			$(this).removeClass('explorer-featured');
		}
	});
	$('.explorer-grid-row .post.active').first().removeClass('explorer-grid-item');
	$('.explorer-grid-row .post.active').first().addClass('explorer-featured');
}
jQuery(function($){
	$('#load-more').click(function(e){
        e.preventDefault();
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': loadmore_params.posts,
			'page' : loadmore_params.current_page
		};
		$.ajax({
			url : loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function ( data ) {
				if ( data ) {
                    button.text('Load more');
					$(button).parent().before(data);
                    //$('.explorer-grid-row').append(data);
					loadmore_params.current_page++;
					filterPosts();
					if ( loadmore_params.current_page == loadmore_params.max_page )
						button.remove();
				} else {
					button.remove();
				}
			}
		});
	});
});
