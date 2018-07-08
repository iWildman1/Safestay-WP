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


?>




<header style="<?php echo $bg_image ?>" class="<?php echo $header_class ?>">
            <nav class="safestay-nav">
                <div class="container">
                    <div class="nav-inner">
                        <div class="logo">
                            <a href="/">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/logo.png" alt="">
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
                        <a href="#">
                            English <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/chevron-down.png" alt="">
                        </a>
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
                    if (is_front_page()) {
                ?>
                    <div class="container">
                        <h1>Chic City Hostels</h1>
                        <h2>Across The Globe</h2>
                        <a href="#" class="button locations-open-toggle">See All Locations</a>
                        
                        
                        <div class="slider-toggles">
                            <span>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_left.png" alt="">
                            </span>
                            <span>
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_right.png" alt="">
                            </span>
                        </div>

                        <div class="slider-page-info">
                            <p class="slide-count">01 / 05</p>
                        </div>
                    </div>
                <?php } else if (is_page_template('template-location.php')) { ?>
                    <div class="container text-center">
                        <div class="location-icon">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/madrid_icon.png" alt="">
                        </div>
                        <h1>Madrid</h1>
                        <a href="#" class="button button-icon"><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/gallery_icon.png" /> View Gallery</a>
                    </div>
                <?php } else if (is_page_template('template-groups.php')) { ?>
                    <div class="container">
                        <img class="header-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea.png" alt="">
                        <h1>Group Bookings</h1>
                        <div class="sub-heading">For more group info or to make a booking get in touch!</div>
                        <a href="#" class="button button-groupbooking"><img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/noun_1645750_cc.png" alt="">View Gallery</a>
                    </div>
                <?php } else if (is_page_template('template-contact.php')) {?>
                    <div class="container">
                        <h1>Get in <br> touch with us</h1>
                    </div>
                <?php } ?>
            </div>
        </header>