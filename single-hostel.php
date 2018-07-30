<?php
/**
 * This template is made for displaying single Hostel CPT posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
 */
get_header();
get_template_part('template-parts/page-header');
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <section class="booking-form">
            <div class="container">
                <div class="booking-inner">
                    <div class="booking-toggles">
                        <div class="booking-toggle toggle-active">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/person-icon.png" alt=""> Individual
                        </div>
                        <div class="booking-toggle">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group-icon-grey.png" alt="">Group Booking
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
                            <img class="form-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/world_icon.png" alt="">
                            <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                        </div>
                        <div class="form-group checkin-group">
                            <input type="text" name="check-in" id="check-in" placeholder="Check In">
                            <img class="check-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/check-icon.png" alt="">
                        </div>
                        <div class="form-group checkout-group">
                            <input type="text" name="check-out" id="check-out" placeholder="Check Out">
                            <img class="check-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/check-icon.png" alt="">
                        </div>
                        <div class="form-group book-group">
                            <button type="submit">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="city-details">
            <div class="details-header">
                <div class="container">
                    <ul class="details-links">
                        <li data-location-target="facilities" class="detail-link-active"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/bed-icon.png" alt="" >Rooms &amp Facilities</li>
                        <li data-location-target="info"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/location-icon.png" alt="" >Location</li>
                        <li data-location-target="food"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/info-icon.png" alt="" >Food &amp; Drink</li>
                        <li data-location-target="offers"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/money-icon.png" alt="" >Offers</li>
                        <li data-location-target="reviews"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/review-icon.png" alt="" >Reviews</li>
                    </ul>
                </div>
            </div>
            <?php
            if ( have_rows('rooms_details') ) :
                while ( have_rows('rooms_details') ) : the_row();
                    $post_objects = get_sub_field('rooms');
                    ?>
                    <div class="details-lower details-rooms-facilities" data-location-section="facilities">
                        <div class="container">
                            <div class="row">
                                <div class="grid-item grid-30 facility-list">
                                    <h1><?php the_sub_field('heading');?></h1>
                                    <?php
                                    if ( have_rows('list') ) :
                                        ?>
                                        <ul class="facilities">
                                            <?php
                                            while ( have_rows('list') ) : the_row();
                                                $icon = get_sub_field('icon');
                                                ?>
                                                <li><div class="img-box"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></div> <?php the_sub_field('text'); ?></li>
                                                <?php
                                            endwhile;
                                            ?>
                                        </ul>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="button-row">
                                        <a href="#" class="button button-prev"><?php echo __('Prev');?></a>
                                        <a href="#" class="button button-next"><?php echo __('Next');?></a>
                                    </div>
                                </div>
                                <div class="grid-item grid-70">
                                    <p><?php the_sub_field('description'); ?></p>

                                    <div class="room-cards">
                                        <?php
                                        if( $post_objects ):
                                            foreach( $post_objects as $post) : setup_postdata($post);
                                                ?>
                                                <div class="room">
                                                    <img class="main-card-img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                                    <div class="cost">
                                                        <span><?php echo __('From');?> £<?php the_field('price_from');?></span>
                                                    </div>
                                                    <div class="buttons">
                                                        <a href="#" class="button book"><?php echo __('Book now'); ?></a>
                                                        <a href="<?php the_permalink(); ?>" class="button more-info"><?php echo __('More info'); ?></a>
                                                    </div>
                                                    <div class="info-container">
                                                        <h4><?php the_title(); ?></h4>
                                                        <div class="sleep-counter">
                                                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/07/person-icon-2.png" alt="Person">
                                                            <span><?php the_field('sleeps'); ?></span>
                                                        </div>
                                                        <?php
                                                        $content = get_the_content();
                                                        $content = wp_trim_words($content, 10);
                                                        ?>
                                                        <p><?php echo $content; ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                        endif;
                                        wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            if ( have_rows('location') ) :
                while ( have_rows('location') ) : the_row();
                    ?>
                    <div class="details-lower details-rooms-facilities details-location-info details-inactive" data-location-section="info">
                        <div class="container">
                            <div class="row">
                                <div class="grid-item grid-30 facility-list">
                                    <h1><?php the_sub_field('heading'); ?></h1>
                                    <p><?php the_sub_field('description'); ?></p>
                                    <?php
                                    if ( have_rows('list') ) : ?>
                                        <ul class="facilities">
                                            <?php
                                            while ( have_rows('list') ) : the_row();
                                                $icon = get_sub_field('icon');
                                                ?>
                                                <li>
                                                    <div class="img-box">
                                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                    </div>
                                                    <span><?php the_sub_field('text'); ?></span>
                                                </li>
                                                <?php
                                            endwhile; ?>
                                        </ul>
                                        <?php
                                    endif;
                                    if ( have_rows('buttons') ) : ?>
                                        <div class="button-row ">
                                            <?php
                                            while ( have_rows('buttons') ) : the_row();
                                                $left_button = get_sub_field('left_button');
                                                $right_button = get_sub_field('right_button');
                                                ?>
                                                <a href="<?php echo $left_button['url']; ?>" class="button book"><?php echo $left_button['title']; ?></a>
                                                <a href="<?php echo $right_button['url']; ?>" class="button more-info"><?php echo $right_button['title']; ?></a>
                                                <?php
                                            endwhile; ?>
                                        </div>
                                        <?php
                                    endif; ?>
                                </div>
                                <div class="grid-item grid-70">
                                    <?php
                                    $location = get_sub_field('google_map');
                                    ?>
                                    <div class="acf-map map-frame">
                                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                    </div>
                                    <!--
                                    <iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48602.02027411191!2d-3.7228451888976473!3d40.41712944017529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid%2C+Spain!5e0!3m2!1sen!2suk!4v1532364112608" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            if ( have_rows('useful_information') ) :
                while ( have_rows('useful_information') ) : the_row(); ?>
                    <section class="details-lower details-lower-about about details-inactive" data-location-section="food">
                        <div class="container">
                            <div class="row">
                                <div class="grid-item half">
                                    <?php
                                    if ( have_rows('images') ) : ?>
                                        <div class="image-composition">
                                            <?php
                                            while ( have_rows('images') ) : the_row();
                                                $back_image = get_sub_field('back_image');
                                                $front_image = get_sub_field('front_image');
                                                ?>
                                                <img src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>" class="comp-main">
                                                <img src="<?php echo $front_image['url']; ?>" alt=<?php echo $front_image['alt']; ?>"" class="comp-under">
                                                <?php
                                            endwhile; ?>
                                        </div>
                                        <?php
                                    endif; ?>
                                </div>
                                <div class="grid-item half flex centralize">
                                    <div class="about-text-staggered">
                                        <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                                        <p class="text-main"><?php the_sub_field('text'); ?></p>
                                        <?php
                                        if ( have_rows('buttons') ) : ?>
                                            <div class="button-row">
                                                <?php
                                                while ( have_rows('buttons') ) : the_row();
                                                    $left_button = get_sub_field('left_button');
                                                    $right_button = get_sub_field('right_button');
                                                    ?>
                                                    <a href="<?php echo $left_button['url']; ?>" class="button"><?php echo $left_button['title']; ?></a>
                                                    <a href="<?php echo $right_button['url']; ?>" class="button button-secondary"><?php echo $right_button['title']; ?></a>
                                                    <?php
                                                endwhile;
                                                ?>
                                            </div>
                                            <?php
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                endwhile;
            endif;
            ?>
            <div class="details-lower details-lower-offers details-inactive" data-location-section="offers">
                <div class="container">
                    <?php
                    if ( have_rows('offers_tab') ) :
                        while ( have_rows('offers_tab') ) : the_row();
                            ?>
                            <div class="details-offers-header">
                                <div class="details-offers-header-left">
                                    <h1><?php the_sub_field('heading'); ?></h1>
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                                <div class="details-offers-header-right">
                                    <?php
                                    if ( have_rows('buttons') ) :
                                        while ( have_rows('buttons') ) : the_row();
                                            $left = get_sub_field('left');
                                            $right = get_sub_field('right');
                                            ?>
                                            <div class="button-row">
                                                <a href="<?php echo $left['url']; ?>" class="button"><?php echo $left['title']; ?></a>
                                                <a href="<?php echo $right['url']; ?>" class="button button-secondary"><?php echo $right['title']; ?></a>
                                            </div>
                                            <?php
                                        endwhile;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="details-offers-row sub-offers">
                                <?php
                                $post_objects = get_sub_field('offers');
                                if( $post_objects ):
                                    foreach( $post_objects as $post) : setup_postdata($post);
                                        $background_image = get_field('background_image');
                                        ?>
                                        <div class="offer">
                                            <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                            <div class="offer-info-wrap">
                                                <p class="date">Offer Ends: <?php the_sub_field('offer_end_date'); ?></p>
                                                <h3><?php the_sub_field('heading'); ?></h3>
                                                <p class="description"><?php the_sub_field('description'); ?></p>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="button button-offer-see">See Offer</a>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                wp_reset_query();
                                ?>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>

            <div class="details-lower details-lower-reviews details-inactive" data-location-section="reviews">
                <div class="container">
                    <div class="review-upper">
                        <div class="review-title">
                            <h1>81 Reviews</h1>
                            <div class="button-row">
                                <a href="" class="button">Book Now</a>
                                <a href="" class="button button-secondary">Leave a review</a>
                            </div>
                        </div>
                        <div class="review-stars">
                            <div class="review-stars-half">
                                <ul>
                                    <li>
                                        <span>Location</span>
                                        <div class="stars">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                        </div>
                                    </li>
                                    <li>
                                        <span>Facilities</span>
                                        <div class="stars">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                        </div>
                                    </li>
                                    <li>
                                        <span>Cleanliness</span>
                                        <div class="stars">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="review-stars-half">
                                 <ul>
                                    <li>
                                        <span>Staff</span>
                                        <div class="stars">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                        </div>
                                    </li>
                                    <li>
                                        <span>Check-In</span>
                                        <div class="stars">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                        </div>
                                    </li>
                                    <li>
                                        <span>Value</span>
                                        <div class="stars">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star-pink.png" alt="" srcset="">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="review-lower">
                        <div class="review-row">
                            <div class="review">
                                <h2>Anna</h2>
                                <span class="date">April 2018</span>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio eius velit quis eaque qui tenetur iure quas reiciendis laudantium perferendis labore atque accusamus aut itaque, corporis ratione ipsum quaerat doloribus?</p>
                            </div>
                            <div class="review">
                                <h2>Anna</h2>
                                <span class="date">April 2018</span>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio eius velit quis eaque qui tenetur iure quas reiciendis laudantium perferendis labore atque accusamus aut itaque, corporis ratione ipsum quaerat doloribus?</p>
                            </div>
                            <div class="review">
                                <h2>Anna</h2>
                                <span class="date">April 2018</span>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio eius velit quis eaque qui tenetur iure quas reiciendis laudantium perferendis labore atque accusamus aut itaque, corporis ratione ipsum quaerat doloribus?</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-navigator-row">
                        <div class="navigator-inner">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/left-arrow-slide.png" alt="" class="navigator-left">
                            <ul>
                                <li class="navigator-active">1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                                <li>6</li>
                            </ul>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/right-arrow-slide.png" alt="" class="navigator-left">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include('template-parts/flexible-content.php');
    endwhile;
endif;
get_footer();
?>
