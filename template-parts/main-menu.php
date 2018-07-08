<div class="main-menu">
            <div class="top-segment">
                <div class="container">
                    <div class="icon-row">
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/SafeStay_logo_stack_Nobox_whiteout cmyk.png" alt="">

                        <div class="links-segment">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Help Centre</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                            <img class="menu-close-toggle" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/Group 30.png" alt="">
                        </div>
                    </div>
                    <div class="location-selector">
                        <div class="selector">
                            <p>Showing: <select name="" id="loc">
                                <option value="">Locations in spain</option>
                            </select></p>
                            <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/dropdown.png" alt="" class="loc-dropdown">
                        </div>
                    </div>
                    <ul class="slider-row">
                        <li class="active"><a href="/madrid">Madrid</a></li>
                        <li>Barcelona Sea</li>
                        <li> Barcelona Pesseig De</li>
                    </ul>
                </div>
            </div>
            <div class="bottom-segment">
                <div class="bottom-item" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/GettyImages-589092945 Copy 5.png')"> 
                    <div class="title">
                        <h2>The <br>Explorer</h2>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-slide.png" alt="" class="arrow">
                    </div>
                </div>
                <div class="bottom-item" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/GettyImages-589092945 Copy 3.png')">
                    <div class="title">
                        <h2>Groups</h2>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-slide.png" alt="" class="arrow">
                    </div>
                </div>
                <div class="bottom-item" style="background-image: url('<?php bloginfo('stylesheet_directory') ?>/dist/img/GettyImages-589092945 Copy 4.png')">
                    <div class="title">
                        <h2>Offers</h2>
                        <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/right-arrow-slide.png" alt="" class="arrow">
                    </div>
                </div>
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