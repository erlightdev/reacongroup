<?php
/**
 * Template part for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

$blog_back_icon   = get_template_directory_uri() . '/public/solutions/blog-single-back-icon.svg';
$blog_fallback_image = get_template_directory_uri() . '/public/solutions/blog-single-hero.png';
$blog_index_url   = home_url( '/blogs/' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-background' ); ?>>

	<!-- Major Section: Blog Single Content -->
	<section
		id="blog-single-content"
		class="py-10 sm:py-14 lg:py-20 xl:py-[120px]"
		aria-labelledby="blog-single-title">
		<div class="mx-auto w-full max-w-[1440px] px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
			<div class="mx-auto flex w-full max-w-[1280px] flex-col items-start gap-6 sm:gap-8 lg:gap-10">
				<!-- Blog Single: Back Link -->
				<header class="w-full">
					<a
						href="<?php echo esc_url( $blog_index_url ); ?>"
						class="inline-flex items-center gap-2 text-muted-foreground no-underline transition-colors hover:text-foreground"
						aria-label="<?php esc_attr_e( 'Back to blogs', 'reacon-group' ); ?>">
						<img
							src="<?php echo esc_url( $blog_back_icon ); ?>"
							alt=""
							aria-hidden="true"
							class="h-[14px] w-[14px] shrink-0"
							loading="lazy"
							decoding="async" />
						<span class="font-sans text-[14px] leading-[22.72px] sm:text-[16px]">
							<?php esc_html_e( 'Blogs', 'reacon-group' ); ?>
						</span>
					</a>
				</header>
				<!-- End Blog Single: Back Link -->

				<!-- Blog Single: Heading -->
				<div class="w-full">
					<h1
						id="blog-single-title"
						class="font-display text-[32px] font-semibold leading-tight text-foreground sm:text-[40px] lg:text-[48px] xl:text-[56px] xl:leading-[73.92px]">
						<?php the_title(); ?>
					</h1>
				</div>
				<!-- End Blog Single: Heading -->

				<!-- Blog Single: Featured Media -->
				<figure class="w-full overflow-hidden rounded-[24px] sm:rounded-[28px] lg:rounded-[32px]">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php
						the_post_thumbnail(
							'full',
							array(
								'class'        => 'block h-[220px] w-full object-cover sm:h-[300px] md:h-[380px] lg:h-[420px]',
								'loading'      => 'eager',
								'decoding'     => 'async',
								'fetchpriority'=> 'high',
							)
						);
						?>
					<?php else : ?>
						<img
							src="<?php echo esc_url( $blog_fallback_image ); ?>"
							alt="<?php echo esc_attr( get_the_title() ); ?>"
							class="block h-[220px] w-full object-cover sm:h-[300px] md:h-[380px] lg:h-[420px]"
							loading="eager"
							decoding="async"
							fetchpriority="high" />
					<?php endif; ?>
				</figure>
				<!-- End Blog Single: Featured Media -->

				<!-- Blog Single: Meta and Body -->
				<div class="w-full space-y-5 sm:space-y-6">
					<div class="font-sans text-[14px] font-medium leading-[22.72px] text-muted-foreground sm:text-[16px]">
						<?php echo esc_html( get_the_author() . ' • ' . get_the_date( 'j M Y' ) ); ?>
					</div>
					<div
						<?php reacon_group_content_class( 'entry-content blog-single-content font-sans text-[15px] leading-[22.72px] text-muted-foreground sm:text-[16px] [&_p]:mb-4 [&_p]:leading-[22.72px] [&_strong]:font-medium [&_h2]:mt-7 [&_h2]:mb-3 [&_h2]:font-sans [&_h2]:text-[20px] [&_h2]:font-medium [&_h2]:leading-[28px] [&_h3]:mt-6 [&_h3]:mb-3 [&_h3]:font-sans [&_h3]:text-[18px] [&_h3]:font-medium [&_h3]:leading-[26px]' ); ?>>
						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="mt-6">' . __( 'Pages:', 'reacon-group' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>
				</div>
				<!-- End Blog Single: Meta and Body -->

				<footer class="entry-footer w-full pt-2">
					<?php reacon_group_entry_footer(); ?>
				</footer>
			</div>
		</div>
	</section>
	<!-- End Major Section: Blog Single Content -->

</article><!-- #post-${ID} -->
