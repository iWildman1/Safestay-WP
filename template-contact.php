<?php
/**
 * Template Name: Contact Template
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
<section class="quick-links">
    <div class="container">
        <div class="row">
            <?php
            if( have_rows('quick_contact_block') ) :
                while( have_rows('quick_contact_block') ) : the_row(); ?>
                    <div class="quick-links-title">
                        <h1><?php the_sub_field('heading'); ?></h1>
                    </div>
                    <div class="quick-links-grid">
                        <?php
                        if( have_rows('quick_contacts') ) :
                            while( have_rows('quick_contacts') ) : the_row();
                                $type = get_sub_field('description');
                                $icon = get_sub_field('icon'); ?>
                                <div class="link-item">
                                    <div class="icon">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    </div>
                                    <h4><?php the_sub_field('heading'); ?></h4>
                                    <?php
                                    if ($type == 'text') {
                                        $description = get_sub_field('text'); ?>
                                        <p><?php echo $description; ?></p>
                                        <?php
                                    } elseif ($type == 'e-mail') {
                                        $description = get_sub_field('e-mail'); ?>
                                        <p><a href="mailto:<?php echo $description; ?>"><?php echo $description; ?></a></p>
                                        <?php
                                    } elseif ($type == 'telephone') {
                                        $description = get_sub_field('telephone'); ?>
                                        <p><a href="tel:<?php echo $description; ?>">T: <?php echo $description; ?></a></p>
                                        <?php
                                    } ?>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
