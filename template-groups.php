<?php
/**
 * Template Name: Group Bookings Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
get_template_part('template-parts/contact-us-section'); ?>
<?php
if ( have_rows('bring_on_the_groups') ) :
    while ( have_rows('bring_on_the_groups') ) : the_row(); ?>
        <section class="groups-intro bg-light-grey">
            <div class="container">
                <div class="row standard-two-row">
                    <div class="grid-item half no-margin-right no-padding">
                        <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                        <div>
                            <?php the_sub_field('text'); ?>
                        </div>
                    </div>
                    <div class="grid-item half">
                        <?php
                        if ( have_rows('images') ) : ?>
                            <div class="image-composition comp-reverse comp-right">
                                <?php
                                while ( have_rows('images') ) : the_row();
                                    $front = get_sub_field('front');
                                    $back = get_sub_field('back'); ?>
                                    <img src="<?php echo $front['url'];?>" alt="<?php echo $front['alt'];?>" class="comp-under">
                                    <img src="<?php echo $back['url'];?>" alt="<?php echo $back['alt'];?>" class="comp-main">
                                    <?php
                                endwhile; ?>
                            </div>
                            <?php
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
if ( have_rows('related_groups') ) :
    while ( have_rows('related_groups') ) : the_row(); ?>
        <section class="group-types">
            <div class="container">
                <div class="header">
                    <h3><?php echo str_replace('|', '<br>', get_sub_field('heading')); ?></h3>
                </div>
                <div class="group-types-carousel owl-carousel">
                    <?php
                    wp_reset_query();
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
    endwhile;
endif;
if ( have_rows('reasons_to_book') ) :
    while ( have_rows('reasons_to_book') ) : the_row(); ?>
        <section class="locations-reasons">
            <div class="container">
                <div class="header">
                    <h3><?php echo str_replace('|', '<br />', get_sub_field('heading')); ?></h3>
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
                    $image = get_field('image',$location_term);
                    $flag = get_field('flag',$location_term); ?>
                    <div class="location">
                        <div class="location-inner">
                            <div class="default">
                                <img class="bg" src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>">
                                <div class="content">
                                    <div class="circle">
                                        <img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>">
                                    </div>
                                    <h4><?php echo $location_term->name; ?></h4>
                                </div>
                            </div>
                            <div class="hover bg-<?php echo $location_term->slug; ?>">
                                <div class="hover-inner">
                                    <div class="circle">
                                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/08/location.svg" alt="">
                                    </div>
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
if ( have_rows('food_&_bevarages') ) :
    while ( have_rows('food_&_bevarages') ) : the_row(); ?>
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
get_template_part('template-parts/group-bookings-overlay');
get_footer();
?>
