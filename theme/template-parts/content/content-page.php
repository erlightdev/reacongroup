<?php

/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

$page_header_bg = get_template_directory_uri() . '/public/about/about-header.png';
$page_title     = get_the_title();
$page_eyebrow   = __( 'Page', 'reacon-group' );
$page_summary   = has_excerpt() ? get_the_excerpt() : '';
?>

<section
	id="page-hero"
	class="w-full p-1.5 sm:p-2 lg:p-4"
	aria-label="<?php esc_attr_e( 'Page header', 'reacon-group' ); ?>">
	<div class="reacon-page-hero-card relative min-h-[255px] overflow-hidden rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
		<img
			src="<?php echo esc_url( $page_header_bg ); ?>"
			alt=""
			aria-hidden="true"
			class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
			fetchpriority="high"
			loading="eager"
			decoding="async" />

		<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]" aria-hidden="true"></div>

		<div class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-7xl flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:px-8 lg:pb-14 lg:pt-36">
			<p class="mb-4 font-sans text-[11px] font-medium uppercase tracking-[0.18em] text-white/85 lg:mb-5">
				<?php echo esc_html( $page_eyebrow ); ?>
			</p>
			<h1 class="max-w-[860px] font-display text-[30px] font-bold leading-[1.16] text-white sm:text-[40px] lg:text-[56px]">
				<?php echo esc_html( $page_title ); ?>
			</h1>
			<?php if ( $page_summary ) : ?>
				<p class="mt-4 max-w-[780px] font-sans text-[13px] leading-[1.45] text-white/90 sm:text-[15px] lg:mt-5 lg:text-base">
					<?php echo esc_html( $page_summary ); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12' ); ?>>

	<?php reacon_group_post_thumbnail(); ?>

	<div <?php reacon_group_content_class( 'entry-content font-sans text-base leading-[1.6] text-foreground [&_p]:mb-4 [&_h2]:mt-8 [&_h2]:mb-3 [&_h2]:font-display [&_h2]:text-2xl [&_h2]:font-semibold [&_h2]:text-foreground [&_h3]:mt-6 [&_h3]:mb-2 [&_h3]:font-display [&_h3]:text-xl [&_h3]:font-semibold [&_h3]:text-foreground [&_ul]:mb-4 [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:mb-4 [&_ol]:list-decimal [&_ol]:pl-6 [&_a]:text-primary hover:[&_a]:text-secondary' ); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="mt-6 border-t border-border pt-4 font-sans text-sm text-muted-foreground">' . __( 'Pages:', 'reacon-group' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer mt-8 border-t border-border pt-4">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Edit <span class="sr-only">%s</span>', 'reacon-group' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="inline-flex items-center rounded-full border border-border px-4 py-2 font-sans text-sm text-muted-foreground transition-colors hover:border-primary hover:text-primary">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

<style>
	/* Page Hero notch styles (desktop). */
	@media (min-width: 1024px) {
		#page-hero .reacon-page-hero-card {
			--hero-notch-width: clamp(560px, 48vw, 720px);
			--hero-notch-radius: 40px;
			--hero-notch-height: 86px;
			--hero-notch-swoop: 40px;
		}

		#page-hero .reacon-page-hero-card::before {
			content: "";
			position: absolute;
			left: 50%;
			top: 0;
			transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
			width: var(--hero-notch-width);
			height: var(--hero-notch-height);
			background: #fff;
			border-bottom-left-radius: var(--hero-notch-radius);
			border-bottom-right-radius: var(--hero-notch-radius);
			z-index: 3;
			pointer-events: none;
		}

		#page-hero .reacon-page-hero-card::after {
			content: "";
			position: absolute;
			top: 0;
			left: 50%;
			transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
			width: calc(var(--hero-notch-width) + (var(--hero-notch-swoop) * 2));
			height: var(--hero-notch-swoop);
			background:
				radial-gradient(circle at 0% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat left bottom / var(--hero-notch-swoop) var(--hero-notch-swoop),
				radial-gradient(circle at 100% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat right bottom / var(--hero-notch-swoop) var(--hero-notch-swoop);
			z-index: 4;
			pointer-events: none;
		}
	}
</style>

<script>
	document.addEventListener('DOMContentLoaded', () => {
		const syncPageHeroNotchToDesktopMenu = () => {
			const heroCard = document.querySelector('#page-hero .reacon-page-hero-card');
			const navPill = document.querySelector('#site-navigation > ul');
			if (!heroCard || !navPill) return;

			if (window.innerWidth < 1024) {
				heroCard.style.removeProperty('--hero-notch-width');
				heroCard.style.removeProperty('--hero-notch-shift');
				return;
			}

			const heroRect = heroCard.getBoundingClientRect();
			const navRect = navPill.getBoundingClientRect();
			const navWidth = Math.round(navRect.width);
			if (!navWidth) return;

			const heroCenterX = heroRect.left + (heroRect.width / 2);
			const navCenterX = navRect.left + (navRect.width / 2);
			const notchShift = Math.round(navCenterX - heroCenterX);

			heroCard.style.setProperty('--hero-notch-width', `${navWidth + 18}px`);
			heroCard.style.setProperty('--hero-notch-shift', `${notchShift}px`);
		};

		syncPageHeroNotchToDesktopMenu();
		window.addEventListener('resize', syncPageHeroNotchToDesktopMenu);
	});
</script>
