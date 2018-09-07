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
        get_template_part('template-parts/booking-form'); ?>
    </div>
</section>
<?php
get_template_part('template-parts/explore-block');
get_footer();
?>
