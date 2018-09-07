<?php
/**
 * Template Name: Book Now
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Safestay
**/
get_header();
?>
<div class="container">
    <div class="row">
        <div class="grid-item fulls" style="width:100%;">
            <?php
            if ( isset($_POST) && isset($_POST['location']) && !empty($_POST['location']) && isset($_POST['check-in']) && !empty($_POST['check-in']) && isset($_POST['check-out']) && !empty($_POST['check-out']) ):
                $postids = $_POST['location'];
                $checking = $_POST['check-in'];
                $checkout = $_POST['check-out'];
                $hoteliframe = get_field('iframe_link',$postids); ?>
                <iframe src="https://<?php echo $hoteliframe ?>?widget=1#checkin=<?php echo $checking ?>&checkout=<?php echo $checkout ?>" width="100%" scrolling="no" class="iframe-class" frameborder="0" height="100%" id="cloudbeds"></iframe>
                    <!-- Add script to auto-resize the iFrame -->
                    <script type="text/javascript" src="https://hotels.cloudbeds.com/widget/iFrameResizer"></script>
                    <script>window.iFrameResize({}, '#cloudbeds')</script>
                <?php
            else : ?>
                <section class="booking-form">
                    <?php
                    get_template_part('template-parts/booking-form'); ?>
                </section>
                <h1 class="booking-error"><?php echo __('Submited empty form or field, please try again!'); ?></h1>
                <?php
            endif; ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
