<?php 

    /**
     * 
     * Template Name: Contact Template
     * 
     */

    get_header();

?>

<?php get_template_part('template-parts/page-header') ?>


<section class="booking-form">
            <div class="container">
                
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

        <section class="quick-links">
            <div class="container">
                <div class="row">
                    <div class="quick-links-title">
                        <h1>Quick Contacts</h1>
                    </div>
                    <div class="quick-links-grid">
                        <div class="link-item">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/noun_857888_cc copy.png" alt="">
                            </div>
                            <h4>Callback</h4>
                            <p>Let us call you!</p>
                        </div>

                        <div class="link-item">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/noun_865595_cc copy.png" alt="">
                            </div>
                            <h4>Live chat</h4>
                            <p>Let's chat online now!</p>
                        </div>
                        <div class="link-item">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/noun_1206928_cc copy.png" alt="">
                            </div>
                            <h4>Phone</h4>
                            <p>T: +44 203 957 5530</p>
                        </div>
                        <div class="link-item">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/noun_1725097_cc copy.png" alt="">
                            </div>
                            <h4>Email</h4>
                            <p>groups@safestay.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="online-enquiry">
            <div class="container">
                <div class="row standard-two-row">
                    <div class="grid-item half">
                        <h1 class="underline-yellow">Online <br>Enquiry</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="grid-item half">
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
                    </div>
                </div>
            </div>
        </section>

        <section class="address-lookup">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow">Address <br>look up</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>

                            
                        </div>
                        <div class="grid-item half no-padding no-margin-left">
                           <div class="address-comp">
                               <div class="address-info">
                                   <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/0002812_Kish&Chips_Safestay_003-10.png" alt="">
                                   <div class="address-content-wrapper">
                                        <h4>London -<br>Elephant &amp Castle</h4>
                                        <hr>
                                        <ul class="contact">
                                            <li>T: +44 203 957 5530</li>
                                            <li>E: groups@safestay.com</li>
                                        </ul>
     
                                        <p class="address">
                                             144-152 Walworth Road,<br>
                                             Elephant & Castle,<br>
                                             London SE17 1JL
                                        </p>
     
                                        <a href="/" class="button">Book now</a>
                                   </div>
                               </div>
                               <div class="address-comp-img">
                                   <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/023X4846.png" alt="">
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="faq">
                <div class="container">
                    <div class="row standard-two-row">
                        <div class="grid-item half">
                            <h1 class="underline-yellow">General <br>FAQs</h1>
                            <p>
                                    Here is the place to find all the answers to anything you might need to know from check-in times to booking fees. If you can't find the answer you're looking for, please do get in touch on the button below!
                                    <br><br>
                                    <strong>Switch between the tabs below to change to general or group FAQs:</strong>
                            </p>
                            <div class="faq-tabs">
                                <a href="/" class="tab tab-active">General</a>
                                <a href="/" class="tab">Group FAQs</a>
                            </div>
                        </div>
                        <div class="grid-item half">
                           <ul class="faq-list">
                               <li>What time is Check-in & Check-out?</li>
                               <li>Is there any booking fee?</li>
                               <li>How long do I have to make a cancellation?</li>
                               <li>Who can stay in your hostels?</li>
                               <li>Is there an age restriction?</li>
                               <li>Is linen included?</li>
                               <li>What about towels, are they included?</li>
                           </ul>
                           <div class="button-row">
                                <a href="/" class="button">Load more</a>
                           </div>
                           
                        </div>
                    </div>
                </div>
            </section>    
        

        <section class="membership">
            <div class="container container-fluid">
                <div class="row">
                    <div class="grid-item half push-in-left flex centralize">
                        <div class="membership-text">
                            <h1 class="underline-dark">Safestay Membership</h1>
                            <p>We really care about our guests. That's why we put Safe in our name!
                                Safety, comfort, free wifi, social spaces and excellent:
                            </p>
                            <div class="item">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/bus-icon.png" alt="">
                                <p>Free bottle of water</p>
                            </div>
                            <div class="item">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/cal-icon.png" alt="">
                                <p>Free late checkout</p>
                            </div>
                            <div class="item">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/bin-icon.png" alt="">
                                <p class="item">Exclusive deals</p>
                            </div>
                            <a href="#" class="button button-dark">Become A Member</a>
                        </div>
                    </div>
                    <div class="grid-item half no-margin-right no-padding">
                        <div class="image-composition-2">
                            <img class="comp-main" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/600x806_Membership_Image1.png" alt="">
                            <img class="comp-overhang" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/450x568_Memebrship_Image2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php get_footer(); ?>