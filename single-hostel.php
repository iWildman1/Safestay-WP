<?php
/**
 * This template is made for displaying single Hostel CPT posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();

$hostel_slug = $post->post_name;

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <section class="booking-form">
            <div class="container">
                <?php
                get_template_part('template-parts/booking-form'); ?>
            </div>
        </section>
        <section class="city-details">
            <div class="details-header">
                <div class="container">
                    <ul class="details-links">
                        <li data-location-target="facilities" class="detail-link-active">
                            <img class="white" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/white/bed.svg" alt="">
                            <img class="black" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/black/bed.svg" alt="">
                            <span>Rooms &amp Facilities</span>
                        </li>
                        <li data-location-target="info">
                            <img class="white" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/white/location.svg" alt="">
                            <img class="black" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/black/location.svg" alt="">
                            <span>Location</span>
                        </li>
                        <li data-location-target="food">
                            <img class="white" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/white/food&Drink.svg" alt="">
                            <img class="black" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/black/food&Drink.svg" alt="">
                            <span>Food &amp Drink</span>
                        </li>
                        <li data-location-target="offers">
                            <img class="white" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/white/offers.svg" alt="">
                            <img class="black" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/black/offers.svg" alt="">
                            <span>Offers</span>
                        </li>
                        <li data-location-target="reviews">
                            <img class="white" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/white/reveiws.svg" alt="">
                            <img class="black" src="<?php echo get_template_directory_uri(); ?>/img/loc_tabs/black/reveiws.svg" alt="">
                            <span>Reviews</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="details-lower details-rooms-facilities" data-location-section="facilities">
                <div class="container">
                    <?php
                    if ( have_rows('rooms_details') ) :
                        while ( have_rows('rooms_details') ) : the_row(); ?>
                            <div class="header">
                                <div class="grid-item col col-30">
                                    <h3 class="title"><?php the_sub_field('heading');?></h3>
                                </div>
                                <div class="grid-item col col-70">
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="grid-item col col-30 facility-list">
                                    <?php
                                    if ( have_rows('list') ) : ?>
                                        <ul class="facilities">
                                            <?php
                                            while ( have_rows('list') ) : the_row();
                                                $icon = get_sub_field('icon'); ?>
                                                <li><div class="img-box"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></div> <?php the_sub_field('text'); ?></li>
                                                <?php
                                            endwhile; ?>
                                        </ul>
                                        <?php
                                    endif; ?>
                                </div>
                                <div class="grid-item col col-70">
                                    <div class="room-cards">
                                        <?php
                                        if ( have_rows('rooms') ) :
                                            $cnt = 0;
                                            while ( have_rows('rooms') ) : the_row();
                                                $image = get_sub_field('image'); ?>
                                                <div class="room" data-room-slug="">
                                                    <div class="room-inner">
                                                        <img class="main-card-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                                        <div class="cost">
                                                            <span>From <?php the_sub_field('price'); ?></span>
                                                        </div>
                                                        <?php
                                                        if ( have_rows('buttons') ) : ?>
                                                            <div class="buttons ">
                                                                <?php
                                                                while ( have_rows('buttons') ) : the_row();
                                                                    $left = get_sub_field('left');
                                                                    $right = get_sub_field('right');
                                                                    if ( $left ) : ?>
                                                                        <a href="/our-rooms?loc=<?php the_title(); ?>>" class="button book"><?php echo $left; ?></a>
                                                                        <?php
                                                                    endif;
                                                                    if ( $right ) : ?>
                                                                        <a href="#" class="button button-inverse more-info toggle-room-lightbox" data-room-target="room-<?php echo $cnt; ?>"><?php echo $right; ?></a>
                                                                        <?php
                                                                    endif;
                                                                endwhile; ?>
                                                            </div>
                                                            <?php
                                                        endif; ?>
                                                        <div class="info-container">
                                                            <h4><?php the_sub_field('heading'); ?></h4>
                                                            <div class="sleep-counter">
                                                                <img src="<?php get_template_directory_uri(); ?>/wp-content/uploads/2018/09/person-icon.png" alt="">
                                                                <span><?php the_sub_field('sleeps'); ?></span>
                                                            </div>
                                                            <p><?php echo wp_trim_words(get_sub_field('description'),15); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $cnt++;
                                            endwhile;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>
            <div class="details-lower details-location-info details-inactive" data-location-section="info">
                <div class="container">
                    <?php
                    if ( have_rows('location') ) :
                        while ( have_rows('location') ) : the_row(); ?>
                            <div class="row">
                                <div class="col col-40">
                                    <div class="header">
                                        <h3 class="title"><?php the_sub_field('heading'); ?></h3>
                                    </div>
                                    <div class="content">
                                        <p><?php the_sub_field('description'); ?></p>
                                        <div class="facility-list">
                                            <?php
                                            if ( have_rows('list') ) : ?>
                                                <ul class="facilities">
                                                    <?php
                                                    while ( have_rows('list') ) : the_row();
                                                        $icon = get_sub_field('icon'); ?>
                                                        <li>
                                                            <div class="img-box">
                                                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            </div>
                                                            <span><?php the_sub_field('text'); ?></span>
                                                        </li>
                                                        <?php
                                                    endwhile; ?>
                                                </ul>
                                                <?php
                                            endif; ?>
                                        </div>
                                        <?php
                                        if ( have_rows('buttons') ) : ?>
                                            <div class="button-row ">
                                                <?php
                                                while ( have_rows('buttons') ) : the_row();
                                                    $left_button = get_sub_field('left_button');
                                                    $right_button = get_sub_field('right_button');
                                                    if ( $left_button ) : ?>
                                                        <a href="<?php echo $left_button['url']; ?>" class="button book"><?php echo $left_button['title']; ?></a>
                                                        <?php
                                                    endif;
                                                    if ( $right_button ) : ?>
                                                        <a href="<?php echo $right_button['url']; ?>" class="button more-info"><?php echo $right_button['title']; ?></a>
                                                        <?php
                                                    endif;
                                                endwhile; ?>
                                            </div>
                                            <?php
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="grid-item col col-60">
                                    <?php
                                    $location = get_sub_field('google_map'); ?>
                                    <div class="acf-map map-frame">
                                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>
            <section class="details-lower details-lower-about about details-inactive" data-location-section="food">
                <div class="container">
                    <?php
                    if ( have_rows('food_&_drink_tab') ) :
                        while ( have_rows('food_&_drink_tab') ) : the_row();
                            $icon = get_sub_field('slider_icon'); ?>
                            <div class="header">
                                <div class="col">
                                    <h3 class="title underline"><?php the_sub_field('heading'); ?></h3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="col col-33">
                                    <div class="info">
                                        <h5><?php the_sub_field('lower_heading'); ?></h5>
                                        <p><?php the_sub_field('description'); ?></p>
                                        <?php
                                        if ( have_rows('buttons') ) : ?>
                                            <div class="buttons">
                                                <?php
                                                while ( have_rows('buttons') ) : the_row();
                                                    $left = get_sub_field('left');
                                                    $right = get_sub_field('right');
                                                    if ( $left ) : ?>
                                                        <a class="btn" href="<?php echo $left['url']; ?>"><?php echo $left['title']; ?></a>
                                                        <?php
                                                    endif;
                                                    if ( $right ) : ?>
                                                        <a class="btn btn-dark" href="<?php echo $right['url']; ?>"><?php echo $right['title']; ?></a>
                                                        <?php
                                                    endif;
                                                endwhile; ?>
                                            </div>
                                            <?php
                                        endif;
                                        wp_reset_query(); ?>
                                    </div>
                                </div>
                                <div class="col col-66">
                                    <div class="foods-beverages owl-carousel">
                                        <?php
                                        $single_hostel_id = $post->post_name;
                                        $query = new WP_Query( array(
                                            'post_type' => 'food_drinks',
                                            'posts_per_page' => -1,
                                        ));
                                        if ( $query->have_posts() ) :
                                            while ( $query->have_posts() ) : $query->the_post();
                                                if ( $single_hostel_id == $post->post_name ) :
                                                    if ( have_rows('food_and_beverage_offers') ) :
                                                        while ( have_rows('food_and_beverage_offers') ) : the_row();
                                                            if ( have_rows('offers') ) :
                                                                while ( have_rows('offers') ) : the_row();
                                                                    $image = get_sub_field('image'); ?>
                                                                    <div class="food-beverage">
                                                                        <div class="image">
                                                                            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                                                        </div>
                                                                        <p><?php the_sub_field('heading'); ?></p>
                                                                    </div>
                                                                    <?php
                                                                endwhile;
                                                            endif;
                                                        endwhile;
                                                    endif;
                                                endif;
                                            endwhile;
                                        endif;
                                        wp_reset_query(); ?>
                                    </div>
                                    <div class="circle">
                                        <?php
                                        if ( $icon ) : ?>
                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                            <?php
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </section>
            <div class="details-lower details-lower-offers details-inactive" data-location-section="offers">
                <div class="container">
                    <?php
                    if ( have_rows('offers_tab') ) :
                        while ( have_rows('offers_tab') ) : the_row(); ?>
                            <div class="header">
                                <div class="col col-50">
                                    <h3 class="title"><?php the_sub_field('heading'); ?></h3>
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                                <div class="col col-50">
                                    <?php
                                    if ( have_rows('buttons') ) :
                                        while ( have_rows('buttons') ) : the_row();
                                            $left = get_sub_field('left');
                                            $right = get_sub_field('right'); ?>
                                            <div class="button-row">
                                                <a href="<?php echo $left['url']; ?>" class="button"><?php echo $left['title']; ?></a>
                                                <a href="<?php echo $right['url']; ?>" class="button button-secondary"><?php echo $right['title']; ?></a>
                                            </div>
                                            <?php
                                        endwhile;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="details-offers-row sub-offers">
                                <?php
                                $post_objects = get_sub_field('offers');
                                if( $post_objects ):
                                    foreach( $post_objects as $post) : setup_postdata($post); ?>
                                        <div class="offer">
                                            <div class="offer-inner">
                                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                                <div class="offer-info-wrap">
                                                    <p class="date">Offer Ends: <?php the_sub_field('offer_end_date'); ?></p>
                                                    <h3><?php the_sub_field('heading'); ?></h3>
                                                    <p class="description"><?php the_sub_field('description'); ?></p>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="button button-offer-see">See Offer</a>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                wp_reset_query(); ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query(); ?>
                </div>
            </div>

            <div class="details-lower details-lower-reviews details-inactive" data-location-section="reviews">
                <div class="container">
                    <?php
                    $trust_you_link = get_field('trust_you_link');
                    if ( have_rows('reviews_tab') ) :
                        while ( have_rows('reviews_tab') ) : the_row(); ?>
                            <div class="header">
                                <div class="col">
                                    <h3 class="title"><?php echo str_replace('|', '<br />', get_sub_field('heading')); ?></h3>
                                    <iframe src="<?php echo $trust_you_link; ?>" allowtransparency="true" frameborder="0" scrolling="no" height="100%" width="100%"></iframe>
                                    <a class="button" href="#">Book now</a>
                                </div>
                            </div>
                            <div class="review-lower">
                                <div class="review-row owl-carousel">
                                    <?php
                                    if ( have_rows('reviews') ) :
                                        while ( have_rows('reviews') ) : the_row();
                                            $date = get_sub_field('date',false,false);
                                            $date = new DateTime($date); ?>
                                            <div class="review">
                                                <h2><?php the_sub_field('name'); ?></h2>
                                                <span class="date"><?php echo $date->format('M Y'); ?></span>
                                                <hr>
                                                <p><?php the_sub_field('text'); ?></p>
                                            </div>
                                            <?php
                                        endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<div class="room-overlay inactive">
    <?php
    wp_reset_query();
    if ( have_rows('rooms_details') ) :
        while ( have_rows('rooms_details') ) : the_row();
            if ( have_rows('rooms') ) :
                $cnt = 0;
                while ( have_rows('rooms') ) : the_row();
                    $image = get_sub_field('image'); ?>
                    <div class="room-overlay-inner" data-room-container="room-<?php echo $cnt; ?>">
                        <div class="row">
                            <div class="grid-grid-item half room-overlay-left no-margin-right no-padding">
                                <div class="room-info-inner">
                                    <p class="offer-price">From only <?php the_sub_field('price'); ?></p>
                                    <h3 class="underline-dark"><?php the_sub_field('heading'); ?></h3>
                                    <p><?php the_sub_field('description'); ?></p>
                                    <ul class="facility-list">
                                        <?php
                                        if ( have_rows('list') ) :
                                            while ( have_rows('list') ) : the_row();
                                                $icon = get_sub_field('icon'); ?>
                                                <li>
                                                    <?php
                                                    if ( $icon ) : ?>
                                                        <div class="img-box">
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                        </div>
                                                        <?php
                                                    endif; ?>
                                                    <span><?php the_sub_field('item'); ?></span>
                                                </li>
                                                <?php
                                            endwhile;
                                        endif; ?>
                                    </ul>
                                    <?php
                                    if ( have_rows('buttons') ) : ?>
                                        <div class="buttons ">
                                            <?php
                                            while ( have_rows('buttons') ) : the_row();
                                                $left = get_sub_field('left');
                                                $right = get_sub_field('right');
                                                if ( $left ) : ?>
                                                    <a href="#" class="button button-overlay-book"><?php echo $left; ?></a>
                                                    <?php
                                                endif;
                                                if ( $right ) : ?>
                                                    <a href="/hostels/<?php echo $post->post_name; ?>" class="button button-inverse more-info"><?php echo $right; ?></a>
                                                    <?php
                                                endif;
                                            endwhile; ?>
                                        </div>
                                        <?php
                                    endif; ?>
                                </div>
                            </div>
                            <div class="grid-item half room-overlay-right no-margin-left no-margin-sides no-padding">
                                <img class="fill-grid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php
                    $cnt++;
                endwhile;
            endif;
        endwhile;
    endif; ?>
    <div class="close-room-overlay">
        <div class="x"></div>
    </div>
</div>
<?php
get_footer();
?>
