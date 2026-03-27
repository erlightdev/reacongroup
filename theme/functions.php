<?php

/**
 * reacon-group functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package reacon-group
 */
if (!defined('REACON_GROUP_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('REACON_GROUP_VERSION', '0.1.0');
}

if (!defined('REACON_GROUP_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `reacon_group_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'REACON_GROUP_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('reacon_group_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function reacon_group_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on reacon-group, use a find and replace
		 * to change 'reacon-group' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('reacon-group', get_template_directory() . '/languages');

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'reacon-group'),
				'menu-2' => __('Footer Menu', 'reacon-group'),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'reacon_group_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reacon_group_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Footer', 'reacon-group'),
			'id' => 'sidebar-1',
			'description' => __('Add widgets here to appear in your footer.', 'reacon-group'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}

add_action('widgets_init', 'reacon_group_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function reacon_group_scripts()
{
	wp_enqueue_style('reacon-group-style', get_stylesheet_uri(), array(), REACON_GROUP_VERSION);
	wp_enqueue_script('reacon-group-script', get_template_directory_uri() . '/js/script.min.js', array(), REACON_GROUP_VERSION, true);

	// Phosphor icons (all weights).
	wp_enqueue_script(
		'reacon-group-phosphor',
		'https://unpkg.com/@phosphor-icons/web',
		array(),
		'2.1.2',
		true
	);

	if (is_singular('post') || is_page_template('page-templates/industries-page-template.php')) {
		wp_enqueue_style(
			'reacon-group-swiper-style',
			'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
			array(),
			'11.1.4'
		);

		wp_enqueue_script(
			'reacon-group-swiper-script',
			'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
			array(),
			'11.1.4',
			true
		);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'reacon_group_scripts');

/**
 * Add `defer` to specific scripts for performance.
 *
 * @param string $tag The `<script>` tag.
 * @param string $handle Script handle.
 * @return string
 */
function reacon_group_defer_scripts($tag, $handle)
{
	$defer_handles = array(
		// Add handles of scripts that should be deferred here if needed in the future.
	);

	if (in_array($handle, $defer_handles, true)) {
		return str_replace('<script ', '<script defer ', $tag);
	}

	return $tag;
}

add_filter('script_loader_tag', 'reacon_group_defer_scripts', 10, 2);

/**
 * Enqueue the block editor script.
 */
function reacon_group_enqueue_block_editor_script()
{
	$current_screen = function_exists('get_current_screen') ? get_current_screen() : null;

	if (
		$current_screen &&
		$current_screen->is_block_editor() &&
		'widgets' !== $current_screen->id
	) {
		wp_enqueue_script(
			'reacon-group-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			REACON_GROUP_VERSION,
			true
		);
		wp_add_inline_script('reacon-group-editor', "tailwindTypographyClasses = '" . esc_attr(REACON_GROUP_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}

add_action('enqueue_block_assets', 'reacon_group_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function reacon_group_tinymce_add_class($settings)
{
	$settings['body_class'] = REACON_GROUP_TYPOGRAPHY_CLASSES;
	return $settings;
}

add_filter('tiny_mce_before_init', 'reacon_group_tinymce_add_class');

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function reacon_group_modify_heading_levels($args, $block_type)
{
	if ('core/heading' !== $block_type) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array(2, 3, 4);

	return $args;
}

add_filter('register_block_type_args', 'reacon_group_modify_heading_levels', 10, 2);

/** Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/** Functions which enhance the theme by hooking into WordPress. */
require get_template_directory() . '/inc/template-functions.php';
