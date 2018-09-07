<?php
/**
 * Template Name: About Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
?>
<section class="explorer-blog about-template">
    <div class="container">
        <div class="row">
            <div class="grid-item two-thirds blog-post">
                <?php
                if ( have_rows('info') ) :
                    while ( have_rows('info') ) : the_row(); ?>
                        <div class="blog-header padding-bottom-0">
                            <p class="date"><?php echo get_the_date('d/m/Y'); ?></p>
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <div>
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;?>
            </div>
            <div class="grid-item third grid-booking-form ">
                <section class="book-now book-explorer bg-burgundy">
                    <div class="container container-fluid">
                        <div class="row page-row">
                            <div class="page-info-inner" >
                                <?php $menu_name = 'about-side'; ?>
                                <h4><?php echo get_menu_name($menu_name); ?></h4>
                                <?php wp_nav_menu( array( 'theme_location' => $menu_name ) ); ?>
                                <?php
                                if ( have_rows('info') ) :
                                    while ( have_rows('info') ) : the_row();
                                        $link = get_sub_field('link');
                                        ?>
                                        <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                        <?php
                                    endwhile;
                                endif;?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
