<?php
add_action( 'init', 'create_locations_hierarchical_taxonomy', 0 );
function create_locations_hierarchical_taxonomy() {
	$labels = array(
		'name'				=> _x( 'Locations', 'taxonomy general name' ),
		'singular_name'		=> _x( 'Location', 'taxonomy singular name' ),
		'search_items'		=> __( 'Search Locations' ),
		'all_items'			=> __( 'All Locations' ),
		'parent_item'		=> __( 'Parent Location' ),
		'parent_item_colon' => __( 'Parent Location:' ),
		'edit_item'			=> __( 'Edit Location' ),
		'update_item'		=> __( 'Update Location' ),
		'add_new_item'		=> __( 'Add New Location' ),
		'new_item_name'		=> __( 'New Location Name' ),
		'menu_name'			=> __( 'Locations' ),
	);
	register_taxonomy('locations',array('hostel'), array(
		'hierarchical'		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'query_var'			=> true,
	));
}

function hostel_cpt() {
	$labels = array(
		'name'					=> _x( 'Hostel Country', 'Post Type General Name', 'safestay' ),
		'singular_name'			=> _x( 'Hostel Countries', 'Post Type Singular Name', 'safestay' ),
		'menu_name'				=> __( 'Hostel Countries', 'safestay' ),
		'parent_item_colon'		=> __( 'Parent Hostel Country', 'safestay' ),
		'all_items'				=> __( 'All Hostel Countries', 'safestay' ),
		'view_item'				=> __( 'View Hostel Country', 'safestay' ),
		'add_new_item'			=> __( 'Add New Hostel Country', 'safestay' ),
		'add_new'				=> __( 'Add New', 'safestay' ),
		'edit_item'				=> __( 'Edit Hostel Country', 'safestay' ),
		'update_item'			=> __( 'Update Hostel Country', 'safestay' ),
		'search_items'			=> __( 'Search Hostel Country', 'safestay' ),
		'not_found'				=> __( 'Not Found', 'safestay' ),
		'not_found_in_trash'	=> __( 'Not found in Trash', 'safestay' ),
	);
	$args = array(
		'label'					=> __( 'Hostel Country', 'safestay' ),
		'description'			=> __( 'Hostel Country', 'safestay' ),
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'capability_type'		=> 'page',
        'taxonomy'              => 'locations',
	);
	register_post_type( 'hostel', $args );
}
add_action( 'init', 'hostel_cpt', 0 );
