<?php
/**
 * This is template for dysplaing single Offers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
 */
get_header();
include('template-parts/page-header.php');
?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <section class="explorer-blog">
            <div class="container">
                <div class="row">
                    <div class="grid-item two-thirds blog-post">
                        <div class="blog-header padding-bottom-0">
                            <?php
                            if ( have_rows('offer') ) :
                                while ( have_rows('offer') ) : the_row();
                                    $image = get_sub_field('image');
                                    ?>
                                    <p class="date"><?php echo get_the_date('d/m/Y'); ?></p>
                                    <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                                    <p class="lead"><?php the_sub_field('description'); ?></p>
                                    <div>
                                        <?php the_content(); ?>
                                    </div>

                                    <div class="image-container ignore-padding">
                                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/850C8959.png" alt="">
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </div>

                    </div>
                    <div class="grid-item third grid-booking-form">
                        <div class="booking-toggles">
                            <div class="booking-toggle toggle-active" data-offer-target="info">
                                <?php
                                if ( have_rows('offer_information') ) :
                                    while ( have_rows('offer_information') ) : the_row();
                                        ?>
                                        <span><?php the_sub_field('heading'); ?></span>
                                        <?php
                                    endwhile;
                                endif; ?>
                            </div>
                            <div class="booking-toggle" data-offer-target="terms">
                                <?php
                                if ( have_rows('terms_&_conditions') ) :
                                    while ( have_rows('terms_&_conditions') ) : the_row();
                                        ?>
                                        <span><?php the_sub_field('heading'); ?></span>
                                        <?php
                                    endwhile;
                                endif; ?>
                            </div>
                        </div>
                        <section class="book-now book-explorer">
                            <div class="container container-fluid">
                                <div class="row">
                                    <div class="offer-info-inner" data-offer-type="info">
                                        <?php
                                        if ( have_rows('offer_information') ) :
                                            while ( have_rows('offer_information') ) : the_row();
                                                $link = get_sub_field('link');
                                                if ( have_rows('offer_inner') ) :
                                                    while ( have_rows('offer_inner') ) : the_row();
                                                        $offer_code = get_sub_field('offer_code');
                                                        if (!$offer_code){
                                                            $offer_code = "No code needed";
                                                        }
                                                        ?>
                                                        <h4><?php the_sub_field('heading'); ?></h4>
                                                        <span class="code-box"><?php echo $offer_code; ?></span>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                if ( have_rows('info') ) :
                                                    while ( have_rows('info') ) : the_row();?>
                                                        <h5><?php the_sub_field('heading'); ?></h5>
                                                        <p class="text-normal"><?php the_sub_field('text'); ?></p>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                                <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                    <div class="offer-info-inner offer-info-inactive" data-offer-type="terms">
                                        <?php
                                        if ( have_rows('terms_&_conditions') ) :
                                            while ( have_rows('terms_&_conditions') ) : the_row();
                                                $link = get_sub_field('link');
                                                ?>
                                                <h4><?php the_sub_field('heading'); ?></h4>
                                                <?php
                                                if ( have_rows('list') ) :
                                                    ?>
                                                    <ul class="text-normal">
                                                        <?php
                                                        while ( have_rows('list') ) : the_row();
                                                            ?>
                                                            <li><?php the_sub_field('text') ?></li>
                                                            <?php
                                                        endwhile; ?>
                                                    </ul>
                                                    <?php
                                                endif; ?>
                                                <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include('template-parts/flexible-content.php');
        endwhile;
    endif;
get_footer();
?>
