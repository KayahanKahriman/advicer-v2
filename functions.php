<?php

/**
 * Template assets' paths
 */
define('IMAGE_DIR', get_template_directory_uri() . '/assets/images');
define('JS_DIR', get_template_directory_uri() . '/assets/js');
define('CSS_DIR', get_template_directory_uri() . '/assets/css');

/**
 * Codestar Framework
 */
require_once get_theme_file_path() . '/lib/codestar-framework/codestar-framework.php';
require_once get_theme_file_path() . '/lib/theme-settings.php';

/**
 * Optimize Wordpress
 */
require_once get_theme_file_path() . '/lib/optimize.php';

/**
 * Breadcrumbs support
 */
require_once get_theme_file_path() . '/lib/breadcrumbs.php';

/**
 * Image size support
 */
add_theme_support('post-thumbnails');
add_image_size('large', 700, '', true);
add_image_size('medium', 250, '', true);
add_image_size('small', 120, '', true);
add_image_size('product-thumbnail', 300, 300, true);

/**
 * Template functions and definitions
 */

if (!function_exists('yoda_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function yoda_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yoda, use a find and replace
		 * to change 'yoda' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('yoda', get_template_directory() . '/languages');

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'menu-1' => esc_html__('Primary', 'yoda'),
    ));

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support('html5', array(
      'search-form',
      //'comment-form',
      //'comment-list',
      'gallery',
      'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ));
  }
endif;
add_action('after_setup_theme', 'yoda_setup');

/**
 * Enqueue scripts and styles.
 */
function yoda_scripts()
{
  wp_enqueue_style('yoda-style', get_stylesheet_uri());
  wp_enqueue_style('st', CSS_DIR . '/style.css');
  wp_enqueue_script('jq-s', JS_DIR . '/jquery-3.4.0.slim.min.js', array(), '3.4.0', true);

  /**Contact page css & js */

  if (is_page_template('contact.php')) {
    $contact = get_post_meta(get_the_ID(), 'contact-page', true);
    wp_enqueue_style('contact-css', CSS_DIR . '/contact.css');
    wp_enqueue_script('contact-js', JS_DIR . '/contact.js');
    wp_enqueue_script('google-api-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB5Ft8M304nbdALRRKQQnnHPsw_qxWG_ro');
    if ($contact['contact_layout'] === 'contact-layout-1') {
      wp_enqueue_style('ct-1', CSS_DIR . '/contact-1.css');
    } elseif ($contact['contact_layout'] === 'contact-layout-2') {
      wp_enqueue_style('ct-1', CSS_DIR . '/contact-2.css');
    }
  }
}
add_action('wp_enqueue_scripts', 'yoda_scripts');

/**
 * Admin login styles and javascripts
 */

function yoda_admin_login()
{

  wp_dequeue_style('login');
  wp_deregister_style('login');

  if ($GLOBALS['pagenow'] === 'wp-login.php') {
    wp_enqueue_style('admin-login', CSS_DIR . '/admin-login.css');
    wp_enqueue_script('admin-login', JS_DIR . '/admin-login.js', '', '', true);
  }
}
add_action('login_enqueue_scripts', 'yoda_admin_login');
