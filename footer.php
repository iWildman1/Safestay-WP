<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Safestay
 */

?>

<section class="email">
            <div class="container">
                <div class="row">
                    <div class="grid-item half">
                        <h1 class="underline-dark">Stay up to date</h1>
                        <p>Stay up to date with the latest exclusive offers, tips and travel advice
                            from SafeStay. You don't want to miss out!
                        </p>
                    </div>
                    <div class="grid-item half flex centralize">
                        <div class="input-group">
                            <input type="text" placeholder="Enter your email address here...">
                            <img class="sub" src="<?php bloginfo('stylesheet_directory') ?>/dist/img/submit-arrow.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-image-grid">
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image1.png" alt="">
                </div>
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image2.png" alt="">
                </div>
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image3.png" alt="">
                </div>
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image4.png" alt="">
                </div>
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image5.png" alt="">
                </div>
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image7.png" alt="">
                </div>
                <div class="grid-item">
                    <img src="<?php bloginfo('stylesheet_directory') ?>/dist/img/209x209_Image8.png" alt="">
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="grid-item half">
                        <p class="upper-title">Contact</p>
                        <h1>Get in touch with us!</h1>
                        <p class="lower-title">for group bookings of 10 or more:</p>
                        <ul>
                            <li><strong>T:</strong> +44 203 957 5530</li>
                            <li><strong>E: </strong> groups@safestay.com</li>
                        </ul>
                        <a href="#" class="button">Contact Us</a>
                    </div>
                    <div class="grid-item half flex centralize">
                        <div class="footer-nav">
                            <div class="footer-nav-item">
                                <h5>About</h5>
                                <ul>
                                    <li><a href="#">Travelsafe</a></li>
                                    <li>
                                        <a href="#">Careers at Safestay</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="#">Blog &amp Travel Tips</a>
                                    </li>
                                    <li>
                                        <a href="#">PR &amp Media</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-nav-item">
                                <h5>Investors</h5>
                                <ul>
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Corporate</a>
                                    </li>
                                    <li>
                                        <a href="#">News</a>
                                    </li>
                                    <li>
                                        <a href="#">Reports &amp Documentation</a>
                                    </li>
                                    <li>
                                        <a href="#">Announcements</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-nav-item">
                                <h5>Franchises</h5>
                                <ul>
                                    <li>
                                        <a href="#">Find out more</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="copyright-row">
                        <div class="copyright">
                            <p>Copyright SafeStay 2018</p>
                        </div>
                        <div class="copy-links">
                            <ul>
                                <li>
                                    <a href="#">Terms &amp Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Group Booking T&ampC's</a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
		</footer>
		

		<?php get_template_part('template-parts/locations-menu') ?>
		<?php get_template_part('template-parts/main-menu') ?>

<?php wp_footer(); ?>

</body>
</html>
