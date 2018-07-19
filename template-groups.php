<?php
/**
 *
 * Template Name: Group Bookings Template
 *
 */
get_header();
get_template_part('template-parts/page-header');
?>
<div class="container">
    <section class="contact-us-banner">
        <div class="contact-banner-inner">
            <?php
            if ( have_rows('contact_us') ) :
                while ( have_rows('contact_us') ) : the_row();
                    ?>
                    <div class="contact-banner-header">
                        <div class="contact-title-wrapper">
                            <h5><?php the_sub_field('upper_heading');?></h5>
                            <p class="contact-banner-title"><?php the_sub_field('heading'); ?></p>
                        </div>
                    </div>
                    <div class="contact-banner-sections">
                        <?php
                        if ( have_rows('fields') ) :
                            while ( have_rows('fields') ) : the_row();
                                $icon = get_sub_field('icon');
                                $type = get_sub_field('description');
                                ?>
                                <div class="contact-item">
                                    <div class="icon">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    </div>
                                    <h4><?php the_sub_field('heading'); ?></h4>
                                    <?php
                                    if ($type == 'text') {
                                        $description = get_sub_field('text'); ?>
                                        <p><?php echo $description; ?></p>
                                        <?php
                                    } elseif($type == 'e-mail'){
                                        $description = get_sub_field('e_mail'); ?>
                                        <p><a href="mailto:<?php echo $description; ?>"><?php echo $description; ?></a></p>
                                        <?php
                                    } elseif($type == 'telephone'){
                                        $description = get_sub_field('telephone'); ?>
                                        <p><a href="tel:<?php echo $description; ?>">T: <?php echo $description; ?></a></p>
                                        <?php
                                    } ?>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
</div>
<?php
include('template-parts/flexible-content.php');
?>
<section class="scrolling-banner sb-white padded-large">
    <h1 class="banner-item">Licensed bar.</h1>
    <h1 class="banner-item">Laundry room.</h1>
    <h1 class="banner-item">Full cctv coverage.</h1>
    <h1 class="banner-item">Key-card security system.</h1>
</section>

<section class="cater-group">
    <div class="container">
        <div class="row">
            <div class="grid-item half no-padding">
                <h1 class="underline-yellow">We cater for <br> any groups!</h1>
            </div>
        </div>
        <div class="row cater-grid">
            <div class="left-grid">
                <div class="grid-para">
                    <p>
                         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="left-grid-main">
                    <div class="grid-half">
                        <div class="item full-height">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Lisbon-City-5.png" alt="">
                            <h4>Stag &amp hens</h4>
                        </div>
                    </div>
                    <div class="grid-half">
                        <div class="item half-height">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/U Hostels_0145 Copy 5.png" alt="">
                        </div>
                        <div class="item half-height">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/buiness-trip.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="right-grid">
                <div class="grid-half">
                    <div class="item half-width">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/sports-teams.png" alt="">
                    </div>
                    <div class="item half-width">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/family-accommodation.png" alt="">
                    </div>
                </div>
                <div class="grid-half">
                    <div class="item full-width">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/school-trips.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="book-reasons">
    <div class="container">
        <div class="row standard-two-row">
            <div class="grid-item half no-margin-right no-padding">
                <h1 class="underline-yellow">Reasons to
                    <br> book with us</h1>
                <p>
                     We specialise in accommodating groups of 10 or more with a dedicated team of group managers here to take all the stress
                    out of organising your accommodation.

                    <br><br>Whether you’re planning a special birthday weekend with friends or need multiple rooms
                    for a school trip, get in touch with us to find out how we can help.

                    <br><br>With a variety of sizes of dormitory’s available or
                    the option of private rooms with en-suites, we will do whatever we can to make sure your group get the best comfort and value
                    from your stay with us at any one of our locations.
                </p>
            </div>
            <div class="grid-item half">
                <div class="reasons-icon-grid">
                    <div class="icon-row">
                        <div class="icon-item">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea 2.png" alt="">
                                </div>
                                <p>Fast, free WiFi</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy.png" alt="">
                                </div>

                                <p>City Locations</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 2.png" alt="">
                                </div>

                                <p>Social Spaces</p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-row">
                        <div class="icon-item">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 3.png" alt="">
                                </div>

                                <p>Award Winning</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 4.png" alt="">
                                </div>

                                <p>Premium Service</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 5.png" alt="">
                                </div>

                                <p>Multilingual Team</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured-hostels">
    <div class="container">
        <h1 class="underline-yellow">Featured hostels</h1>

        <div class="hostel-grid">
            <div class="hostel">
                <div class="img-container">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/023X5034.png" alt="">
                </div>
                <div class="info-container">
                    <div class="info-wrap">
                        <p class="location">United Kingdom</p>
                        <div class="name-row">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea 3.png" alt="">
                            <p>London<br> Holland Park</p>
                        </div>
                        <div class="reviews-row">
                            <p>Reviews</p>
                            <div class="stars">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <p class="class">Excellent</p>
                            </div>
                        </div>
                        <a href="" class="button book-now-featured">Book Now</a>
                    </div>
                    <div class="features-row">
                        <ul>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 5.png" alt="">
                                <p>113 Beds</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 6.png" alt="">
                                <p>Fast WiFi</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 7.png" alt="">
                                <p>Social Areas</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hostel">
                <div class="img-container">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/023X5034 Copy 12.png" alt="">
                </div>
                <div class="info-container">
                    <div class="info-wrap">
                        <p class="location">United Kingdom</p>
                        <div class="name-row">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 3.png" alt="">
                            <p>Edinburgh<br>
                            &nbsp</p>
                        </div>
                        <div class="reviews-row">
                            <p>Reviews</p>
                            <div class="stars">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <p class="class">Excellent</p>
                            </div>
                        </div>
                        <a href="" class="button book-now-featured">Book Now</a>
                    </div>
                    <div class="features-row">
                        <ul>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 5.png" alt="">
                                <p>113 Beds</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 6.png" alt="">
                                <p>Fast WiFi</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 7.png" alt="">
                                <p>Social Areas</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hostel">
                <div class="img-container">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/023X5034 Copy 4.png" alt="">
                </div>
                <div class="info-container">
                    <div class="info-wrap">
                        <p class="location">United Kingdom</p>
                        <div class="name-row">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 4.png" alt="">
                            <p>London
                                <br> Elephant
                            </p>
                        </div>
                        <div class="reviews-row">
                            <p>Reviews</p>
                            <div class="stars">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <p class="class">Excellent</p>
                            </div>
                        </div>
                        <a href="" class="button book-now-featured">Book Now</a>
                    </div>
                    <div class="features-row">
                        <ul>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 5.png" alt="">
                                <p>113 Beds</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 6.png" alt="">
                                <p>Fast WiFi</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 7.png" alt="">
                                <p>Social Areas</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hostel">
                <div class="img-container">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/023X5034 Copy 12.png" alt="">
                </div>
                <div class="info-container">
                    <div class="info-wrap">
                        <p class="location">United Kingdom</p>
                        <div class="name-row">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 13.png" alt="">
                            <p>York
                                <br> &nbsp;
                            </p>
                        </div>
                        <div class="reviews-row">
                            <p>Reviews</p>
                            <div class="stars">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                <p class="class">Excellent</p>
                            </div>
                        </div>
                        <a href="" class="button book-now-featured">Book Now</a>
                    </div>
                    <div class="features-row">
                        <ul>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 5.png" alt="">
                                <p>113 Beds</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 6.png" alt="">
                                <p>Fast WiFi</p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 7.png" alt="">
                                <p>Social Areas</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-row">
            <a href="#" class="button">View All</a>
        </div>
    </div>
</section>
<?php
get_footer();
?>
