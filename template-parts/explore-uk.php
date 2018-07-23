<?php
$args = array(
    'taxonomy' => 'locations',
    'hide_empty' => false,
);
$terms = get_terms($args);
if ( $terms && !is_wp_error( $terms ) ) :
    $i = 0;
    foreach ( $terms as $term ) :
        if ( $term->slug == "united-kingdom" ) {
            ?>
            <div class="container" data-country="United Kingdom">
                <div class="row">
                    <div class="grid-item grid-30 bg-uk flex centralize">
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
                    ) );
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="grid-item third bg-uk-image flex centralize" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
                                    <h3 class="underline-blue"><?php the_title() ?></h3>
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
                <div class="slider-wrapper">
                    <div class="row explore-slider" style="height: 34rem">
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
                            $i = 0;
                            while( $query->have_posts() ) : $query->the_post();
                                if ($i == 0) {
                                    echo '';
                                } else {
                                    ?>
                                        <a href="<?php the_permalink(); ?>" class="grid-item <?php echo get_field('size_in_slider') ?> bg-spain-image flex centralize" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
                                            <h3 class="underline-yellow"><?php the_title() ?></h3>
                                        </a>
                                    <?php
                                }
                                $i++;
                            endwhile;
                        endif;
                        ?>
                        <!-- <div class="grid-item half bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/600x329_Elephant.png')">
                            <h3 class="underline-blue">Elephant &amp Castle</h3>
                        </div>
                        <div class="grid-item grid-225 bg-spain-image flex centralize" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/269x329_York.png')">
                            <h3 class="underline-blue">York</h3>
                        </div>
                        <div class="grid-item grid-275 bg-spain-image flex centralize no-margin-right" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/349x329_Holland_Park.png')">
                            <h3 class="underline-blue">Holland Park</h3>
                        </div> -->
                    </div>
                </div>
                <div class="slider-controls">
                </div>
                <div class="drag-info">
                    <div class="drag-img">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/drag-img.png" alt="">
                    </div>
                    <div class="drag-text">
                        <p>Drag to Explore</p>
                    </div>
                </div>
            </div>
            <?php
        }
        $i++;
    endforeach;
endif;
wp_reset_query();
?>
