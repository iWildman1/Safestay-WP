<div class="booknowmenu">
    <section class="book-now" id="book-now">
<<<<<<< HEAD
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
                    </form>
                </div>
                <div class="grid-item half no-margin-riht booking-grid">
                    <div class="booking-carousel owl-carousel">
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
                </div>
            </div>
        </div>
    </section>
=======
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
                            </form>
                        </div>
                        <div class="grid-item half no-margin-riht booking-grid">
                            <div class="booking-carousel owl-carousel">
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
                        </div>
                    </div>
                </div>
            </section>
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
</div>
