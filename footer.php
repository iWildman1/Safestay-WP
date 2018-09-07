<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Safestay
**/
if ( have_rows('instagram','option') ) :
    while ( have_rows('instagram','option') ) : the_row();
        $token = get_sub_field('token');
        $user = get_sub_field('user');
        //locationsIG($token,$user);
    endwhile;
endif;
get_template_part('template-parts/flexible-content');
if ( have_rows('safestay_membership','option') ) :
    while ( have_rows('safestay_membership','option') ) : the_row();
        $link = get_sub_field('link');
        $back_image = get_sub_field('back_image');
        $front_image = get_sub_field('front_image'); ?>
        <section class="membership">
            <div class="container container-fluid">
                <div class="row">
                    <div class="grid-item half push-in-left flex centralize">
                        <div class="membership-text">
                            <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                            <p><?php the_sub_field('text'); ?></p>
                            <?php
                            if ( have_rows('list') ) :
                                while ( have_rows('list') ) : the_row();
                                    $icon = get_sub_field('icon'); ?>
                                    <div class="item">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                        <p><?php the_sub_field('text'); ?></p>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            if ($link) : ?>
                                <a href="<?php echo $link['url']; ?>" class="button button-dark"><?php echo $link['title']; ?></a>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                    <div class="grid-item half no-margin-right no-padding">
                        <div class="image-composition-2">
                            <img class="comp-main" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                            <img class="comp-overhang" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="grid-item half">
                <?php
                if ( have_rows('left_side','option') ) :
                    while ( have_rows('left_side','option') ) : the_row(); ?>
                        <p class="upper-title"><?php the_sub_field('upper_heading'); ?></p>
                        <h1><?php the_sub_field('heading'); ?></h1>
                        <p class="lower-title"><?php the_sub_field('lower_heading'); ?></p>
                        <ul>
                            <li><strong>T: </strong><a href="tel:<?php the_sub_field('telephone'); ?>"><?php the_sub_field('telephone'); ?></a></li>
                            <li><strong>E: </strong><a href="mailto:<?php the_sub_field('e-mail'); ?>"><?php the_sub_field('e-mail'); ?></a></li>
                        </ul>
                        <?php
                        $button = get_sub_field('button');
                        ?>
                        <a href="<?php echo $button['url']; ?>" class="button"><?php echo $button['title']; ?></a>
                        <?php
                    endwhile;
                endif; ?>
            </div>
            <div class="grid-item half flex centralize">
                <div class="footer-nav">
                    <div class="footer-nav-item">
                        <?php $menu_name = 'footer-left'; ?>
                        <h5><?php echo get_menu_name($menu_name); ?></h5>
                        <?php wp_nav_menu( array( 'theme_location' => $menu_name ) ); ?>
                    </div>
                    <div class="footer-nav-item">
                        <?php $menu_name = 'footer-middle'; ?>
                        <h5><?php echo get_menu_name($menu_name); ?></h5>
                        <?php wp_nav_menu( array( 'theme_location' => $menu_name ) ); ?>
                    </div>
                    <div class="footer-nav-item">
                        <?php $menu_name = 'footer-right'; ?>
                        <h5><?php echo get_menu_name($menu_name); ?></h5>
                        <?php wp_nav_menu( array( 'theme_location' => $menu_name ) ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="copyright-row">
                <div class="grid-item half copyright">
                    <p><?php echo the_field('copyright','option'); echo " "; echo date('Y'); ?></p>
                </div>
                <div class="grid-item half copy-links">
                    <ul>
                        <li>
                            <?php $link = get_field('left_page','option'); ?>
                            <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                        </li>
                        <li>
                            <?php $link = get_field('right_page','option'); ?>
                            <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
get_template_part('template-parts/locations-menu');
get_template_part('template-parts/main-menu');
get_template_part('template-parts/groups-menu');
wp_footer(); ?>
</body>
</html>
