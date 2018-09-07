<section class="explore-locations">
    <div class="container">
        <div class="explore-controls-carousel owl-carousel">
            <?php
            $args = array(
                'taxonomy' => 'locations',
                'hide_empty' => false,
<<<<<<< HEAD
                'parent' => 0,
=======
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
            );
            $terms = get_terms($args);
            if ( $terms && !is_wp_error( $terms ) ) :
                $i = 1;
                foreach ( $terms as $term ) : ?>
                    <a href="#<?php echo $i; ?>-item" data-hash="<?php echo $i; ?>-item">
                        <h3 class="banner-item text-color-<?php echo $term->slug ?>" data-target-country="<?php echo $term->name ?>"><?php echo $term->name; ?>.</h3>
                    </a>
                    <?php
                    $i++;
                endforeach;
            endif;
            wp_reset_query(); ?>
        </div>
    </div>
</section>
<section class="expore">
    <?php
    $args = array(
        'taxonomy' => 'locations',
        'hide_empty' => false,
<<<<<<< HEAD
        'parent' => 0,
=======
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
    );
    $terms = get_terms($args);
    if ( $terms && !is_wp_error( $terms ) ) :
        foreach ( $terms as $term ) : ?>
            <div class="container" data-country="<?php echo $term->name; ?>">
                <div class="row" style="height: 34rem">
<<<<<<< HEAD
                    <div class="country grid-30 flex centralize">
                        <div class="col-inner bg-<?php echo $term->slug; ?>">
                            <div class="center">
                                <h3><?php echo $term->name; ?>.</h3>
                                <p><?php echo $term->description; ?></p>
                            </div>
=======
                    <div class="grid-item grid-30 bg-<?php echo $term->slug; ?> flex centralize">
                        <div class="col-inner">
                            <h1><?php echo $term->name; ?></h1>
                            <p><?php echo $term->description; ?></p>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                        </div>
                    </div>
                    <?php
                    $query = new WP_Query( array(
                        'post_type' => 'hostel',
                        'posts_per_page' => 1,
<<<<<<< HEAD
                        'tax_query' => array( array(
                            'taxonomy' => 'locations',
                            'field' => 'slug',
                            'terms' => $term->slug
                        )),
                    ));
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="grid-item third flex centralize">
                                <div class="inner">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                    <h3 class="underline <?php echo $term->slug; ?>"><?php the_title(); ?></h3>
                                </div>
=======
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'locations',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                )
                            )
                        )
                    );
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="grid-item third flex centralize">
                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                <h3 class="underline-<?php echo $term->slug; ?>"><?php the_title(); ?></h3>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                            </a>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query(); ?>
<<<<<<< HEAD
                    <div class="grid-366 vertical-split offers-wrapper">
                        <?php
                        if ( have_rows('additional',$term) ) :
                            while ( have_rows('additional',$term) ) : the_row();
                                $link = get_sub_field('link'); ?>
                                <div class="vertical-half offers">
                                    <a href="<?php echo $link['url']; ?>">
                                        <?php
                                        if ( have_rows('icons') ) :
                                            while ( have_rows('icons') ) : the_row();
                                                $dark = get_sub_field('dark');
                                                $light = get_sub_field('light'); ?>
                                                <img class="dark" src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>">
                                                <img class="light" src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>">
                                                <?php
                                            endwhile;
                                        endif; ?>
=======
                    <div class="grid-item grid-375 vertical-split no-padding">
                        <?php
                        if ( have_rows('additional',$term) ) :
                            while ( have_rows('additional',$term) ) : the_row();
                                $icon = get_sub_field('icon');
                                $link = get_sub_field('link'); ?>
                                <div class="vertical-half offers">
                                    <a href="<?php echo $link['url']; ?>">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                                        <span><?php echo $link['title']; ?></span>
                                    </a>
                                    <span class="arrow"><i class="fa fa-arrow-right"></i></span>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
                <?php
                $query = new WP_Query( array(
                    'post_type' => 'hostel',
<<<<<<< HEAD
                    'tax_query' => array( array(
                        'taxonomy' => 'locations',
                        'field' => 'slug',
                        'terms' => $term->slug,
                    )),
                ));
                if ( $query->have_posts() ) :
                    $i = 0; ?>
                    <div class="slider-wrapper">
                        <div class="row explore-carousel owl-carousel">
                            <?php
                            while ( $query->have_posts() ) : $query->the_post();
                                if  ($i != 0 ) : ?>
                                    <a href="<?php the_permalink(); ?>" class="grid-item flex centralize <?php echo get_field('size_in_slider'); ?>">
                                        <div class="inner">
                                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                            <h3 class="underline <?php echo $term->slug; ?>"><?php the_title(); ?></h3>
                                        </div>
=======
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'locations',
                            'field' => 'slug',
                            'terms' => $term->slug
                        )
                    )
                ) );
                if ( $query->have_posts() ) :
                    $i = 0; ?>
                    <div class="slider-wrapper">
                        <div class="row explore-carousel owl-carousel" style="height: 34rem">
                            <?php
                            while ( $query->have_posts() ) : $query->the_post();
                                if ($i !== 0) : ?>
                                    <a href="<?php the_permalink(); ?>" class="grid-item flex centralize <?php echo get_field('size_in_slider'); ?>">
                                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                        <h3 class="underline-<?php echo $term->slug; ?>"><?php the_title(); ?></h3>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                                    </a>
                                    <?php
                                endif;
                                $i++;
                            endwhile; ?>
                        </div>
                    </div>
                    <div class="carousel-controls">
                    </div>
<<<<<<< HEAD
                    <?php
                    if  ($i > 1 ) : ?>
                        <div class="drag-info">
                            <div class="drag-img">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="Drag to explore">
                            </div>
                            <div class="drag-text">
                                <p>Drag to Explore</p>
                            </div>
                        </div>
                        <?php
                    endif;
                endif;
                wp_reset_query(); ?>
=======
                    <div class="drag-info">
                        <div class="drag-img">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="Drag to explore">
                        </div>
                        <div class="drag-text">
                            <p>Drag to Explore</p>
                        </div>
                    </div>
                    <?php
                endif; ?>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
            </div>
            <?php
        endforeach;
    endif;
    wp_reset_query(); ?>
</section>
