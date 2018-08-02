<?php
/**
 *
 * Template Name: Group Bookings Template
 *
 */
get_header();
get_template_part('template-parts/page-header');
?>
<div class="container">
    <section class="contact-us-banner">
        <div class="contact-banner-inner">
            <?php
            if ( have_rows('contact_us') ) :
                while ( have_rows('contact_us') ) : the_row();
                    ?>
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
                        if ( have_rows('images') ) :
                            ?>
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
if (have_rows('cater_group')) :
    while(have_rows('cater_group')) : the_row();
    ?>

    <section class="cater-group">
    <div class="container">
        <div class="row">
            <div class="grid-item half">
                <h1 class="underline-yellow cater-header">We cater for <br> any groups!</h1>
            </div>
        </div>
        <div class="row cater-grid">
            <?php
                if ( have_rows('pages') ) :      
                    while( have_rows('pages') ) : the_row();
                        $post = get_sub_field('page');
                        ?>

                            <a href="<?php the_permalink() ?>" class="item">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                <div class="item-info-wrapper">
                                    <h3><?php echo get_the_title() ?></h3>
                                </div>
                            </a>

                        <?php
                        wp_reset_postdata();
                    endwhile;
                endif;
            ?>
           
        </div>
    </div>
    </section>

    <?php
    endwhile;
endif;
?>


<?php
if ( have_rows('meet_the_team') ) :
    while ( have_rows('meet_the_team') ) : the_row(); ?>
        <section class="meet-the-team bg-light-grey padding-top-large padding-bottom-xxlarge">
            <div class="container">
                <div class="row">
                    <h1 class="h1-med underline-yellow text-dark"><?php the_sub_field('heading'); ?></h1>
                </div>
                <div class="row team-grid">
                    <?php
                    if ( have_rows('members') ) :
                        while ( have_rows('members') ) : the_row();
                            $image = get_sub_field('image');
                            ?>
                            <div class="item">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <div class="item-info-wrapper">
                                    <p><strong><?php the_sub_field('name'); ?></strong><br><?php the_sub_field('profession'); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
include('template-parts/flexible-content.php');
?>
<section class="scrolling-banner padding-top-large">
    <?php
    $args = array(
        'taxonomy' => 'locations',
        'hide_empty' => false,
    );
    $terms = get_terms($args); // Get all terms of a taxonomy
    if ( $terms && !is_wp_error( $terms ) ) :
        $i = 0;
        foreach ( $terms as $term ) :
            if ( $i == 0 ) { ?>
                    <h1 class="banner-item active text-color-<?php echo $term->slug ?>" data-target-country="<?php echo $term->name ?>"><?php echo $term->name; ?>.</h1>
                <?php
            } else { ?>
                    <h1 class="banner-item text-color-<?php echo $term->slug ?>" data-target-country="<?php echo $term->name ?>"><?php echo $term->name; ?>.</h1>
                <?php
            }
            $i++;
        endforeach;
    endif;
    wp_reset_query(); ?>
</section>

<section class="expore">
    <?php
    get_template_part('template-parts/explore-spain');
    get_template_part('template-parts/explore-uk');
    get_template_part('template-parts/explore-czech');
    get_template_part('template-parts/explore-portugal');
    ?>
</section>
<?php
get_footer();
?>
