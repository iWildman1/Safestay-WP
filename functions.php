<?php
/**
 * Safestay functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Safestay
 */

if ( ! function_exists( 'safestay_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function safestay_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Safestay, use a find and replace
		 * to change 'safestay' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'safestay', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'safestay' ),
			'about-side' => esc_html__( 'About side menu', 'safestay' ),
			'footer-left' => esc_html__( 'Footer - Right side - Left menu', 'safestay' ),
			'footer-middle' => esc_html__( 'Footer - Right side - Middle menu', 'safestay' ),
			'footer-right' => esc_html__( 'Footer - Right side - Right menu', 'safestay' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'safestay_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'safestay_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function safestay_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'safestay_content_width', 640 );
}
add_action( 'after_setup_theme', 'safestay_content_width', 0 );

// AJAX script
<<<<<<< HEAD
	function my_load_more_scripts() {
		global $wp_query;
		wp_register_script( 'safestay-loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array() );
		wp_localize_script( 'safestay-loadmore', 'loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );
	 	wp_enqueue_script( 'safestay-loadmore' );
	}
	add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );
// END AJAX script

// Ajax handler
	function loadmore_ajax_handler(){
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
		query_posts( $args );
		if( have_posts() ) :
			while( have_posts() ): the_post();
				get_template_part( 'template-parts/post/single-content', get_post_format() );
			endwhile;
		endif;
		die;
	}
	add_action('wp_ajax_loadmore', 'loadmore_ajax_handler');
	add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler');
// END Ajax handler
=======
function my_load_more_scripts() {
	global $wp_query;
	wp_register_script( 'safestay-loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array() );
	wp_localize_script( 'safestay-loadmore', 'loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 	wp_enqueue_script( 'safestay-loadmore' );
}
add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );

// Ajax handler
function loadmore_ajax_handler(){
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
			get_template_part( 'template-parts/post/single-content', get_post_format() );
			//the_title();
		endwhile;
	endif;
	die;
}
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler');
>>>>>>> be1e9c0b56af2a484c4bddaa7b2ac7992b103f3e


// ACF options page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
		acf_add_options_sub_page('Header');
		acf_add_options_sub_page('Footer');
		acf_add_options_sub_page('Main menu');
		acf_add_options_sub_page('Instagram');
		acf_add_options_sub_page('Groups menu');
		acf_add_options_sub_page('Group booking overlay');
		acf_add_options_sub_page('Contact us section');
		acf_add_options_sub_page('Team members');
		acf_add_options_sub_page('Booking form');
		acf_add_options_sub_page('Safestay membership');
	}
// END ACF options page

// ACF Google Maps key
	function my_acf_google_map_api( $api ){
		$api['key'] = 'AIzaSyB5-l_7vP9fef_liV7c3cEbPDs6rojshX8';
		return $api;
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
// END ACF Google Maps key

// Instagram feed
	function rudr_instagram_api_curl_connect( $api_url ){
		$connection_c = curl_init(); // initializing
		curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
		curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
		curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
		$json_return = curl_exec( $connection_c ); // connect and get json data
		curl_close( $connection_c ); // close connection
		return json_decode( $json_return ); // decode and return
	}
	function instagramx($access_token,$user_id){
		$return = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/" . $user_id . "/media/recent/?access_token=" . $access_token);
		foreach ($return->data as $post) {
			?>
			<div class="grid-item">
				<img src="<?php echo $post->images->standard_resolution->url; ?>" alt="">
			</div>
			<?php
		}
	}
	function locationsIG($access_token,$user_id){
		$return = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/" . $user_id . "/media/recent/?access_token=" . $access_token);
		foreach ($return->data as $post) {
			$hastags = $post->tags;
			$title = get_the_title();
			foreach ($hastags as $hastag) {
				echo $hastag;
				if ( $hastag ) { ?>
					<div class="grid-item">
						<img src="<?php echo $post->images->standard_resolution->url; ?>" alt="">
					</div>
					<?php
				}
			}
		}
	}
// END Instagram feed

// Menu name by theme location
	function get_menu_name ($menu_name){
		if( empty($menu_name) ) return false;
		$locations = get_nav_menu_locations();
		$menu_id = $locations[ $menu_name ];
		$menu = wp_get_nav_menu_object($menu_id);
		$menu_name = $menu->name;
		return $menu_name;
	}
// END Menu name by theme location


// SVG supprot
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	function svg_meta_data($data, $id){
	    $attachment = get_post($id); // Filter makes sure that the post is an attachment
	    $mime_type = $attachment->post_mime_type; // The attachment mime_type
	    //If the attachment is an svg
	    if($mime_type == 'image/svg+xml'){
	        //If the svg metadata are empty or the width is empty or the height is empty
	        //then get the attributes from xml.
	        if(empty($data) || empty($data['width']) || empty($data['height'])){
	            $xml = simplexml_load_file(wp_get_attachment_url($id));
	            $attr = $xml->attributes();
	            $viewbox = explode(' ', $attr->viewBox);
	            $data['width'] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
	            $data['height'] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
	        }
	    }
	    return $data;
	}
	add_filter('wp_update_attachment_metadata', 'svg_meta_data', 10, 2);
// END SVG supprot


// Different template for subcategory
	function wpd_subcategory_template( $template ) {
		$cat = get_queried_object();
		if( 0 < $cat->parent )
			$template = locate_template( 'taxonomy-locations-children.php' );
		return $template;
	}
	add_filter( 'taxonomy_template', 'wpd_subcategory_template' );
// END Different template for subcategory

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function safestay_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'safestay' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'safestay' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'safestay_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function safestay_scripts() {
	// Styles
	wp_enqueue_style( 'safestay-style', get_stylesheet_uri() );
	wp_enqueue_style( 'safestay-dist-style', get_template_directory_uri() . '/dist/styles.css', array(), '1.0.0');

	wp_enqueue_style( 'safestay-custom-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0');

	// Scripts
	wp_enqueue_script( 'safestay-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB5-l_7vP9fef_liV7c3cEbPDs6rojshX8', array(), '1.0.0', true );
	wp_enqueue_script( 'safestay-jquery-script', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.3.1', true );
	wp_enqueue_script( 'safestay-main-scripts', get_template_directory_uri() . '/dist/bundle.js', array(), microtime(), true );
	wp_enqueue_script( 'safestay-owl-carousel-script', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '2.3.4', true );
	wp_enqueue_script( 'safestay-custom-script', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'safestay_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// CUstom php
require get_template_directory() . '/inc/custom.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
