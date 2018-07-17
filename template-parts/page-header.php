<?php
    $header_class = "";
    $bg_image = "background-image: url(" . get_bloginfo('stylesheet_directory') . "/dist/img/homepage-1.png";
    $bg_url = get_field('background_image');
    if ($bg_url) {
        $bg_image = "background-image: url(" . $bg_url . ")";
    }
    if (is_page_template('template-location.php')) {
        $header_class = "location-header header-madrid";
    }
    if (is_front_page() {
        $header_class = "header-slider"
    })
?>
<header class="<?php echo $header_class ?>">
    <?php
    if ( have_rows('slider') ) :
        while ( have_rows('slider') ) : the_row();
            $image = get_sub_field('image');
            ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <?php
        endwhile;
    endif;
    ?>
    <div class="nav-background">
        &nbsp;
    </div>
    <nav class="safestay-nav">
        <div class="container">
            <div class="nav-inner">
                <div class="logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php
                        $logo = get_field('logo','option');
                        ?>
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </a>
                </div>
                <div class="link locations-open-toggle">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/map_marker_icon.png" alt="">
                    <a href="#">Locations</a>
                </div>
                <div class="link">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/groups_icon.png" alt="">
                    <a href="/group-bookings">Groups</a>
                </div>
            </div>
        </div>
        <div class="nav-right">
            <div class="nav-toggle toggle-language">
                <a href="#">English<img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/chevron-down.png" alt=""></a>
            </div>
            <div class="nav-toggle toggle-calendar">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/calendar-icon.png" alt="">
            </div>
            <div class="nav-toggle toggle-navigation">
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/nav-toggle.png" alt="">
            </div>
        </div>
    </nav>
    <div class="header-info">
        <?php
        if (is_front_page()) { ?>
            <div class="container header-carousel">
                <?php
                if ( have_rows('banner_slider') ) :
                    while ( have_rows('banner_slider') ) : the_row();
                        $button = get_sub_field('link');
                        $image  = get_sub_field('image')
                        ?>
                        <div class="header-slide">
                            <span class="bg-img-link" data-bg-img="<?php echo $image['url'] ?>"></span>
                            <h1><?php the_sub_field('heading'); ?></h1>
                            <h2><?php the_sub_field('subheading'); ?></h2>

                            <a href="<?php echo $button['url']; ?>" class="button locations-open-toggle"><?php echo $button['title']; ?></a>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
                <div class="slider-toggles">
                    <span class="header-slider-left">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_left.png" alt="">
                    </span>
                    <span class="header-slider-right">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_right.png" alt="">
                    </span>
                </div>
                <div class="slider-page-info">
                    <p class="slide-count"><span class="header-current">01</span> / <span class="header-total"></span></p>
                </div>
            </div>
            <?php
        } else if (is_page_template('template-location.php')) { ?>
            <div class="container text-center">
                <div class="location-icon">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/madrid_icon.png" alt="">
                </div>
                <h1>Madrid</h1>
                <a href="#" class="button button-icon"><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/gallery_icon.png" /> View Gallery</a>
            </div>
            <?php
        } else if (is_page_template('template-groups.php')) { ?>
            <div class="container">
                <img class="header-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea.png" alt="">
                <h1>Group Bookings</h1>
                <div class="sub-heading">For more group info or to make a booking get in touch!</div>
                <a href="#" class="button button-groupbooking"><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/noun_1645750_cc.png" alt="">View Gallery</a>
            </div>
            <?php
        } else if (is_page_template('template-contact.php')) {?>
            <div class="container">
                <h1>Get in <br> touch with us</h1>
            </div>
            <?php
        } ?>
    </div>
</header>
