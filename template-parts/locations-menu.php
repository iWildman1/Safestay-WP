<div class="locations-overlay-1">
    <div class="top-segment">
        <div class="container">
            <div class="icon-row">
                <?php
                $small_logo = get_field('small_logo','option'); ?>
                <img src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt']; ?>">
                <img class="locations-close-toggle" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Group 30.png" alt="">
            </div>
            <h2 class="title">Our locations</h2>
            <section class="booking-form">
                <?php
                include('booking-form.php');
                ?>
            </section>
        </div>
    </div>
    <div class="bottom-segment">
        <div class="container">
            <div class="locations-list">
                <div class="locations-grid">
                    <?php
                    $args = array(
                        'taxonomy' => 'locations',
                        'hide_empty' => false,
                        'parent' => 0,
                    );
                    $terms = get_terms($args);
                    if ( $terms && !is_wp_error( $terms ) ) :
                        $i = 0;
                        foreach ( $terms as $term ) :
                            $is = 0;
                            if ($term->slug == 'united-kingdom') {
                                $country = 'uk';
                            } else if($term->slug == 'portugal') {
                                $country = 'portugal';
                            } else if($term->slug == 'spain') {
                                $country = 'spain';
                            } else if($term->slug == 'czech-republic') {
                                $country = 'czech';
                            } ?>
                            <div class="location-row">
                                <div class="place location-title-block">
                                    <div class="place-inner <?php echo $country; ?>">
                                        <div class="location-title-inner">
                                            <h2><?php echo $term->name; ?>.</h2>
                                            <p><?php echo $term->description; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $query = new WP_Query( array(
                                    'post_type' => 'hostel',
                                    'posts_per_page' => -1,
                                    'tax_query' => array( array(
                                        'taxonomy' => 'locations',
                                        'field' => 'slug',
                                        'terms' => $term->slug,
                                    )),
                                ));
                                if ( $query->have_posts() ) :
                                    while ( $query->have_posts() ) : $query->the_post(); ?>
                                        <div class="hostel place">
                                            <div class="place-inner">
                                                <div class="img-container">
                                                    <?php
                                                    $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
                                                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $alt; ?>">
                                                </div>
                                                <div class="info-container">
                                                    <div class="info-wrap">
                                                        <p class="location"><?php echo $term->name; ?></p>
                                                        <div class="name-row">
                                                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 13.png" alt="">
                                                            <p><?php the_title(); ?></p>
                                                        </div>
                                                        <p><?php the_field('card_text_under_title'); ?></p>
                                                        <a href="<?php the_permalink(); ?>" class="button book-now-featured">Book Now</a>
                                                    </div>
                                                    <div class="features-row">
                                                        <?php
                                                        if ( have_rows('features') ) :
                                                            while ( have_rows('features') ) : the_row();
                                                                $icon = get_sub_field('icon'); ?>
                                                                <div class="feature">
                                                                    <div class="inner-feature">
                                                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
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
                                        <?php
                                        $is++;
                                    endwhile;
                                    if ($is % 2 == 0) : ?>
                                        <div class="hostel place placehodlers">
                                            <div class="place-inner <?php echo $country; ?>">
                                                <div class="location-title-inner">
                                                    <div class="book-now-featured">
                                                        <span>#Safestay</span>
                                                    </div>
                                                    <h2>Share your stories and pictures with us</h2>
                                                </div>
                                            </div>
                                        </div>
                                      <?php
                                    endif;
                                endif; ?>
                            </div>
                            <?php
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
