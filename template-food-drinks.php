<?php
/**
 * This template is made for displaying food and drinks
 *
 * Template name: Food and Drinks
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
$url = $wp->request;

if ( have_rows('food_and_beverage') ) :
    while ( have_rows('food_and_beverage') ) : the_row();?>
        <section class="about bg-light-grey">
            <div class="container">
                <div class="row">
                    <div class="grid-item half">
                        <?php
                        if ( have_rows('images') ) : ?>
                            <div class="image-composition comp-full-width">
                                <?php
                                while ( have_rows('images') ) : the_row();
                                    $front_image = get_sub_field('front_image');
                                    $back_image = get_sub_field('back_image'); ?>
                                    <img src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>" class="comp-under">
                                    <img src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>" class="comp-main">
                                    <?php
                                endwhile; ?>
                            </div>
                            <?php
                        endif; ?>
                    </div>
                    <div class="grid-item half flex centralize">
                        <div class="about-text-staggered text-margin-small">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <div class="text-main">
                                <?php the_sub_field('text'); ?>
                            </div>
                            <?php
                            if ( have_rows('buttons') ) : ?>
                                <div class="button-row button-row-normal">
                                    <?php
                                    while ( have_rows('buttons') ) : the_row();
                                        $left_button = get_sub_field('left_button');
                                        $right_button = get_sub_field('right_button');
                                        ?>
                                        <a href="<?php echo $left_button['url']; ?>" class="button"><?php echo $left_button['title']; ?></a>
                                        <a href="<?php echo $right_button['url']; ?>" class="button button-secondary"><?php echo $right_button['title']; ?></a>
                                        <?php
                                    endwhile; ?>
                                </div>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
if ( have_rows('food_and_bewarage_offers') ) :
    while ( have_rows('food_and_bewarage_offers') ) : the_row();?>
        <section class="current-food-offers">
            <div class="container">
                <div class="row">
                    <div class="grid-item half">
                        <h1 class="underline-yellow h1-med text-dark"><?php the_sub_field('heading'); ?></h1>
                        <p class="text-normal"><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
                <div class="price-grid">
                    <div class="row">
                    <?php
                    $food_drinks_hostel = ($_GET['food_drinks_hostel']);
                    if ( $food_drinks_hostel ) :
                        $query = new WP_Query( array(
                            'post_type' => 'food_drinks',
                            'posts_per_page' => -1,
                            'tax_query' => array(array(
                                'taxonomy' => 'hostels',
                                'field' => 'name',
                                'terms' => $food_drinks_hostel,
                            )),
                        ));
                    else :
                        $query = new WP_Query( array(
                            'post_type' => 'food_drinks',
                            'posts_per_page' => -1,
                        ));
                    endif;
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="item">
                                <div class="item-inner">
                                    <img class="image-box" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                    <div class="price-box bg-purple">
                                        <span class="price"><?php the_field('price'); ?></span>
                                    </div>
                                    <h5><?php the_title(); ?> - <?php the_field('price'); ?></h5>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query(); ?>
                    <div class="row center-row">
                        <p class="disclaimer"><?php the_sub_field('disclaimer'); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
if ( have_rows('the_bar') ) :
    while ( have_rows('the_bar') ) : the_row();?>
        <section class="groups-intro margin-top-med bg-light-grey padding-bottom-xlarge padding-top-large">
            <div class="container">
                <div class="row standard-two-row">
                    <div class="grid-item half no-margin-right no-padding">
                        <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                        <div>
                            <?php the_sub_field('text'); ?>
                        </div>
                        <?php
                        if ( have_rows('buttons') ) : ?>
                            <div class="button-row button-row-normal">
                                <?php
                                while ( have_rows('buttons') ) : the_row();
                                    $left_button = get_sub_field('left_button');
                                    $right_button = get_sub_field('right_button'); ?>
                                    <a href="<?php echo $left_button['url']; ?>" class="button"><?php echo $left_button['title']; ?></a>
                                    <a href="<?php echo $right_button['url']; ?>" class="button button-secondary"><?php echo $right_button['title']; ?></a>
                                    <?php
                                endwhile; ?>
                            </div>
                            <?php
                        endif; ?>
                    </div>
                    <div class="grid-item half">
                        <?php
                        if ( have_rows('images') ) : ?>
                            <div class="image-composition comp-full-width">
                                <?php
                                while ( have_rows('images') ) : the_row();
                                    $front_image = get_sub_field('front_image');
                                    $back_image = get_sub_field('back_image'); ?>
                                    <img src="<?php echo $front_image['sizes']['large']; ?>" alt="<?php echo $front_image['alt']; ?>" class="comp-under">
                                    <img src="<?php echo $back_image['sizes']['large']; ?>" alt="<?php echo $back_image['alt']; ?>" class="comp-main">
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
endif;
get_footer();
?>
