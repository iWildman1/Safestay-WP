<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
 */
get_header();
include('template-parts/page-header.php');
?>
	<section class="booking-form">
		<div class="container">

			<div class="booking-inner">

				<div class="booking-toggles">
					<div class="booking-toggle toggle-active">
						<img src="../dist/img/person-icon.png" alt=""> Individual
					</div>
					<div class="booking-toggle">
						<img src="../dist/img/group-icon-grey.png" alt="">Group Booking
					</div>
				</div>

				<div class="booking-headings">
					<p class="label">Book Now</p>
					<h4>Stay with SafeStay</h4>
				</div>
				<form action="/" class="booking-inputs">
					<div class="form-group location-group">
						<select name="location" id="location">
							<option value="">Where would you like to go?</option>
						</select>
						<img class="form-icon" src="../dist/img/world_icon.png" alt="">
						<img class="select-down" src="../dist/img/select-down.png" alt="">
					</div>
					<div class="form-group checkin-group">
						<input type="text" name="check-in" id="check-in" placeholder="Check In">
						<img class="check-icon" src="../dist/img/check-icon.png" alt="">
					</div>
					<div class="form-group checkout-group">
						<input type="text" name="check-out" id="check-out" placeholder="Check Out">
						<img class="check-icon" src="../dist/img/check-icon.png" alt="">
					</div>
					<div class="form-group book-group">
						<button type="submit">Book Now</button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<section class="explorer-filters">
		<div class="container">
			<div class="filters-inner">
				<div class="filter">
					<select class="country" name="" id="">
						<option value="">Madrid</option>
					</select>
					<img src="../dist/img/select-down.png" alt="">
				</div>
				<div class="filter">
					<select class="most-recent" name="" id="">
						<option value="">Most Recent</option>
					</select>
					<img src="../dist/img/select-down.png" alt="">
				</div>
				<div class="filter">
					<select name="" id="" class="all">
						<option value="">All</option>
					</select>
					<img src="../dist/img/select-down.png" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="explorer-grid-main">
		<div class="container">
			<div class="explorer-header">
				<h2>Now showing:</h2>
				<h1>All explorer posts</h1>
			</div>
			<div class="explorer-featured">
				<img src="../dist/img/explorer-featured.png" alt="">
				<div class="location loc-uk">
					London
				</div>
				<div class="title">
					<span class="tag-inspiration">#inspiration</span>
					<p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
				</div>
			</div>
			<div class="explorer-grid-row">
				<?php
				if ( have_posts() ) :
					while( have_posts() ) : the_post();
						$img_id = get_post_thumbnail_id();
  						$alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true  );
						$cities = get_the_category();
						$hashtags = wp_get_post_terms( $post->ID, 'hashtags');
						$content = get_the_content();
						$excerpt = wp_trim_words($content,10);
						?>
						<div class="explorer-grid-item">
							<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php echo $alt; ?>">
							<div class="item-inner">
								<div class="location loc-spain"><?php echo $cities[0]->name; ?></div>
								<div class="title">
									<span class="tag-inspiration">#<?php foreach( $hashtags as $hastag ) { echo $hastag->name; }?></span>
									<p><?php the_title(); ?></p>
									<p><?php echo $excerpt; ?></p>
								</div>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				?>
			</div>
			<div class="load-more-row">
				<a href="javascript:void(0)" class="button load-more">Load more</a>
			</div>
		</div>
	</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
