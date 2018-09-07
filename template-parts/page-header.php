<?php
$object = get_queried_object();
$header_class = "";
$info_class = 'header-info';
$bg_url = get_field('background_image',$object);
if (is_page_template('template-location.php') OR is_page_template('template-rooms.php')) {
    $header_class = "location-header header-madrid";
}
if ( is_front_page() ) {
    $header_class = "header-slider";
    $info_class = "homepage-header";
}
if ( is_singular('post') OR is_page_template('template-about.php') OR is_singular('offers') ){
    $header_class = "header-explorer";
} ?>
<header class="<?php echo $header_class ?>">
    <div class="nav-background"></div>
    <div class="header-img">
        <img src="<?php echo $bg_url; ?>" alt="">
    </div>
    <nav class="safestay-nav">
        <div class="container">
            <div class="nav-inner">
                <div class="logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php
                        $logo = get_field('logo','option'); ?>
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </a>
                </div>
                <div class="link locations-open-toggle">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/map_marker_icon.png" alt="">
                    <a href="#">Locations</a>
                </div>
                <div class="link groups-open-toggle">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/08/group_icon.svg" alt="">
                    <a href="#">Groups</a>
                </div>
            </div>
        </div>
        <div class="nav-right">
            <div class="nav-toggle toggle-language">
                <a href="#">English<img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/chevron-down.png" alt=""></a>
            </div>
            <a href="/book-now" class="nav-toggle toggle-calendar">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/calendar-icon.png" alt="">
            </a>
            <div class="nav-toggle toggle-navigation">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/nav-toggle.png" alt="">
            </div>
        </div>
    </nav>
    <div class="<?php echo $info_class; ?>">
        <?php
        if ( is_front_page() ) {
            if ( have_rows('banner_slider') ) : ?>
                <div class="header-carousel owl-carousel">
                    <?php
                    while ( have_rows('banner_slider') ) : the_row();
                        $button = get_sub_field('link');
                        $image  = get_sub_field('image'); ?>
                        <div class="slide">
                            <img class="background" src="<?php echo $image['url']; ?>" alt="<?php $image['alt']; ?>">
                            <div class="container">
                                <div class="content">
                                    <h1><?php the_sub_field('heading'); ?></h1>
                                    <h2><?php the_sub_field('subheading'); ?></h2>
                                    <a href="<?php echo $button['url']; ?>" class="button locations-open-toggle"><?php echo $button['title']; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile; ?>
                </div>
                <?php
            endif; ?>
            <div class="carousel-controls">
<<<<<<< HEAD
=======
                <div class="container">
                    <div class="slider-page-info">
                    </div>
                    <div class="slider-toggles">
                    </div>
                </div>
            </div>
            <?php
        } elseif (is_page_template('template-contact.php')) {
            ?>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                <div class="container">
                    <div class="slider-page-info">
                    </div>
                    <div class="slider-toggles">
                    </div>
                </div>
            </div>
            <?php
        } elseif (is_page_template('template-contact.php')) {
            if ( have_rows('page_header') ) :
                while ( have_rows('page_header') ) : the_row();
                    $icon = get_sub_field('icon'); ?>
                    <div class="container">
                        <?php
                        if ( $icon ) : ?>
                            <div class="location-icon">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                            </div>
                            <?php
                        endif; ?>
                        <h1>Get in <br> touch with us</h1>
                    </div>
                    <?php
                endwhile;
            endif;
        } elseif ( is_page_template('template-food-drinks.php') OR is_singular('food_drinks') ) {
            if ( have_rows('page_header') ) :
                while ( have_rows('page_header') ) : the_row(); ?>
                    <div class="header-info">
                        <div class="container">
                            <h1><span class="h1-small"><?php echo get_sub_field('upper_heading') ?></span><br>Safestay<?php the_title() ?><br></h1>
                            <p class="header-text">Discover what food and beverages we offer at <?php the_title() ?> Safestay. From breakfast to<br>dinner, we've got something for everyone! If you have any questions feel free to<br>contact us.</p>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
        } elseif ( is_page_template('template-groups.php') OR is_tax('locations') ) {
            if ( have_rows('page_header',$object) ) :
                while ( have_rows('page_header',$object) ) : the_row();
                    $icon = get_sub_field('icon'); ?>
                    <div class="container">
                        <?php
                        if ( $icon ) : ?>
                            <div class="location-icon">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                            </div>
                            <?php
                        endif; ?>
                        <h1><?php
                            if( get_sub_field('upper_heading') ){?>
                                <span class="h1-small"><?php the_sub_field('upper_heading'); ?></span><br>
                                <?php
                            }
                            if ( is_tax('locations') ) {
                                the_field('heading',$object);
                            } else {
                                the_title();
                            }
                        ?></h1>
                        <div class="country-select-wrapper">
                            <div class="country-select">
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/world_icon.png" alt="World icon">
                                <span>Where would you like to go?</span>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="country-list">
                                <div class="country-header">
                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/location-icon.png" alt="">
                                    <p>Choose from any of our global destinations</p>
                                </div>
                                <div class="countries">
                                    <?php
                                    $args = array(
                                        'taxonomy' => 'locations',
                                        'parent' => 0,
                                        'hide_empty' => false,
                                    );
                                    $terms = get_terms($args);
                                    if ( $terms && !is_wp_error( $terms ) ) :
                                        $i = 1;
                                        foreach ( $terms as $term ) :
                                            $flag = get_field('flag',$term); ?>
                                            <button type="button" name="button" class="name" data-target="<?php echo $term->slug; ?>">
                                                <div class="inner-name">
                                                    <img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>">
                                                    <span><?php echo $term->name; ?></span> All destinations <i class="fa fa-chevron-down"></i>
                                                </div>
                                            </button>
                                            <div class="country" data-toggle="<?php echo $term->slug; ?>">
                                                <?php
                                                $args = array(
                                                    'taxonomy' => 'locations',
                                                    'parent' => $term->term_id,
                                                    'hide_empty' => false,
                                                );
                                                $terms = get_terms($args);
                                                if ( $terms && !is_wp_error( $terms ) ) :
                                                    foreach ( $terms as $term ) : ?>
                                                        <a href="<?php echo get_term_link( $term ); ?>">
                                                            <?php
                                                            $query = new WP_Query( array(
                                                                'post_type' => 'hostel',
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'locations',
                                                                        'field' => 'slug',
                                                                        'terms' => $term->slug,
                                                                    )
                                                                )
                                                            ));
                                                            if ( $query->have_posts() ) :
                                                                while ( $query->have_posts() ) : $query->the_post(); ?>
                                                                    <div class="hostel">
                                                                        <img src="<?php echo site_url(); ?>/" alt="">
                                                                        <p><?php the_title(); ?></p>
                                                                        <p class="lead"><?php the_field('description_(group_bookings)'); ?></p>
                                                                    </div>
                                                                    <?php
                                                                endwhile;
                                                            endif;
                                                            wp_reset_query(); ?>
                                                        </a>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                wp_reset_query(); ?>
                                            </div>
                                            <?php
                                        endforeach;
                                    endif;
                                    wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
        } else {
            $page_id = get_the_id();
            if ( is_home() ){
                $page_id = get_option('page_for_posts');
            } elseif ( is_tax() ) {
                $page_id = get_queried_object();
            }
            if ( have_rows('page_header',$page_id) ) :
                while ( have_rows('page_header',$page_id) ) : the_row();
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon');
                    $link_icon = get_sub_field('link_icon');
                    $description = get_sub_field('description');
                    if (is_home() OR
                        is_singular('post') OR
                        is_page_template('template-food-drinks.php') OR
                        is_page_template('template-about.php') OR
                        is_page_template('template-offers.php')
                    ) {} else {
                        $class = "text-center";
                    } ?>
                    <div class="container <?php echo $class; ?>">
                        <?php
                        if ( $icon ) : ?>
                            <div class="location-icon">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                            </div>
                            <?php
                        endif; ?>
                        <h1><?php
                            if ( get_sub_field('upper_heading') ) { ?>
                                <span class="h1-small"><?php the_sub_field('upper_heading'); ?></span><br>
                                <?php
                            }
                            if ( is_home() ) {
                                echo str_replace(' | ', '<br />', single_post_title('',false));
                            } else if ( is_tax() ) {
                                single_term_title();
                            } else {
                                the_title();
                            }
                        ?></h1>
                        <?php
                        if ( $description ) : ?>
                            <div class="header-text sub-heading"><?php echo $description; ?></div>
                            <?php
                        endif;?>
                        <?php
                        if ( $link ) : ?>
                            <a href="<?php echo $link['url']; ?>" class="button button-icon gallery">
                                <?php
                                if($link_icon) :?>
                                    <img src="<?php echo $link_icon['url']; ?>" alt="<?php echo $link_icon['alt']; ?>">
                                    <?php
                                endif;?>
                                <span><?php echo $link['title']; ?></span>
                            </a>
                            <?php
                        endif;?>
                    </div>
                    <?php
                endwhile;
            endif;
        } ?>
    </div>
</header>
<div id="gallery-wrapper">
<<<<<<< HEAD
    <div class="hostel-gallery-wrapper">
        <div class="hostel-gallery owl-carousel">
            <?php
            $images = get_field('gallery');
            if( $images ):
                foreach( $images as $image ) : ?>
                    <div class="image">
                        <img class="carousel-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                    <?php
                endforeach;
            endif; ?>
        </div>
=======
    <div class="hostel-gallery owl-carousel">
        <?php
        $images = get_field('gallery');
        if( $images ):
            foreach( $images as $image ) : ?>
                <div class="image">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
                <?php
            endforeach;
        endif; ?>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
    </div>
    <div class="close-gallery-button">
        <div class="x"></div>
    </div>
</div>
