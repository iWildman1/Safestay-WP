<?php
$args = array(
    'taxonomy' => 'locations',
    'hide_empty' => false,
);
$terms = get_terms($args);
if ( $terms && !is_wp_error( $terms ) ) :
    $i = 0;
    foreach ( $terms as $term ) :
        if ( $term->slug == "portugal" ) {
            ?>
            <div class="container" data-country="Portugal">
                <div class="row">
                    <div class="grid-item grid-30 bg-portugal flex centralize">
                        <div class="col-inner">
                            <h1><?php echo $term->name ?></h1>
                            <p><?php echo $term->description ?></p>
                        </div>
                    </div>
                    <?php
                    $query = new WP_Query( array(
                        'post_type' => 'hostel',
                        'posts_per_page' => 1,
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
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="grid-item third bg-uk-image flex centralize" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
                                <h3 class="underline-green"><?php the_title() ?></h3>
                            </a>
                            <?php
                        endwhile;
                    endif;
                    ?>
                    <div class="grid-item grid-375 vertical-split no-padding">
                        <?php
                        if ( have_rows('additional',$term) ) :
                            while ( have_rows('additional',$term) ) : the_row();
                                $icon = get_sub_field('icon');
                                $link = get_sub_field('link');
                                ?>
                                <div class="vertical-half offers">
                                    <a href="<?php echo $link['url']; ?>"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"><?php echo $link['title']; ?></a>
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
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'locations',
                            'field' => 'slug',
                            'terms' => $term->slug
                        )
                    )
                ) );
                if ( $query->have_posts() && $query->found_posts > 1 ) :
                    $i = 0;
                    ?>
                    <div class="slider-wrapper">
                        <div class="row explore-carousel owl-carousel" style="height: 34rem">
                            <?php
                            while ( $query->have_posts() ) : $query->the_post();
                                if ($i !== 0) { ?>
                                    <a href="<?php the_permalink(); ?>" class="grid-item <?php echo get_field('size_in_slider') ?> bg-spain-image flex centralize">
                                        <img src="<?php the_post_thumbnail_url('large') ?>" alt="<?php the_title ?>">
                                        <h3 class="underline-green"><?php the_title() ?></h3>
                                    </a>
                                    <?php
                                }
                                $i++;
                            endwhile; ?>
                        </div>
                    </div>
                    <div class="carousel-controls">
                    </div>
                    <div class="drag-info">
                        <div class="drag-img">
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="">
                        </div>
                        <div class="drag-text">
                            <p>Drag to Explore</p>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            <?php
        }
        $i++;
    endforeach;
endif;
wp_reset_query();
?>
