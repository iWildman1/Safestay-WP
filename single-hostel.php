<?php
/**
 * This template is made for displaying single Hostel CPT posts
 *
 *
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
                <li class="detail-link-active"><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/bed-icon.png" alt="">Rooms &amp Facilities</li>
                <li><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/location-icon.png" alt="">Location</li>
                <li><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/info-icon.png" alt="">Useful information</li>
                <li><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/money-icon.png" alt="">Offers</li>
                <li><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/review-icon.png" alt="">Reviews</li>
            </ul>
        </div>
    </div>
    <?php
    if ( have_rows('rooms_details') ) :
        while ( have_rows('rooms_details') ) : the_row();
            ?>
            <div class="details-lower details-rooms-facilities">
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
    ?>
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
get_footer();
?>
