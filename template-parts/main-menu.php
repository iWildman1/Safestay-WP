<div class="main-menu">
    <div class="top-segment">
        <div class="container">
            <div class="icon-row">
                <?php
                $small_logo = get_field('small_logo','option'); ?>
                <img src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt']; ?>">

                <div class="links-segment">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    <img class="menu-close-toggle" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Group 30.png" alt="">
                </div>
            </div>
            <div class="location-select">
                <?php
                if ( have_rows('location_selector','option') ) :
                    while ( have_rows('location_selector','option') ) : the_row();
                        $heading = get_sub_field('heading');
                        $prefix = get_sub_field('prefix');
                    endwhile;
                endif; ?>
                <span><?php echo $heading; ?></span>
                <select name="locations" id="locations">
                    <?php
                    $args = array(
                        'taxonomy' => 'locations',
                        'hide_empty' => false,
                        'parent' => 0,
                    );
                    $terms = get_terms($args); // Get all terms of a taxonomy
                    if ( $terms && !is_wp_error( $terms ) ) :
                        foreach ( $terms as $term ) :
                            ?>
                            <option value="<?php echo $term->slug; ?>"><?php echo $prefix;?> <?php echo $term->name; ?></option>
                            <?php
                        endforeach;
                    endif;
                    wp_reset_query(); ?>
                </select>
                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/dropdown.png" alt="" class="loc-dropdown">
            </div>
            <div class="locations-carousel-group">
                <?php
                $args = array(
                    'taxonomy' => 'locations',
                    'hide_empty' => false,
                    'parent' => 0,
                );
                $terms = get_terms($args); // Get all terms of a taxonomy
                if ( $terms && !is_wp_error( $terms ) ) :
                    foreach ( $terms as $term ) : ?>
                        <div class="owl-carousel location-carousel" data-location="<?php echo $term->slug; ?>">
                            <?php
                            $query = new WP_Query( array(
                                'post_type' => 'hostel',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'locations',
                                        'field' => 'slug',
                                        'terms' => $term->slug
                                    )
                                )
                            ) );
                            if ( $query->have_posts() ) :
                                while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div class="location">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <span class="dash">- </span>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_query();?>
                        </div>
                        <?php
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="bottom-segment">
        <?php
        if ( have_rows('bottom_segment','option') ) :
            while ( have_rows('bottom_segment','option') ) : the_row();
                $image = get_sub_field('background_image');
                $link = get_sub_field('link');
                ?>
                <a href="<?php echo $link['url']; ?>" class="bottom-item">
                    <img class="bg-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    <div class="title">
                        <h2><?php echo $link['title']; ?></h2>
                        <i class="arrow fa fa-arrow-right"></i>
                    </div>
                </a>
                <?php
            endwhile;
        endif;
        ?>
    </div>

</div>
