<?php
/**
 * Template Name: Our roms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
 */
get_header();

$hostel_name = $_GET['loc'];

if (is_null($hostel_name)) {
    $hostel_name = "madrid";
}

$hostel_array = get_posts( array(
    'name'           => $hostel_name,
    'post_type'      => 'hostel',
    'posts_per_page' => 1
) );



$hostel = $hostel_array[0];

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
                                    $i = 0;
                                    while ( have_rows('items') ) : the_row();
                                        if ($i % 3 == 0) {
                                            echo '</div><div class="icon-row">';
                                        }
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
                                        $i++;
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
    <?php 
    
        $post = $hostel;
        setup_postdata($post);

        $room_tab_data = array();

        if ( have_rows('rooms_details') ):

            while ( have_rows('rooms_details') ) : the_row();

                $rooms = get_sub_field('rooms');

                $count = 0;

                foreach($rooms as $room) {
                    $room_post = $room['room'];
                    
                    $post = $room_post;
                    setup_postdata($post);

                    $row_class="";

                    if ($count != 0) {
                        $row_class="inactive";
                    }

                    array_push($room_tab_data, get_field('display_title'));

                    ?>

                        <div class="form-image-row <?php echo $row_class ?>" data-item="<?php echo get_field('display_title') ?>">
                            <div class="form">
                                <div class="select-wrapper relative">
                                    <select name="" id="">
                                        <option value=""><?php echo get_field('display_title') ?></option>
                                    </select>
                                </div>
                                <hr class="hr-yellow">
                                <p class="price">From £<?php echo get_field('starting_price') ?></p>
                                <p class="text-normal">
                                    <?php echo get_field('description') ?>
                                </p>
                                <p class="list-header">Room Features:</p>
                                <ul>
                                    <?php 
                                    
                                        if ( have_rows('features') ) :
                                            while ( have_rows('features') ) : the_row();
                                            ?>
                                                <li><?php echo get_sub_field('text') ?></li>
                                            <?php
                                            endwhile;
                                        endif;
                                    ?>

                                </ul>
                                <a href="" class="button button-book">Book Now</a>
                            </div>
                            <div class="image">
                                <img src="<?php echo get_field('room_image') ?>" alt="">
                            </div>
                        </div>

                    <?php
                    $count++;
                    wp_reset_postdata();

                    

                }

            endwhile;

            ?>
            <div class="booking-toggles toggle-our-rooms">
            <?php

            $i = 0;

            

            foreach($room_tab_data as $tab) {

                if ($i != 0) {
                    $tab_class="";
                } else {
                    $tab_class="toggle-active";
                }

                ?>

                <div class="booking-toggle <?php echo $tab_class ?>" data-target="<?php echo $room_tab_data[$i] ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/person-icon.png" alt=""> <?php echo $room_tab_data[$i] ?>
                </div>

                <?php
                $i++;
            }

            ?>

            
            
        </div>

            <?php

        endif;

        wp_reset_postdata();

    ?>
        
        
        
    </div>
</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
?>
