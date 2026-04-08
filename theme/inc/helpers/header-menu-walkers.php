<?php

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
add_action('admin_head', static function () {
    global $pagenow;
    if (!isset($pagenow) || 'nav-menus.php' !== $pagenow) {
        return;
    }

    // ACF image uploader preview can render very large thumbnails.
    echo '<style>[data-name="header_menu_icon_image"] img,[data-name="header_mega_feature_image"] img {
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

                $render_children_cards = static function (array $cards) use (&$output) {
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
        private int $current_parent_id = 0;
        private string $current_parent_title = '';
        private bool $current_parent_is_solutions = false;
        private int $current_parent_split_index = 0;
        private int $current_parent_child_index = 0;

        private string $panels_html = '';

        public function __construct(array $children_by_parent_id = array())
        {
            $this->children_by_parent_id = $children_by_parent_id;
        }

        public function get_panels_html(): string
        {
            return $this->panels_html;
        }

        public function start_lvl(&$output, $depth = 0, $args = null)
        {
            if ((int) $depth === 0) {
                $panel_id = 'mobile-submenu-' . $this->current_parent_id;
                $this->panels_html .= '<div id="' . esc_attr($panel_id) . '" class="mobile-submenu-panel absolute inset-0 z-20 hidden translate-x-full bg-[#f6f8fb] transition-transform duration-300 ease-out" data-mobile-submenu-panel="' . esc_attr((string) $this->current_parent_id) . '" inert="">';
                $this->panels_html .= '<div class="flex h-full min-h-0 flex-col">';
                $this->panels_html .= '<div class="flex items-center justify-between border-b border-[#d7dde4] px-4 py-4">';
                $this->panels_html .= '<button type="button" class="mobile-submenu-back inline-flex items-center gap-2 rounded-full px-2 py-1 font-sans text-sm font-semibold text-[#4f6076] transition-colors hover:text-[#24384d]" data-mobile-submenu-back="' . esc_attr((string) $this->current_parent_id) . '">';
                $this->panels_html .= '<i class="ph ph-arrow-left text-base" aria-hidden="true"></i>';
                $this->panels_html .= esc_html__('Back', 'reacon-group');
                $this->panels_html .= '</button>';
                $this->panels_html .= '<span class="min-w-0 truncate font-sans text-sm font-semibold text-[#24384d]">' . esc_html($this->current_parent_title) . '</span>';
                $this->panels_html .= '</div>';
                $this->panels_html .= '<ul class="mobile-submenu-list flex flex-1 min-h-0 flex-col gap-1 overflow-y-auto px-4 py-4">';
            }
        }

        public function end_lvl(&$output, $depth = 0, $args = null)
        {
            if ((int) $depth === 0) {
                $this->panels_html .= '</ul></div></div>';
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
                    // Track current parent context for depth-1 rendering (headings, etc.).
                    $this->current_parent_id = (int) $item->ID;
                    $this->current_parent_title = (string) $item->title;
                    $this->current_parent_child_index = 0;

                    $slug_l = strtolower(is_string($item->post_name) ? (string) $item->post_name : '');
                    $title_l = strtolower((string) $item->title);
                    $this->current_parent_is_solutions = (
                        $slug_l === 'solutions' ||
                        $title_l === 'solutions' ||
                        ($slug_l !== '' && str_contains($slug_l, 'solutions')) ||
                        str_contains($title_l, 'solutions')
                    );

                    $children_for_parent = $this->children_by_parent_id[$this->current_parent_id] ?? array();
                    $this->current_parent_split_index = (int) ceil(count($children_for_parent) / 2);

                    $output .= '<button type="button" class="flex w-full items-center justify-between rounded-xl px-4 py-3 font-sans text-base font-medium ' . esc_attr($active_cls) . ' transition-colors mobile-submenu-toggle" aria-expanded="false" aria-controls="mobile-submenu-' . esc_attr((string) $item->ID) . '" data-mobile-menu-parent="' . esc_attr((string) $item->ID) . '">';
                    $output .= '<span class="min-w-0 flex-1 text-left">' . esc_html((string) $item->title) . '</span>';
                    $output .= '<i class="mobile-parent-caret-right ph-bold ph-caret-right ml-3 shrink-0 text-sm opacity-70" aria-hidden="true"></i>';
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
                $parent_id = (int) $item->menu_item_parent;
                $child_is_active = reacon_group_nav_menu_item_is_active($item);
                $child_icon_wrap_cls = $child_is_active ? 'bg-[#d2f7f9] text-secondary' : 'bg-[#f1f5f9] text-[#8a94a6]';
                $child_icon_class = $child_is_active ? 'w-[18px] h-[18px] text-secondary' : 'w-[18px] h-[18px] text-[#8a94a6]';

                if (
                    $this->current_parent_is_solutions &&
                    $this->current_parent_id > 0 &&
                    $parent_id === $this->current_parent_id
                ) {
                    // Insert headings to match the original mobile dropdown structure.
                    if ($this->current_parent_child_index === 0) {
                        $this->panels_html .= '<li class="px-4 pb-1 pt-3 font-sans text-[11px] font-semibold tracking-wider ">' . esc_html(__('CONTENT STUDIO', 'reacon-group')) . '</li>';
                    } elseif ($this->current_parent_split_index > 0 && $this->current_parent_child_index === $this->current_parent_split_index) {
                        $this->panels_html .= '<li class="px-4 pb-1 pt-4 font-sans text-[11px] font-semibold tracking-wider ">' . esc_html(__('PRODUCTION & FULFILMENT', 'reacon-group')) . '</li>';
                    }
                }

                $this->panels_html .= '<li><a href="' . esc_url($item->url) . '" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white">';
                $this->panels_html .= '<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full ' . esc_attr($child_icon_wrap_cls) . '">';
                ob_start();
                reacon_group_header_render_nav_menu_icon((int) $item->ID, $child_icon_class);
                $icon_html = ob_get_clean();
                if ($icon_html) {
                    $this->panels_html .= $icon_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                } else {
                    $this->panels_html .= '<i class="ph ph-image-square text-[18px]" aria-hidden="true"></i>';
                }
                $this->panels_html .= '</span>';
                $this->panels_html .= '<span class="min-w-0 flex-1">' . esc_html((string) $item->title) . '</span>';
                $this->panels_html .= '</a></li>';

                if (
                    $this->current_parent_is_solutions &&
                    $this->current_parent_id > 0 &&
                    $parent_id === $this->current_parent_id
                ) {
                    $this->current_parent_child_index++;
                }
                return;
            }
        }

        public function end_el(&$output, $item, $depth = 0, $args = null)
        {
            if ((int) $depth === 0) {
                $output .= '</li>';
            }
        }
    }
}
