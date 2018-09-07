<?php
/**
 * Template for ACF flexible content field
**/
$page_id = get_the_id();
if ( is_home() ) {
    $page_id = get_option('page_for_posts');
} elseif ( is_tax() ) {
    $page_id = get_queried_object();
}
if ( have_rows('flexible_content',$page_id) ) :
    while ( have_rows('flexible_content',$page_id) ) : the_row();
        if ( get_row_layout() == 'group_bookings_two_images_left_text_right' ):
            $front_image = get_sub_field('front_image');
            $back_image = get_sub_field('back_image');
            $link = get_sub_field('link'); ?>
            <section class="about">
                <div class="container">
                    <div class="row">
                        <div class="grid-item half">
                            <div class="image-composition">
                                <img class="comp-main" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                                <img class="comp-under" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                            </div>
                        </div>
                        <div class="grid-item half flex centralize">
                            <div class="about-text-staggered">
                                <p class="upper-title"><?php the_sub_field('upper_heading'); ?></p>
                                <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                                <p class="text-main"><?php the_sub_field('text'); ?></p>
                                <?php
                                if ($link) : ?>
                                    <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'about_us_text_left_image_right' ) :
            $image = get_sub_field('image');
            $link = get_sub_field('link'); ?>
            <section class="about">
                <div class="container">
                    <div class="row ethos">
                        <div class="grid-item half no-margin-right no-padding text-block">
                            <div class="ethos-inner">
                                <div class="ethos-text">
                                    <p class="upper-title"><?php the_sub_field('upper_heading'); ?></p>
                                    <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                                    <p class="text-main"><?php the_sub_field('text'); ?></p>
                                    <?php
                                    if ($link) : ?>
                                        <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                        <?php
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item half no-margin-left no-padding img-block">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'booking_left_with_slider_right' ) : ?>
            <section class="book-now" id="book-now">
                <div class="container container-fluid">
                    <div class="row">
                        <div class="grid-item half bg-burgundy no-margin-left booking-grid">
                            <h3 class="underline-pink"><?php the_sub_field('heading'); ?></h3>
                            <form action="/book-now"  method="post" enctype="multipart/form-data" class="booking-form-large">
                                <div class="booking-form-group">
                                    <select name="country" id="booking-country">
                                        <?php
                                        $countries = get_terms( array(
                                            'taxonomy' => 'locations',
                                            'parent' => 0,
                                        ) );
                                        if ( $countries && !is_wp_error($countries) ) :
                                            foreach ( $countries as $country ) : ?>
                                                <option value="<?php echo $country->slug; ?>"><?php echo $country->name; ?></option>
                                                <?php
                                            endforeach;
                                        endif; ?>
                                    </select>
                                    <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                                </div>
                                <div class="booking-form-group">
                                    <label for="large-location">Where:</label>
                                    <div class="select-wrapper">
<<<<<<< HEAD
                                        <select name="large-location" id="location">
=======
                                        <select name="location" id="location">
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                                            <option value="0">Where would you like to go?</option>
                                            <?php
                                            $query = new WP_Query( array(
                                                'post_type' => 'hostel',
<<<<<<< HEAD
                                                'posts_per_page' => -1,
                                            ) );
                                            if ( $query->have_posts() ) :
                                                $cnt = 1;
                                                while ( $query->have_posts() ) : $query->the_post();
                                                    $countries = wp_get_post_terms( $post->ID, 'locations', array('parent'=>0) ); ?>
                                                    <option value="<?php echo $post->ID; ?>" data-country="<?php
                                                    if ( $countries && !is_wp_error($countries) ) :
                                                        foreach ( $countries as $country ) :
                                                            echo $country->slug;
                                                        endforeach;
                                                    endif; ?>"><?php the_title(); ?></option>
=======
                                                'posts_per_page' => -1
                                            ) );
                                            if ( $query->have_posts() ) :
                                                $cnt = 1;
                                                while ( $query->have_posts() ) : $query->the_post(); ?>
                                                    <option value="<?php $cnt; ?>"><?php the_title(); ?></option>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                                                    <?php
                                                    $cnt++;
                                                endwhile;
                                            endif;
                                            wp_reset_query(); ?>
                                        </select>
                                        <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                                    </div>
                                </div>
                                <div class="booking-form-group times-group">
                                    <label for="checkin">When:</label>
                                    <div class="group-wrapper">
                                        <div class="input-wrapper">
                                            <input type="text" name="check-in" class="checkin" id="checkin" placeholder="Check in">
                                            <input type="text" name="check-out" class="checkout" id="checkout" placeholder="Check out">
                                        </div>
                                        <img class="arrow" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="booking-form-group">
                                    <label for="people">How Many:</label>
                                    <div class="select-wrapper">
                                        <select name="people" id="people">
                                            <option value="">Beds</option>
                                        </select>
                                        <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                                    </div>
                                </div>
                                <div class="booking-form-group">
                                    <button class="button" type="submit">Book Now</button>
                                </div>
                            </form>
                        </div>
                        <div class="grid-item half no-margin-riht booking-grid">
                            <div class="booking-carousel owl-carousel">
                                <?php
                                if ( have_rows('slider') ) :
                                    while ( have_rows('slider') ) : the_row();
                                        $image = get_sub_field('image'); ?>
                                        <div class="slide">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        </div>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'text_left_contact_form_right' ) : ?>
            <section class="online-enquiry bg-white" style="margin-top: -5rem; padding-top: 5rem">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                        <div class="grid-item half">
                            <?php
                            $form = get_sub_field('form_shortcode');
                            echo do_shortcode($form); ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'address_lookup_2_column_with_image' ):
            $icon = get_sub_field('icon');
            $link = get_sub_field('link');
            $image = get_sub_field('image'); ?>
            <section class="address-lookup bg-light-grey">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                        <div class="grid-item half no-padding no-margin-left">
                           <div class="address-comp">
                               <div class="address-info">
                                   <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                   <div class="address-content-wrapper">
                                        <h4><?php the_sub_field('right_heading'); ?></h4>
                                        <hr>
                                        <ul class="contact">
                                            <li><a href="tel:<?php the_sub_field('telephone'); ?>">T: <?php the_sub_field('telephone'); ?></a></li>
                                            <li><a href="mailto:<?php the_sub_field('e-mail'); ?>">E: <?php the_sub_field('e-mail'); ?></a></li>
                                        </ul>
                                        <div class="address">
                                             <?php
                                             the_sub_field('address'); ?>
                                        </div>
                                        <?php
                                        if ($link) : ?>
                                            <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                            <?php
                                        endif; ?>
                                   </div>
                               </div>
                               <div class="address-comp-img">
                                   <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'general_faqs_text_left_accordions_right' ) : ?>
            <section class="faq bg-white padding-top-large">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <p><?php the_sub_field('text'); ?>
                                <br><br>
                                <strong><?php the_sub_field('info'); ?></strong>
                            </p>
                            <div class="faq-tabs">
                                <button class="tab tab-active" type="button" data-list="general" name="button"><?php the_sub_field('general_button'); ?></button>
                                <button class="tab" type="button" data-list="group" name="button"><?php the_sub_field('group_button'); ?></button>
                            </div>
                        </div>
                        <div class="grid-item half">
                            <?php
                            if ( have_rows('general') ) :
                                $cnt = 0; ?>
                                <ul data-list="general" class="faq-list <?php the_sub_field('general_button'); ?>">
                                    <?php
                                    while ( have_rows('general') ) : the_row(); ?>
                                        <li class="title" data-target="description-<?php echo $cnt; ?>"><?php the_sub_field('heading'); ?></li>
                                        <li class="description" data-attribute="description-<?php echo $cnt; ?>"><?php the_sub_field('description'); ?></li>
                                        <?php
                                        $cnt++;
                                    endwhile; ?>
                                </ul>
                                <?php
                            endif;
                            if ( have_rows('group') ) :
                                $cnt = 0; ?>
                                <ul data-list="group" class="faq-list inactive <?php the_sub_field('general_button'); ?>">
                                    <?php
                                    while ( have_rows('group') ) : the_row(); ?>
                                        <li class="title" data-target="group-description-<?php echo $cnt; ?>"><?php the_sub_field('heading'); ?></li>
                                        <li class="description" data-attribute="group-description-<?php echo $cnt; ?>"><?php the_sub_field('description'); ?></li>
                                        <?php
                                        $cnt++;
                                    endwhile; ?>
                                </ul>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'groups_text_left_two_images_right' ) :
            $front_image = get_sub_field('front_image');
            $back_image = get_sub_field('back_image'); ?>
            <section class="groups-intro">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half no-margin-right no-padding">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <?php the_sub_field('text') ?>
                        </div>
                        <div class="grid-item half">
                            <div class="image-composition comp-reverse comp-right">
                                <img class="comp-main" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                                <img class="comp-under" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'reasons_to_book_with_us_text_left_list_right' ) : ?>
            <section class="book-reasons bg-white">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half no-margin-right no-padding">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <div>
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>
                        <div class="grid-item half">
                            <div class="reasons-icon-grid">
                                <?php
                                if ( have_rows('list') ) :
                                    while ( have_rows('list') ) : the_row();
                                        $icon = get_sub_field('icon'); ?>
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
                                    endwhile; ?>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'build_group_quote_online_image_left_text_right' ) :
            $image = get_sub_field('image');
            $link = get_sub_field('link'); ?>
            <section class="build-online-info bg-white padding-top-large padding-bottom-large">
                <div class="container">
                    <div class="row">
                        <div class="grid-item half">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                        <div class="grid-item half">
                            <h1 class="h1-med underline-yellow text-dark"><?php the_sub_field('heading'); ?></h1>
                            <p class="text-normal"><?php the_sub_field('text'); ?></p>
                            <?php
                            if ($link) : ?>
                                <div class="button-row button-row-normal">
                                    <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                </div>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                </div>
                <div class="inner-background">
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'featured_hostels' ):
            $link = get_sub_field('link');
            $post_objects = get_sub_field('hostels'); ?>
            <section class="featured-hostels padding-top-large bg-light-grey">
                <div class="container">
                    <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                    <div class="hostel-grid">
                        <?php
                        if( $post_objects ):
                            foreach( $post_objects as $post) : setup_postdata($post);
                                $thumbnail_id = get_post_thumbnail_id( $post->ID );
	                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                $locations = wp_get_post_terms( $post->ID, 'locations', array('parent' => 0) ); ?>
                                <div class="hostel">
                                    <div class="img-container">
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php echo $alt; ?>">
                                    </div>
                                    <div class="info-container">
                                        <div class="info-wrap">
                                            <p class="location"><?php foreach($locations as $location){echo $location->name;}?></p>
                                            <div class="name-row">
                                                <?php
                                                if ( have_rows('page_header') ) :
                                                    while ( have_rows('page_header') ) : the_row();
                                                        $icon = get_sub_field('icon'); ?>
                                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                        <?php
                                                    endwhile;
                                                endif; ?>
                                                <p><?php the_title(); ?></p>
                                                <p><?php the_field('card_text_under_title'); ?></p>
                                            </div>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="button">Book Now</a>
                                        <div class="features-row">
                                            <?php
                                            if ( have_rows('features') ) :
                                                while ( have_rows('features') ) : the_row();
                                                    $icon = get_sub_field('icon'); ?>
                                                    <div class="feature">
                                                        <div class="inner-feature">
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <p><?php the_sub_field('text'); ?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                endwhile;
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query(); ?>
                    </div>
                    <?php
                    if ($link) : ?>
                        <div class="button-row">
                            <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                        </div>
                        <?php
                    endif; ?>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'related_pages' ) :
            $post_objects = get_sub_field('pages'); ?>
            <section class="related-offers bg-white">
                <div class="container">
                    <div class="title-row">
                        <h4><?php the_sub_field('heading') ?></h4>
                    </div>
                    <div class="row cater-grid">
                        <?php
                        if( $post_objects ):
                            foreach( $post_objects as $post) : setup_postdata($post);
                                $background_image = get_field('background_image'); ?>
                                <a href="<?php the_permalink(); ?>" class="item">
                                    <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                    <div class="item-info-wrapper">
                                        <h3><?php
                                            if( is_home() ){
                                                single_post_title();
                                            } else {
                                                the_title();
                                            }
                                        ?></h3>
                                    </div>
                                </a>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query(); ?>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'related_offers' ) :
            $post_objects = get_sub_field('offers'); ?>
            <section class="related-offers bg-white">
                <div class="container">
                    <div class="title-row">
                        <h4><?php the_sub_field('heading'); ?></h4>
                    </div>
                    <div class="related-offers-row sub-offers">
                        <?php
                        if( $post_objects ):
                            foreach( $post_objects as $post) : setup_postdata($post);
                                $background_image = get_field('background_image'); ?>
                                <div class="offer">
                                    <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                    <div class="offer-info-wrap">
                                        <p class="date">Offer Ends: <?php the_sub_field('offer_end_date'); ?></p>
                                        <h3><?php the_title(); ?></h3>
                                        <p class="description"><?php the_sub_field('description'); ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="button button-offer-see">See Offer</a>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query(); ?>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'inspiration_posts' ) :
            $link = get_sub_field('link'); ?>
            <section class="inspiration">
                <div class="container">
                    <h1 class="underline-yellow">#<?php the_sub_field('heading'); ?></h1>
                    <div class="row inspiration-row">
                        <?php
                        $title = get_the_title();
                        $form = '[instagram-feed type=user showusers="safestayhostels" includewords="#madrid"]';
                        echo do_shortcode($form); ?>
                        <?php
                        /*
                        $locations = wp_get_post_terms( $page_id, 'locations', array('parent' => 0) );
                        if ( $locations && !is_wp_error( $locations ) ) :
                            $cnt = 0;
                            $test = false;
                            foreach ( $locations as $location ) :
                                $args = array(
                                    'taxonomy' => 'locations',
                                    'parent' => $location->term_id,
                                    'hide_empty' => false,
                                );
                                $cities = get_terms($args);
                                if ( $cities && !is_wp_error( $cities ) ) :
                                    foreach ( $cities as $city ) :
                                        $query = new WP_Query( array(
                                            'post_type' => 'post',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(array(
                                                'taxonomy' => 'locations',
                                                'field' => 'slug',
                                                'terms' => $city->slug
                                            ))
                                        ));
                                        if ( $query->have_posts() ) :
                                            while ( $query->have_posts() ) : $query->the_post();
                                                $cnt++;
                                                if ( $cnt > 6 ) :
                                                    break;
                                                endif;
                                                $hashtags = wp_get_post_terms( $post->ID, 'hashtags');
                                                if ( $cnt == 1 ) :
                                                    $class = "v-half";
                                                elseif ( $cnt == 3 ) :
                                                    $class = "full";
                                                elseif ( $cnt == 4 ) :
                                                    $class = "c-half";
                                                elseif ( $cnt == 6 ) :
                                                    $class = "h-half";
                                                endif;

                                                if ( $cnt == 1 OR $cnt == 3 ) : ?>
                                                    <div class="col-25">
                                                    <?php
                                                    $test = true;
                                                elseif ( $cnt == 4 ) : ?>
                                                    <div class="col-5">
                                                    <?php
                                                    $test = true;
                                                endif;
                                                ?>
                                                <a href="<?php the_permalink(); ?>" class="inspiration-item <?php echo $class; ?>">
                                                    <div class="inner">
                                                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                                        <div class="overlay">
                                                            <span class="inspr-tag">#<?php foreach( $hashtags as $hastag ) { echo $hastag->name; }?></span>
                                                            <h5><?php the_title(); ?></h5>
                                                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/go-icon.png" alt="" class="go-icon">
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php
                                                if ( $cnt == 2 OR $cnt == 3 OR $cnt == 6 ) : ?>
                                                    </div>
                                                    <?php
                                                    $test = false;
                                                endif;
                                            endwhile;
                                        endif;
                                    endforeach;
                                endif;
                            endforeach;
                            if ($test) : ?>
                                </div>
                                <?php
                            endif;
                        endif;
                        wp_reset_query(); ?>
                    </div>
                    <?php
                    if ($link) : ?>
                        <div class="load-more-row">
                            <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                        </div>
                        <?php
                    endif;*/ ?>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'the_explorer_posts' ) : ?>
            <section class="expore explorer">
                <div class="container">
                    <div class="row owl-carousel single-hostels-carousel">
                        <?php
                        $main_heading = get_sub_field('heading');
                        $main_desc = get_sub_field('description');
                        /*
                        $locations = wp_get_post_terms( $page_id, 'locations' );
                        if ( $locations && !is_wp_error($locations) ) :
                            foreach ( $locations as $location ) :
                                if ( $post->post_name == $location->slug ) :
                                */
                                    $cnt = 0;
                                    $query = new WP_Query( array(
                                        'post_type' => 'post',
                                        'posts_per_page' => -1,
                                        /*
                                        'tax_query' => array( array(
                                            'taxonomy' => 'locations',
                                            'field' => 'slug',
                                            'terms' => $location->slug,
                                        )),
                                        */
                                    ));
                                    if ( $query->have_posts() ) :
                                        while ( $query->have_posts() ) : $query->the_post();
                                            $content = get_the_content();
                                            $excerpt = wp_trim_words($content, 20);
                                            $hastags = wp_get_post_terms($post->ID,'hastags');
                                            if ( $cnt == 0 ) : ?>
                                                <div class="explore-vertical-stack large">
                                                    <div class="explore-vertical-25">
                                                        <div class="explore-horizontal-55">
                                                            <h1 class="underline-yellow"><?php echo $main_heading; ?></h1>
                                                            <p class="title-lead"><?php echo $main_desc; ?></p>
                                                        </div>
                                                        <div class="explore-horizontal-45 hastag">
                                                            <span>#Safestay<?php echo $main_title; ?></span>
                                                        </div>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="explore-vertical-75">
                                                        <div class="featured-tour" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')">
                                                            <span>Featured tour!</span>
                                                            <div class="tour-info">
                                                                <h5><?php the_title(); ?></h5>
                                                                <p><?php echo $excerpt; ?></p>
                                                            </div>
                                                            <div class="plus-icon">
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/plus-icon.png" alt="">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                            endif;
                                            if ( $cnt !== 0 ) :
                                                $test = false;
                                                if ( $cnt % 2 !== 0 ) : ?>
                                                    <div class="explore-vertical-stack small">
                                                    <?php
                                                    $test = true;
                                                endif; ?>
                                                <a href="<?php the_permalink(); ?>" class="explore-vertical-50">
                                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                                    <span class="bg-<?php foreach ($hastags as $hastag) { echo $hastag->slug; } ?>"><?php foreach ($types as $type) { echo $type->name; } ?></span>
                                                </a>
                                                <?php
                                                if (  $cnt % 2 == 0 ) :
                                                    $test = 0; ?>
                                                    </div>
                                                    <?php
                                                endif;
                                            endif;
                                            $cnt++;
                                        endwhile;
                                        if ($test) : ?>
                                            </div>
                                            <?php
                                        endif;
                                    endif;
                                    /*
                                endif;
                            endforeach;
                        endif;
                        */
                        wp_reset_query(); ?>
                    </div>
                    <div class="slider-controls"></div>
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
        elseif ( get_row_layout() == 'information_list_and_button' ) :
            $link = get_sub_field('link');
            ?>
            <section class="handy-info bg-light-grey padding-top-large padding-bottom-large">
                <div class="container">
                    <div class="row">
                        <h1 class="h1-med text-dark underline-yellow"><?php the_sub_field('heading'); ?></h1>
                    </div>
                    <div class="row">
                        <?php
                        if ( have_rows('list') ) :
                            while ( have_rows('list') ) : the_row(); ?>
                                <div class="grid-item third no-padding">
                                    <h2 class="h2-med text-dark"><?php the_sub_field('heading'); ?></h2>
                                    <p class="text-normal"><?php the_sub_field('text'); ?></p>
                                </div>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                    <div class="button-row button-row-normal pad-top centralize">
                        <?php
                        if ($link) : ?>
                            <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                            <?php
                        endif; ?>
                    </div>
                </div>
            </section>
            <?php
        elseif ( get_row_layout() == 'team_members_block' ) : ?>
            <section class="team">
                <div class="container">
                    <div class="header">
                        <h3><?php the_sub_field('heading'); ?></h3>
                    </div>
                    <?php
                    if ( have_rows('team_members','option') ) : ?>
                        <div class="members">
                            <?php
                            while ( have_rows('team_members','option') ) : the_row();
                                $image = get_sub_field('image'); ?>
                                <div class="member">
                                    <div class="member-inner">
                                        <div class="top-segment">
                                            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>">
                                            <div class="content">
                                                <p class="name"><?php the_sub_field('name'); ?></p>
                                                <p class="prof"><?php the_sub_field('proffesion'); ?></p>
                                            </div>
                                            <div class="hover">
                                                <a class="button button-reverse" href="mailto:<?php the_sub_field('e-mail'); ?>">
                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/noun_1725097_cc-copy.png" alt="">
                                                </a>
                                                <a class="button" href="tel:<?php the_sub_field('number'); ?>">
                                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/07/noun_1206928_cc-copy.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="bottom-segment">
                                            <span>Languages spoken</span>
                                            <div class="languages">
                                                <?php
                                                if ( have_rows('languages') ) :
                                                    while ( have_rows('languages') ) : the_row();
                                                        $image = get_sub_field('language'); ?>
                                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
                                                        <?php
                                                    endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile; ?>
                        </div>
                        <?php
                    endif; ?>
                </div>
            </section>
            <?php
        endif;
    endwhile;
endif;
?>
