<?php
/**
 * Template Name: Our roms
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

<?php
if ( have_rows('facilities') ) :
    while ( have_rows('facilities') ) : the_row();
        ?>
        <section class="book-reasons bg-white push-margin-up padding-top-xlarge padding-bottom-large">
            <div class="container">
                <div class="row standard-two-row">
                    <div class="grid-item half no-margin-right no-padding">
                        <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                        <div>
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                    <div class="grid-item half">
                        <div class="reasons-icon-grid">
                            <div class="icon-row">
                                <?php
                                if ( have_rows('items') ) :
                                    while ( have_rows('items') ) : the_row();
                                        $icon = get_sub_field('icon');
                                        ?>
                                        <div class="icon-item">
                                            <div class="item-wrapper">
                                                <div class="img-wrapper">
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                </div>
                                                <p><?php the_sub_field('text'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>

<section class="our-rooms-info bg-burgundy padding-top-large padding-bottom-large">
    <div class="container relative">
        <div class="row">
            <h1 class="h1-med underline-pink no-margin-top">Our rooms</h1>
        </div>
        <div class="booking-toggles toggle-our-rooms">
            <div class="booking-toggle toggle-active">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/person-icon.png" alt=""> Private Room
            </div>
            <div class="booking-toggle">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/group-icon-grey.png" alt="">Private Room
            </div>
        </div>
        <div class="form-image-row">
            <div class="form">
                <div class="select-wrapper relative">
                    <select name="" id="">
                        <option value="">Private room</option>
                    </select>
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/select-down.png" alt="" class="select-arrow">
                </div>
                <hr class="hr-yellow">
                <p class="price">From 1950.00CZK</p>
                <p class="text-normal">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus quaerat aspernatur facere hic aut, reprehenderit totam, nisi corporis natus beatae deleniti, vel voluptate laborum. Neque labore eligendi sed temporibus non.
                </p>
                <p class="list-header">Room Features:</p>
                <ul>
                    <li>Personal Power Sockets</li>
                    <li>Personal Storage</li>
                    <li>Towels Provided</li>
                    <li>Bed Linen</li>
                </ul>
                <a href="" class="button button-book">Book Now</a>
            </div>
            <div class="image">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/room-3.PNG" alt="">
            </div>
        </div>
    </div>
</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
?>
