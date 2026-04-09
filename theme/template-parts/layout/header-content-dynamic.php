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
	<div class="mx-auto grid h-20 w-full md:max-w-7xl lg:max-w-7xl xl:max-w-7xl 2xl:max-w-none 2xl:w-full grid-cols-[auto_minmax(0,1fr)_auto] items-center gap-2 px-4 sm:gap-3 sm:px-6 lg:px-4 xl:px-6 2xl:px-8">
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

		<button id="mobile-menu-toggle" type="button" class="relative z-[60] flex h-10 w-10 justify-self-end items-center justify-center rounded-lg lg:hidden" style="color: #adadad;" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu', 'reacon-group'); ?>">
			<i class="ph ph-list text-2xl" aria-hidden="true" id="hamburger-icon"></i>
			<i class="ph ph-x text-2xl hidden" aria-hidden="true" id="close-icon"></i>
		</button>
	</div>

	<div id="mobile-menu" class="fixed inset-0 z-40 flex flex-col bg-[#f6f8fb] opacity-0 translate-x-full pointer-events-none transition-all duration-300 ease-out lg:hidden" inert aria-label="<?php esc_attr_e('Mobile navigation', 'reacon-group'); ?>">
		<div class="flex items-center justify-between px-6 pt-8 pb-4">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo esc_attr($site_name); ?> — <?php esc_attr_e('home', 'reacon-group'); ?>" class="shrink-0">
				<img src="<?php echo esc_url($logo_src); ?>" alt="<?php echo esc_attr($site_name); ?>" width="140" height="36" class="h-9 w-auto" />
			</a>
			<button id="mobile-menu-close" type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-[#4f6076]" aria-controls="mobile-menu" aria-label="<?php esc_attr_e('Close menu', 'reacon-group'); ?>">
				<i class="ph ph-x text-2xl" aria-hidden="true"></i>
			</button>
		</div>
		<div class="flex flex-1 min-h-0 flex-col px-6 pb-8">
			<div class="mobile-menu-stage relative flex-1 min-h-0 overflow-hidden">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => $menu_location,
						'container' => false,
						'fallback_cb' => false,
						'depth' => 2,
						'walker' => $mobile_walker,
						'items_wrap' => '<ul class="mobile-menu-list absolute inset-0 flex flex-col gap-1 overflow-y-auto transition-transform duration-300 ease-out translate-x-0">%3$s</ul>',
					)
				);

				// Output the mobile submenu panels as siblings to the main rootList
				if (method_exists($mobile_walker, 'get_panels_html')) {
					echo $mobile_walker->get_panels_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</div>

			<div class="mt-6 flex shrink-0 flex-col gap-4">
				<a href="<?php echo esc_url($start_order_url); ?>" class="block rounded-full border border-[#cfd8e3] bg-transparent px-5 py-3 text-left font-display text-base font-semibold text-[#4f6076] no-underline">
					<?php echo esc_html($start_order_label); ?>
				</a>
				<a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center justify-between rounded-full bg-primary px-5 py-2 font-display text-base font-semibold text-white no-underline">
					<span><?php echo esc_html($contact_label); ?></span>
					<span aria-hidden="true" class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#6be6ec]">
						<i class="ph-bold ph-arrow-up-right text-[15px] text-white" aria-hidden="true"></i>
					</span>
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

	#mobile-menu .mobile-menu-list>li>a,
	#mobile-menu .mobile-menu-list>li>.mobile-submenu-toggle {
		border-bottom: 1px solid #d7dde4;
		border-radius: 0 !important;
		background: transparent !important;
		padding: 14px 0;
		font-family: var(--family-body, var(--font-sans));
		font-size: 16px;
		font-weight: 500;
		line-height: 1.45;
		color: #4f6076 !important;
		opacity: 1 !important;
	}

	#mobile-menu .mobile-menu-list>li>.mobile-submenu-toggle:hover,
	#mobile-menu .mobile-menu-list>li>a:hover {
		background: transparent !important;
		color: #24384d !important;
	}

	#mobile-menu .mobile-menu-list>li.current-menu-item>a,
	#mobile-menu .mobile-menu-list>li.current_page_item>a,
	#mobile-menu .mobile-menu-list>li.current-menu-ancestor>a,
	#mobile-menu .mobile-menu-list>li.current-menu-item>.mobile-submenu-toggle,
	#mobile-menu .mobile-menu-list>li.current_page_item>.mobile-submenu-toggle,
	#mobile-menu .mobile-menu-list>li.current-menu-ancestor>.mobile-submenu-toggle {
		background: transparent !important;
		color: #4f6076 !important;
	}

	#mobile-menu .mobile-parent-caret-down,
	#mobile-menu .mobile-parent-caret-up {
		opacity: 1;
		color: #4f6076;
	}

	#mobile-menu .mobile-menu-stage .mobile-menu-list,
	#mobile-menu .mobile-menu-stage .mobile-submenu-panel {
		will-change: transform;
	}

	#mobile-menu .mobile-submenu-panel {
		background: #f6f8fb;
	}

	#mobile-menu .mobile-submenu-panel a {
		border-bottom: 1px solid #e4e9ef;
		border-radius: 0;
		padding: 10px 0 10px 14px;
		font-size: 14px;
		line-height: 1.5;
		color: #61748c;
	}

	#mobile-menu .mobile-submenu-panel a:hover {
		background: transparent;
		color: #24384d;
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
		var closeBtn = document.getElementById('mobile-menu-close');
		var menu = document.getElementById('mobile-menu');
		var iconOpen = document.getElementById('hamburger-icon');
		var iconClose = document.getElementById('close-icon');
		var stage = menu ? menu.querySelector('.mobile-menu-stage') : null;
		var rootList = menu ? menu.querySelector('.mobile-menu-list') : null;
		var subToggles = menu ? menu.querySelectorAll('.mobile-submenu-toggle') : [];
		var submenuPanels = menu ? menu.querySelectorAll('[data-mobile-submenu-panel]') : [];
		var submenuBackButtons = menu ? menu.querySelectorAll('[data-mobile-submenu-back]') : [];
		var mobileLinks = menu ? menu.querySelectorAll('a') : [];
		var activeMobilePanel = null;

		if (!toggle || !menu || !iconOpen || !iconClose) return;

		function resetMobilePanels() {
			subToggles.forEach(function(btn) {
				btn.setAttribute('aria-expanded', 'false');
				var down = btn.querySelector('.mobile-parent-caret-down');
				var up = btn.querySelector('.mobile-parent-caret-up');
				if (down) down.classList.remove('hidden');
				if (up) up.classList.add('hidden');
			});

			submenuPanels.forEach(function(panel) {
				if (panel._hideTimer) {
					window.clearTimeout(panel._hideTimer);
					panel._hideTimer = null;
				}
				panel.classList.add('hidden', 'translate-x-full');
				panel.classList.remove('translate-x-0');
				panel.setAttribute('inert', '');
			});

			if (rootList) {
				rootList.classList.remove('-translate-x-full');
				rootList.classList.add('translate-x-0');
			}

			activeMobilePanel = null;
		}

		function openMobilePanel(panel) {
			if (!panel || !rootList) return;

			if (activeMobilePanel && activeMobilePanel !== panel) {
				resetMobilePanels();
			}

			if (panel._hideTimer) {
				window.clearTimeout(panel._hideTimer);
				panel._hideTimer = null;
			}

			panel.classList.remove('hidden');
			panel.removeAttribute('inert');
			rootList.classList.add('-translate-x-full');
			rootList.classList.remove('translate-x-0');

			window.requestAnimationFrame(function() {
				panel.classList.remove('translate-x-full');
				panel.classList.add('translate-x-0');
			});

			activeMobilePanel = panel;
		}

		function closeMobilePanel(panel) {
			if (!panel || !rootList) return;

			if (panel._hideTimer) {
				window.clearTimeout(panel._hideTimer);
				panel._hideTimer = null;
			}

			panel.classList.add('translate-x-full');
			panel.classList.remove('translate-x-0');
			panel.setAttribute('inert', '');
			rootList.classList.remove('-translate-x-full');
			rootList.classList.add('translate-x-0');

			panel._hideTimer = window.setTimeout(function() {
				panel.classList.add('hidden');
				panel._hideTimer = null;
			}, 300);

			if (activeMobilePanel === panel) {
				activeMobilePanel = null;
			}
		}

		function setMenuState(open) {
			menu.classList.toggle('opacity-0', !open);
			menu.classList.toggle('translate-x-full', !open);
			menu.classList.toggle('pointer-events-none', !open);
			menu.classList.toggle('opacity-100', open);
			menu.classList.toggle('translate-x-0', open);
			menu.classList.toggle('pointer-events-auto', open);
			toggle.classList.toggle('opacity-0', open);
			toggle.classList.toggle('pointer-events-none', open);

			iconOpen.classList.toggle('hidden', open);
			iconClose.classList.toggle('hidden', !open);

			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			if (open) {
				menu.removeAttribute('inert');
			} else {
				menu.setAttribute('inert', '');
			}

			document.body.style.overflow = open ? 'hidden' : '';
			if (!open) resetMobilePanels();
			if (open && stage && rootList) {
				stage.scrollTop = 0;
				rootList.scrollTop = 0;
			}
		}

		toggle.addEventListener('click', function() {
			var isOpen = toggle.getAttribute('aria-expanded') === 'true';
			setMenuState(!isOpen);
		});

		if (closeBtn) {
			closeBtn.addEventListener('click', function() {
				setMenuState(false);
			});
		}

		mobileLinks.forEach(function(link) {
			link.addEventListener('click', function() {
				setMenuState(false);
			});
		});

		subToggles.forEach(function(btn) {
			btn.addEventListener('click', function() {
				var panelId = btn.getAttribute('aria-controls');
				var panel = panelId ? document.getElementById(panelId) : null;
				var down = btn.querySelector('.mobile-parent-caret-down');
				var up = btn.querySelector('.mobile-parent-caret-up');
				if (!panel) return;

				if (activeMobilePanel === panel) {
					closeMobilePanel(panel);
					btn.setAttribute('aria-expanded', 'false');
					if (down) down.classList.remove('hidden');
					if (up) up.classList.add('hidden');
					return;
				}

				submenuPanels.forEach(function(otherPanel) {
					if (otherPanel !== panel) {
						otherPanel.classList.add('hidden', 'translate-x-full');
						otherPanel.classList.remove('translate-x-0');
						otherPanel.setAttribute('inert', '');
					}
				});

				subToggles.forEach(function(otherBtn) {
					var otherDown = otherBtn.querySelector('.mobile-parent-caret-down');
					var otherUp = otherBtn.querySelector('.mobile-parent-caret-up');
					if (otherBtn !== btn) {
						otherBtn.setAttribute('aria-expanded', 'false');
						if (otherDown) otherDown.classList.remove('hidden');
						if (otherUp) otherUp.classList.add('hidden');
					}
				});

				btn.setAttribute('aria-expanded', 'true');
				if (down) down.classList.add('hidden');
				if (up) up.classList.remove('hidden');
				openMobilePanel(panel);
			});
		});

		submenuBackButtons.forEach(function(backButton) {
			backButton.addEventListener('click', function() {
				var panel = backButton.closest('[data-mobile-submenu-panel]');
				if (!panel) return;

				var panelId = panel.getAttribute('id');
				var trigger = panelId ? document.querySelector('[aria-controls="' + panelId + '"]') : null;
				closeMobilePanel(panel);
				if (trigger) {
					trigger.setAttribute('aria-expanded', 'false');
					var down = trigger.querySelector('.mobile-parent-caret-down');
					var up = trigger.querySelector('.mobile-parent-caret-up');
					if (down) down.classList.remove('hidden');
					if (up) up.classList.add('hidden');
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