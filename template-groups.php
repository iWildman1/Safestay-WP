<?php
/**
 * Template Name: Group Bookings Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
<<<<<<< HEAD
get_template_part('template-parts/contact-us-section'); ?>
=======
get_template_part('template-parts/page-header');
?>
<div class="container">
    <section class="contact-us-banner">
        <div class="contact-banner-inner">
            <?php
            if ( have_rows('contact_us') ) :
                while ( have_rows('contact_us') ) : the_row(); ?>
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
                                $type = get_sub_field('description'); ?>
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
                        endif; ?>
                    </div>
                    <?php
                endwhile;
            endif; ?>
        </div>
    </section>
</div>

>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
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
<<<<<<< HEAD
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
=======
endif; ?>
<section class="scrolling-banner sb-white padded-large">
    <h1 class="banner-item">Licensed bar.</h1>
    <h1 class="banner-item">Laundry room.</h1>
    <h1 class="banner-item">Full cctv coverage.</h1>
    <h1 class="banner-item">Key-card security system.</h1>
</section>

<?php
if (have_rows('cater_group')) :
    while(have_rows('cater_group')) : the_row(); ?>
    <section class="cater-group">
    <div class="container">
        <div class="row">
            <div class="grid-item half">
                <h1 class="underline-yellow cater-header">We cater for <br> any groups!</h1>
            </div>
        </div>
        <div class="row cater-grid">
            <?php
                if ( have_rows('pages') ) :
                    while( have_rows('pages') ) : the_row();
                        $post = get_sub_field('page'); ?>
                            <a href="<?php the_permalink() ?>" class="item">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                <div class="item-info-wrapper">
                                    <h3><?php echo get_the_title() ?></h3>
                                </div>
                            </a>
                        <?php
                        wp_reset_postdata();
                    endwhile;
                endif; ?>
        </div>
    </div>
    </section>
    <?php
    endwhile;
endif;
if ( have_rows('meet_the_team') ) :
    while ( have_rows('meet_the_team') ) : the_row(); ?>
        <section class="meet-the-team bg-light-grey padding-top-large padding-bottom-xxlarge">
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
            <div class="container">
                <div class="header">
                    <h3><?php echo str_replace('|', '<br />', get_sub_field('heading')); ?></h3>
                </div>
                <div class="reasons">
                    <?php
<<<<<<< HEAD
                    if ( have_rows('reasons') ) :
                        while ( have_rows('reasons') ) : the_row();
                            $icon = get_sub_field('icon'); ?>
                            <div class="reason">
                                <div class="reasons-inner">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    <p><?php the_sub_field('reason'); ?></p>
=======
                    if ( have_rows('members') ) :
                        while ( have_rows('members') ) : the_row();
                            $image = get_sub_field('image'); ?>
                            <div class="item">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <div class="item-info-wrapper">
                                    <p><strong><?php the_sub_field('name'); ?></strong><br><?php the_sub_field('profession'); ?></p>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
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
<<<<<<< HEAD
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
=======
endif;
include('template-parts/flexible-content.php');
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
get_footer();
?>
