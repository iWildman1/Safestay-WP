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
            if ( $i == 0 ) {
                ?>
                    <h1 class="banner-item active"><?php echo $term->name; ?>.</h1>
                <?php
            } else {
                ?>
                    <h1 class="banner-item"><?php echo $term->name; ?>.</h1>
                <?php
            }
            $i++;
        endforeach;
    endif;
    wp_reset_query();
    ?>
</section>

<section class="expore">
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'taxonomy' => 'locations',
                'hide_empty' => false,
            );
            $terms = get_terms($args); // Get all terms of a taxonomy
            if ( $terms && !is_wp_error( $terms ) ) :
                $i = 0;
                foreach ( $terms as $term ) :
                    ?>
                    <div class="grid-item grid-30 bg-<?php echo $term->slug;?> flex centralize <?php if($i==0){echo "active";}?>">
                        <div class="col-inner">
                            <h1><?php echo $term->name; ?>.</h1>
                            <p><?php echo $term->description; ?></p>
                        </div>
                    </div>
                    <?php
                    $image = get_field('image',$term);
                    ?>
                    <div class="grid-item third bg-<?php echo $term->slug;?>-image flex centralize" style="background-image: url('<?php echo $image['url']; ?>')">
                         <h3><?php the_field('heading',$term); ?></h3>
                    </div>
                    <?php
                    $i++;
                endforeach;
            endif;
            wp_reset_query();
            ?>
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
                <?php
                $args = array(
                    'post_type' => 'hostel',
                    'posts_per_page' => -1,
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    $cnt = 0;
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        $terms = get_the_terms( $post->ID, 'locations' );
                        ?>
                        <div class="grid-item <?php if($cnt % 2 == 0){echo'half';}?> bg-spain-image flex centralize" style="background-image: url('<?php the_post_thumbnail_url(); ?>')" data-location="<?php foreach($terms as $term){echo $term->name;}?>">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <?php
                        $cnt++;
                        wp_reset_postdata();
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </div>
        </div>

        <div class="slider-controls">

        </div>
        <div class="drag-info">
            <div class="drag-img">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="">
            </div>
            <div class="drag-text">
                <p>Drag to Explore</p>
            </div>
        </div>
    </div>
</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
?>
