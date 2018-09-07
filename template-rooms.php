<?php
/**
 * Template Name: Our roms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
?>
<section class="booking-form">
    <div class="container">
        <?php
        get_template_part('template-parts/booking-form'); ?>
    </div>
</section>

<?php
if ( have_rows('facilities') ) :
    while ( have_rows('facilities') ) : the_row();
        ?>
        <section class="book-reasons bg-white push-margin-up padding-top-xlarge padding-bottom-large">
            <div class="container">
                <div class="row standard-two-row">
                    <div class="grid-item half no-margin-right no-padding">
                        <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                        <div>
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                    <div class="grid-item half">
                        <div class="reasons-icon-grid">
                            <div class="icon-row">
                                <?php
                                if ( have_rows('items') ) :
                                    $i = 0;
                                    while ( have_rows('items') ) : the_row();
                                        if ($i % 3 == 0) {
                                            echo '</div><div class="icon-row">';
                                        }
                                        $icon = get_sub_field('icon'); ?>
                                        <div class="icon-item">
                                            <div class="item-wrapper">
                                                <div class="img-wrapper">
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                </div>
                                                <p><?php the_sub_field('text'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<?php
get_footer();
?>
