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
	wp_enqueue_style('reacon-group-style', get_stylesheet_uri(), array(), REACON_GROUP_VERSION);
	wp_enqueue_script('reacon-group-script', get_template_directory_uri() . '/js/script.min.js', array(), REACON_GROUP_VERSION, true);

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

/**
 * Header mega-menu helpers + nav walkers.
 *
 * Requirements:
 * - Desktop: top-level item with children shows a mega panel (data-mega-trigger/panel).
 * - Mega cards are built from submenu items using ACF fields on nav menu items:
 *   - header_menu_icon_source (svg_asset|image)
 *   - header_menu_icon_svg_asset
 *   - header_menu_icon_image
 *   - header_menu_description
 * - Mobile: if a top-level item has children, show a toggle button that reveals
 *   its children as a simple list. The existing theme JS relies on:
 *   - .mobile-submenu-toggle buttons
 *   - the submenu container being the nextElementSibling of the button
 */

if (!function_exists('reacon_group_header_render_nav_menu_icon')) {
	/**
	 * Render icon for a nav menu item (mega card).
	 *
	 * @param int    $menu_item_id Menu item post ID (nav_menu_item).
	 * @param string $class         Extra classes for the rendered icon.
	 */
	function reacon_group_header_render_nav_menu_icon($menu_item_id, $class = '')
	{
		if (!function_exists('get_field') || empty($menu_item_id)) {
			return;
		}

		$source = get_field('header_menu_icon_source', $menu_item_id);
		$source = is_string($source) ? $source : '';
		$class = trim((string) $class);

		if ($source === 'svg_asset') {
			$svg_asset = get_field('header_menu_icon_svg_asset', $menu_item_id);
			$svg_asset = is_string($svg_asset) ? trim($svg_asset) : '';
			if ($svg_asset !== '' && function_exists('reacon_group_inline_svg')) {
				// Inline SVG helper returns sanitized markup.
				$svg_markup = reacon_group_inline_svg($svg_asset, $class);
				if ($svg_markup) {
					echo $svg_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
			return;
		}

		if ($source === 'image') {
			$icon_image = get_field('header_menu_icon_image', $menu_item_id);
			$icon_image = is_string($icon_image) ? trim($icon_image) : '';
			if ($icon_image !== '') {
				echo '<img src="' . esc_url($icon_image) . '" alt="" class="' . esc_attr($class) . '" loading="lazy" decoding="async" aria-hidden="true" />';
			}
			return;
		}
	}
}

/**
 * ACF admin: shrink header mega-menu icon previews.
 *
 * This is purely for admin usability on Appearance → Menus.
 */
add_action('admin_head', static function() {
	global $pagenow;
	if (!isset($pagenow) || 'nav-menus.php' !== $pagenow) {
		return;
	}

	// ACF image uploader preview can render very large thumbnails.
	echo '<style>
		[data-name="header_menu_icon_image"] img,
		[data-name="header_mega_feature_image"] img {
			max-width: 20px !important;
			max-height: 20px !important;
			width: 20px !important;
			height: 20px !important;
			object-fit: contain !important;
		}
	</style>';
});

if (!function_exists('reacon_group_nav_menu_item_is_active')) {
	/**
	 * Best-effort "active" detector for nav_menu_item objects.
	 *
	 * @param object $item Menu item object.
	 */
	function reacon_group_nav_menu_item_is_active($item): bool
	{
		if (!$item) {
			return false;
		}

		if (!empty($item->current)) {
			return true;
		}

		$classes = isset($item->classes) ? (array) $item->classes : array();
		if (
			in_array('current-menu-item', $classes, true) ||
			in_array('current_page_item', $classes, true) ||
			in_array('current-menu-ancestor', $classes, true) ||
			in_array('current_page_ancestor', $classes, true)
		) {
			return true;
		}

		$qid = function_exists('get_queried_object_id') ? (int) get_queried_object_id() : 0;
		if ($qid > 0 && !empty($item->object_id) && (int) $item->object_id === $qid) {
			return true;
		}

		$item_url = !empty($item->url) ? (string) $item->url : '';
		if ($item_url === '' || !function_exists('home_url') || !function_exists('wp_parse_url')) {
			return false;
		}

		$request = '';
		if (!empty($GLOBALS['wp']) && is_object($GLOBALS['wp']) && isset($GLOBALS['wp']->request)) {
			$request = (string) $GLOBALS['wp']->request;
		}
		$current_url = home_url(add_query_arg(array(), $request));

		$item_path = (string) (wp_parse_url($item_url, PHP_URL_PATH) ?? '');
		$cur_path = (string) (wp_parse_url($current_url, PHP_URL_PATH) ?? '');

		$item_path = rtrim($item_path, '/');
		$cur_path = rtrim($cur_path, '/');

		return $item_path !== '' && $item_path === $cur_path;
	}
}

if (!class_exists('Reacon_Group_Header_Desktop_Walker')) {
	class Reacon_Group_Header_Desktop_Walker extends Walker_Nav_Menu
	{
		/**
		 * @var array<int,array<int,object>> menu_item_id => children items
		 */
		private array $children_by_parent_id;

		public function __construct(array $children_by_parent_id = array())
		{
			$this->children_by_parent_id = $children_by_parent_id;
		}

		public function start_lvl(&$output, $depth = 0, $args = null)
		{
			// We render mega content inside the parent; we don't want nested <ul>.
		}

		public function end_lvl(&$output, $depth = 0, $args = null)
		{
			// No-op.
		}

		public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
		{
			if ((int) $depth !== 0) {
				return;
			}

			$parent_id = (int) $item->ID;
			$children = $this->children_by_parent_id[$parent_id] ?? array();
			$has_mega = !empty($children);

			$is_active = !empty($item->current) || in_array('current-menu-item', (array) $item->classes, true);
			$active_cls = $is_active
				? 'bg-primary text-white shadow-[0_4px_10px_rgba(30,202,211,0.45)]'
				: 'text-[#5a6b83] hover:bg-[#eef4f8] hover:text-[#263444]';

			// Don't use `group` here; it conflicts with `group-hover` used inside mega cards.
			$li_class = $has_mega ? 'static' : 'relative';
			$slug = is_string($item->post_name) ? $item->post_name : (string) $item->title;

			$output .= '<li class="' . esc_attr($li_class) . '">';

			$anchor_atts = array(
				'href' => !empty($item->url) ? esc_url($item->url) : '#',
				'class' => 'relative inline-flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 font-sans text-[13px] font-medium transition-all duration-200 xl:gap-1.5 xl:px-4 xl:py-2.5 xl:text-[14px] ' . $active_cls,
			);

			if ($has_mega) {
				$anchor_atts['data-mega-trigger'] = esc_attr($slug);
				$anchor_atts['aria-haspopup'] = 'true';
				$anchor_atts['aria-expanded'] = 'false';
			}

			$attributes = '';
			foreach ($anchor_atts as $key => $value) {
				if ($value === null || $value === '') {
					continue;
				}
				$attributes .= ' ' . $key . '="' . $value . '"';
			}

			$output .= '<a' . $attributes . '>';
			$output .= esc_html((string) $item->title);

			if ($has_mega) {
				// Parent mega-menu dropdown icon: down when closed, up when open.
				$output .= '<i class="mega-parent-caret-down ph-bold ph-caret-down text-[10px] opacity-70" aria-hidden="true"></i>';
				$output .= '<i class="mega-parent-caret-up ph-bold ph-caret-up text-[10px] opacity-70 hidden" aria-hidden="true"></i>';
			}

			$output .= '</a>';

			if ($has_mega) {
				// Mega panel content (desktop).
				$feature_image = function_exists('get_field') ? get_field('header_mega_feature_image', $parent_id) : '';
				$feature_image_alt = function_exists('get_field') ? get_field('header_mega_feature_image_alt', $parent_id) : '';
				$feature_image = is_string($feature_image) ? trim($feature_image) : '';
				$feature_image_alt = is_string($feature_image_alt) ? trim($feature_image_alt) : '';

				$output .= '<div class="absolute left-1/2 top-full z-50 hidden w-[1120px] -translate-x-1/2 pt-4" data-mega-panel="' . esc_attr($slug) . '" role="menu">';
				$output .= '<div class="overflow-hidden rounded-[24px] border border-[#f3f4f6] bg-white p-6 shadow-[0px_0px_12px_0px_rgba(0,0,0,0.1)]">';
				$output .= '<div class="grid grid-cols-[1fr_520px] items-start gap-8">';

				$output .= '<div class="flex flex-col gap-[25px]">';

				$render_children_cards = static function(array $cards) use (&$output) {
					$output .= '<div class="grid grid-cols-2 gap-4">';

					foreach ($cards as $child) {
						$child_id = (int) $child->ID;
						$child_desc = function_exists('get_field') ? get_field('header_menu_description', $child_id) : '';
						$child_desc = is_string($child_desc) ? trim($child_desc) : '';
						$is_child_active = reacon_group_nav_menu_item_is_active($child);

						// Active state should match the provided screenshot:
						// - light teal card background
						// - stronger teal icon bubble
						// - arrow visible
						$card_active_cls = $is_child_active ? ' bg-[#e9fbfc]' : '';
						$icon_wrap_cls = $is_child_active ? 'bg-[#d2f7f9] text-secondary' : 'bg-[#f1f5f9] text-[#8a94a6]';
						$icon_class = $is_child_active ? 'w-[22px] h-[22px] text-secondary' : 'w-[22px] h-[22px] text-[#8a94a6]';
						$title_cls = $is_child_active ? 'text-secondary' : 'text-foreground';

						$output .= '<a href="' . esc_url($child->url) . '" class="group flex items-center gap-2 rounded-[16px] p-3 no-underline transition-colors hover:bg-[#dff8fa]' . $card_active_cls . '" role="menuitem">';
						$output .= '<span class="flex h-[42px] w-[42px] shrink-0 items-center justify-center rounded-full ' . esc_attr($icon_wrap_cls) . '">';
						ob_start();
						reacon_group_header_render_nav_menu_icon($child_id, $icon_class);
						$icon_html = ob_get_clean();
						if ($icon_html) {
							$output .= $icon_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} else {
							$output .= '<i class="ph ph-image-square text-[22px]" aria-hidden="true"></i>';
						}
						$output .= '</span>';

						$title = (string) $child->title;
						$output .= '<span class="min-w-0">';
						$output .= '<span class="block font-sans text-[16px] font-medium leading-[1.2] ' . esc_attr($title_cls) . '">' . esc_html($title) . '</span>';
						$output .= '<span class="block truncate font-sans text-[12px] leading-[1.42] text-[#666]">' . esc_html($child_desc) . '</span>';
						$output .= '</span>';

						// Render the arrow; show it on hover and also when the item is active.
						$arrow_opacity = $is_child_active ? 'opacity-100' : 'opacity-0 group-hover:opacity-100';
						$output .= '<i class="ph-bold ph-arrow-up-right ml-auto text-[16px] text-secondary ' . esc_attr($arrow_opacity) . ' transition-opacity duration-200" aria-hidden="true"></i>';

						$output .= '</a>';
					}

					$output .= '</div>'; // grid
				};

				// Restore Solutions mega-panel section headings.
				$slug_l = strtolower((string) $slug);
				$title_l = strtolower((string) $item->title);
				$is_solutions_panel = ($slug_l === 'solutions' || $title_l === 'solutions' || str_contains($slug_l, 'solutions') || str_contains($title_l, 'solutions'));

				if ($is_solutions_panel) {
					$child_count = count($children);
					$studio_count = (int) ceil($child_count / 2);
					$studio_children = array_slice($children, 0, $studio_count);
					$production_children = array_slice($children, $studio_count);

					$output .= '<div class="px-3">';
					$output .= '<h4 class="font-sans text-[16px] font-semibold text-[#1e293b]">' . esc_html(__('Content Studio', 'reacon-group')) . '</h4>';
					$output .= '<div class="mt-2 h-px bg-[#e5e7eb]" aria-hidden="true"></div>';
					$output .= '</div>';
					$render_children_cards($studio_children);

					if (!empty($production_children)) {
						$output .= '<div class="px-3">';
						$output .= '<h4 class="font-sans text-[16px] font-semibold text-[#1e293b]">' . esc_html(__('Production & Fulfilment', 'reacon-group')) . '</h4>';
						$output .= '<div class="mt-2 h-px bg-[#e5e7eb]" aria-hidden="true"></div>';
						$output .= '</div>';
						$render_children_cards($production_children);
					}
				} else {
					$render_children_cards($children);
				}

				$output .= '</div>'; // left flex

				$output .= '<div class="h-full overflow-hidden rounded-[16px] bg-[#f1f5f9]">';
				if ($feature_image !== '') {
					$output .= '<img src="' . esc_url($feature_image) . '" alt="' . esc_attr($feature_image_alt) . '" class="h-full w-full object-cover" loading="lazy" decoding="async" />';
				} else {
					$output .= '<i class="ph-fill ph-image-square text-[48px] text-[#9CA9BF] w-full h-full flex items-center justify-center" aria-hidden="true"></i>';
				}
				$output .= '</div>'; // right image

				$output .= '</div>'; // grid
				$output .= '</div>'; // card
				$output .= '</div>'; // panel
			}
		}
	}
}

if (!class_exists('Reacon_Group_Header_Mobile_Walker')) {
	class Reacon_Group_Header_Mobile_Walker extends Walker_Nav_Menu
	{
		private array $children_by_parent_id;

		public function __construct(array $children_by_parent_id = array())
		{
			$this->children_by_parent_id = $children_by_parent_id;
		}

		public function start_lvl(&$output, $depth = 0, $args = null)
		{
			if ((int) $depth === 0) {
				// Next sibling of the toggle button (required by existing JS).
				$output .= '<div class="mobile-submenu hidden pl-4 bg-white/5 rounded-2xl"><ul class="flex flex-col gap-1 pb-2 pt-1">';
			}
		}

		public function end_lvl(&$output, $depth = 0, $args = null)
		{
			if ((int) $depth === 0) {
				$output .= '</ul></div>';
			}
		}

		public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
		{
			$has_children = !empty($this->children_by_parent_id[(int) $item->ID] ?? array());

			$is_active = !empty($item->current) || in_array('current-menu-item', (array) $item->classes, true);
			$active_cls = $is_active
				? 'bg-primary text-white'
				: 'text-white/90 hover:bg-white/10 hover:text-white';

			if ((int) $depth === 0) {
				$output .= '<li>';
				if ($has_children) {
					$output .= '<button type="button" class="flex w-full items-center justify-between rounded-xl px-4 py-3 font-sans text-base font-medium ' . esc_attr($active_cls) . ' transition-colors mobile-submenu-toggle" aria-expanded="false">';
					$output .= esc_html((string) $item->title);
					// Keep the arrow always visible; JS will rotate it when submenu opens/closes.
					$output .= '<i class="ph-bold ph-arrow-up text-sm opacity-70 transition-transform duration-200" aria-hidden="true"></i>';
					$output .= '</button>';
				} else {
					$output .= '<a href="' . esc_url($item->url) . '" class="block rounded-xl px-4 py-3 font-sans text-base font-medium no-underline transition-colors ' . esc_attr($active_cls) . '">';
					$output .= esc_html((string) $item->title);
					$output .= '</a>';
				}
				return;
			}

			// Depth 1 (children) render as list items inside the submenu.
			if ((int) $depth === 1) {
				$output .= '<li><a href="' . esc_url($item->url) . '" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white">';
				$output .= esc_html((string) $item->title);
				$output .= '</a></li>';
				return;
			}
		}
	}
}
