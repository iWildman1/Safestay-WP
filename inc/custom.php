<?php
// Hostels Hashtag taxonomy
	add_action( 'init', 'create_hashtags_hierarchical_taxonomy', 0 );
	function create_hashtags_hierarchical_taxonomy() {
		$labels = array(
			'name'				=> _x( 'Hashtags', 'taxonomy general name' ),
			'singular_name'		=> _x( 'Hastag', 'taxonomy singular name' ),
			'search_items'		=> __( 'Search Hashtags' ),
			'all_items'			=> __( 'All Hashtags' ),
			'parent_item'		=> __( 'Parent Hastag' ),
			'parent_item_colon' => __( 'Parent Hastag:' ),
			'edit_item'			=> __( 'Edit Hastag' ),
			'update_item'		=> __( 'Update Hastag' ),
			'add_new_item'		=> __( 'Add New Hastag' ),
			'new_item_name'		=> __( 'New Hastag Name' ),
			'menu_name'			=> __( 'Hashtags' ),
		);
		register_taxonomy('hashtags',array('post'), array(
			'hierarchical'		=> true,
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
		));
	}
// Hostels Hashtag taxonomy

// Ofress Type taxonomy
	add_action( 'init', 'create_type_hierarchical_taxonomy', 0 );
	function create_type_hierarchical_taxonomy() {
		$labels = array(
			'name'				=> _x( 'Types', 'taxonomy general name' ),
			'singular_name'		=> _x( 'Type', 'taxonomy singular name' ),
			'search_items'		=> __( 'Search Types' ),
			'all_items'			=> __( 'All Types' ),
			'parent_item'		=> __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'edit_item'			=> __( 'Edit Type' ),
			'update_item'		=> __( 'Update Type' ),
			'add_new_item'		=> __( 'Add New Type' ),
			'new_item_name'		=> __( 'New Type Name' ),
			'menu_name'			=> __( 'Types' ),
		);
		register_taxonomy('type',array('offers'), array(
			'hierarchical'		=> true,
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
		));
	}
// Ofress Type taxonomy

// Hostel locations
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
		register_taxonomy('locations',array('post','hostel','offers'), array(
			'hierarchical'		=> true,
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
		));
	}
// Hostel locations

// Hostel CPT
	function hostel_cpt() {
		$labels = array(
			'name'					=> _x( 'Hostel', 'Post Type General Name', 'safestay' ),
			'singular_name'			=> _x( 'Hostels', 'Post Type Singular Name', 'safestay' ),
			'menu_name'				=> __( 'Hostels', 'safestay' ),
			'parent_item_colon'		=> __( 'Parent Hostel', 'safestay' ),
			'all_items'				=> __( 'All Hostels', 'safestay' ),
			'view_item'				=> __( 'View Hostel', 'safestay' ),
			'add_new_item'			=> __( 'Add New Hostel', 'safestay' ),
			'add_new'				=> __( 'Add New', 'safestay' ),
			'edit_item'				=> __( 'Edit Hostel', 'safestay' ),
			'update_item'			=> __( 'Update Hostel', 'safestay' ),
			'search_items'			=> __( 'Search Hostel', 'safestay' ),
			'not_found'				=> __( 'Not Found', 'safestay' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'safestay' ),
		);
		$args = array(
			'label'					=> __( 'Hostel', 'safestay' ),
			'description'			=> __( 'SafeStay hostels', 'safestay' ),
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
			'capability_type'		=> 'post',
	        'taxonomy'              => 'locations',
		);
		register_post_type( 'hostel', $args );
	}
	add_action( 'init', 'hostel_cpt', 0 );
// Hostel CPT

// Offers CPT
	function offers_cpt() {
		$labels = array(
			'name'					=> _x( 'Offer', 'Post Type General Name', 'safestay' ),
			'singular_name'			=> _x( 'Offers', 'Post Type Singular Name', 'safestay' ),
			'menu_name'				=> __( 'Offers', 'safestay' ),
			'parent_item_colon'		=> __( 'Parent Offer', 'safestay' ),
			'all_items'				=> __( 'All Offers', 'safestay' ),
			'view_item'				=> __( 'View Offer', 'safestay' ),
			'add_new_item'			=> __( 'Add New Offer', 'safestay' ),
			'add_new'				=> __( 'Add New', 'safestay' ),
			'edit_item'				=> __( 'Edit Offer', 'safestay' ),
			'update_item'			=> __( 'Update Offer', 'safestay' ),
			'search_items'			=> __( 'Search Offer', 'safestay' ),
			'not_found'				=> __( 'Not Found', 'safestay' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'safestay' ),
		);
		$args = array(
			'label'					=> __( 'Offer', 'safestay' ),
			'description'			=> __( 'SafeStay offers', 'safestay' ),
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
			'capability_type'		=> 'post',
			'taxonomy'              => 'locations',
		);
		register_post_type( 'offers', $args );
	}
	add_action( 'init', 'offers_cpt', 0 );
// Offers CPT

// Rooms CPT
	function rooms_cpt() {
		$labels = array(
			'name'					=> _x( 'Room', 'Post Type General Name', 'safestay' ),
			'singular_name'			=> _x( 'Rooms', 'Post Type Singular Name', 'safestay' ),
			'menu_name'				=> __( 'Rooms', 'safestay' ),
			'parent_item_colon'		=> __( 'Parent Room', 'safestay' ),
			'all_items'				=> __( 'All Rooms', 'safestay' ),
			'view_item'				=> __( 'View Room', 'safestay' ),
			'add_new_item'			=> __( 'Add New Room', 'safestay' ),
			'add_new'				=> __( 'Add New', 'safestay' ),
			'edit_item'				=> __( 'Edit Room', 'safestay' ),
			'update_item'			=> __( 'Update Room', 'safestay' ),
			'search_items'			=> __( 'Search Room', 'safestay' ),
			'not_found'				=> __( 'Not Found', 'safestay' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'safestay' ),
		);
		$args = array(
			'label'					=> __( 'Room', 'safestay' ),
			'description'			=> __( 'SafeStay rooms', 'safestay' ),
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
			'capability_type'		=> 'post',
		);
		register_post_type( 'rooms', $args );
	}
	add_action( 'init', 'rooms_cpt', 0 );
// Rooms CPT
