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
    if (is_front_page()) {
        $header_class = "header-slider";
    }
    if (is_singular('post') OR is_page_template('template-about.php') ){
        $header_class = "header-explorer";
    }
?>
<header class="<?php echo $header_class ?>" style="background-image: url('<?php echo $bg_url; ?>')">

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
                        $image  = get_sub_field('image'); ?>
                        <div class="header-slide">
                            <span class="bg-img-link" data-bg-img="<?php echo $image['url'] ?>"></span>
                            <h1><?php the_sub_field('heading'); ?></h1>
                            <h2><?php the_sub_field('subheading'); ?></h2>
                            <a href="<?php echo $button['url']; ?>" class="button locations-open-toggle"><?php echo $button['title']; ?></a>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
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
        } else {
            $page_id = get_the_id();
            if (is_home()){
                $page_id = get_option('page_for_posts');
            }
            if ( have_rows('page_header',$page_id) ) :
                while ( have_rows('page_header',$page_id) ) : the_row();
                    $link = get_sub_field('link',$page_id);
                    $icon = get_sub_field('icon',$page_id);
                    $link_icon = get_sub_field('link_icon',$page_id);
                    $description = get_sub_field('description',$page_id);
                    if (is_home() OR is_singular('post') OR is_page_template('template-food-drinks.php')) {} else {
                        $class = "text-center";
                    }
                    ?>
                    <div class="container <?php echo $class; ?>">
                        <?php
                        if ( $icon ) : ?>
                            <div class="location-icon">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                            </div>
                            <?php
                        endif; ?>
                        <h1><?php
                            if(get_sub_field('upper_heading')){?>
                                <span class="h1-small"><?php the_sub_field('upper_heading'); ?></span><br>
                                <?php
                            }
                            if(is_home()){
                                single_post_title();
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
                            <a href="<?php echo $link['url']; ?>" class="button button-icon">
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
        }?>
    </div>
</header>
