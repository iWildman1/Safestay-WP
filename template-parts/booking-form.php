<div class="booking-inner">
    <div class="booking-toggles">
        <div class="booking-toggle toggle-active individual-booking-toggle">
<<<<<<< HEAD
            <?php
            if ( have_rows('individual','option') ) :
                while ( have_rows('individual','option') ) : the_row();
                    $light = get_sub_field('icon_light');
                    $dark = get_sub_field('icon_dark'); ?>
                    <img class="dark" src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>">
                    <img class="light" src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>">
                    <span><?php the_sub_field('title'); ?></span>
                    <?php
                endwhile;
            endif; ?>
        </div>
        <div class="booking-toggle group-booking-toggle">
            <?php
            if ( have_rows('group','option') ) :
                while ( have_rows('group','option') ) : the_row();
                    $light = get_sub_field('icon_light');
                    $dark = get_sub_field('icon_dark'); ?>
                    <img class="dark" src="<?php echo $dark['url']; ?>" alt="<?php echo $dark['alt']; ?>">
                    <img class="light" src="<?php echo $light['url']; ?>" alt="<?php echo $light['alt']; ?>">
                    <span><?php the_sub_field('title'); ?></span>
                    <?php
                endwhile;
            endif; ?>
=======
            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/person-icon.png" alt=""> Individual
        </div>
        <div class="booking-toggle group-booking-toggle">
            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/group-icon-grey.png" alt="">Group Booking
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
        </div>
    </div>
    <div class="forms">
        <div class="individual-booking booking active">
            <div class="booking-headings">
<<<<<<< HEAD
                <?php
                if ( have_rows('individual','option') ) :
                    while ( have_rows('individual','option') ) : the_row(); ?>
                        <p class="label"><?php the_sub_field('upper_heading'); ?></p>
                        <h4><?php the_sub_field('heading'); ?></h4>
                        <?php
                    endwhile;
                endif; ?>
=======
                <p class="label">Book Now</p>
                <h4>Stay with SafeStay</h4>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
            </div>
            <form action="/book-now" method="post" enctype="multipart/form-data" class="booking-inputs">
                <div class="form-group location-group">
                    <select name="location" id="location">
                        <option value="0">Where would you like to go?</option>
                        <?php
                        $query = new WP_Query( array(
                            'post_type' => 'hostel',
<<<<<<< HEAD
                            'posts_per_page' => -1,
=======
                            'posts_per_page' => -1
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                        ) );
                        if ( $query->have_posts() ) :
                            $cnt = 1;
                            while ( $query->have_posts() ) : $query->the_post(); $ids = get_the_ID(); ?>
                                <option value="<?php echo $ids; ?>"><?php the_title(); ?></option>
                                <?php
                                $cnt++;
                            endwhile;
                        endif;
                        wp_reset_query(); ?>
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
<<<<<<< HEAD
                    <button class="button" type="submit">Book Now</button>
=======
                    <button type="submit">Book Now</button>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
                </div>
            </form>
        </div>
        <div class="group-booking booking">
            <div class="booking-headings">
<<<<<<< HEAD
                <?php
                if ( have_rows('group','option') ) :
                    while ( have_rows('group','option') ) : the_row(); ?>
                        <p class="label"><?php the_sub_field('upper_heading'); ?></p>
                        <h4><?php the_sub_field('heading'); ?></h4>
                        <?php
                    endwhile;
                endif; ?>
            </div>
            <?php
            echo do_shortcode('[contact-form-7 id="821" title="Group booking"]'); ?>
=======
                <p class="label">Make an enquiry</p>
                <h4>Stay with SafeStay</h4>
            </div>
            <?php
            echo do_shortcode('[contact-form-7 id="821" title="Group booking"]');
            ?>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
        </div>
    </div>
</div>
