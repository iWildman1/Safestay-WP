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
**/
get_header();
?>
<section class="booking-form">
	<div class="container">
		<?php
		get_template_part('template-parts/booking-form');
		?>
	</div>
</section>

<section class="explorer-filters">
	<div class="container">
		<div class="filters-inner">
			<div class="filter">
				<select class="city" name="city" id="city-select">
					<option value="all">All</option>
					<?php
					$locations = get_terms(
						'locations',
						array(
							'parent' => 0,
							'orderby' => 'slug',
							'hide_empty' => false
						)
					);
					foreach ( $locations as $location ) :
						$cities = get_terms(
							'locations',
							array(
								'parent' => $location->term_id,
								'orderby' => 'slug',
								'hide_empty' => false
							)
						);
						foreach ( $cities as $city ) : ?>
							<option value="<?php echo $city->slug; ?>"><?php echo $city->name; ?></option>
							<?php
						endforeach;
					endforeach; ?>
				</select>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/select-down.png" alt="">
			</div>
			<div class="filter">
				<select class="post-time" name="post-time" id="post-time">
					<option value="all">All</option>
					<option value="most-recent">Most Recent</option>
				</select>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/select-down.png" alt="">
			</div>
			<div class="filter">
				<select class="all" name="hastag" id="hastag-select">
					<option value="all">All</option>
					<?php
					$hastags = get_terms(
						'hashtags',
						array(
							'parent' => 0,
							'orderby' => 'slug',
							'hide_empty' => false
						)
					);
					foreach ($hastags as $hastag) : ?>
						<option value="<?php echo $hastag->slug; ?>"><?php echo $hastag->name; ?></option>
						<?php
					endforeach; ?>
				</select>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/img/select-down.png" alt="">
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
		<div class="explorer-grid-row">
			<?php
			if ( have_posts() ) :
			    while( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/single-content', get_post_format() );
			    endwhile;
			endif;
			if (  $wp_query->max_num_pages > 1 ) : ?>
				<div class="load-more-row">
					<a href="#" id="load-more" class="button load-more">Load more</a>
				</div>
				<?php
			endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>
