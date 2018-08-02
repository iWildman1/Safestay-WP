<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Safestay
 */
?>
<section class="email">
    <div class="container">
        <div class="row">
            <?php
            if ( have_rows('form','option') ) :
                while ( have_rows('form','option') ) : the_row();
                    ?>
                    <div class="grid-item half">
                        <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                        <p><?php the_sub_field('text'); ?></p>
                    </div>
                    <div class="grid-item half flex centralize">
                        <?php
                        $form = get_sub_field('form_shortcode');
                        echo do_shortcode($form);
                        ?>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
    <div class="footer-image-grid">
        <?php
        if ( have_rows('footer_images','option') ) :
            while( have_rows('footer_images','option') ) : the_row();
                $image = get_sub_field('image');
                ?>
                <div class="grid-item">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="grid-item half">
                <?php
                if ( have_rows('left_side','option') ) :
                    while ( have_rows('left_side','option') ) : the_row();
                        ?>
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
                endif;
                ?>
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
                <div class="copyright">
                    <p><?php echo the_field('copyright','option'); echo " "; echo date('Y'); ?></p>
                </div>
                <div class="copy-links">
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


<?php get_template_part('template-parts/locations-menu') ?>
<?php get_template_part('template-parts/main-menu') ?>
<?php get_template_part('template-parts/groups-menu') ?>

<?php wp_footer(); ?>

</body>
</html>
