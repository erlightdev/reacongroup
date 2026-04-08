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

		// Primary header + footer columns (assign under Appearance → Menus).
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'reacon-group'),
				'menu-2' => __('Footer (legacy)', 'reacon-group'),
				'reacon-footer-quick-links' => __('Footer: Quick links', 'reacon-group'),
				'reacon-footer-solutions' => __('Footer: Solutions', 'reacon-group'),
				'reacon-footer-industries' => __('Footer: Industries', 'reacon-group'),
				'reacon-footer-legal' => __('Footer: Legal', 'reacon-group'),
				'reacon-footer-brands' => __('Footer: Group brands', 'reacon-group'),
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
 * Save and load ACF field groups / UI from the bundled acf-json directory.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/
 */
function reacon_group_acf_json_save_path($path)
{
	return get_template_directory() . '/acf-json';
}

/**
 * @param array<string> $paths Default load paths.
 * @return array<string>
 */
function reacon_group_acf_json_load_paths($paths)
{
	unset($paths[0]);
	$paths[] = get_template_directory() . '/acf-json';
	return $paths;
}

add_filter('acf/settings/save_json', 'reacon_group_acf_json_save_path');
add_filter('acf/settings/load_json', 'reacon_group_acf_json_load_paths');

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
	$style_path = get_stylesheet_directory() . '/style.css';
	$script_path = get_template_directory() . '/js/script.min.js';
	$style_version = file_exists($style_path) ? (string) filemtime($style_path) : REACON_GROUP_VERSION;
	$script_version = file_exists($script_path) ? (string) filemtime($script_path) : REACON_GROUP_VERSION;

	wp_enqueue_style('reacon-group-style', get_stylesheet_uri(), array(), $style_version);
	wp_enqueue_script('reacon-group-script', get_template_directory_uri() . '/js/script.min.js', array(), $script_version, true);

	// Alpine.js for lightweight interactive UI behavior.
	wp_enqueue_script(
		'reacon-group-alpine',
		'https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js',
		array(),
		'3.14.1',
		true
	);

	// Phosphor icons (all weights).
	wp_enqueue_script(
		'reacon-group-phosphor',
		'https://unpkg.com/@phosphor-icons/web',
		array(),
		'2.1.2',
		true
	);

	// Lucide icons (used by ACF-selectable icon fields).
	wp_enqueue_script(
		'reacon-group-lucide',
		'https://unpkg.com/lucide@latest',
		array(),
		null,
		true
	);

	// GSAP animation library.
	wp_enqueue_script(
		'reacon-group-gsap',
		'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js',
		array(),
		'3.12.7',
		true
	);

	wp_enqueue_script(
		'reacon-group-gsap-scrolltrigger',
		'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js',
		array('reacon-group-gsap'),
		'3.12.7',
		true
	);

	if (is_singular('post') || is_page_template('page-templates/industries-page-template.php') || is_post_type_archive('industry')) {
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
		'reacon-group-alpine',
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

/** SVG upload support + inline SVG rendering helpers. */
require get_template_directory() . '/inc/helpers/svg-support.php';

require get_template_directory() . '/inc/helpers/header-menu-walkers.php';
