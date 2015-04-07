<?php
/**
 * Flatland functions and definitions
 *
 * @package Flatland
 */


if (! function_exists('flatland_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flatland_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Flatland, use a find and replace
	 * to change 'flatland' to the name of your theme in all the template files
	 */
	load_theme_textdomain('flatland', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'flatland'),
        'footer-menu' => __('Footer Menu', 'flatland'),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	));

	// Set up the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('flatland_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
}
endif; // flatland_setup
add_action('after_setup_theme', 'flatland_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function flatland_widgets_init() {
    $right_sidebar = array(
        'name'          => __('Sidebar', 'flatland'),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h1>',
    );
    $left_sidebar = array(
        'name'          => __('Sidebar Left', 'flatland'),
        'id'            => 'sidebar-left',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h1>',
    );
	register_sidebar($right_sidebar);
	register_sidebar($left_sidebar);
}
add_action('widgets_init', 'flatland_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function flatland_scripts() {
    wp_enqueue_style('flatland-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.2', 'all');
	wp_enqueue_style('flatland-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.3.0', 'all');
	wp_enqueue_style('flatland-style', get_stylesheet_uri());

    wp_enqueue_script('flatland-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.2', true);
	wp_enqueue_script('flatland-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'flatland_scripts');



function flatland_ie_scripts() {
    $html_shiv = <<<EOT

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

EOT;
    print $html_shiv;
}
add_action('wp_head', 'flatland_ie_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load the Menu Walker class.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
