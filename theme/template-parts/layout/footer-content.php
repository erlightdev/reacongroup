<?php
/**
 * Template part: Site footer content.
 *
 * Styled exclusively with Tailwind v4 utilities that resolve against the
 * theme's design tokens defined in tailwind/tailwind-theme.css.
 * No custom inline <style> block — every class is in the compiled style.css.
 *
 * @package reacon-group
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

$logo_src     = get_template_directory_uri() . '/public/image/Reacon Logo 2.svg';
$current_year = absint( gmdate( 'Y' ) );
$site_name    = esc_html( get_bloginfo( 'name' ) );
?>

<footer
	id="reacon-site-footer"
	role="contentinfo"
	aria-label="<?php esc_attr_e( 'Site footer', 'reacon-group' ); ?>"
	class="relative overflow-hidden text-white antialiased"
	style="background: radial-gradient(ellipse 90% 70% at 72% -10%, #148c93 0%, transparent 55%), linear-gradient(160deg, #062B2D 0%, #041f21 100%);"
>

	<!-- Grain texture overlay (decorative) -->
	<div
		aria-hidden="true"
		class="pointer-events-none absolute inset-0 z-0 opacity-[0.045]"
		style="background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400'%3E%3Cfilter id='g'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.68' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23g)' opacity='1'/%3E%3C/svg%3E\");"
	></div>

	<!-- Inner container -->
	<div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">

		<!-- ══ TOP BAR: Logo + Language ════════════════════════════════ -->
		<div class="flex items-center justify-between py-12 lg:py-14">

			<a
				href="<?php echo esc_url( home_url( '/' ) ); ?>"
				rel="home"
				aria-label="<?php echo esc_attr( $site_name ); ?> — <?php esc_attr_e( 'home', 'reacon-group' ); ?>"
			>
				<img
					src="<?php echo esc_url( $logo_src ); ?>"
					alt="<?php echo esc_attr( $site_name ); ?>"
					width="240"
					height="64"
					loading="lazy"
					decoding="async"
					class="h-16 w-auto"
				/>
			</a>

			<!-- Language selector -->
			<button
				type="button"
				class="inline-flex cursor-pointer items-center gap-2 rounded-full border border-white/25 bg-transparent px-[18px] py-[9px] font-sans text-[13.5px] text-white transition-colors duration-200 hover:bg-white/[.06]"
				aria-label="<?php esc_attr_e( 'Select language', 'reacon-group' ); ?>"
			>
				<!-- Globe -->
				<i class="ph ph-globe shrink-0 text-[17px]" aria-hidden="true"></i>
				<span><?php esc_html_e( 'English', 'reacon-group' ); ?></span>
				<!-- Chevron down -->
				<i class="ph-bold ph-caret-down shrink-0 text-[10px] opacity-65" aria-hidden="true"></i>
			</button>

		</div><!-- /top bar -->

		<!-- ══ NAVIGATION COLUMNS + CTA CARD ══════════════════════════ -->
		<div class="grid grid-cols-2 gap-7 pb-14 lg:grid-cols-[190px_200px_250px_1fr]">

			<!-- Quick Links -->
			<nav aria-label="<?php esc_attr_e( 'Quick links', 'reacon-group' ); ?>">
				<h3 class="mb-[18px] font-display text-[14.5px] font-semibold tracking-[0.01em] text-white">
					<?php esc_html_e( 'Quick Links', 'reacon-group' ); ?>
				</h3>
				<ul class="flex flex-col gap-[11px]">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Home', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'About Us', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/who-we-are/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Who We Are', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/blogs/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Blogs', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Contact Us', 'reacon-group' ); ?></a></li>
				</ul>
			</nav>

			<!-- Solution -->
			<nav aria-label="<?php esc_attr_e( 'Solutions', 'reacon-group' ); ?>">
				<h3 class="mb-[18px] font-display text-[14.5px] font-semibold tracking-[0.01em] text-white">
					<?php esc_html_e( 'Solution', 'reacon-group' ); ?>
				</h3>
				<ul class="flex flex-col gap-[11px]">
					<li><a href="<?php echo esc_url( home_url( '/content-studio/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Content Studio', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/production-fulfillment/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Production &amp; Fulfillment', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/data-driven-innovation/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Data-Driven Innovation', 'reacon-group' ); ?></a></li>
				</ul>
			</nav>

			<!-- Industries -->
			<nav aria-label="<?php esc_attr_e( 'Industries', 'reacon-group' ); ?>">
				<h3 class="mb-[18px] font-display text-[14.5px] font-semibold tracking-[0.01em] text-white">
					<?php esc_html_e( 'Industries', 'reacon-group' ); ?>
				</h3>
				<ul class="flex flex-col gap-[11px]">
					<li><a href="<?php echo esc_url( home_url( '/industries/banking-finance/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Banking &amp; Finance', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/health-pharmaceuticals/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Health &amp; Pharmaceuticals', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/e-commerce/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'E-Commerce', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/charities-not-for-profit/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Charities &amp; Not-for-Profit', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/utilities/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Utilities', 'reacon-group' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/government/' ) ); ?>"
						class="font-sans text-sm text-white/85 transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Government', 'reacon-group' ); ?></a></li>
				</ul>
			</nav>

			<!-- CTA Card — full-width on mobile / tablet, 4th column on desktop -->
			<div class="col-span-2 lg:col-span-1">
				<div class="rounded-[30px] border border-[#A6EEF2] bg-[#E9FBFC] p-8">

					<h2 class="mb-[18px] font-display text-2xl font-bold leading-[1.22] text-[#1e2330]">
						<?php esc_html_e( 'Power Your Communication With Precision', 'reacon-group' ); ?>
					</h2>

					<!-- Feature checklist -->
					<ul class="mb-6 flex flex-col gap-[11px]" role="list">

						<li class="flex items-start gap-[10px]">
							<span
								aria-hidden="true"
								class="mt-[3px] flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-secondary"
							>
								<svg width="10" height="10" viewBox="0 0 12 12" fill="none"
									stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
									<polyline points="2,6.5 5,9.5 10,3"/>
								</svg>
							</span>
							<p class="font-sans text-[13.5px] leading-[1.55] text-[#4b5058]">
								<?php esc_html_e( 'Deliver print, packaging, and campaigns on time, every time', 'reacon-group' ); ?>
							</p>
						</li>

						<li class="flex items-start gap-[10px]">
							<span
								aria-hidden="true"
								class="mt-[3px] flex h-[18px] w-[18px] shrink-0 items-center justify-center rounded-full bg-secondary"
							>
								<svg width="10" height="10" viewBox="0 0 12 12" fill="none"
									stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
									<polyline points="2,6.5 5,9.5 10,3"/>
								</svg>
							</span>
							<p class="font-sans text-[13.5px] leading-[1.55] text-[#4b5058]">
								<?php esc_html_e( 'Cut operational delays with one integrated partner', 'reacon-group' ); ?>
							</p>
						</li>

					</ul><!-- /checklist -->

					<!-- CTA buttons -->
					<div class="flex flex-wrap items-center gap-[10px]">

						<a
							href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"
							class="inline-flex items-center gap-[10px] rounded-full bg-primary py-2 pl-5 pr-2.5 font-display text-[13.5px] font-bold text-white/85 no-underline transition-all duration-200 hover:-translate-y-px hover:brightness-110 whitespace-nowrap"
						>
							<?php esc_html_e( 'Work With Reacon', 'reacon-group' ); ?>
							<span
								aria-hidden="true"
								class="flex h-[30px] w-[30px] shrink-0 items-center justify-center rounded-full bg-black/[.16]"
							>
								<i class="ph-bold ph-arrow-up-right text-[12px]" aria-hidden="true"></i>
							</span>
						</a>

						<a
							href="<?php echo esc_url( home_url( '/talk-to-our-team/' ) ); ?>"
							class="inline-flex items-center justify-center rounded-full border-[1.5px] border-primary px-[22px] py-[9px] font-display text-[13.5px] font-semibold text-primary no-underline transition-all duration-200 hover:-translate-y-px hover:bg-primary/[.07] whitespace-nowrap"
						>
							<?php esc_html_e( 'Talk to Our Team', 'reacon-group' ); ?>
						</a>

					</div><!-- /cta buttons -->

				</div><!-- /cta card -->
			</div><!-- /cta col -->

		</div><!-- /nav-cta grid -->

		<!-- ══ SOCIAL ICONS ROW ════════════════════════════════════════ -->
		<div class="mb-[18px] flex items-center">

			<!-- Left fade line -->
			<div
				aria-hidden="true"
				class="h-px flex-1"
				style="background: linear-gradient(to right, transparent, rgba(213,219,226,0.22));"
			></div>

			<div class="flex items-center gap-5 px-7">

				<a
					href="#"
					aria-label="<?php esc_attr_e( 'Facebook', 'reacon-group' ); ?>"
					rel="noopener noreferrer"
					target="_blank"
					class="transition-all duration-200 hover:-translate-y-0.5 hover:brightness-125"
				>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/public/social-icon/facebook.svg' ); ?>" alt="" width="12" height="21" loading="lazy" class="h-5 w-auto" />
				</a>

				<a
					href="#"
					aria-label="<?php esc_attr_e( 'Twitter / X', 'reacon-group' ); ?>"
					rel="noopener noreferrer"
					target="_blank"
					class="transition-all duration-200 hover:-translate-y-0.5 hover:brightness-125"
				>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/public/social-icon/twitter.svg' ); ?>" alt="" width="42" height="42" loading="lazy" class="h-10 w-auto" />
				</a>

				<a
					href="#"
					aria-label="<?php esc_attr_e( 'Instagram', 'reacon-group' ); ?>"
					rel="noopener noreferrer"
					target="_blank"
					class="transition-all duration-200 hover:-translate-y-0.5 hover:brightness-125"
				>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/public/social-icon/instagram.svg' ); ?>" alt="" width="21" height="21" loading="lazy" class="h-5 w-auto" />
				</a>

				<a
					href="#"
					aria-label="<?php esc_attr_e( 'LinkedIn', 'reacon-group' ); ?>"
					rel="noopener noreferrer"
					target="_blank"
					class="transition-all duration-200 hover:-translate-y-0.5 hover:brightness-125"
				>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/public/social-icon/linkedin.svg' ); ?>" alt="" width="21" height="20" loading="lazy" class="h-5 w-auto" />
				</a>

				<a
					href="#"
					aria-label="<?php esc_attr_e( 'YouTube', 'reacon-group' ); ?>"
					rel="noopener noreferrer"
					target="_blank"
					class="transition-all duration-200 hover:-translate-y-0.5 hover:brightness-125"
				>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/public/social-icon/youtube.svg' ); ?>" alt="" width="24" height="17" loading="lazy" class="h-5 w-auto" />
				</a>

			</div>

			<!-- Right fade line -->
			<div
				aria-hidden="true"
				class="h-px flex-1"
				style="background: linear-gradient(to left, transparent, rgba(213,219,226,0.22));"
			></div>

		</div><!-- /social row -->

		<!-- ══ BOTTOM: Copyright, Legal, Brands ════════════════════════ -->
		<div class="text-center">

			<p class="mb-3 font-sans text-[12.5px] text-white/55">
				&copy; <?php echo $current_year; ?> &mdash; <?php echo $site_name; ?>
			</p>

			<!-- Legal links -->
			<ul class="mb-[26px] flex flex-wrap justify-center gap-x-6 gap-y-1.5" aria-label="<?php esc_attr_e( 'Legal links', 'reacon-group' ); ?>">
				<li>
					<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"
						class="font-sans text-[13px] text-white/85 no-underline transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Terms', 'reacon-group' ); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"
						class="font-sans text-[13px] text-white/85 no-underline transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Privacy', 'reacon-group' ); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>"
						class="font-sans text-[13px] text-white/85 no-underline transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Cookies', 'reacon-group' ); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( home_url( '/sitemap/' ) ); ?>"
						class="font-sans text-[13px] text-white/85 no-underline transition-colors duration-200 hover:text-primary">
						<?php esc_html_e( 'Sitemap', 'reacon-group' ); ?>
					</a>
				</li>
			</ul>

			<!-- Divider -->
			<div class="mb-[22px] h-px bg-white/[.08]" aria-hidden="true"></div>

			<!-- Sub-brands / group companies -->
			<ul
				class="flex flex-wrap justify-center gap-x-11 gap-y-2 pb-10"
				aria-label="<?php esc_attr_e( 'Group brands', 'reacon-group' ); ?>"
			>
				<li class="font-sans text-[13px] text-white/85 transition-colors duration-200 hover:text-primary cursor-pointer">
					<?php esc_html_e( 'Cups Galore', 'reacon-group' ); ?>
				</li>
				<li class="font-sans text-[13px] text-white/85 transition-colors duration-200 hover:text-primary cursor-pointer">
					<?php esc_html_e( 'Digital Press', 'reacon-group' ); ?>
				</li>
				<li class="font-sans text-[13px] text-white/85 transition-colors duration-200 hover:text-primary cursor-pointer">
					<?php esc_html_e( 'Horizon Print Management', 'reacon-group' ); ?>
				</li>
				<li class="font-sans text-[13px] text-white/85 transition-colors duration-200 hover:text-primary cursor-pointer">
					<?php esc_html_e( 'Westman Printing', 'reacon-group' ); ?>
				</li>
			</ul>

		</div><!-- /bottom -->

	</div><!-- /inner container -->
</footer>
