<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Safestay
 */
get_header();
include('template-parts/page-header.php');
?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		?>
		<section class="explorer-blog">
		    <div class="container">
		        <div class="row">
		            <div class="grid-item two-thirds blog-post">
		                <div class="blog-header">
		                    <p class="date"><?php echo the_date('d/m/Y'); ?></p>
							<?php
							if ( have_rows('blog_header') ) :
								while ( have_rows('blog_header') ) : the_row();
									?>
				                    <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
				                    <p class="lead"><?php the_sub_field('lead'); ?></p>
				                    <p><?php the_sub_field('text'); ?></p>
									<?php
								endwhile;
							endif;
							?>
		                </div>
		                <div class="blog-section">
		                    <div class="blog-slider">
								<?php
								if ( have_rows('blog_contetnt') ) :
									while ( have_rows('blog_contetnt') ) : the_row();
										if ( have_rows('slider') ) :
											while ( have_rows('slider') ) : the_row();
												$image = get_sub_field('image');
												?>
		                        				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="slider-img">
												<?php
											endwhile;
										endif;
										?>
		                        		<span class="credit"><?php echo __('Credit');?>: @<?php the_sub_field('credit'); ?></span>
										<?php
									endwhile;
								endif;
								?>
		                        <div class="slider-controls">
		                            <img src="/img/left-arrow-slide.png" class="left-arrow-slide" alt="">
		                            <img src="/img/right-arrow-slide.png" class="right-arrow-slide" alt="">
		                        </div>
		                    </div>
		                    <div class="section-content">
		                        <?php the_content(); ?>
		                    </div>
		                </div>
		            </div>
		            <div class="grid-item third grid-booking-form">
		                <div class="booking-toggles">
		                    <div class="booking-toggle toggle-active">
		                        <img src="/img/person-icon.png" alt=""> Individual
		                    </div>
		                    <div class="booking-toggle">
		                        <img src="/img/group-icon-grey.png" alt="">Group Booking
		                    </div>
		                </div>
		                <section class="book-now book-explorer">
		                    <div class="container container-fluid">
		                        <div class="row">
	                                <form class="booking-form-large booking-form-explorer">
	                                    <div class="booking-form-group">
	                                        <select name="country" id="booking-country">
	                                            <option value="spain">Spain</option>
	                                        </select>
	                                        <img class="select-down" src="/img/select-down.png" alt="">
	                                    </div>
	                                    <div class="booking-form-group">
	                                        <label for="location">Where:</label>
	                                        <div class="select-wrapper">
	                                            <select name="location" id="location">
	                                                <option value="">Where would you like to go?</option>
	                                            </select>
	                                            <img class="select-down" src="/img/select-down.png" alt="">
	                                        </div>
	                                    </div>
	                                    <div class="booking-form-group times-group">
	                                        <label for="checkin">When:</label>
	                                        <div class="group-wrapper">
	                                            <div class="input-wrapper">
	                                                <input type="text" class="checkin" id="checkin" placeholder="Check in">
	                                                <input type="text" class="checkout" id="checkout" placeholder="Check out">
	                                            </div>
	                                            <img class="arrow" src="/img/right-arrow-icon.png" alt="">
	                                        </div>
	                                    </div>
	                                    <div class="booking-form-group">
	                                        <label for="people">How Many:</label>
	                                        <div class="select-wrapper">
	                                            <select name="people" id="people">
	                                                <option value="">Beds</option>
	                                            </select>
	                                            <img class="select-down" src="/img/select-down.png" alt="">
	                                        </div>
	                                    </div>
	                                    <div class="booking-form-group">
	                                        <button class="button" type="submit">Book Now</button>
	                                    </div>
	                                </div>
		                        </div>
		                    </div>
		                </section>
		            </div>
		        </div>
		    </div>
		</section>
		<?php
	endwhile;
endif;
?>
<?php
get_footer();
