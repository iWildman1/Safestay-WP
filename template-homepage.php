<?php
/**
 * Template Name: Homepage Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
?>
<section class="booking-form">
    <div class="container">
        <?php
<<<<<<< HEAD
        get_template_part('template-parts/booking-form'); ?>
    </div>
</section>
<?php
get_template_part('template-parts/explore-block');
=======
        include('template-parts/booking-form.php');
        ?>
    </div>
</section>
<?php
include('template-parts/explore-block.php');
include('template-parts/flexible-content.php');
include('template-parts/booknow-menu.php');
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e
get_footer();
?>
