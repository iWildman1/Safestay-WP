<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Safestay
**/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<?php wp_head(); ?>
</head>
<?php
$body_class = "";
if( is_singular('post') ){
	$body_class = "explorer-single";
} else if (is_home() OR is_page_template('template-offers.php')){
	$body_class = "exclusive-offers";
} else if (is_page_template('template-groups-inner.php')) {
	$body_class = "group-bookings page-template-template-groups";
} else if (is_page_template('template-about.php') OR is_singular('offers')) {
	$body_class = "explorer-single";
} else if (is_tax('locations')) {
	$body_class = "page-template-template-groups";
}
?>
<body <?php body_class($body_class); ?>>
<?php
get_template_part('template-parts/page-header'); ?>
