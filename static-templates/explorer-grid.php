<!doctype html>
<html>

<head>
    <title>SafeStay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../dist/styles.css">
</head>

<body class="exclusive-offers" style="background-color: #F6F6F6">
    <header style="background-image: url('../dist/img/offers-bg.png')">
        <nav class="safestay-nav">
            <div class="container">
                <div class="nav-inner">
                    <div class="logo">
                        <a href="#">
                            <img src="../dist/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="link">
                        <img src="../dist/img/map_marker_icon.png" alt="">
                        <a href="#">Locations</a>
                    </div>
                    <div class="link">
                        <img src="../dist/img/groups_icon.png" alt="">
                        <a href="#">Groups</a>
                    </div>
                </div>
            </div>
            <div class="nav-right">
                <div class="nav-toggle toggle-language">
                    <a href="#">
                        English
                        <img src="../dist/img/chevron-down.png" alt="">
                    </a>
                </div>
                <div class="nav-toggle toggle-calendar">
                    <img src="../dist/img/calendar-icon.png" alt="">
                </div>
                <div class="nav-toggle toggle-navigation">
                    <img src="../dist/img/nav-toggle.png" alt="">
                </div>
            </div>
        </nav>

        <div class="header-info">
            <div class="container">
                <h1>The<br> Explorer</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br> do eiusmod tempor incididunt ut labore et.</p>
            </div>
        </div>
    </header>

    <section class="booking-form">
        <div class="container">

            <div class="booking-inner">

                <div class="booking-toggles">
                    <div class="booking-toggle toggle-active">
                        <img src="../dist/img/person-icon.png" alt=""> Individual
                    </div>
                    <div class="booking-toggle">
                        <img src="../dist/img/group-icon-grey.png" alt="">Group Booking
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
                        <img class="form-icon" src="../dist/img/world_icon.png" alt="">
                        <img class="select-down" src="../dist/img/select-down.png" alt="">
                    </div>
                    <div class="form-group checkin-group">
                        <input type="text" name="check-in" id="check-in" placeholder="Check In">
                        <img class="check-icon" src="../dist/img/check-icon.png" alt="">
                    </div>
                    <div class="form-group checkout-group">
                        <input type="text" name="check-out" id="check-out" placeholder="Check Out">
                        <img class="check-icon" src="../dist/img/check-icon.png" alt="">
                    </div>
                    <div class="form-group book-group">
                        <button type="submit">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="explorer-filters">
        <div class="container">
            <div class="filters-inner">
                <div class="filter">
                    <select class="country" name="" id="">
                        <option value="">Madrid</option>
                    </select>
                    <img src="../dist/img/select-down.png" alt="">
                </div>
                <div class="filter">
                    <select class="most-recent" name="" id="">
                        <option value="">Most Recent</option>
                    </select>
                    <img src="../dist/img/select-down.png" alt="">
                </div>
                <div class="filter">
                    <select name="" id="" class="all">
                        <option value="">All</option>
                    </select>
                    <img src="../dist/img/select-down.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="explorer-grid-main">
        <div class="container">
            <div class="explorer-header">
                <h2>Now showing:</h2>
                <h1>All explorer posts</h1>
            </div>
            <div class="explorer-featured">
                <img src="../dist/img/explorer-featured.png" alt="">
                <div class="location loc-uk">
                    London
                </div>
                <div class="title">
                    <span class="tag-inspiration">#inspiration</span>
                    <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="explorer-grid-row">
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-1.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-inspiration">#inspiration</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-2.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-offer">#offer</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-3.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-inspiration">#inspiration</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-4.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-offer">#offer</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="explorer-grid-row">
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-5.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-uk">London</div>
                        <div class="title">
                            <span class="tag-inspiration">#inspiration</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-6.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-czech">Prague</div>
                        <div class="title">
                            <span class="tag-offer">#offer</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-7.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-inspiration">#inspiration</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-8.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-offer">#offer</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="explorer-grid-row">
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-1.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-inspiration">#inspiration</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-2.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-offer">#offer</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-3.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-inspiration">#inspiration</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="explorer-grid-item">
                    <img src="../dist/img/explorer-4.png" alt="">
                    <div class="item-inner">
                        <div class="location loc-spain">Madrid</div>
                        <div class="title">
                            <span class="tag-offer">#offer</span>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsun dolor sit amet, consectetur adipisicing elit, sed du eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="load-more-row">
                <a href="javascript:void(0)" class="button load-more">Load more</a>
            </div>
        </div>
    </section>


    <section class="about">
        <div class="container">
            <div class="row">
                <div class="grid-item half">
                    <div class="image-composition">
                        <img src="../dist/img/group_booking_main.png" alt="" class="comp-main">
                        <img src="../dist/img/group_booking_under.png" alt="" class="comp-under">
                    </div>
                </div>
                <div class="grid-item half flex centralize">
                    <div class="about-text-staggered">
                        <p class="upper-title">Bring on the groups!</p>
                        <h1 class="underline-dark">Group bookings</h1>
                        <p class="text-main">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. aliqua. Ut enim
                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="/group-bookings.html" class="button">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="email">
        <div class="container">
            <div class="row">
                <div class="grid-item half">
                    <h1 class="underline-dark">Stay up to date</h1>
                    <p>Stay up to date with the latest exclusive offers, tips and travel advice from SafeStay. You don't want
                        to miss out!
                    </p>
                </div>
                <div class="grid-item half flex centralize">
                    <div class="input-group">
                        <input type="text" placeholder="Enter your email address here...">
                        <img class="sub" src="../dist/img/submit-arrow.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-image-grid">
            <div class="grid-item">
                <img src="../dist/img/209x209_Image1.png" alt="">
            </div>
            <div class="grid-item">
                <img src="../dist/img/209x209_Image2.png" alt="">
            </div>
            <div class="grid-item">
                <img src="../dist/img/209x209_Image3.png" alt="">
            </div>
            <div class="grid-item">
                <img src="../dist/img/209x209_Image4.png" alt="">
            </div>
            <div class="grid-item">
                <img src="../dist/img/209x209_Image5.png" alt="">
            </div>
            <div class="grid-item">
                <img src="../dist/img/209x209_Image7.png" alt="">
            </div>
            <div class="grid-item">
                <img src="../dist/img/209x209_Image8.png" alt="">
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
                        <li>
                            <strong>T:</strong> +44 203 957 5530</li>
                        <li>
                            <strong>E: </strong> groups@safestay.com</li>
                    </ul>
                    <a href="#" class="button">Contact Us</a>
                </div>
                <div class="grid-item half flex centralize">
                    <div class="footer-nav">
                        <div class="footer-nav-item">
                            <h5>About</h5>
                            <ul>
                                <li>
                                    <a href="#">Travelsafe</a>
                                </li>
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

    <script src="../dist/bundle.js"></script>
</body>

</html>
