<?php
/**
 * Template Name: Offers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
<<<<<<< HEAD
**/
=======
 */
 /*
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
get_header();
?>
<section class="booking-form">
    <div class="container">
        <?php
        get_template_part('template-parts/booking-form'); ?>
    </div>
</section>

<section class="offers-toggles">
    <div class="container">
        <select class="city-select" name="city-select">
            <option value="0">All offers</option>
            <?php
            $args = array(
                'taxonomy' => 'locations',
                'hide_empty' => false,
            );
            $cities = get_terms($args);
            if ( $cities && !is_wp_error($cities) ) :
                foreach ( $cities as $city ) :
                    if ( $city->parent != 0 ) : ?>
                        <option value="<?php echo $city->slug ?>"><?php echo $city->name; ?></option>
                        <?php
                    endif;
                endforeach;
            endif; ?>
        </select>
        <div class="location-wrapper">
            <img src="" alt="">
            <p>Choose from any of our global destinations</p>
            <div class="location-select">
                <img src="" alt="">
                <span>All offers</span>
                <img src="" alt="">
            </div>
            <div class="location-dropdown">
                <?php
                $args = array(
                    'taxonomy' => 'locations',
                    'hide_empty' => false,
                    'parent' => 0,
                );
                $countries = get_terms($args);
                if ( $countries && !is_wp_error($countries) ) :
                    foreach ( $countries as $country ) :
                        $flag = get_field('flag',$country); ?>
                        <div class="country">
                            <div class="cities-toggle" data-target="<?php echo $country->slug; ?>">
                                <img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>">
                                <span><?php echo $country->name; ?></span>
                                <span>All destinations</span>
                            </div>
                            <?php
                            $args = array(
                                'taxonomy' => 'locations',
                                'parent' => $term->term_id,
                                'hide_empty' => false,
                            );
                            $cities = get_terms($args);
                            if ( $cities && !is_wp_error($cities) ) :
                                foreach ( $cities as $city ) : ?>
                                    <div class="city" data-container="<?php echo $country->slug; ?>" data-city="<?php echo $city->slug; ?>">
                                        <img src="" alt="">
                                        <span><?php echo $city->name; ?></span>
                                    </div>
                                    <?php
                                endforeach;
                            endif; ?>
                        </div>
                        <?php
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<?php
$args = array(
    'taxonomy' => 'type',
    'hide_empty' => false,
    'parent' => 0,
);
$types = get_terms($args);
if ( $types && !is_wp_error( $types ) ) :
    foreach ( $types as $type ) :
        if ($type->slug == 'offers-on-safestay') :
            $section_class = 'safestay-offers';
        elseif ($type->slug == 'partner-offers') :
            $section_class = 'attraction-offers';
        elseif ($type->slug == 'city-escapes') :
            $section_class = 'last-minute';
        elseif ($type->slug == 'food-drink-offers') :
            $section_class = 'food-offers';
        endif;
        ?>
        <section class="<?php echo $section_class; ?> offers-section" data-type="<?php echo $type->slug; ?>">
            <div class="container">
                <p class="offer-category"><?php echo $type->name; ?></p>
                <?php
                if ( have_rows('offer_types',$type) ) :
                    while ( have_rows('offer_types',$type) ) : the_row(); ?>
                        <h1><?php the_sub_field('heading',$type); ?></h1>
                        <?php
                    endwhile;
                endif; ?>
                <div class="offers-grid">
                    <?php
                    if ($type->slug == 'offers-on-safestay') :
                        $query = new WP_Query( array(
                            'post_type' => 'offers',
                            'posts_per_page' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'type',
                                        'field' => 'slug',
                                        'terms' => $type->slug
                                    )
                                )
                            )
                        );
                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) : $query->the_post();
                                $locations = wp_get_post_terms( $post->ID, 'locations'); ?>
                                <div class="offer featured-offer" data-city="<?php
                                    foreach( $locations as $location ) {
                                        if ( $location->parent != 0 ) {
                                            echo $location->slug;
                                        }
                                    } ?>">
                                    <div class="img-container">
                                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                        <span class="bg-<?php
                                            foreach( $locations as $location ) {
                                                if ( $location->parent == 0 ) {
                                                    echo $location->slug;
                                                }
                                            }
                                        ?>"><?php
                                        foreach( $locations as $location ) {
                                            if ( $location->parent != 0 ) {
                                                echo $location->name;
                                            }
                                        }
                                        ?></span>
                                    </div>
                                    <div class="info-container">
                                        <div class="info-wrapper">
                                            <p class="date"><?php echo get_the_date('d/m/Y'); ?></p>
                                            <?php
                                            if ( have_rows('offer') ) :
                                                while ( have_rows('offer') ) : the_row(); ?>
                                                    <h2><?php the_sub_field('heading'); ?></h2>
                                                    <p class="description"><?php the_sub_field('description'); ?></p>
                                                    <?php
                                                endwhile;
                                            endif; ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="button button-offer">See Offer</a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                    endif; ?>
                    <div class="sub-offers">
                        <?php
                        if ($type->slug == 'city-escapes') :
                            $posts_per_page = 2;
                        elseif ($type->slug == 'offers-on-safestay') :
                            $posts_per_page = 5;
                        else:
                            $posts_per_page = 4;
                        endif;
                        $query = new WP_Query( array(
                            'post_type' => 'offers',
                            'posts_per_page' => $posts_per_page,
                            'tax_query' => array( array(
                                'taxonomy' => 'type',
                                'field' => 'slug',
                                'terms' => $type->slug,
                            )),
                        ));
                        if ( $query->have_posts() ) :
                            $cnt = 0;
                            while ( $query->have_posts() ) : $query->the_post();
                                $locations = wp_get_post_terms( $post->ID, 'locations');
                                if ( $type->slug == 'offers-on-safestay' AND $cnt == 0 ) :
                                else : ?>
                                    <div class="offer" data-city="<?php
                                        foreach( $locations as $location ) {
                                            if ( $location->parent != 0 ) {
                                                echo $location->slug;
                                            }
                                        } ?>">
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                        <div class="offer-info-wrap">
                                            <?php
                                            if ( have_rows('offer') ) :
                                                while ( have_rows('offer') ) : the_row(); ?>
                                                    <p class="date">Offer Ends: <?php the_sub_field('offer_end_date'); ?></p>
                                                    <h3><?php the_sub_field('heading'); ?></h3>
                                                    <p class="description"><?php the_sub_field('description'); ?></p>
                                                    <?php
                                                endwhile;
                                            endif;?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="button button-offer-see">See Offer</a>
                                    </div>
                                    <?php
                                endif;
                                $cnt++;
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endforeach;
endif;
get_footer();
*/
?>
<!doctype html>
<html>

<head>
    <title>SafeStay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/styles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
</head>

<body class="exclusive-offers">
    <header style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/img/offers-bg.png')">
        <nav class="safestay-nav">
            <div class="container">
                <div class="nav-inner">
                    <div class="logo">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="link">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/map_marker_icon.png" alt="">
                        <a href="#">Locations</a>
                    </div>
                    <div class="link">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/groups_icon.png" alt="">
                        <a href="#">Groups</a>
                    </div>
                </div>
            </div>
            <div class="nav-right">
                <div class="nav-toggle toggle-language">
                    <a href="#">
                        English
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/chevron-down.png" alt="">
                    </a>
                </div>
                <div class="nav-toggle toggle-calendar">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar-icon.png" alt="">
                </div>
                <div class="nav-toggle toggle-navigation">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/nav-toggle.png" alt="">
                </div>
            </div>
        </nav>

        <div class="header-info">
            <div class="container">
                <h1>Welcome to <br> exclusive offers!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br> do eiusmod tempor incididunt ut labore et.</p>
            </div>
        </div>
    </header>

    <section class="booking-form">
        <div class="container">

            <div class="booking-inner">

                <div class="booking-toggles">
                    <div class="booking-toggle toggle-active">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/person-icon.png" alt=""> Individual
                    </div>
                    <div class="booking-toggle">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/group-icon-grey.png" alt="">Group Booking
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
                        <img class="form-icon" src="<?php echo get_template_directory_uri(); ?>/dist/img/world_icon.png" alt="">
                        <img class="select-down" src="<?php echo get_template_directory_uri(); ?>/dist/img/select-down.png" alt="">
                    </div>
                    <div class="form-group checkin-group">
                        <input type="text" name="check-in" id="check-in" placeholder="Check In">
                        <img class="check-icon" src="<?php echo get_template_directory_uri(); ?>/dist/img/check-icon.png" alt="">
                    </div>
                    <div class="form-group checkout-group">
                        <input type="text" name="check-out" id="check-out" placeholder="Check Out">
                        <img class="check-icon" src="<?php echo get_template_directory_uri(); ?>/dist/img/check-icon.png" alt="">
                    </div>
                    <div class="form-group book-group">
                        <button type="submit">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="offers-toggles">
        <div class="container">
            <div class="offer-toggle-row">
                <div class="toggle-group">
                    <label for="city">Location:</label>
                    <select name="city" id="city">
                        <option value="">All cities</option>
                    </select>
                    <img class="select-down" src="<?php echo get_template_directory_uri(); ?>/dist/img/chevron-white.png" alt="">
                </div>
                <div class="toggle-group">
                    <label for="category">Category:</label>
                    <select name="" id="category">
                        <option value="">All categories</option>
                    </select>
                    <img class="select-down" src="<?php echo get_template_directory_uri(); ?>/dist/img/chevron-white.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="safestay-offers offers-section">
        <div class="container">
            <p class="offer-category">Offers on Safestay</p>
            <h1>Best deals <br>guaranteed!</h1>

            <div class="offers-grid">
                <div class="offer featured-offer">
                    <div class="img-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Img Copy 7.png" alt="">
                        <span>Featured Offer</span>
                    </div>
                    <div class="info-container">
                        <div class="info-wrapper">
                            <p class="date">10/06/2018</p>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a href="#" class="button button-offer">See Offer</a>
                    </div>
                </div>
                <div class="sub-offers">
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
    </section>

    <section class="attraction-offers offers-section">
        <div class="container">
            <p class="offer-category">Attractions &amp; Days Out</p>
            <h1>Bring the
                <br>adrenaline!</h1>

            <div class="offers-grid">

                <div class="sub-offers">
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 7.png" alt="">
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 8.png" alt="">
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 9.png" alt="">
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 10.png" alt="">
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
    </section>

    <section class="last-minute offers-section">
        <div class="container">
            <p class="offer-category">City Escapes</p>
            <h1>Last minute breaks!</h1>

            <div class="offers-grid">
                <div class="sub-offers">
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 11.png" alt="">
                        <span>Spotlight</span>
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 12.png" alt="">
                        <span>Spotlight</span>
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="food-offers offers-section">
        <div class="container">
            <p class="offer-category">Food &amp; Drink Offers</p>
            <h1>Tickle your
                <br>taste buds!</h1>

            <div class="offers-grid">

                <div class="sub-offers">
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 7.png" alt="">
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 8.png" alt="">
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 9.png" alt="">
                        <div class="offer-info-wrap">
                            <p class="date">Offer Ends: 00/00/00</p>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                        <a href="#" class="button button-offer-see">See Offer</a>
                    </div>
                    <div class="offer">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Group 10.png" alt="">
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
    </section>

    <section class="email">
        <div class="container">
            <div class="row">
                <div class="grid-item half">
                    <h1 class="underline-dark">Stay up to date</h1>
                    <p>Stay up to date with the latest exclusive offers, tips and travel advice from SafeStay. You don't want
                        to miss out!
                    </p>
                </div>
                <div class="grid-item half flex centralize">
                    <div class="input-group">
                        <input type="text" placeholder="Enter your email address here<?php echo get_template_directory_uri(); ?>.">
                        <img class="sub" src="<?php echo get_template_directory_uri(); ?>/dist/img/submit-arrow.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-image-grid">
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image1.png" alt="">
            </div>
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image2.png" alt="">
            </div>
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image3.png" alt="">
            </div>
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image4.png" alt="">
            </div>
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image5.png" alt="">
            </div>
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image7.png" alt="">
            </div>
            <div class="grid-item">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/209x209_Image8.png" alt="">
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="grid-item half">
                    <p class="upper-title">Contact</p>
                    <h1>Get in touch with us!</h1>
                    <p class="lower-title">for group bookings of 10 or more:</p>
                    <ul>
                        <li>
                            <strong>T:</strong> +44 203 957 5530</li>
                        <li>
                            <strong>E: </strong> groups@safestay.com</li>
                    </ul>
                    <a href="#" class="button">Contact Us</a>
                </div>
                <div class="grid-item half flex centralize">
                    <div class="footer-nav">
                        <div class="footer-nav-item">
                            <h5>About</h5>
                            <ul>
                                <li>
                                    <a href="#">Travelsafe</a>
                                </li>
                                <li>
                                    <a href="#">Careers at Safestay</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Blog &amp Travel Tips</a>
                                </li>
                                <li>
                                    <a href="#">PR &amp Media</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-nav-item">
                            <h5>Investors</h5>
                            <ul>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Corporate</a>
                                </li>
                                <li>
                                    <a href="#">News</a>
                                </li>
                                <li>
                                    <a href="#">Reports &amp Documentation</a>
                                </li>
                                <li>
                                    <a href="#">Announcements</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-nav-item">
                            <h5>Franchises</h5>
                            <ul>
                                <li>
                                    <a href="#">Find out more</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="copyright-row">
                    <div class="copyright">
                        <p>Copyright SafeStay 2018</p>
                    </div>
                    <div class="copy-links">
                        <ul>
                            <li>
                                <a href="#">Terms &amp Conditions</a>
                            </li>
                            <li>
                                <a href="#">Group Booking T&ampC's</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?php echo get_template_directory_uri(); ?>/dist/bundle.js"></script>
</body>

</html>
