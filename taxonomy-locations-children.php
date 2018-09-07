<?php
/**
 * Template for Locations childrens
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
get_template_part('template-parts/contact-us-section');
$term = get_queried_object(); ?>
<?php
if ( have_rows('groups_info',$term) ) :
    while ( have_rows('groups_info',$term) ) : the_row(); ?>
        <section class="groups-intro">
            <div class="container">
                <div class="row standard-two-row">
                    <div class="grid-item half no-margin-right no-padding">
                        <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                        <div class="description">
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                    <div class="grid-item half">
                        <div class="image-composition comp-reverse comp-right">
                            <?php
                            if ( have_rows('images') ) :
                                while ( have_rows('images') ) : the_row();
                                    $front = get_sub_field('front');
                                    $back = get_sub_field('back'); ?>
                                    <img class="comp-under" src="<?php echo $front['url']; ?>" alt="<?php echo $front['alt']; ?>">
                                    <img class="comp-main" src="<?php echo $back['url']; ?>" alt="<?php echo $back['alt']; ?>">
                                    <?php
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<section class="city-hostels">
    <div class="container">
        <div class="header">
            <h3>Hostels in <?php echo $term->name; ?></h3>
        </div>
        <div class="hostels">
            <?php
            wp_reset_query();
            $single_hostel_title = get_queried_object();
            $cnt = 0;
            $query = new WP_Query( array(
                'post_type' => 'hostel',
                'posts_per_page' => -1,
            ));
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    $locations = wp_get_post_terms( $post->ID, 'locations' );
                    if ( $locations && !is_wp_error($locations) ) :
                        foreach ( $locations as $location ) :
                            if ( $location->name == $single_hostel_title->name ) : ?>
                    <div class="hostel">
                        <div class="inner-hostel">
                            <div class="image">
                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                <?php
                                if ( get_field('offer') ) { ?>
                                    <div class="offer">
                                        <span>Offer</span>
                                    </div>
                                    <?php
                                } ?>
                                <div class="image-content">
                                    <p class="top">Stay from</p>
                                    <?php
                                    if ( get_field('offer') ) { ?>
                                        <p class="price"><?php the_field('offer_amount'); ?></p>
                                        <?php
                                    } elseif ( get_field('price') ) { ?>
                                        <p class="price"><?php the_field('price'); ?></p>
                                        <?php
                                    } ?>
                                    <p class="bottom">Per Person Per Night</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="info-wrap">
                                    <p class="location"><?php ?></p>
                                    <div class="name-row">
                                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 13.png" alt="">
                                        <p><?php the_title(); ?></p>
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
                                </div>
                                <div class="features-row">
                                    <div class="feature">
                                        <div class="inner-feature">
                                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 5.png" alt="">
                                            <p>113 Beds</p>
                                        </div>
                                    </div>
                                    <div class="feature">
                                        <div class="inner-feature">
                                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 6.png" alt="">
                                            <p>Fast WiFi</p>
                                        </div>
                                    </div>
                                    <div class="feature">
                                        <div class="inner-feature">
                                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 7.png" alt="">
                                            <p>Social Areas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php
                            endif;
                        endforeach;
                    endif;
                endwhile;
            endif;
            wp_reset_query(); ?>
        </div>
    </div>
</section>
<section class="group-types">
    <div class="container">
        <div class="header">
            <h3>We cater for any groups!</h3>
        </div>
        <div class="group-types-carousel owl-carousel">
            <?php
            $args = array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_wp_page_template',
                        'value' => 'template-groups-inner.php'
                    )
                )
            );
            $the_pages = new WP_Query( $args );
            if( $the_pages->have_posts() ) :
                while( $the_pages->have_posts() ) : $the_pages->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="item">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <?php
                endwhile;
            endif;
            wp_reset_query(); ?>
        </div>
        <div class="drag-info">
            <div class="drag-img">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="Drag to explore">
            </div>
            <div class="drag-text">
                <p>Drag to Explore</p>
            </div>
        </div>
    </div>
</section>
<?php
if ( have_rows('reasons_to_book',$term) ) :
    while ( have_rows('reasons_to_book',$term) ) : the_row(); ?>
        <section class="locations-reasons">
            <div class="container">
                <div class="header">
                    <h3><?php the_sub_field('heading'); ?></h3>
                </div>
                <div class="reasons">
                    <?php
                    if ( have_rows('reasons') ) :
                        while ( have_rows('reasons') ) : the_row();
                            $icon = get_sub_field('icon'); ?>
                            <div class="reason">
                                <div class="reasons-inner">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    <p><?php the_sub_field('reason'); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<section class="choose-location">
    <div class="container">
        <div class="header">
            <h3>Choose your Safestay Location</h3>
        </div>
        <div class="locations">
            <?php
            $args = array(
                'taxonomy' => 'locations',
                'hide_empty' => false,
                'parent' => 0,
            );
            $locations_terms = get_terms($args);
            if ( $locations_terms && !is_wp_error( $locations_terms ) ) :
                foreach ( $locations_terms as $location_term ) :
                    $image = get_field('image',$location_term); ?>
                    <div class="location">
                        <div class="location-inner">
                            <div class="default">
                                <img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>">
                                <h4><?php echo $location_term->name; ?></h4>
                            </div>
                            <div class="hover bg-<?php echo $location_term->slug; ?>">
                                <div class="hover-inner">
                                    <img src="" alt="">
                                    <p>Choose Location</p>
                                    <?php
                                    $args = array(
                                        'taxonomy' => 'locations',
                                        'hide_empty' => false,
                                        'parent' => $location_term->term_id,
                                    );
                                    $location_terms_inner = get_terms($args);
                                    if ( $location_terms_inner && !is_wp_error( $location_terms_inner ) ) :
                                        foreach ( $location_terms_inner as $location_term_inner ) : ?>
                                            <a href="<?php echo get_term_link($location_term_inner->term_id); ?>"><?php echo $location_term_inner->name; ?></a>
                                            <?php
                                        endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            wp_reset_query(); ?>
        </div>
    </div>
</section>
<?php
if ( have_rows('about_city', $term) ) :
    while ( have_rows('about_city', $term) ) : the_row(); ?>
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="grid-item half">
                        <div class="image-composition">
                            <?php
                            if ( have_rows('images') ) :
                                while( have_rows('images') ) : the_row();
                                    $front = get_sub_field('front');
                                    $back = get_sub_field('back'); ?>
                                    <img class="comp-under" src="<?php echo $front['url']; ?>" alt="<?php echo $front['alt']; ?>">
                                    <img class="comp-main" src="<?php echo $back['url']; ?>" alt="<?php echo $back['alt']; ?>">
                                    <?php
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                    <div class="grid-item half flex centralize">
                        <div class="about-text-staggered">
                            <h3><?php the_sub_field('heading'); ?></h3>
                            <div class="text-main">
                                <?php the_sub_field('description'); ?>
                            </div>
                            <div class="buttons">
                                <?php
                                if ( have_rows('buttons') ) :
                                    while( have_rows('buttons') ) : the_row();
                                        $left = get_sub_field('left');
                                        $right = get_sub_field('right'); ?>
                                        <a href="<?php echo $left['url']; ?>" class="btn"><?php echo $left['title']; ?></a>
                                        <a href="<?php echo $right['url']; ?>" class="btn btn-dark"><?php echo $right['title']; ?></a>
                                        <?php
                                    endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<section class="special-group-offers">
    <div class="container">
        <div class="header">
            <h3>Special Offers</h3>
        </div>
        <div class="group-offers">
            <?php
            $args = array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_wp_page_template',
                        'value' => 'template-groups-inner.php'
                    )
                )
            );
            $the_pages = new WP_Query( $args );
            if( $the_pages->have_posts() ) :
                while( $the_pages->have_posts() ) : $the_pages->the_post();
                    if ( get_field('offer') ) : ?>
                        <div class="group-offer">
                            <div class="inner-group-offer">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                <div class="offer">
                                    <span>Offer</span>
                                </div>
                                <div class="content">
                                    <p class="discount"><?php the_field('offer_amount'); ?>% <span>Off</span></p>
                                    <p><?php the_title(); ?></p>
                                </div>
                                <a href="#" class="button hover">Enquire</a>
                            </div>
                        </div>
                        <?php
                    endif;
                endwhile;
            endif;
            wp_reset_query(); ?>
        </div>
    </div>
</section>
<?php
get_footer(); ?>
