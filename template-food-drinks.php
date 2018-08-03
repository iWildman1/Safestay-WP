<?php
/**
 * This template is made for displaying food and drinks
 *
 * Template name: Food and Drinks
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
 */

get_header();
get_template_part('template-parts/page-header');
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
                                    $back_image = get_sub_field('back_image');
                                    ?>
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

                        <?php
                        if ( have_rows('offers') ) :
                            echo '<div class="row">';
                            $i = 0;
                            while ( have_rows('offers') ) : the_row();

                            if ($i % 4 == 0) {
                                echo '</div><div class="row">';
                            }
                                $image = get_sub_field('image');
                                ?>
                                <div class="item">
                                    <div class="image-box">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                    <div class="price-box bg-purple">
                                        <span class="price">£<?php the_sub_field('price'); ?></span>
                                    </div>
                                    <h5><?php the_sub_field('heading'); ?> - £<?php the_sub_field('price'); ?></h5>
                                </div>
                                <?php
                                $i++;
                            endwhile;
                            echo '</div>';
                        endif; ?>

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
                    <div class="grid-item half">
                        <?php
                        if ( have_rows('images') ) : ?>
                            <div class="image-composition comp-full-width">
                                <?php
                                while ( have_rows('images') ) : the_row();
                                    $front_image = get_sub_field('front_image');
                                    $back_image = get_sub_field('back_image');
                                    ?>
                                    <img src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>" class="comp-under">
                                    <img src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>" class="comp-main">
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
include('template-parts/flexible-content.php');
get_footer();
?>
