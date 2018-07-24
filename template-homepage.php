
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
        $i = 0;
        foreach ( $terms as $term ) :
            if ( $i == 0 ) { ?>
                    <h1 class="banner-item active" data-target-country="<?php echo $term->name ?>"><?php echo $term->name; ?>.</h1>
                <?php
            } else { ?>
                    <h1 class="banner-item" data-target-country="<?php echo $term->name ?>"><?php echo $term->name; ?>.</h1>
                <?php
            }
            ?>
            <?php
            $i++;
        endforeach;
    endif;
    wp_reset_query(); ?>
</section>

<section class="expore">
    <?php
    get_template_part('template-parts/explore-spain');
    get_template_part('template-parts/explore-uk');
    get_template_part('template-parts/explore-czech');
    get_template_part('template-parts/explore-portugal');
    ?>
</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
?>
