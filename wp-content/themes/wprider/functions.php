<?php
/**
 * Wprider functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wprider
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wprider_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wprider_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wprider, use a find and replace
		 * to change 'wprider' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wprider', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'wprider' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wprider_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wprider_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wprider_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wprider_content_width', 640 );
}
add_action( 'after_setup_theme', 'wprider_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wprider_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wprider' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wprider' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wprider_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wprider_scripts() {
	wp_enqueue_style( 'wprider-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wprider-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wprider-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wprider_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( ! function_exists('apps_post_type') ) {

	// Register Custom Post Type
	function apps_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Phone Apps', 'Post Type General Name', 'wprider' ),
			'singular_name'         => _x( 'Phone App', 'Post Type Singular Name', 'wprider' ),
			'menu_name'             => __( 'Phone App', 'wprider' ),
			'name_admin_bar'        => __( 'App', 'wprider' ),
			'archives'              => __( 'App Archives', 'wprider' ),
			'attributes'            => __( 'App Attributes', 'wprider' ),
			'parent_item_colon'     => __( 'Parent App:', 'wprider' ),
			'all_items'             => __( 'All Apps', 'wprider' ),
			'add_new_item'          => __( 'Add New Apps', 'wprider' ),
			'add_new'               => __( 'Add New', 'wprider' ),
			'new_item'              => __( 'New App', 'wprider' ),
			'edit_item'             => __( 'Edit App', 'wprider' ),
			'update_item'           => __( 'Update App', 'wprider' ),
			'view_item'             => __( 'View App', 'wprider' ),
			'view_items'            => __( 'View Apps', 'wprider' ),
			'search_items'          => __( 'Search App', 'wprider' ),
			'not_found'             => __( 'Not found', 'wprider' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wprider' ),
			'featured_image'        => __( 'Featured Image', 'wprider' ),
			'set_featured_image'    => __( 'Set featured image', 'wprider' ),
			'remove_featured_image' => __( 'Remove featured image', 'wprider' ),
			'use_featured_image'    => __( 'Use as featured image', 'wprider' ),
			'insert_into_item'      => __( 'Insert into App', 'wprider' ),
			'uploaded_to_this_item' => __( 'Uploaded to this App', 'wprider' ),
			'items_list'            => __( 'Apps list', 'wprider' ),
			'items_list_navigation' => __( 'Apps list navigation', 'wprider' ),
			'filter_items_list'     => __( 'Filter Apps list', 'wprider' ),
		);
		$args = array(
			'label'                 => __( 'Phone App', 'wprider' ),
			'description'           => __( 'Phone App', 'wprider' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
			'taxonomies'            => array( 'os' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'phone_app', $args );
	
	}
	add_action( 'init', 'apps_post_type', 0 );
	
	}

// Register Custom Taxonomy
function OS_taxonomy() {

	$labels = array(
		'name'                       => _x( 'OS', 'Taxonomy General Name', 'wprider' ),
		'singular_name'              => _x( 'OS', 'Taxonomy Singular Name', 'wprider' ),
		'menu_name'                  => __( 'OS', 'wprider' ),
		'all_items'                  => __( 'All OS', 'wprider' ),
		'parent_item'                => __( 'Parent OS', 'wprider' ),
		'parent_item_colon'          => __( 'Parent OS:', 'wprider' ),
		'new_item_name'              => __( 'New OS Name', 'wprider' ),
		'add_new_item'               => __( 'Add New OS', 'wprider' ),
		'edit_item'                  => __( 'Edit OS', 'wprider' ),
		'update_item'                => __( 'Update OS', 'wprider' ),
		'view_item'                  => __( 'View OS', 'wprider' ),
		'separate_items_with_commas' => __( 'Separate OS with commas', 'wprider' ),
		'add_or_remove_items'        => __( 'Add or remove OS', 'wprider' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wprider' ),
		'popular_items'              => __( 'Popular OS', 'wprider' ),
		'search_items'               => __( 'Search OS', 'wprider' ),
		'not_found'                  => __( 'Not Found', 'wprider' ),
		'no_terms'                   => __( 'No OS', 'wprider' ),
		'items_list'                 => __( 'OS list', 'wprider' ),
		'items_list_navigation'      => __( 'OS list navigat ion', 'wprider' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'os', array( 'phone_app'), $args );

}
add_action( 'init', 'OS_taxonomy', 0 );

// function wpriders_enqueue_scripts() {
//     // all styles
//     wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), 20141119 );
//     wp_enqueue_style( 'wprider-bootstrap-style', get_stylesheet_directory_uri() . '/css/style.css', array(), 20141119 );
//     // all scripts
//     wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
//     wp_enqueue_script( 'wprider-bootstrap-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20120206', true );
// }
// add_action( 'wp_enqueue_scripts', 'wpriders_enqueue_scripts' );