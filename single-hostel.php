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
                            <?php
                            if ( have_rows('rooms') ) :
                                ?>
                                <div class="room-cards">
                                    <?php
                                    while ( have_rows('rooms') ) : the_row();
                                        $image = get_sub_field('image');
                                        ?>
                                        <div class="room">
                                            <img class="main-card-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                            <div class="cost">
                                                <span><?php echo __('From');?> £<?php the_sub_field('price');?></span>
                                            </div>
                                            <div class="buttons">
                                                <?php
                                                if ( have_rows('buttons') ) :
                                                    while ( have_rows('buttons') ) : the_row();
                                                        $left_button = get_sub_field('left_button');
                                                        $right_button = get_sub_field('right_button');
                                                        ?>
                                                        <a href="<?php echo $left_button['url']; ?>" class="button book"><?php echo $left_button['title']; ?></a>
                                                        <a href="<?php echo $right_button['url']; ?>" class="button more-info"><?php echo $right_button['title']; ?></a>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </div>
                                            <div class="info-container">
                                                <h4><?php the_sub_field('heading'); ?></h4>
                                                <div class="sleep-counter">
                                                    <?php
                                                    if ( have_rows('sleep_counter') ) :
                                                        while ( have_rows('sleep_counter') ) : the_row();
                                                            $icon = get_sub_field('icon');
                                                            ?>
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <span><?php the_sub_field('text'); ?></span>
                                                            <?php
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </div>
                                                <p><?php the_sub_field('description'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    ?>
                                </div>
                                <?php
                            endif;
                            ?>
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
            <div class="details-offers-header">
                <div class="details-offers-header-left">
                    <h1>Offers</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quisquam voluptatibus pariatur repellendus at quod ab earum vero nihil hic? Beatae temporibus animi distinctio aperiam veniam dignissimos architecto sapiente asperiores!</p>
                </div>
                <div class="details-offers-header-right">
                    <div class="button-row">
                        <a href="" class="button">Book Now</a>
                        <a href="" class="button button-secondary">See All Offers</a>
                    </div>
                </div>
            </div>
            <div class="details-offers-row sub-offers">
                <div class="offer">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 3.png" alt="">
                    <div class="offer-info-wrap">
                        <p class="date">Offer Ends: 00/00/00</p>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                    </div>
                    <a href="#" class="button button-offer-see">See Offer</a>
                </div>
                <div class="offer">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 4.png" alt="">
                    <div class="offer-info-wrap">
                        <p class="date">Offer Ends: 00/00/00</p>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                    </div>
                    <a href="#" class="button button-offer-see">See Offer</a>
                </div>
                <div class="offer">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 5.png" alt="">
                    <div class="offer-info-wrap">
                        <p class="date">Offer Ends: 00/00/00</p>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                    </div>
                    <a href="#" class="button button-offer-see">See Offer</a>
                </div>
                <div class="offer">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 6.png" alt="">
                    <div class="offer-info-wrap">
                        <p class="date">Offer Ends: 00/00/00</p>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                    </div>
                    <a href="#" class="button button-offer-see">See Offer</a>
                </div>
            </div>
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

<section class="expore explorer">
    <div class="container">
        <div class="row extend-right explore-row">
            <div class="explore-vertical-stack flex-width-75">
                <div class="explore-vertical-25">
                    <div class="explore-horizontal-50">
                        <h1 class="underline-yellow">The Explorer</h1>
                        <p class="title-lead">Immerse yourself in the amazing Capital by exploring its varied history and experiencing its lively nightlife!</p>
                    </div>
                    <div class="explore-horizontal-50">
                        <div class="hashtag-block">
                            #SafestayMadrid
                        </div>
                    </div>
                </div>
                <div class="explore-vertical-75">
                    <div class="featured-tour">
                        <span>Featured tour!</span>
                        <div class="tour-info">
                            <h5>Madrids best walking tour only £10.99 each</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="plus-icon">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/plus-icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="explore-vertical-stack flex-width-20">
                <div class="explore-vertical-50" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/restaurants.png')">
                    <span class="restaurants-col">Restaurants</span>
                </div>
                <div class="explore-vertical-50" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/arts.png')">
                    <span class="arts-col">Art</span>
                </div>
            </div>
            <div class="explore-vertical-stack flex-width-20">
                <div class="explore-vertical-50" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/restaurants.png')">
                    <span class="restaurants-col">Restaurants</span>
                </div>
                <div class="explore-vertical-50" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/arts.png')">
                    <span class="arts-col">Art</span>
                </div>
            </div>

        </div>
        <div class="slider-controls">
            <div class="control"></div>
            <div class="control control-active"></div>
            <div class="control"></div>
            <div class="control"></div>
        </div>
        <div class="drag-info">
            <div class="drag-img">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="">
            </div>
            <div class="drag-text">
                <p>
                    Drag to Explore
                </p>
            </div>
        </div>
    </div>
</section>

<section class="about bg-light-grey pad-less">
    <div class="container">
        <div class="row ">
            <div class="grid-item half">
                <div class="image-composition">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group_booking_main.png" alt="" class="comp-main">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group_booking_under.png" alt="" class="comp-under">
                </div>
            </div>
            <div class="grid-item half flex centralize">
                <div class="about-text-staggered">
                    <p class="upper-title">Bring on the groups!</p>
                    <h1 class="underline-yellow">Group bookings</h1>
                    <p class="text-main">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut aliquip ex ea commodo consequat. aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="button">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="membership">
    <div class="container container-fluid">
        <div class="row">
            <div class="grid-item half push-in-left flex centralize">
                <div class="membership-text">
                    <h1 class="underline-yellow">Safestay Membership</h1>
                    <p>We really care about our guests. That's why we put Safe in our name! Safety, comfort, free wifi,
                        social spaces and excellent:
                    </p>
                    <div class="item">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/bus-icon.png" alt="">
                        <p>Free bottle of water</p>
                    </div>
                    <div class="item">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/cal-icon.png" alt="">
                        <p>Free late checkout</p>
                    </div>
                    <div class="item">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/bin-icon.png" alt="">
                        <p class="item">Exclusive deals</p>
                    </div>
                    <a href="#" class="button button-dark">Become A Member</a>
                </div>
            </div>
            <div class="grid-item half no-margin-right no-padding">
                <div class="image-composition-2">
                    <img class="comp-main" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/600x806_Membership_Image1.png" alt="">
                    <img class="comp-overhang" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/450x568_Memebrship_Image2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('template-parts/flexible-content.php');
?>
<section class="inspiration">
    <div class="container">
        <h1 class="underline-yellow">#Inspiration</h1>
        <div class="row inspiration-row">
            <div class="inspiration-block inspiration-block-25">
                <div class="inspiration-block-50">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/inspiration-1.png" alt="">
                </div>
                <div class="inspiration-block-50">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/inspiration-2.png" alt="">
                </div>
            </div>
            <div class="inspiration-block inspiration-block-25">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/inspiration-3.png" alt="">
            </div>
            <div class="inspiration-block inspiration-block-50">
                <div class="inspiration-block-50">
                    <div class="inspiration-block-50">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/inspiration-4.png" alt="">
                    </div>
                    <div class="inspiration-block-50">
                       <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/inspiration-5.png" alt="">
                    </div>
                </div>
                <div class="inspiration-block-50">
                    <div class="inspiration-item">
                        <span class="inspr-tag">#Inspiration</span>
                        <h5>10 most Instagramable spots in the world</h5>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/go-icon.png" alt="" class="go-icon">
                    </div>
                </div>
            </div>
        </div>

        <div class="load-more-row">
            <a href="#" class="button">View More</a>
        </div>
    </div>
</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
?>
