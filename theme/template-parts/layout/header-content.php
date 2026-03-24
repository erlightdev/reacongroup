<?php

/**
 * Template part: Site header / navigation.
 *
 * Static, Tailwind-utility-only implementation matching the approved Figma
 * design. The header is positioned absolutely so it overlaps the hero section
 * beneath it; add z-index to the hero as needed.
 *
 * Design tokens used directly from tailwind-theme.css:
 *   --primary (#1ECAD3), --secondary (#2C8D9D), --foreground (#383B43)
 *   --font-sans (Graphik Trial), --font-display (Plus Jakarta Sans)
 *
 * @package reacon-group
 */

$logo_src  = get_template_directory_uri() . '/public/image/Reacon Logo 2.svg';
$site_name = esc_html(get_bloginfo('name'));

// Determine current page slug for active state highlighting.
$current_slug = '';
if (is_front_page()) {
	$current_slug = 'home';
} elseif (is_page()) {
	$current_slug = get_post_field('post_name', get_post());
}

$nav_items = array(
	array('label' => __('Home',         'reacon-group'), 'url' => home_url('/'),              'slug' => 'home'),
	array('label' => __('About Us',     'reacon-group'), 'url' => home_url('/about-us/'),     'slug' => 'about-us'),
	array('label' => __('Solutions',    'reacon-group'), 'url' => '#',                         'slug' => 'solutions', 'has_mega' => true),
	array('label' => __('Our Industry', 'reacon-group'), 'url' => home_url('/our-industry/'), 'slug' => 'our-industry'),
	array('label' => __('Our Works',    'reacon-group'), 'url' => home_url('/our-works/'),    'slug' => 'our-works'),
	array('label' => __('Blogs',        'reacon-group'), 'url' => home_url('/blogs/'),        'slug' => 'blogs'),
);
?>

<header
	id="masthead"
	class="absolute inset-x-0 top-0 z-50 font-sans"
	role="banner">
	<div class="mx-auto flex w-full  items-center justify-between px-6 py-12 lg:px-10 xl:px-14">

		<!-- ── Logo ─────────────────────────────────────────── -->
		<a
			href="<?php echo esc_url(home_url('/')); ?>"
			rel="home"
			aria-label="<?php echo esc_attr($site_name); ?> — <?php esc_attr_e('home', 'reacon-group'); ?>"
			class="relative z-10 shrink-0">
			<img
				src="<?php echo esc_url($logo_src); ?>"
				alt="<?php echo esc_attr($site_name); ?>"
				width="160"
				height="42"
				class="h-10 w-auto" />
		</a>

		<!-- ── Desktop Navigation (centred) ─────────────────── -->
		<nav
			id="site-navigation"
			class="hidden lg:flex items-center"
			aria-label="<?php esc_attr_e('Main Navigation', 'reacon-group'); ?>">
			<ul class="flex items-center gap-1 rounded-full border border-white/20 bg-white px-1.5 py-1">

				<?php foreach ($nav_items as $item) :
					$is_active  = ($current_slug === $item['slug']);
					$has_mega   = ! empty($item['has_mega']);
					$active_cls = $is_active
						? 'bg-primary text-white'
						: 'text-black/90 hover:bg-black/10 hover:text-black';
				?>
					<li class="relative<?php echo $has_mega ? ' group' : ''; ?>">
						<a
							href="<?php echo esc_url($item['url']); ?>"
							class="relative inline-flex items-center gap-1.5 rounded-full px-5 py-2 font-sans text-sm font-medium transition-colors duration-200 <?php echo esc_attr($active_cls); ?>"
							<?php if ($has_mega) : ?>
							aria-haspopup="true"
							aria-expanded="false"
							<?php endif; ?>>
							<?php echo esc_html($item['label']); ?>
							<?php if ($has_mega) : ?>
								<i class="ph-bold ph-caret-down text-[10px] opacity-70 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"></i>
							<?php endif; ?>
						</a>

						<?php if ($has_mega) : ?>
							<!-- ── Mega Menu (Solutions) ──────────── -->
							<div
								class="pointer-events-none invisible absolute left-1/2 top-full z-50 w-[820px] -translate-x-1/2 pt-4 opacity-0 transition-all duration-250 ease-out group-hover:pointer-events-auto group-hover:visible group-hover:opacity-100"
								role="menu">
								<div class="overflow-hidden rounded-3xl border border-border/60 bg-white shadow-xl">
									<div class="grid grid-cols-[1fr_280px]">

										<!-- Left content -->
										<div class="p-8">
											<!-- Content Studio -->
											<h4 class="mb-4 font-display text-sm font-bold text-foreground">
												<?php esc_html_e('Content Studio', 'reacon-group'); ?>
											</h4>
											<div class="mb-6 grid grid-cols-2 gap-x-6 gap-y-4">

												<a href="<?php echo esc_url(home_url('/solutions/visuals/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-eye text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Visuals', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Creates and refines all visual content.', 'reacon-group'); ?></span>
													</span>
												</a>

												<a href="<?php echo esc_url(home_url('/solutions/video/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-video-camera text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Video', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Creates impactful video content using CGI, animation.', 'reacon-group'); ?></span>
													</span>
												</a>

												<a href="<?php echo esc_url(home_url('/solutions/digital/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-desktop text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Digital', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Builds your online presence through websites, apps.', 'reacon-group'); ?></span>
													</span>
												</a>

												<a href="<?php echo esc_url(home_url('/solutions/structural-3d/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-cube text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Structural (3D)', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Turns creative ideas into real-world experiences thro.', 'reacon-group'); ?></span>
													</span>
												</a>

											</div>

											<!-- Divider -->
											<div class="mb-5 h-px bg-border/60" aria-hidden="true"></div>

											<!-- Production & Fulfilment -->
											<h4 class="mb-4 font-display text-sm font-bold text-foreground">
												<?php esc_html_e('Production & Fulfilment', 'reacon-group'); ?>
											</h4>
											<div class="grid grid-cols-2 gap-x-6 gap-y-4">

												<a href="<?php echo esc_url(home_url('/solutions/print-production/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-printer text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Print Production', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Produces high-quality, sustainable printed materials.', 'reacon-group'); ?></span>
													</span>
												</a>

												<a href="<?php echo esc_url(home_url('/solutions/activation/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-lightning text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Activation', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Creates live brand experiences.', 'reacon-group'); ?></span>
													</span>
												</a>

												<a href="<?php echo esc_url(home_url('/solutions/promotional/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-megaphone text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Promotional', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Makes branded merchandise, clothing, and gifts that.', 'reacon-group'); ?></span>
													</span>
												</a>

												<a href="<?php echo esc_url(home_url('/solutions/distribution/')); ?>" class="group/item flex items-start gap-3 no-underline" role="menuitem">
													<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-muted text-secondary">
														<i class="ph ph-truck text-base" aria-hidden="true"></i>
													</span>
													<span>
														<span class="block font-display text-[13px] font-semibold text-foreground group-hover/item:text-primary"><?php esc_html_e('Distribution', 'reacon-group'); ?></span>
														<span class="block text-xs text-muted-foreground"><?php esc_html_e('Handles everything after production.', 'reacon-group'); ?></span>
													</span>
												</a>

											</div>
										</div><!-- /left content -->

										<!-- Right feature image -->
										<div class="relative overflow-hidden">
											<img
												src="<?php echo esc_url(get_template_directory_uri() . '/public/figma-assets/solutions-overview.png'); ?>"
												alt="<?php esc_attr_e('Solutions overview', 'reacon-group'); ?>"
												class="h-full w-full object-cover"
												loading="lazy"
												decoding="async" />
										</div>

									</div><!-- /grid -->
								</div><!-- /mega card -->
							</div><!-- /mega wrapper -->
						<?php endif; ?>

					</li>
				<?php endforeach; ?>

			</ul>
		</nav><!-- #site-navigation -->

		<!-- ── CTA Buttons (desktop) ───────────────────────── -->
		<div class="hidden items-center gap-3 lg:flex">
			<a
				href="<?php echo esc_url(home_url('/start-an-order/')); ?>"
				class="rounded-full bg-transparent px-5 py-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:bg-foreground/90 border border-white">
				<?php esc_html_e('Start an Order', 'reacon-group'); ?>
			</a>

			<a
				href="<?php echo esc_url(home_url('/contact-us/')); ?>"
				class="inline-flex items-center gap-2 rounded-full bg-primary py-2 pl-5 pr-2.5 font-display text-sm font-bold text-white no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110">
				<?php esc_html_e('Contact Us', 'reacon-group'); ?>
				<span
					aria-hidden="true"
					class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/20">
					<i class="ph-bold ph-arrow-up-right text-[11px]" aria-hidden="true"></i>
				</span>
			</a>
		</div>

		<!-- ── Mobile Hamburger ────────────────────────────── -->
		<button
			id="mobile-menu-toggle"
			type="button"
			class="relative z-10 flex h-10 w-10 items-center justify-center rounded-lg text-white lg:hidden"
			aria-controls="mobile-menu"
			aria-expanded="false"
			aria-label="<?php esc_attr_e('Toggle menu', 'reacon-group'); ?>">
			<i class="ph ph-list text-2xl" aria-hidden="true" id="hamburger-icon"></i>
			<i class="ph ph-x text-2xl hidden" aria-hidden="true" id="close-icon"></i>
		</button>

	</div><!-- /container -->

	<!-- ── Mobile Menu Drawer ─────────────────────────────── -->
	<div
		id="mobile-menu"
		class="fixed inset-0 z-40 hidden flex-col bg-[#062B2D] pt-20 lg:hidden"
		aria-hidden="true"
		aria-label="<?php esc_attr_e('Mobile navigation', 'reacon-group'); ?>">
		<div class="flex-1 overflow-y-auto px-6 pb-8">
			<ul class="flex flex-col gap-1">
				<?php foreach ($nav_items as $item) :
					$is_active  = ($current_slug === $item['slug']);
					$has_mega   = ! empty($item['has_mega']);
				?>
					<li>
						<?php if ($has_mega) : ?>
							<button
								type="button"
								class="flex w-full items-center justify-between rounded-xl px-4 py-3 font-sans text-base font-medium text-white/90 transition-colors hover:bg-white/10 mobile-submenu-toggle"
								aria-expanded="false">
								<?php echo esc_html($item['label']); ?>
								<i class="ph-bold ph-caret-down text-sm opacity-70 transition-transform duration-200" aria-hidden="true"></i>
							</button>

							<!-- Mobile sub-menu -->
							<div class="mobile-submenu hidden pl-4">
								<ul class="flex flex-col gap-1 pb-2 pt-1">
									<li class="px-3 pt-2 pb-1 font-display text-xs font-bold uppercase tracking-wider text-white/50">
										<?php esc_html_e('Content Studio', 'reacon-group'); ?>
									</li>
									<li><a href="<?php echo esc_url(home_url('/solutions/visuals/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Visuals', 'reacon-group'); ?></a></li>
									<li><a href="<?php echo esc_url(home_url('/solutions/video/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Video', 'reacon-group'); ?></a></li>
									<li><a href="<?php echo esc_url(home_url('/solutions/digital/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Digital', 'reacon-group'); ?></a></li>
									<li><a href="<?php echo esc_url(home_url('/solutions/structural-3d/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Structural (3D)', 'reacon-group'); ?></a></li>

									<li class="px-3 pt-3 pb-1 font-display text-xs font-bold uppercase tracking-wider text-white/50">
										<?php esc_html_e('Production & Fulfilment', 'reacon-group'); ?>
									</li>
									<li><a href="<?php echo esc_url(home_url('/solutions/print-production/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Print Production', 'reacon-group'); ?></a></li>
									<li><a href="<?php echo esc_url(home_url('/solutions/activation/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Activation', 'reacon-group'); ?></a></li>
									<li><a href="<?php echo esc_url(home_url('/solutions/promotional/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Promotional', 'reacon-group'); ?></a></li>
									<li><a href="<?php echo esc_url(home_url('/solutions/distribution/')); ?>" class="block rounded-lg px-3 py-2 text-sm text-white/80 no-underline hover:bg-white/10 hover:text-white"><?php esc_html_e('Distribution', 'reacon-group'); ?></a></li>
								</ul>
							</div>
						<?php else : ?>
							<a
								href="<?php echo esc_url($item['url']); ?>"
								class="block rounded-xl px-4 py-3 font-sans text-base font-medium no-underline transition-colors <?php echo $is_active ? 'bg-primary text-white' : 'text-white/90 hover:bg-white/10 hover:text-white'; ?>">
								<?php echo esc_html($item['label']); ?>
							</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

			<!-- Mobile CTAs -->
			<div class="mt-6 flex flex-col gap-3">
				<a
					href="<?php echo esc_url(home_url('/start-an-order/')); ?>"
					class="block rounded-full bg-foreground py-3 text-center font-display text-sm font-bold text-white no-underline">
					<?php esc_html_e('Start an Order', 'reacon-group'); ?>
				</a>
				<a
					href="<?php echo esc_url(home_url('/contact-us/')); ?>"
					class="block rounded-full bg-primary py-3 text-center font-display text-sm font-bold text-white no-underline">
					<?php esc_html_e('Contact Us', 'reacon-group'); ?>
				</a>
			</div>
		</div>
	</div><!-- /mobile-menu -->

</header><!-- #masthead -->

<!-- Header interaction scripts (vanilla JS, no dependencies) -->
<script>
	(function() {
		'use strict';

		var toggle = document.getElementById('mobile-menu-toggle');
		var menu = document.getElementById('mobile-menu');
		var iconOpen = document.getElementById('hamburger-icon');
		var iconClose = document.getElementById('close-icon');
		var subToggles = document.querySelectorAll('.mobile-submenu-toggle');
		var mobileLinks = menu ? menu.querySelectorAll('a') : [];

		if (!toggle || !menu || !iconOpen || !iconClose) {
			return;
		}

		function closeAllSubmenus() {
			subToggles.forEach(function(btn) {
				var sub = btn.nextElementSibling;
				var icon = btn.querySelector('i');
				if (!sub) {
					return;
				}
				sub.classList.add('hidden');
				btn.setAttribute('aria-expanded', 'false');
				if (icon) {
					icon.style.transform = '';
				}
			});
		}

		function setMenuState(open) {
			menu.classList.toggle('hidden', !open);
			menu.classList.toggle('flex', open);
			iconOpen.classList.toggle('hidden', open);
			iconClose.classList.toggle('hidden', !open);
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			menu.setAttribute('aria-hidden', open ? 'false' : 'true');
			document.body.style.overflow = open ? 'hidden' : '';

			if (!open) {
				closeAllSubmenus();
			}
		}

		toggle.addEventListener('click', function() {
			var isOpen = toggle.getAttribute('aria-expanded') === 'true';
			setMenuState(!isOpen);
		});

		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape') {
				setMenuState(false);
			}
		});

		window.addEventListener('resize', function() {
			if (window.innerWidth >= 1024) {
				setMenuState(false);
			}
		});

		mobileLinks.forEach(function(link) {
			link.addEventListener('click', function() {
				setMenuState(false);
			});
		});

		subToggles.forEach(function(btn) {
			btn.addEventListener('click', function() {
				var sub = btn.nextElementSibling;
				var icon = btn.querySelector('i');
				if (!sub) {
					return;
				}

				var willOpen = sub.classList.contains('hidden');
				closeAllSubmenus();

				if (willOpen) {
					sub.classList.remove('hidden');
					btn.setAttribute('aria-expanded', 'true');
					if (icon) {
						icon.style.transform = 'rotate(180deg)';
					}
				}
			});
		});

		setMenuState(false);
	})();
</script>