<?php
if ( have_rows('group_bookings_overlay','option') ) :
    while ( have_rows('group_bookings_overlay','option') ) : the_row();
        $button_icon = get_sub_field('button_icon');
        $icon = get_sub_field('icon'); ?>
        <button type="button" name="button" id="toggle-group-lightbox">
            <img src="<?php echo $button_icon['url']; ?>" alt="<?php echo $button_icon['alt']; ?>">
        </button>
        <section id="group-lightbox">
            <div class="inner-group-lightbox">
                <div class="header">
                    <?php
                    $small_logo = get_field('small_logo','option'); ?>
                    <div class="left">
                        <img src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt']; ?>">
                        <span>Group bookings</span>
                    </div>
                    <button class="close-group-lightbox" type="button" name="button">
                        <div class="x"></div>
                    </button>
                </div>
                <div class="content">
                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                    <h3><?php the_sub_field('heading'); ?></h3>
                    <div class="items">
                        <?php
                        if ( have_rows('items','option') ) :
                            while ( have_rows('items','option') ) : the_row();
                                $icon = get_sub_field('icon');
                                $type = get_sub_field('type');
                                $telephone = get_sub_field('telephone');
                                $e_mail = get_sub_field('e-mail');
                                $opens = get_sub_field('opens'); ?>
                                <div class="contact-item">
                                    <div class="item-inner">
                                        <div class="click-wrapper" data-target="<?php echo $opens; ?>">
                                            <img src="<?php echo $icon['url']; ?>" alt="">
                                        </div>
                                        <h3><?php the_sub_field('heading'); ?></h3>
                                        <?php
                                        if ( $type == 'text' ) : ?>
                                            <p><?php the_sub_field('text'); ?></p>
                                            <?php
                                        elseif ( $type == 'tel' ) : ?>
                                            <p>T: <a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></p>
                                            <?php
                                        elseif ( $type == 'e-mail' ) : ?>
                                            <p><a href="mailto:<?php echo $e_mail; ?>"><?php echo $e_mail; ?></a></p>
                                            <?php
                                        endif; ?>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div>
                <div class="overlays">
                    <div class="container">
                        <div class="header">
                            <?php
                            $small_logo = get_field('small_logo','option'); ?>
                            <div class="left">
                                <img src="<?php echo $small_logo['url']; ?>" alt="<?php echo $small_logo['alt']; ?>">
                                <span>Group bookings</span>
                            </div>
                            <button class="close-group-overlay" type="button" name="button">
                                <div class="x"></div>
                            </button>
                        </div>
                        <?php
                        if ( have_rows('live_chat') ) :
                            while ( have_rows('live_chat') ) : the_row();
                                $icon = get_sub_field('icon'); ?>
                                <div class="overlay" data-container="live_chat">
                                    <div class="heading">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                        <h3><?php the_sub_field('heading'); ?></h3>
                                    </div>
                                    <div class="content">
                                        <div class="col-45">
                                            <div class="left">
                                                <?php
                                                if ( have_rows('left') ) :
                                                    while ( have_rows('left') ) : the_row();
                                                        $icon = get_sub_field('icon'); ?>
                                                        <div class="inner-content">
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <p><?php the_sub_field('text'); ?></p>
                                                        </div>
                                                    <?php
                                                    endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-55">
                                            <div class="right">
                                                <div class="inner-content">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif; ?>
                        <?php
                        if ( have_rows('contact') ) :
                            while ( have_rows('contact') ) : the_row();
                                $icon = get_sub_field('icon'); ?>
                                <div class="overlay" data-container="contact">
                                    <div class="heading">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                        <h3><?php the_sub_field('heading'); ?></h3>
                                    </div>
                                    <div class="content">
                                        <div class="col-45">
                                            <div class="left">
                                                <?php
                                                if ( have_rows('left') ) :
                                                    while ( have_rows('left') ) : the_row();
                                                        $icon = get_sub_field('icon'); ?>
                                                        <div class="inner-content">
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <p><?php the_sub_field('text'); ?></p>
                                                        </div>
                                                    <?php
                                                    endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-55">
                                            <div class="right">
                                                <div class="inner-content">
                                                    <?php
                                                    if ( have_rows('right') ) :
                                                        while ( have_rows('right') ) : the_row();
                                                            $form = get_sub_field('form_shortcode');
                                                            echo do_shortcode($form);
                                                        endwhile;
                                                    endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif; ?>
                        <?php
                        if ( have_rows('callback') ) :
                            while ( have_rows('callback') ) : the_row();
                                $icon = get_sub_field('icon'); ?>
                                <div class="overlay" data-container="callback">
                                    <div class="heading">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                        <h3><?php the_sub_field('heading'); ?></h3>
                                    </div>
                                    <div class="content">
                                        <div class="col-45">
                                            <div class="left">
                                                <?php
                                                if ( have_rows('left') ) :
                                                    while ( have_rows('left') ) : the_row();
                                                        $icon = get_sub_field('icon'); ?>
                                                        <div class="inner-content">
                                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                            <p><?php the_sub_field('text'); ?></p>
                                                        </div>
                                                    <?php
                                                    endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-55">
                                            <div class="right">
                                                <div class="inner-content">
                                                    <?php
                                                    if ( have_rows('right') ) :
                                                        while ( have_rows('right') ) : the_row();
                                                            $form = get_sub_field('form_shortcode');
                                                            echo do_shortcode($form);
                                                        endwhile;
                                                    endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif; ?>
