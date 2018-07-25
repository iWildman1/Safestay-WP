<?php
/**
 *
 * Template Name: Investors
 *
 */
?>
<?php
get_header();
include('template-parts/page-header.php');
?>
<section class="groups-intro bg-light-grey padding-bottom-xlarge padding-top-large">
    <div class="container relative">
        <div class="investor-info-row">
            <div class="investor-item">
                <div class="investor-inner">
                    <div class="investor-text-wrapper">
                        <span class="small">Share price</span>
                        <h5>49.00</h5>
                        <hr>
                        <span class="smallest">Source: Alpha Vantage<br>(Prices 15 minutes delayed)</span>
                    </div>
                </div>
            </div>
            <div class="investor-item">
                <div class="investor-inner">
                    <div class="investor-text-wrapper">
                        <span class="small">View</span>
                        <h5>Company Reports</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('template-parts/flexible-content.php');
get_footer();
?>
