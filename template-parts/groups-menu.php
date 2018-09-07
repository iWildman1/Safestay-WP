<div class="group-overlay">
    <div class="top-segment">
        <div class="overlay-inner container">
            <div class="icon-row">
                <?php
                $small_logo = get_field('small_logo','option'); ?>
                <div class="left">
                    <img src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt']; ?>">
                    <span>Group bookings</span>
                </div>
                <img class="groups-close-toggle" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Group 30.png" alt="">
            </div>
            <?php
            if ( !is_front_page() ) : ?>
                <div class="location-select">
                    <?php
                    if ( have_rows('location_selector','option') ) :
                        while ( have_rows('location_selector','option') ) : the_row();
                            $heading = get_sub_field('heading');
                            $prefix = get_sub_field('prefix');
                        endwhile;
                    endif; ?>
                    <span><?php echo $heading; ?></span>
                    <select name="locations" id="group-locations">
                        <?php
                        $args = array(
                            'taxonomy' => 'locations',
                            'hide_empty' => false,
                            'parent' => 0,
                        );
                        $locations = get_terms($args);
                        if ( $locations && !is_wp_error( $locations ) ) :
                            foreach ( $locations as $location ) : ?>
                                <option value="<?php echo $location->slug; ?>"><?php echo $prefix;?> <?php echo $location->name; ?></option>
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
                    $locations = get_terms($args); // Get all terms of a taxonomy
                    if ( $locations && !is_wp_error( $locations ) ) :
                        foreach ( $locations as $location ) : ?>
                            <div class="owl-carousel location-carousel" data-location="<?php echo $location->slug; ?>">
                                <?php
                                $args = array(
                                    'taxonomy' => 'locations',
                                    'hide_empty' => false,
                                    'parent' => $location->term_id,
                                );
                                $cities = get_terms($args);
                                if ( $cities && !is_wp_error( $cities ) ) :
                                    foreach ( $cities as $city ) : ?>
                                        <div class="location">
                                            <button type="button" name="button" data-place="<?php echo $city->slug; ?>"><?php echo $city->name; ?></button>
                                            <span class="dash">- </span>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                wp_reset_query(); ?>
                            </div>
                            <?php
                        endforeach;
                    endif; ?>
                </div>
                <?php
            endif; ?>
        </div>
    </div>
    <div class="bottom-segment">
        <div class="overlay-inner container">
            <div class="overlay-inner-content">
                <?php
                if ( have_rows('groups_menu','option') ) :
                    while ( have_rows('groups_menu','option') ) : the_row();
                        $icon = get_sub_field('icon'); ?>
                        <div class="overlay-left">
                            <?php
                            if ( have_rows('left') ) :
                                while ( have_rows('left') ) : the_row(); ?>
                                    <div class="group-overlay-segment segment-full">
                                        <div class="contact-top">
                                            <div class="img-wrapper">
                                                <?php
                                                if ( $icon ) : ?>
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                    <?php
                                                endif; ?>
                                            </div>
                                            <div class="text-wrapper">
                                                <h4><?php the_sub_field('upper_heading'); ?></h4>
                                                <p><?php the_sub_field('heading'); ?></p>
                                            </div>
                                        </div>
                                        <div class="contact-grid">
                                            <?php
                                            if ( have_rows('items') ) :
                                                while ( have_rows('items') ) : the_row();
                                                    $icon = get_sub_field('icon');
                                                    $type = get_sub_field('type'); ?>
                                                    <div class="contact-item">
                                                        <div class="click-wrapper" data-toggle="<?php the_sub_field('opens'); ?>">
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                        </div>
                                                        <h3><?php the_sub_field('heading'); ?></h3>
                                                        <?php
                                                        if ( $type == 'text' ) : ?>
                                                            <p><?php the_sub_field('text'); ?></p>
                                                            <?php
                                                        elseif ( $type == 'email' ) :
                                                            $email = get_sub_field('email'); ?>
                                                            <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                                                            <?php
                                                        elseif ( $type == 'telephone' ) :
                                                            $telephone = get_sub_field('telephone'); ?>
                                                            <p><strong>T: </strong><a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></p>
                                                            <?php
                                                        endif; ?>
                                                    </div>
                                                    <?php
                                                endwhile;
                                            endif; ?>
                                        </div>
                                    </div>
                                    <div class="additional-wrapper">
                                        <div class="additional" data-target="callback">
                                            <div class="inner">
                                                <div class="content">
                                                    <?php
                                                    echo do_shortcode('[contact-form-7 id="851" title="Request callback"]'); ?>
                                                </div>
                                                <button class="close-additional" type="button" name="button" data-toggle="callback">
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="additional" data-target="live-chat">
                                            <div class="inner">
                                                <div class="content">

                                                </div>
                                                <button class="close-additional" type="button" name="button" data-toggle="live-chat">
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="additional" data-target="e-mail">
                                            <div class="inner">
                                                <div class="content">
                                                    <?php
                                                    echo do_shortcode('[contact-form-7 id="852" title="Send message"]'); ?>
                                                </div>
                                                <button class="close-additional" type="button" name="button" data-toggle="e-mail">
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif; ?>
                        </div>
                        <div class="overlay-right">
                            <?php
                            if ( have_rows('right') ) :
                                while ( have_rows('right') ) : the_row();
                                    $image = get_sub_field('image');
                                    $link = get_sub_field('link'); ?>
                                    <div class="group-overlay-segment segment-60 no-pad img-text-split">
                                        <div class="img-segment">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        </div>
                                        <div class="text-segment">
                                            <div class="text-wrapper">
                                                <h4><?php the_sub_field('upper_heading'); ?></h4>
                                                <h3><?php echo str_replace(' | ', '<br />', get_sub_field('heading')); ?></h3>
                                                <p><?php the_sub_field('text') ?></p>
                                                <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif; ?>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div>
