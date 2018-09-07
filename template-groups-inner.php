<?php
/**
 * Template Name: Group Bookings Inner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
get_template_part('template-parts/contact-us-section');

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
endif; ?>
<section class="scrolling-banner sb-white padded-large">
    <h1 class="banner-item">Licensed bar.</h1>
    <h1 class="banner-item">Laundry room.</h1>
    <h1 class="banner-item">Full cctv coverage.</h1>
    <h1 class="banner-item">Key-card security system.</h1>
</section>
<?php
get_footer();
?>
