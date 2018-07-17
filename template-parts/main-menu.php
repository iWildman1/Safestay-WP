<div class="main-menu">
    <div class="top-segment">
        <div class="container">
            <div class="icon-row">
                <?php
                $small_logo = get_field('small_logo','option');
                ?>
                <img src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt']; ?>">

                <div class="links-segment">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    <img class="menu-close-toggle" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Group 30.png" alt="">
                </div>
            </div>
            <div class="location-selector">
                <div class="selector">
                    <?php
                    if ( have_rows('location_selector','option') ) :
                        while ( have_rows('location_selector','option') ) : the_row();
                            $heading = get_sub_field('heading');
                            $prefix = get_sub_field('prefix');
                        endwhile;
                    endif;
                    ?>
                    <p><?php echo $heading; ?><select name="Location" id="loc">
                        <?php
                        $args = array(
                            'taxonomy' => 'locations',
                            'hide_empty' => false,
                        );
                        $terms = get_terms($args); // Get all terms of a taxonomy
                        if ( $terms && !is_wp_error( $terms ) ) :
                            foreach ( $terms as $term ) :
                                ?>
                                <option value="<?php echo $term->slug; ?>"><?php echo $prefix;?> <?php echo $term->name; ?></option>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query();
                        ?>
                    </select></p>
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/dropdown.png" alt="" class="loc-dropdown">
                </div>
            </div>
            <ul class="slider-row">
                <?php
                $args = array(
                    'post_type' => 'hostel',
                    'posts_per_page' => -1,
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        $terms = get_the_terms( $post->ID, 'locations' );
                        ?>
                        <li data-location="<?php foreach($terms as $term){echo $term->name;}?>">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                        <?php
                        wp_reset_postdata();
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </ul>
        </div>
    </div>
    <div class="bottom-segment">
        <?php
        if ( have_rows('bottom_segment','option') ) :
            while ( have_rows('bottom_segment','option') ) : the_row();
                $image = get_sub_field('background_image');
                ?>
                <div class="bottom-item" style="background-image: url('<?php echo $image['url']; ?>')">
                    <div class="title">
                        <h2>The <br>Explorer</h2>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-slide.png" alt="" class="arrow">
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
    <section class="booking-form booking-form-menu">
        <div class="container">
            <div class="booking-inner">
                <div class="booking-toggles">
                    <div class="booking-toggle toggle-active">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/person-icon.png" alt=""> Individual
                    </div>
                    <div class="booking-toggle relocate-group-booking">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group-icon-grey.png" alt="">Group Booking
                    </div>
                </div>
                <div class="booking-headings">
                    <p class="label">Book Now</p>
                    <h4>Stay with SafeStay</h4>
                </div>
                <form action="/" class="booking-inputs">
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
        </div>
    </section>
</div>
