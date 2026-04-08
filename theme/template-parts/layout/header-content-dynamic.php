<?php

/**
 * Template part: Site header / navigation (dynamic mega menu).
 *
 * This file is the single source of truth for the header.
 * (We intentionally do not rely on the legacy `header-content.php`.)
 *
 * @package reacon-group
 */
$site_name = esc_html(get_bloginfo('name'));

$default_logo_src = get_template_directory_uri() . '/public/image/Reacon Logo 2.svg';
$logo_src = $default_logo_src;

$start_order_default_url = home_url('/start-an-order/');
$contact_default_url = home_url('/contact-us/');
$start_order_default_label = __('Start an Order', 'reacon-group');
$contact_default_label = __('Contact Us', 'reacon-group');

$start_order_url = $start_order_default_url;
$start_order_label = $start_order_default_label;
$contact_url = $contact_default_url;
$contact_label = $contact_default_label;

if (function_exists('get_field')) {
	$acf_logo = get_field('header_logo', 'option');
	if (is_string($acf_logo) && $acf_logo !== '') {
		$logo_src = $acf_logo;
	}

	$start_link = get_field('header_cta_start_order_link', 'option');
	if (is_array($start_link) && !empty($start_link['url'])) {
		$start_order_url = $start_link['url'];
		$start_order_label = !empty($start_link['title']) ? (string) $start_link['title'] : $start_order_default_label;
	}

	$contact_link = get_field('header_cta_contact_us_link', 'option');
	if (is_array($contact_link) && !empty($contact_link['url'])) {
		$contact_url = $contact_link['url'];
		$contact_label = !empty($contact_link['title']) ? (string) $contact_link['title'] : $contact_default_label;
	}
}

$menu_location = 'menu-1';
$menu_locations = function_exists('get_nav_menu_locations') ? get_nav_menu_locations() : array();
$menu_id = isset($menu_locations[$menu_location]) ? (int) $menu_locations[$menu_location] : 0;
$menu_items = $menu_id > 0 ? wp_get_nav_menu_items($menu_id) : array();

$children_by_parent_id = array();
if (is_array($menu_items)) {
	foreach ($menu_items as $mi) {
		$parent_id = (int) $mi->menu_item_parent;
		if ($parent_id > 0) {
			$children_by_parent_id[$parent_id][] = $mi;
		}
	}
}

$desktop_walker = new Reacon_Group_Header_Desktop_Walker($children_by_parent_id);
$mobile_walker = new Reacon_Group_Header_Mobile_Walker($children_by_parent_id);
?>

<header id="masthead" class="absolute inset-x-0 top-4 z-50 transition-all duration-300" role="banner">
	<div class="mx-auto grid h-20 w-full max-w-7xl grid-cols-[auto_minmax(0,1fr)_auto] items-center gap-2 px-4 sm:gap-3 sm:px-6 lg:px-4 xl:px-6 2xl:px-8">
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo esc_attr($site_name); ?> — <?php esc_attr_e('home', 'reacon-group'); ?>" class="relative z-10 shrink-0">
			<img src="<?php echo esc_url($logo_src); ?>" alt="<?php echo esc_attr($site_name); ?>" width="160" height="42" class="h-10 w-auto" />
		</a>

		<nav id="site-navigation" class="relative hidden min-w-0 items-center justify-center lg:flex" aria-label="<?php esc_attr_e('Main Navigation', 'reacon-group'); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => $menu_location,
					'container' => false,
					'fallback_cb' => false,
					'depth' => 1,
					'walker' => $desktop_walker,
					'items_wrap' => '<ul class="flex items-center gap-0.5 whitespace-nowrap rounded-[30px] bg-white px-1.5 py-1.5 xl:gap-1 xl:px-2">%3$s</ul>',
				)
			);
			?>
		</nav>

		<div class="hidden items-center gap-2 lg:flex">
			<a href="<?php echo esc_url($start_order_url); ?>" class="rounded-full border border-white/40 bg-[#07212c]/55 px-4 py-3.5 font-display text-[13px] font-bold text-white no-underline backdrop-blur-sm transition-all duration-200 hover:-translate-y-px hover:bg-[#07212c]/75 hover:border-white/60 xl:px-6 xl:text-sm">
				<?php echo esc_html($start_order_label); ?>
			</a>
			<a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-1.5 rounded-full bg-primary py-2 pl-4 pr-1.5 font-display text-[13px] font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-105 xl:gap-2 xl:pl-5 xl:pr-2 xl:text-sm">
				<?php echo esc_html($contact_label); ?>
				<span aria-hidden="true" class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#6be6ec] xl:h-8 xl:w-8">
					<i class="ph-bold ph-arrow-up-right text-[11px]" aria-hidden="true"></i>
				</span>
			</a>
		</div>

		<button id="mobile-menu-toggle" type="button" class="relative z-[60] flex h-10 w-10 justify-self-end items-center justify-center rounded-lg text-white lg:hidden" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu', 'reacon-group'); ?>">
			<i class="ph ph-list text-2xl" aria-hidden="true" id="hamburger-icon"></i>
			<i class="ph ph-x text-2xl hidden" aria-hidden="true" id="close-icon"></i>
		</button>
	</div>

	<div id="mobile-menu" class="fixed inset-0 z-40 flex flex-col bg-[#062B2D] pt-20 opacity-0 -translate-y-6 pointer-events-none transition-all duration-300 ease-out lg:hidden" aria-hidden="true" aria-label="<?php esc_attr_e('Mobile navigation', 'reacon-group'); ?>">
		<div class="flex-1 overflow-y-auto px-6 pb-8">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => $menu_location,
					'container' => false,
					'fallback_cb' => false,
					'depth' => 2,
					'walker' => $mobile_walker,
					'items_wrap' => '<ul class="flex flex-col gap-1">%3$s</ul>',
				)
			);
			?>

			<div class="mt-6 flex flex-col gap-3">
				<a href="<?php echo esc_url($start_order_url); ?>" class="block rounded-full bg-foreground py-3 text-center font-display text-sm font-bold text-white no-underline">
					<?php echo esc_html($start_order_label); ?>
				</a>
				<a href="<?php echo esc_url($contact_url); ?>" class="block rounded-full bg-primary py-3 text-center font-display text-sm font-bold text-white no-underline">
					<?php echo esc_html($contact_label); ?>
				</a>
			</div>
		</div>
	</div>
</header>

<style>
	#masthead #site-navigation>ul {
		box-shadow: none;
	}

	#masthead.top-0 #site-navigation>ul {
		box-shadow: 0 10px 22px rgba(0, 0, 0, 0.16);
	}
</style>

<script>
	(function() {
		'use strict';

		var masthead = document.getElementById('masthead');
		if (!masthead) return;

		function updateHeaderOnScroll() {
			if (window.scrollY > 20) {
				masthead.classList.add('top-0');
				masthead.classList.remove('top-4');
			} else {
				masthead.classList.remove('top-0');
				masthead.classList.add('top-4');
			}
		}

		window.addEventListener('scroll', updateHeaderOnScroll);
		updateHeaderOnScroll();

		// Desktop mega menu: click to open, click outside to close.
		var megaTriggers = document.querySelectorAll('[data-mega-trigger]');
		var megaPanels = document.querySelectorAll('[data-mega-panel]');
		var navEl = document.getElementById('site-navigation');

		function closeDesktopMegaMenus() {
			megaPanels.forEach(function(panel) {
				panel.classList.add('hidden');
			});
			megaTriggers.forEach(function(trigger) {
				trigger.setAttribute('aria-expanded', 'false');
				var down = trigger.querySelector('.mega-parent-caret-down');
				var up = trigger.querySelector('.mega-parent-caret-up');
				if (down) down.classList.remove('hidden');
				if (up) up.classList.add('hidden');
			});
		}

		function toggleDesktopMegaMenu(slug) {
			var targetPanel = document.querySelector('[data-mega-panel="' + slug + '"]');
			var targetTrigger = document.querySelector('[data-mega-trigger="' + slug + '"]');
			if (!targetPanel || !targetTrigger) return;

			var willOpen = targetPanel.classList.contains('hidden');
			closeDesktopMegaMenus();
			if (willOpen) {
				targetPanel.classList.remove('hidden');
				targetTrigger.setAttribute('aria-expanded', 'true');
				var down = targetTrigger.querySelector('.mega-parent-caret-down');
				var up = targetTrigger.querySelector('.mega-parent-caret-up');
				if (down) down.classList.add('hidden');
				if (up) up.classList.remove('hidden');
			}
		}

		megaTriggers.forEach(function(trigger) {
			trigger.addEventListener('click', function(event) {
				event.preventDefault();
				if (window.innerWidth < 1024) return;
				toggleDesktopMegaMenu(trigger.getAttribute('data-mega-trigger'));
			});

			// Open on hover (desktop).
			trigger.addEventListener('mouseenter', function() {
				if (window.innerWidth < 1024) return;
				toggleDesktopMegaMenu(trigger.getAttribute('data-mega-trigger'));
			});
		});

		if (navEl) {
			// Close when leaving the entire header nav region.
			navEl.addEventListener('mouseleave', function() {
				if (window.innerWidth < 1024) return;
				closeDesktopMegaMenus();
			});
		}

		document.addEventListener('click', function(event) {
			var nav = document.getElementById('site-navigation');
			if (!nav || nav.contains(event.target)) return;
			closeDesktopMegaMenus();
		});

		// Mobile drawer + submenus.
		var toggle = document.getElementById('mobile-menu-toggle');
		var menu = document.getElementById('mobile-menu');
		var iconOpen = document.getElementById('hamburger-icon');
		var iconClose = document.getElementById('close-icon');
		var subToggles = document.querySelectorAll('.mobile-submenu-toggle');
		var mobileLinks = menu ? menu.querySelectorAll('a') : [];

		if (!toggle || !menu || !iconOpen || !iconClose) return;

		function closeAllSubmenus() {
			subToggles.forEach(function(btn) {
				var sub = btn.nextElementSibling;
				var down = btn.querySelector('.mobile-parent-caret-down');
				var up = btn.querySelector('.mobile-parent-caret-up');
				if (!sub) return;
				sub.classList.add('hidden');
				btn.setAttribute('aria-expanded', 'false');
				if (down) down.classList.remove('hidden');
				if (up) up.classList.add('hidden');
			});
		}

		function setMenuState(open) {
			menu.classList.toggle('opacity-0', !open);
			menu.classList.toggle('-translate-y-6', !open);
			menu.classList.toggle('pointer-events-none', !open);
			menu.classList.toggle('opacity-100', open);
			menu.classList.toggle('translate-y-0', open);
			menu.classList.toggle('pointer-events-auto', open);

			iconOpen.classList.toggle('hidden', open);
			iconClose.classList.toggle('hidden', !open);

			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			menu.setAttribute('aria-hidden', open ? 'false' : 'true');

			document.body.style.overflow = open ? 'hidden' : '';
			if (!open) closeAllSubmenus();
		}

		toggle.addEventListener('click', function() {
			var isOpen = toggle.getAttribute('aria-expanded') === 'true';
			setMenuState(!isOpen);
		});

		mobileLinks.forEach(function(link) {
			link.addEventListener('click', function() {
				setMenuState(false);
			});
		});

		subToggles.forEach(function(btn) {
			btn.addEventListener('click', function() {
				var sub = btn.nextElementSibling;
				var down = btn.querySelector('.mobile-parent-caret-down');
				var up = btn.querySelector('.mobile-parent-caret-up');
				if (!sub) return;

				var willOpen = sub.classList.contains('hidden');
				closeAllSubmenus();

				if (willOpen) {
					sub.classList.remove('hidden');
					btn.setAttribute('aria-expanded', 'true');
					if (down) down.classList.add('hidden');
					if (up) up.classList.remove('hidden');
				}
			});
		});

		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape') {
				closeDesktopMegaMenus();
				setMenuState(false);
			}
		});

		window.addEventListener('resize', function() {
			if (window.innerWidth < 1024) closeDesktopMegaMenus();
			if (window.innerWidth >= 1024) setMenuState(false);
		});

		setMenuState(false);
	})();
</script>