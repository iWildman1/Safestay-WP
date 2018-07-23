<div class="locations-overlay-1">
            <div class="container">
                <div class="icon-row">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/SafeStay_logo_stack_Nobox_whiteout cmyk.png" alt="">
                    <img class="locations-close-toggle" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Group 30.png" alt="">
                </div>
                <h1>Our locations</h1>

                <section class="booking-form">
                    <div class="booking-inner">
                        <div class="booking-toggles">
                            <div class="booking-toggle toggle-active">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/person-icon.png" alt=""> Individual
                            </div>
                            <div class="booking-toggle">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group-icon-grey.png" alt="">Group Booking
                            </div>
                        </div>

                        <div class="booking-headings">
                            <p class="label">Book Now</p>
                            <h4>Stay with SafeStay</h4>
                        </div>
                        <form class="booking-inputs">
                            <div class="form-group location-group">
                                <select name="location" id="location">
                                    <option value="">Where would you like to go?</option>
                                </select>
                                <img class="form-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/world_icon.png" alt="">
                                <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                            </div>
                            <div class="form-group checkin-group">
                                <input type="text" name="check-in" id="check-in" placeholder="Check In">
                                <img class="check-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/check-icon.png" alt="">
                            </div>
                            <div class="form-group checkout-group">
                                <input type="text" name="check-out" id="check-out" placeholder="Check Out">
                                <img class="check-icon" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/check-icon.png" alt="">
                            </div>
                            <div class="form-group book-group">
                                <button type="submit">Book Now</button>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="locations-list">

                    <div class="locations-grid">
                        <?php
                        $args = array(
                            'taxonomy' => 'locations',
                            'hide_empty' => false,
                        );
                        $terms = get_terms($args);
                        if ( $terms && !is_wp_error( $terms ) ) :
                            $i = 0;
                            foreach ( $terms as $term ) :
                                if ($term->slug == 'united-kingdom') {
                                    $country = 'uk';
                                } else if($term->slug == 'portugal') {
                                    $country = 'portugal';
                                } else if($term->slug == 'spain') {
                                    $country = 'spain';
                                } else if($term->slug == 'czech-republic') {
                                    $country = 'czech';
                                }
                                ?>
                                <div class="location-row">
                                    <div class="location-title-block <?php echo $country; ?>">
                                        <div class="location-title-inner">
                                            <h2><?php echo $term->name; ?></h2>
                                            <p><?php echo $term->description; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                    $query = new WP_Query( array(
                                        'post_type' => 'hostel',
                                        'posts_per_page' => -1,
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
                                            <div class="hostel">
                                                <div class="img-container">
                                                    <?php
                                                    $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                                    ?>
                                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php echo $alt; ?>">
                                                </div>
                                                <div class="info-container">
                                                    <div class="info-wrap">
                                                        <p class="location"><?php echo $term->name ?></p>
                                                        <div class="name-row">
                                                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Barcelona Sea Copy 13.png" alt="">
                                                            <p><?php the_title(); ?>
                                                                <br> &nbsp;
                                                            </p>
                                                        </div>
                                                        <div class="reviews-row">
                                                            <p>Reviews</p>
                                                            <div class="stars">
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/star.png" alt="">
                                                                <p class="class">Excellent</p>
                                                            </div>
                                                        </div>
                                                        <a href="<?php the_permalink(); ?>" class="button book-now-featured">Book Now</a>
                                                    </div>
                                                    <div class="features-row">
                                                        <ul>
                                                            <li>
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 5.png" alt="">
                                                                <p>113 Beds</p>
                                                            </li>
                                                            <li>
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 6.png" alt="">
                                                                <p>Fast WiFi</p>
                                                            </li>
                                                            <li>
                                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Bike Copy 7.png" alt="">
                                                                <p>Social Areas</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
