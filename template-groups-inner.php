<?php
/**
 *
 * Template Name: Group Bookings Inner
 *
 */
get_header();
include('template-parts/page-header.php');
?>
<div class="container">
    <section class="contact-us-banner">
        <div class="contact-banner-inner">
            <?php
            if ( have_rows('contact_us') ) :
                while ( have_rows('contact_us') ) : the_row(); ?>
                    <div class="contact-banner-header">
                        <div class="contact-title-wrapper">
                            <h5><?php the_sub_field('upper_heading');?></h5>
                            <p class="contact-banner-title"><?php the_sub_field('heading'); ?></p>
                        </div>
                    </div>
                    <div class="contact-banner-sections">
                        <?php
                        if ( have_rows('fields') ) :
                            while ( have_rows('fields') ) : the_row();
                                $icon = get_sub_field('icon');
                                $type = get_sub_field('description');
                                ?>
                                <div class="contact-item">
                                    <div class="icon">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    </div>
                                    <h4><?php the_sub_field('heading'); ?></h4>
                                    <?php
                                    if ($type == 'text') {
                                        $description = get_sub_field('text'); ?>
                                        <p><?php echo $description; ?></p>
                                        <?php
                                    } elseif($type == 'e-mail'){
                                        $description = get_sub_field('e_mail'); ?>
                                        <p><a href="mailto:<?php echo $description; ?>"><?php echo $description; ?></a></p>
                                        <?php
                                    } elseif($type == 'telephone'){
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
    </section>
</div>

<?php
if ( have_rows('bring_on_the_groups') ) :
    while ( have_rows('bring_on_the_groups') ) : the_row(); ?>
        <section class="groups-intro">
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
                                    $back = get_sub_field('back');
                                    ?>
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
include('template-parts/flexible-content.php');
get_footer();
?>
