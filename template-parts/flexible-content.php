<?php
/**
 * Template for ACF flexible content field
**/
if ( have_rows('flexible_content') ) :
    while ( have_rows('flexible_content') ) : the_row();
        if( get_row_layout() == 'group_bookings_two_images_left_text_right' ):
            $front_image = get_sub_field('front_image');
            $back_image = get_sub_field('back_image');
            $link = get_sub_field('link');
            ?>
            <section class="about">
                <div class="container">
                    <div class="row">
                        <div class="grid-item half">
                            <div class="image-composition">
                                <img class="comp-main" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                                <img class="comp-under" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                            </div>
                        </div>
                        <div class="grid-item half flex centralize">
                            <div class="about-text-staggered">
                                <p class="upper-title"><?php the_sub_field('upper_heading'); ?></p>
                                <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                                <p class="text-main"><?php the_sub_field('text'); ?></p>
                                <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'about_us_text_left_image_right' ):
            $image = get_sub_field('image');
            $link = get_sub_field('link');
            ?>
            <section class="about">
                <div class="container">
                    <div class="row ethos">
                        <div class="grid-item half no-margin-right no-padding text-block">
                            <div class="ethos-inner">
                                <div class="ethos-text">
                                    <p class="upper-title"><?php the_sub_field('upper_heading'); ?></p>
                                    <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                                    <p class="text-main"><?php the_sub_field('text'); ?></p>
                                    <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item half no-margin-left no-padding img-block">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'booking_left_with_slider_right' ):
            ?>
            <section class="book-now" id="book-now">
                <div class="container container-fluid">
                    <div class="row">
                        <div class="grid-item half bg-burgundy no-margin-left booking-grid">
                            <h1 class="underline-pink"><?php the_sub_field('heading'); ?></h1>
                            <form class="booking-form-large">
                                <div class="booking-form-group">
                                    <select name="country" id="booking-country">
                                        <option value="spain">Spain</option>
                                    </select>
                                    <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                                </div>

                                <div class="booking-form-group">
                                    <label for="location">Where:</label>
                                    <div class="select-wrapper">
                                        <select name="location" id="location">
                                            <option value="">Where would you like to go?</option>
                                        </select>
                                        <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                                    </div>
                                </div>
                                <div class="booking-form-group times-group">
                                    <label for="checkin">When:</label>
                                    <div class="group-wrapper">
                                        <div class="input-wrapper">
                                            <input type="text" class="checkin" id="checkin" placeholder="Check in">
                                            <input type="text" class="checkout" id="checkout" placeholder="Check out">
                                        </div>
                                        <img class="arrow" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="booking-form-group">
                                    <label for="people">How Many:</label>
                                    <div class="select-wrapper">
                                        <select name="people" id="people">
                                            <option value="">Beds</option>
                                        </select>
                                        <img class="select-down" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/select-down.png" alt="">
                                    </div>
                                </div>
                                <div class="booking-form-group">
                                    <button class="button" type="submit">Book Now</button>
                                </div>
                                <div class="booking-slider">
                                    <?php
                                    if ( have_rows('slider') ) :
                                        while ( have_rows('slider') ) : the_row();
                                            $image = get_sub_field('image');
                                            ?>
                                            <div class="slide">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                            </div>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                                </form>
                            </div>
                            <div class="booking-slider-controls">
                                <span>
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_left.png" alt="">
                                </span>
                                <span>
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/arrow_right.png" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'membership_text_left_with_list_two_images_right' ):
            $link = get_sub_field('link');
            $back_image = get_sub_field('back_image');
            $front_image = get_sub_field('front_image');
            ?>
            <section class="membership">
                <div class="container container-fluid">
                    <div class="row">
                        <div class="grid-item half push-in-left flex centralize">
                            <div class="membership-text">
                                <h1 class="underline-dark"><?php the_sub_field('heading'); ?></h1>
                                <p><?php the_sub_field('text'); ?></p>
                                <?php
                                if ( have_rows('list') ) :
                                    while ( have_rows('list') ) : the_row();
                                        $icon = get_sub_field('icon');
                                        ?>
                                        <div class="item">
                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                            <p><?php the_sub_field('text'); ?></p>
                                        </div>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                                <a href="<?php echo $link['url']; ?>" class="button button-dark"><?php echo $link['title']; ?></a>
                            </div>
                        </div>
                        <div class="grid-item half no-margin-right no-padding">
                            <div class="image-composition-2">
                                <img class="comp-main" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                                <img class="comp-overhang" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        endif;
    endwhile;
endif;
?>
