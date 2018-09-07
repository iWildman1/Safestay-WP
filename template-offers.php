<?php
/**
 * Template Name: Offers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
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
?>
