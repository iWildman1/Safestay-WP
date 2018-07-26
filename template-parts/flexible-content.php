<?php
/**
 * Template for ACF flexible content field
**/
$page_id = get_the_id();
if (is_home()){
    $page_id = get_option('page_for_posts');
}
if ( have_rows('flexible_content',$page_id) ) :
    while ( have_rows('flexible_content',$page_id) ) : the_row();
        if( get_row_layout() == 'group_bookings_two_images_left_text_right' ):
            $front_image = get_sub_field('front_image',$page_id);
            $back_image = get_sub_field('back_image',$page_id);
            $link = get_sub_field('link',$page_id);
            ?>
            <section class="about">
                <div class="container">
                    <div class="row">
                        <div class="grid-item half">
                            <div class="image-composition">
                                <img class="comp-under" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                                <img class="comp-main" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                            </div>
                        </div>
                        <div class="grid-item half flex centralize">
                            <div class="about-text-staggered">
                                <p class="upper-title"><?php the_sub_field('upper_heading',$page_id); ?></p>
                                <h1 class="underline-dark"><?php the_sub_field('heading',$page_id); ?></h1>
                                <p class="text-main"><?php the_sub_field('text',$page_id); ?></p>
                                <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'about_us_text_left_image_right' ):
            $image = get_sub_field('image',$page_id);
            $link = get_sub_field('link',$page_id);
            ?>
            <section class="about">
                <div class="container">
                    <div class="row ethos">
                        <div class="grid-item half no-margin-right no-padding text-block">
                            <div class="ethos-inner">
                                <div class="ethos-text">
                                    <p class="upper-title"><?php the_sub_field('upper_heading',$page_id); ?></p>
                                    <h1 class="underline-dark"><?php the_sub_field('heading',$page_id); ?></h1>
                                    <p class="text-main"><?php the_sub_field('text',$page_id); ?></p>
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
                            <h1 class="underline-pink"><?php the_sub_field('heading',$page_id); ?></h1>
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
                                    if ( have_rows('slider',$page_id) ) :
                                        while ( have_rows('slider',$page_id) ) : the_row();
                                            $image = get_sub_field('image',$page_id);
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
            $link = get_sub_field('link',$page_id);
            $back_image = get_sub_field('back_image',$page_id);
            $front_image = get_sub_field('front_image',$page_id);
            ?>
            <section class="membership">
                <div class="container container-fluid">
                    <div class="row">
                        <div class="grid-item half push-in-left flex centralize">
                            <div class="membership-text">
                                <h1 class="underline-dark"><?php the_sub_field('heading',$page_id); ?></h1>
                                <p><?php the_sub_field('text',$page_id); ?></p>
                                <?php
                                if ( have_rows('list',$page_id) ) :
                                    while ( have_rows('list',$page_id) ) : the_row();
                                        $icon = get_sub_field('icon',$page_id);
                                        ?>
                                        <div class="item">
                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                            <p><?php the_sub_field('text',$page_id); ?></p>
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
        elseif( get_row_layout() == 'text_left_contact_form_right' ):
            ?>
            <section class="online-enquiry">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow"><?php the_sub_field('heading',$page_id); ?></h1>
                            <p><?php the_sub_field('text',$page_id); ?></p>
                        </div>
                        <div class="grid-item half">
                            <?php
                            $form = get_sub_field('form_shortcode',$page_id);
                            echo do_shortcode($form);
                            ?>
                            <!--
                            <form action="/" class="contact-form">
                                <div class="form-row-two">
                                    <input type="text" placeholder="First name:">
                                    <input type="text" placeholder="Last name:">
                                </div>
                                <div class="form-row-one">
                                    <input type="text" placeholder="Email address:">
                                </div>
                                <div class="form-row-one">
                                    <textarea placeholder="Your message..." name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-row-button">
                                    <a href="/" class="button button-dark">Send</a>
                                </div>
                            </form>
                            -->
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'address_lookup_2_column_with_image' ):
            $icon = get_sub_field('icon',$page_id);
            $link = get_sub_field('link',$page_id);
            $image = get_sub_field('image',$page_id);
            ?>
            <section class="address-lookup">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow"><?php the_sub_field('heading',$page_id); ?></h1>
                            <p><?php the_sub_field('text',$page_id); ?></p>
                        </div>
                        <div class="grid-item half no-padding no-margin-left">
                           <div class="address-comp">
                               <div class="address-info">
                                   <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                   <div class="address-content-wrapper">
                                        <h4><?php the_sub_field('right_heading',$page_id); ?></h4>
                                        <hr>
                                        <ul class="contact">
                                            <li><a href="tel:<?php the_sub_field('telephone',$page_id); ?>">T: <?php the_sub_field('telephone',$page_id); ?></a></li>
                                            <li><a href="mailto:<?php the_sub_field('e-mail',$page_id); ?>">E: <?php the_sub_field('e-mail',$page_id); ?></a></li>
                                        </ul>
                                        <div class="address">
                                             <?php the_sub_field('address',$page_id); ?>
                                        </div>
                                        <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                                   </div>
                               </div>
                               <div class="address-comp-img">
                                   <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'general_faqs_text_left_accordions_right' ):
            ?>
            <section class="faq">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow"><?php the_sub_field('heading',$page_id); ?></h1>
                            <p><?php the_sub_field('text',$page_id); ?>
                                <br><br>
                                <strong><?php the_sub_field('info',$page_id); ?></strong>
                            </p>
                            <div class="faq-tabs">
                                <button class="tab tab-active" type="button" name="button"><?php the_sub_field('general_button',$page_id); ?></button>
                                <button class="tab" type="button" name="button"><?php the_sub_field('group_button',$page_id); ?></button>
                            </div>
                        </div>
                        <div class="grid-item half">
                            <?php
                            if ( have_rows('general',$page_id) ) :
                                $cnt = 0;
                                ?>
                                <ul class="faq-list <?php the_sub_field('general_button',$page_id); ?>">
                                    <?php
                                    while ( have_rows('general',$page_id) ) : the_row();
                                        ?>
                                        <li class="title" data-target="description-<?php echo $cnt; ?>"><?php the_sub_field('heading',$page_id); ?></li>
                                        <li class="description" data-attribute="description-<?php echo $cnt; ?>"><?php the_sub_field('description',$page_id); ?></li>
                                        <?php
                                        $cnt++;
                                    endwhile;
                                    ?>
                                </ul>
                                <?php
                            endif;
                            if ( have_rows('group',$page_id) ) :
                                $cnt = 0;
                                ?>
                                <ul class="faq-list <?php the_sub_field('general_button',$page_id); ?>">
                                    <?php
                                    while ( have_rows('group',$page_id) ) : the_row();
                                        ?>
                                        <li class="title" data-target="description-<?php echo $cnt; ?>"><?php the_sub_field('heading',$page_id); ?></li>
                                        <li class="description" data-attribute="description-<?php echo $cnt; ?>"><?php the_sub_field('description',$page_id); ?></li>
                                        <?php
                                        $cnt++;
                                    endwhile;
                                    ?>
                                </ul>
                                <?php
                            endif;
                            ?>
                           <div class="button-row">
                                <button class="button" type="button" name="button"><?php the_sub_field('button',$page_id); ?></button>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'groups_text_left_two_images_right' ):
            $front_image = get_sub_field('front_image',$page_id);
            $back_image = get_sub_field('back_image',$page_id);
            ?>
            <section class="groups-intro">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half no-margin-right no-padding">
                            <h1 class="underline-yellow"><?php the_sub_field('heading',$page_id); ?></h1>
                            <?php the_sub_field('text',$page_id) ?>
                        </div>
                        <div class="grid-item half">
                            <div class="image-composition comp-reverse comp-right">
                                <img class="comp-main" src="<?php echo $back_image['url']; ?>" alt="<?php echo $back_image['alt']; ?>">
                                <img class="comp-under" src="<?php echo $front_image['url']; ?>" alt="<?php echo $front_image['alt']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'reasons_to_book_with_us_text_left_list_right' ):
            ?>
            <section class="book-reasons bg-white">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half no-margin-right no-padding">
                            <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                            <div>
                                <?php the_sub_field('text',$page_id); ?>
                            </div>
                        </div>
                        <div class="grid-item half">
                            <div class="reasons-icon-grid">
                                <?php
                                if ( have_rows('list',$page_id) ) :
                                    ?>
                                    <div class="icon-row">
                                        <?php
                                        while ( have_rows('list',$page_id) ) : the_row();
                                            $icon = get_sub_field('icon',$page_id);
                                            ?>
                                            <div class="icon-item">
                                                <div class="item-wrapper">
                                                    <div class="img-wrapper">
                                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                    </div>
                                                    <p><?php the_sub_field('text',$page_id); ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        endwhile; ?>
                                    </div>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'build_group_quote_online_image_left_text_right' ):
            $image = get_sub_field('image',$page_id);
            $link = get_sub_field('link',$page_id);
            ?>
            <section class="build-online-info bg-white padding-top-large padding-bottom-large">
                <div class="container">
                    <div class="row">
                        <div class="grid-item half">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                        <div class="grid-item half">
                            <h1 class="h1-med underline-yellow text-dark"><?php the_sub_field('heading'); ?></h1>
                            <p class="text-normal"><?php the_sub_field('text'); ?></p>
                            <div class="button-row button-row-normal">
                                <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner-background">
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'featured_hostels' ):
            $link = get_sub_field('link',$page_id);
            $post_objects = get_sub_field('hostels',$page_id);
            ?>
            <section class="featured-hostels padding-top-large">
                <div class="container">
                    <h1 class="underline-yellow"><?php the_sub_field('heading',$page_id); ?></h1>
                    <div class="hostel-grid">
                        <?php
                        if( $post_objects ):
                            foreach( $post_objects as $post) : setup_postdata($post);
                                $thumbnail_id = get_post_thumbnail_id( $post->ID );
	                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                $locations = wp_get_post_terms( $post->ID, 'locations');
                                ?>
                                <div class="hostel">
                                    <div class="img-container">
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php echo $alt; ?>">
                                    </div>
                                    <div class="info-container">
                                        <div class="info-wrap">
                                            <p class="location"><?php foreach($locations as $location){echo $location->name;}?></p>
                                            <div class="name-row">
                                                <?php
                                                if ( have_rows('page_header',$page_id) ) :
                                                    while ( have_rows('page_header',$page_id) ) : the_row();
                                                        $icon = get_sub_field('icon',$page_id);
                                                        ?>
                                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                                <p><?php the_title(); ?></p>
                                            </div>
                                            <div class="reviews-row">
                                                <p>Reviews</p>
                                                <div class="stars">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star.png" alt="">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star.png" alt="">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star.png" alt="">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star.png" alt="">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/star.png" alt="">
                                                    <p class="class">Excellent</p>
                                                </div>
                                            </div>
                                            <a href="" class="button book-now-featured">Book Now</a>
                                        </div>
                                        <div class="features-row">
                                            <ul>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Bike Copy 5.png" alt="">
                                                    <p>113 Beds</p>
                                                </li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Bike Copy 6.png" alt="">
                                                    <p>Fast WiFi</p>
                                                </li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Bike Copy 7.png" alt="">
                                                    <p>Social Areas</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                    <div class="button-row">
                        <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'related_pages' ):
            $post_objects = get_sub_field('pages',$page_id);
            ?>
            <section class="related-offers bg-white">
                <div class="container">
                    <div class="title-row">
                        <h4><?php the_sub_field('heading',$page_id) ?></h4>
                    </div>
                    <div class="row cater-grid">
                        <?php
                        if( $post_objects ):
                            foreach( $post_objects as $post) : setup_postdata($post);
                                $background_image = get_field('background_image',$page_id);
                                ?>
                                <a href="<?php the_permalink(); ?>" class="item">
                                    <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                    <div class="item-info-wrapper">
                                        <h3><?php
                                            if(is_home()){
                                                single_post_title();
                                            } else {
                                                the_title();
                                            }
                                        ?></h3>
                                    </div>
                                </a>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'related_offers' ):
            $post_objects = get_sub_field('offers',$page_id);
            ?>
            <section class="related-offers bg-white">
                <div class="container">
                    <div class="title-row">
                        <h4><?php the_sub_field('heading',$page_id); ?></h4>
                    </div>
                    <div class="related-offers-row sub-offers">
                        <?php
                        if( $post_objects ):
                            foreach( $post_objects as $post) : setup_postdata($post);
                                $background_image = get_field('background_image');
                                ?>
                                <div class="offer">
                                    <img src="<?php echo $background_image; ?>" alt="<?php the_title(); ?>">
                                    <div class="offer-info-wrap">
                                        <p class="date">Offer Ends: <?php the_sub_field('offer_end_date'); ?></p>
                                        <h3><?php the_title(); ?></h3>
                                        <p class="description"><?php the_sub_field('description'); ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="button button-offer-see">See Offer</a>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'inspiration_posts' ) :
            $link = get_sub_field('link');
            ?>
            <section class="inspiration">
                <div class="container">
                    <h1 class="underline-yellow">#<?php the_sub_field('heading'); ?></h1>
                    <div class="row inspiration-row">
                        <?php
                        $post_objects = get_sub_field('inspiration');
                        if( $post_objects ):
                            $cnt = 1;
                            foreach( $post_objects as $post) : setup_postdata($post);
                                if ($cnt == 1 OR $cnt == 3) { ?>
                                    <div class="inspiration-block inspiration-block-25">
                                    <?php
                                } elseif ($cnt == 4) { ?>
                                    <div class="inspiration-block inspiration-block-50">
                                    <?php
                                }
                                    if ($cnt == 1 OR $cnt == 2) { ?>
                                        <div class="inspiration-block-50">
                                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <?php
                                    } elseif($cnt == 3) { ?>
                                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                        <?php
                                    } elseif($cnt == 4 OR $cnt == 6) { ?>
                                        <div class="inspiration-block-50">
                                        <?php
                                    }
                                    if ($cnt == 4 OR $cnt == 5) { ?>
                                        <div class="inspiration-block-50">
                                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <?php
                                    } elseif($cnt == 6){ ?>
                                        <div class="inspiration-item">
                                            <?php
                                            $hashtags = wp_get_post_terms( $post->ID, 'hashtags');
                                            ?>
                                            <span class="inspr-tag">#<?php foreach( $hashtags as $hastag ) { echo $hastag->name; }?></span>
                                            <?php
                                            if ( have_rows('blog_header') ) :
                                                while ( have_rows('blog_header') ) : the_row();
                                                    ?>
                                                    <h5><?php the_sub_field('heading'); ?></h5>
                                                    <?php
                                                endwhile;
                                            endif;?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/go-icon.png" alt="" class="go-icon">
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    if($cnt == 5 OR $cnt == 6) { ?>
                                        </div>
                                        <?php
                                    }
                                if ($cnt == 2 OR $cnt == 3 OR $cnt == 6) { ?>
                                    </div>
                                    <?php
                                }
                                if ($cnt > 6){
                                    break;
                                }
                                $cnt++;
                            endforeach;
                        endif;
                        wp_reset_query(); ?>
                    </div>
                    <div class="load-more-row">
                        <a href="<?php echo $link['url']; ?>" class="button"><?php echo $link['title']; ?></a>
                    </div>
                </div>
            </section>
            <?php
        elseif( get_row_layout() == 'the_explorer_posts' ) :
            ?>
            <section class="expore explorer">
                <div class="container">
                    <div class="row extend-right explore-row">
                        <div class="explore-vertical-stack flex-width-75">
                            <div class="explore-vertical-25">
                                <div class="explore-horizontal-50">
                                    <h1 class="underline-yellow"><?php the_sub_field('heading'); ?></h1>
                                    <p class="title-lead"><?php the_sub_field('description'); ?></p>
                                </div>
                                <div class="explore-horizontal-50">
                                    <div class="hashtag-block">
                                        <span>#SafestayMadrid</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $post_objects = get_sub_field('explore');
                            if( $post_objects ):
                                $cnt = 1;
                                foreach( $post_objects as $post) : setup_postdata($post);
                                    if ($cnt == 1): ?>
                                        <div class="explore-vertical-75">
                                            <div class="featured-tour">
                                                <span>Featured tour!</span>
                                                <div class="tour-info">
                                                    <h5>Madrids best walking tour only £10.99 each</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                                <div class="plus-icon">
                                                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/plus-icon.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    if ($cnt == 2) : ?>
                        </div>
                                        <?php
                                    endif;
                                    if ($cnt == 2 OR $cnt == 4) : ?>
                                        <div class="explore-vertical-stack flex-width-20">
                                        <?php
                                    endif;
                                    $class = "arts";
                                    $class = "restaurants";
                                    if ($cnt !== 1):
                                        ?>
                                        <div class="explore-vertical-50" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/restaurants.png')">
                                            <span class="<?php echo $class; ?>-col">Restaurants</span>
                                        </div>
                                        <?php
                                    endif;
                                    if ($cnt == 3 OR $cnt == 5) : ?>
                                        </div>
                                        <?php
                                    endif;
                                $cnt++;
                            endforeach;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                    <div class="slider-controls">
                        <div class="control"></div>
                        <div class="control control-active"></div>
                        <div class="control"></div>
                        <div class="control"></div>
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
            </section>
            <?php
        endif;
    endwhile;
endif;
?>
