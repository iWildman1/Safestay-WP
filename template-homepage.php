<?php
/**
 * Template Name: Homepage Template
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
                <div class="booking-toggle relocate-group-booking">
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

<section class="scrolling-banner">
    <?php
    $args = array(
        'taxonomy' => 'locations',
        'hide_empty' => false,
    );
    $terms = get_terms($args); // Get all terms of a taxonomy
    if ( $terms && !is_wp_error( $terms ) ) :
        foreach ( $terms as $term ) :
            ?>
            <h1 class="banner-item"><?php echo $term->name; ?>.</h1>
            <?php
        endforeach;
    endif;
    wp_reset_query();
    ?>
</section>

<section class="expore">
    <div class="container">
        <div class="row">
            <div class="grid-item grid-30 bg-spain flex centralize">
                <div class="col-inner">
                    <h1>Spain.</h1>
                    <p>Beautiful destinations located within the heart of Barcelona and Madrid</p>
                </div>
            </div>
            <div class="grid-item third bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/411x364_Passeig.png')">
                 <h3>Passeig de Gràcia</h3>
            </div>
            <div class="grid-item grid-375 vertical-split no-padding">
                <div class="vertical-half offers">
                    <a href="#"> <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/pounds.png" alt=""> See offers </a>
                </div>
                <div class="vertical-half offers">
                    <a href="#"><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/things-icon.png" alt=""> #Thingstodo</a>
                </div>
            </div>
        </div>
        <div class="slider-wrapper">
            <div class="row explore-slider" style="height: 34rem">
                <div class="grid-item half bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/600x329_Barcelona_Sea.png')">
                    <h3>Barcelona Sea</h3>
                </div>
                <div class="grid-item grid-225 bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/269x329_Madrid.png')">
                    <h3>Madrid</h3>
                </div>
                <div class="grid-item grid-275 bg-spain-image flex centralize no-margin-right" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/349x329_Barcelona_Gothic.png')">
                    <h3>Barcelona Gothic</h3>
                </div>
                <div class="grid-item half bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/600x329_Barcelona_Sea.png')">
                    <h3>Barcelona Sea</h3>
                </div>
                <div class="grid-item grid-225 bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/269x329_Madrid.png')">
                    <h3>Madrid</h3>
                </div>
                <div class="grid-item grid-275 bg-spain-image flex centralize no-margin-right" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/349x329_Barcelona_Gothic.png')">
                    <h3>Barcelona Gothic</h3>
                </div>
            </div>
        </div>

        <div class="slider-controls">

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

<section class="about">
    <div class="container">
        <div class="row">
            <div class="grid-item half">
                <div class="image-composition">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group_booking_main.png" alt="" class="comp-main">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group_booking_under.png" alt="" class="comp-under">
                </div>
            </div>
            <div class="grid-item half flex centralize">
                <div class="about-text-staggered">
                    <p class="upper-title">Bring on the groups!</p>
                    <h1 class="underline-dark">Group bookings</h1>
                    <p class="text-main">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="<?php bloginfo('stylesheet_directory') ?>/dist/group-bookings.html" class="button">Book Now</a>
                </div>
            </div>
        </div>

        <div class="row ethos">
            <div class="grid-item half no-margin-right no-padding text-block">
                <div class="ethos-inner">
                    <div class="ethos-text">
                        <p class="upper-title">Who are we?</p>
                        <h1 class="underline-dark">Our ethos</h1>
                        <p class="text-main">At Safestay, the stylish hostel accommodation, we're here as your home away from home. You can literally walk out the door
                        and explore the vibrant city centres around you. Check out our locations below and get planning! When you enter you'll find
                        a friendly local team who can guide you throughout your stay, always delivering our unique and award-winning standard of
                        quality, cleanliness and customer service</p>
                        <a href="#book-now" class="button">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="grid-item half no-margin-left no-padding img-block">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/ethos.png" alt="">
            </div>
        </div>
    </div>
</section>

<section class="book-now" id="book-now">
    <div class="container container-fluid">
        <div class="row">
            <div class="grid-item half bg-burgundy no-margin-left booking-grid">
                <h1 class="underline-pink">Book now</h1>
                <form class="booking-form-large">
                    <div class="booking-form-group">
                        <select name="country" id="booking-country">
                            <option value="spain">Spain</option>
                        </select>
                        <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                    </div>

                    <div class="booking-form-group">
                        <label for="location">Where:</label>
                        <div class="select-wrapper">
                            <select name="location" id="location">
                                <option value="">Where would you like to go?</option>
                            </select>
                            <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                        </div>
                    </div>
                    <div class="booking-form-group times-group">
                        <label for="checkin">When:</label>
                        <div class="group-wrapper">
                            <div class="input-wrapper">
                                <input type="text" class="checkin" id="checkin" placeholder="Check in">
                                <input type="text" class="checkout" id="checkout" placeholder="Check out">
                            </div>
                            <img class="arrow" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-icon.png" alt="">
                        </div>
                    </div>
                    <div class="booking-form-group">
                        <label for="people">How Many:</label>
                        <div class="select-wrapper">
                            <select name="people" id="people">
                                <option value="">Beds</option>
                            </select>
                            <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                        </div>
                    </div>
                    <div class="booking-form-group">
                        <button class="button" type="submit">Book Now</button>
                    </div>
                    <div class="booking-slider">
                        <div class="slide">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/360x360_Spain1.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/360x360_Spain2.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/360x360_Spain1.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/360x360_Spain2.png" alt="">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="booking-slider-controls">
                    <span>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_left.png" alt="">
                    </span>
                    <span>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_right.png" alt="">
                    </span>
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
                    <h1 class="underline-dark">Safestay Membership</h1>
                    <p>We really care about our guests. That's why we put Safe in our name!
                        Safety, comfort, free wifi, social spaces and excellent:
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
<?php get_footer(); ?>
