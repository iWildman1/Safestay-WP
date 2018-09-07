<?php
/**
 * Template for Hostel rooms
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
$object = get_queried_object();
if ( have_rows('facilities',$object) ) :
    while ( have_rows('facilities',$object) ) : the_row(); ?>
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
                            <?php
                            if ( have_rows('items') ) :
                                while ( have_rows('items') ) : the_row();
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
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
<section class="our-rooms">
    <div class="container">
        <div class="header">
            <h3>Our rooms</h3>
        </div>
        <div class="select-types">
            <?php
            $query = new WP_Query( array(
                'post_type' => 'rooms',
                'posts_per_page' => -1,
                'tax_query' => array(array(
                    'taxonomy' => 'hostels',
                    'field' => 'slug',
                    'terms' => $object->slug,
                )),
            ));
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="select-type">
                        <?php
                        if ( have_rows('about_room_type') ) :
                            while ( have_rows('about_room_type') ) : the_row();
                                $icon = get_sub_field('icon'); ?>
                                <button type="button" name="button" class="inner-select-type" data-target="<?php echo $post->post_name; ?>" style="background-color: <?php the_sub_field('color'); ?>;">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    <p><?php the_title(); ?></p>
                                    <div class="arrow-down" style="border-top-color:<?php the_sub_field('color'); ?>"></div>
                                </button>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_query(); ?>
        </div>
        <div class="types">
            <?php
            $query = new WP_Query( array(
                'post_type' => 'rooms',
                'posts_per_page' => -1,
                'tax_query' => array(array(
                    'taxonomy' => 'hostels',
                    'field' => 'slug',
                    'terms' => $object->slug,
                )),
            ));
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="type" data-container="<?php echo $post->post_name; ?>">
                        <div class="col-33">
                            <div class="info">
                                <?php
                                if ( have_rows('about_room_type') ) :
                                    while ( have_rows('about_room_type') ) : the_row();
                                        $icon = get_sub_field('icon'); ?>
                                        <div class="icon">
                                            <div class="triangle" style="border-left-color: <?php the_sub_field('color'); ?>; border-top-color: <?php the_sub_field('color'); ?>;"></div>
                                            <?php
                                            if ( $icon ) : ?>
                                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                <?php
                                            endif; ?>
                                        </div>
                                        <p class="upper <?php echo $post->post_name; ?>"><?php the_sub_field('heading'); ?></p>
                                        <h5 class="underline-dark"><?php the_title(); ?></h5>
                                        <p><?php the_sub_field('description'); ?></p>
                                        <div class="advantages">
                                            <?php
                                            if ( have_rows('list') ) :
                                                while ( have_rows('list') ) : the_row();
                                                    $icon = get_sub_field('icon'); ?>
                                                    <div class="advantage">
                                                        <?php
                                                        if ( $icon ) : ?>
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <?php
                                                        endif; ?>
                                                        <p><?php the_sub_field('text'); ?></p>
                                                    </div>
                                                    <?php
                                                endwhile;
                                            endif; ?>
                                        </div>
                                        <a class="button" href="/book-now">Book now</a>
                                        <?php
                                endwhile;
                            endif; ?>
                            </div>
                        </div>
                        <div class="col-66">
                            <div class="rooms">
                                <div class="rooms-carousel owl-carousel">
                                    <?php
                                    if ( have_rows('rooms') ) :
                                        while ( have_rows('rooms') ) : the_row();
                                            $image = get_sub_field('image'); ?>
                                            <div class="room">
                                                <?php
                                                if ( $image ) : ?>
                                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                                    <?php
                                                endif; ?>
                                                <div class="heading">
                                                    <p><?php the_sub_field('heading'); ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif; ?>
        </div>
    </div>
</section>
<?php
if ( have_rows( 'handy_info',$object ) ) :
    while ( have_rows( 'handy_info',$object ) ) : the_row(); ?>
        <section class="handy-info">
            <div class="container">
                <div class="header">
                    <h3><?php the_sub_field('heading'); ?></h3>
                </div>
                <div class="items">
                    <?php
                    if ( have_rows('list') ) :
                        while ( have_rows('list') ) : the_row(); ?>
                            <div class="item">
                                <p class="heading"><?php the_sub_field('heading'); ?></p>
                                <p class="description"><?php the_sub_field('description'); ?></p>
                            </div>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
                <div class="handy-info-more">
                    <a class="button" href="/book-now">Book now</a>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
get_footer();
?>
