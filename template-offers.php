<?php
/**
 * Template Name: Offers
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

<section class="offers-toggles">
    <div class="container">
        <div class="offer-toggle-row">
            <div class="toggle-group">
                <label for="city"><?php echo __('Location:'); ?></label>
                <select name="city" id="city">
                    <option value=""><?php echo __('All cities'); ?></option>
                    <?php
                    $args = array(
                        'taxonomy' => 'locations',
                        'hide_empty' => false,
                    );
                    $terms = get_terms($args);
                    if ( $terms && !is_wp_error( $terms ) ) :
                        foreach ( $terms as $term ) : ?>
                            <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
                <img class="select-down" src="<?php echo get_template_directory_uri(); ?>/dist/img/chevron-white.png" alt="">
            </div>
            <div class="toggle-group">
                <label for="category">Category:</label>
                <select name="" id="category">
                    <option value="">All categories</option>
                    <?php
                    $args = array(
                        'taxonomy' => 'type',
                        'hide_empty' => false,
                    );
                    $terms = get_terms($args);
                    if ( $terms && !is_wp_error( $terms ) ) :
                        foreach ( $terms as $term ) : ?>
                            <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
                <img class="select-down" src="<?php echo get_template_directory_uri(); ?>/dist/img/chevron-white.png" alt="">
            </div>
        </div>
    </div>
</section>
<?php
$args = array(
    'taxonomy' => 'type',
    'hide_empty' => false,
);
$terms = get_terms($args);
if ( $terms && !is_wp_error( $terms ) ) :
    foreach ( $terms as $term ) :
        if ($term->slug == 'offers-on-safestay') :
            $section_class = 'safestay-offers';
        elseif ($term->slug == 'attractions-days-out') :
            $section_class = 'attraction-offers';
        elseif ($term->slug == 'city-escapes') :
            $section_class = 'last-minute';
        elseif ($term->slug == 'food-drink-offers') :
            $section_class = 'food-offers';
        endif;
        ?>
        <section class="<?php echo $section_class; ?> offers-section">
            <div class="container">
                <p class="offer-category"><?php echo $term->name; ?></p>
                <?php
                if ( have_rows('offer_types',$term) ) :
                    while ( have_rows('offer_types',$term) ) : the_row(); ?>
                        <h1><?php the_sub_field('heading',$term); ?></h1>
                        <?php
                    endwhile;
                endif; ?>
                <div class="offers-grid">
                    <?php
                    if ($term->slug == 'offers-on-safestay') :
                        $query = new WP_Query( array(
                            'post_type' => 'offers',
                            'posts_per_page' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'type',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            )
                        );
                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) : $query->the_post();
                                $background_image = get_field('background_image');
                                $locations = wp_get_post_terms( $post->ID, 'locations');
                                ?>
                                <div class="offer featured-offer">
                                    <div class="img-container">
                                        <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                        <span><?php foreach($locations as $location){echo $location->name;} ?></span>
                                    </div>
                                    <div class="info-container">
                                        <div class="info-wrapper">
                                            <p class="date"><?php echo get_the_date('d/m/Y'); ?></p>
                                            <?php
                                            if ( have_rows('offer') ) :
                                                while ( have_rows('offer') ) : the_row();
                                                    ?>
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
                        if ($term->slug == 'city-escapes') :
                            $posts_per_page = 2;
                        elseif ($term->slug == 'offers-on-safestay') :
                            $posts_per_page = 5;
                        else:
                            $posts_per_page = 4;
                        endif;
                        $query = new WP_Query( array(
                            'post_type' => 'offers',
                            'posts_per_page' => $posts_per_page,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'type',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            )
                        );
                        if ( $query->have_posts() ) :
                            $cnt = 0;
                            while ( $query->have_posts() ) : $query->the_post();
                                $background_image = get_field('background_image');
                                $locations = wp_get_post_terms( $post->ID, 'locations');
                                if ($term->slug == 'offers-on-safestay' AND $cnt==0) :
                                else:
                                    ?>
                                    <div class="offer">
                                        <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                        <div class="offer-info-wrap">
                                            <?php
                                            if ( have_rows('offer') ) :
                                                while ( have_rows('offer') ) : the_row();
                                                    ?>
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
?>
