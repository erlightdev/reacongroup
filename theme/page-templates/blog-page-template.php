<?php

/**
 * Template Name: Blog Page
 * Template Post Type: page
 *
 * Blog page template with the mirrored top hero/header area.
 *
 * @package reacon-group
 */
get_header();

$blog_hero_bg = get_template_directory_uri() . '/public/blog/blog-hero-subtract.png';
$blog_card_image = get_template_directory_uri() . '/public/blog/blog-card-image.png';
$acf_enabled = function_exists('get_field');

if (!function_exists('reacon_blog_fallback_text')) {
	function reacon_blog_fallback_text($value, $fallback)
	{
		$value = trim((string) $value);
		return $value !== '' ? $value : $fallback;
	}
}

if (!function_exists('reacon_blog_get_link')) {
	function reacon_blog_get_link($field_value, $fallback_url = '#', $fallback_title = '')
	{
		if (is_array($field_value)) {
			return array(
				'url' => !empty($field_value['url']) ? $field_value['url'] : $fallback_url,
				'title' => !empty($field_value['title']) ? $field_value['title'] : $fallback_title,
				'target' => !empty($field_value['target']) ? $field_value['target'] : '_self',
			);
		}

		if (is_string($field_value) && $field_value !== '') {
			return array(
				'url' => $field_value,
				'title' => $fallback_title,
				'target' => '_self',
			);
		}

		return array(
			'url' => $fallback_url,
			'title' => $fallback_title,
			'target' => '_self',
		);
	}
}

if (!function_exists('reacon_blog_render_icon')) {
	function reacon_blog_render_icon($icon_type, $icon_value, $class = '')
	{
		if ('lucide' === $icon_type && is_string($icon_value) && $icon_value !== '') {
			echo '<i data-lucide="' . esc_attr($icon_value) . '" class="' . esc_attr($class) . '" aria-hidden="true"></i>';
			return;
		}

		if ('svg' === $icon_type && !empty($icon_value) && function_exists('reacon_group_inline_svg')) {
			$svg_markup = reacon_group_inline_svg($icon_value, $class);
			if ($svg_markup) {
				echo $svg_markup;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				return;
			}
		}

		$ph_class = is_string($icon_value) && $icon_value !== '' ? $icon_value : 'ph-bold ph-arrow-up-right';
		echo '<i class="' . esc_attr(trim($ph_class . ' ' . $class)) . '" aria-hidden="true"></i>';
	}
}

$blog_page_id = (int) get_queried_object_id();

if (!function_exists('reacon_blog_get_acf')) {
	function reacon_blog_get_acf($field_name, $default = '', $post_id = 0)
	{
		if (!function_exists('get_field')) {
			return $default;
		}

		$value = $post_id > 0 ? get_field($field_name, $post_id) : get_field($field_name);
		return $value !== null ? $value : $default;
	}
}

$blog_sections = array(
	'hero' => true,
	'latest' => true,
	'cta' => true,
);

if ($acf_enabled) {
	$enable_hero = reacon_blog_get_acf('blog_enable_hero', true, $blog_page_id);
	$enable_latest = reacon_blog_get_acf('blog_enable_latest', true, $blog_page_id);
	$enable_cta = reacon_blog_get_acf('blog_enable_cta', true, $blog_page_id);
	$blog_sections = array(
		'hero' => $enable_hero !== false ? (bool) $enable_hero : true,
		'latest' => $enable_latest !== false ? (bool) $enable_latest : true,
		'cta' => $enable_cta !== false ? (bool) $enable_cta : true,
	);
}
?>
<main id="primary" class="overflow-x-hidden" role="main">
	<!-- Major Section: Blog Hero -->
	<?php
	$hero_bg = '';
	$hero_eyebrow = '';
	$hero_title = '';
	$hero_description = '';
	if ($acf_enabled) {
		$hero_bg_field = reacon_blog_get_acf('blog_hero_background', '', $blog_page_id);
		$hero_bg = is_array($hero_bg_field) && !empty($hero_bg_field['url']) ? $hero_bg_field['url'] : (is_string($hero_bg_field) ? $hero_bg_field : '');
		$hero_eyebrow = (string) reacon_blog_get_acf('blog_hero_eyebrow', '', $blog_page_id);
		$hero_title = (string) reacon_blog_get_acf('blog_hero_title', '', $blog_page_id);
		$hero_description = (string) reacon_blog_get_acf('blog_hero_description', '', $blog_page_id);
	}
	?>
	<?php if ($blog_sections['hero']): ?>
		<section
			id="blog-hero"
			class="relative w-full p-0 md:p-2.5"
			aria-label="<?php esc_attr_e('Blog page hero', 'reacon-group'); ?>">
			<div
				class="reacon-blog-hero-card relative min-h-[255px] overflow-hidden rounded-0 md:rounded-[24px] bg-[#062B53] sm:min-h-[300px] lg:min-h-[380px] lg:rounded-[31px]">
				<img
					src="<?php echo esc_url($hero_bg !== '' ? $hero_bg : $blog_hero_bg); ?>"
					alt=""
					aria-hidden="true"
					class="pointer-events-none absolute inset-0 h-full w-full object-cover object-center"
					fetchpriority="high"
					loading="eager"
					decoding="async" />

				<!-- Dark overlay to keep typography readable over the image -->
				<div
					class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(0,10,33,0.28)_0%,rgba(0,10,33,0.18)_45%,rgba(0,10,33,0.28)_100%)]"
					aria-hidden="true"></div>

				<div
					class="relative z-10 mx-auto flex min-h-[255px] w-full max-w-[1200px] flex-col items-center justify-center px-5 pb-10 pt-28 text-center sm:min-h-[300px] sm:px-6 sm:pt-32 lg:min-h-[380px] lg:px-10 lg:pb-14 lg:pt-36">
					<p class="reacon-type-overline mb-4 text-white/85 lg:mb-5">
						<?php echo esc_html(reacon_blog_fallback_text($hero_eyebrow, 'Blogs')); ?>
					</p>

					<h1 class="reacon-type-h1 max-w-[860px] text-white">
						<?php echo esc_html(reacon_blog_fallback_text($hero_title, 'Insights, Ideas & Industry Thinking')); ?>
					</h1>

					<p class="reacon-type-lead mt-4 max-w-[780px] text-white/90 lg:mt-5">
						<?php echo esc_html(reacon_blog_fallback_text($hero_description, 'Please add hero description in ACF.')); ?>
					</p>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End Major Section: Blog Hero -->

	<!-- Major Section: Latest Blogs -->
	<?php
	$latest_heading = '';
	$read_more_label = '';
	$posts_per_page = 6;
	$pagination_prev_label = '';
	$pagination_next_label = '';

	if ($acf_enabled) {
		$latest_heading = (string) reacon_blog_get_acf('blog_latest_heading', '', $blog_page_id);
		$read_more_label = (string) reacon_blog_get_acf('blog_card_read_more_label', '', $blog_page_id);
		$posts_per_page_raw = reacon_blog_get_acf('blog_posts_per_page', 6, $blog_page_id);
		if (is_numeric($posts_per_page_raw) && (int) $posts_per_page_raw > 0) {
			$posts_per_page = (int) $posts_per_page_raw;
		}
		$pagination_prev_label = (string) reacon_blog_get_acf('blog_pagination_prev_label', '', $blog_page_id);
		$pagination_next_label = (string) reacon_blog_get_acf('blog_pagination_next_label', '', $blog_page_id);
	}

	$paged = (int) get_query_var('paged');
	if ($paged < 1) {
		$paged = 1;
	}

	$featured_post_id = 0;
	$featured_query = new WP_Query(
		array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'tag' => 'featured',
			'orderby' => 'date',
			'order' => 'DESC',
			'ignore_sticky_posts' => true,
			'no_found_rows' => true,
		)
	);

	$featured_post = null;
	if ($featured_query->have_posts()) {
		$featured_post = $featured_query->posts[0];
		$featured_post_id = $featured_post instanceof WP_Post ? (int) $featured_post->ID : 0;
	}

	// If no "featured" tagged post exists, gracefully fall back to the latest post.
	if (!$featured_post_id) {
		$fallback_featured_query = new WP_Query(
			array(
				'post_type' => 'post',
				'posts_per_page' => 1,
				'orderby' => 'date',
				'order' => 'DESC',
				'ignore_sticky_posts' => true,
				'no_found_rows' => true,
			)
		);
		if ($fallback_featured_query->have_posts()) {
			$featured_post = $fallback_featured_query->posts[0];
			$featured_post_id = $featured_post instanceof WP_Post ? (int) $featured_post->ID : 0;
		}
	}

	$posts_query = new WP_Query(
		array(
			'post_type' => 'post',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'post__not_in' => $featured_post_id ? array($featured_post_id) : array(),
			'ignore_sticky_posts' => true,
		)
	);
	?>
	<?php if ($blog_sections['latest']): ?>
		<section
			id="blog-latest"
			class="bg-background py-12"
			aria-labelledby="blog-latest-heading">
			<div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
				<div class="flex flex-col gap-4 items-start">
					<h2
						id="blog-latest-heading"
						class="reacon-type-h3 text-foreground">
						<?php echo esc_html(reacon_blog_fallback_text($latest_heading, 'Latest Blogs')); ?>
					</h2>

					<?php
					$featured_url = $featured_post_id ? get_permalink($featured_post_id) : '#';
					$featured_title = $featured_post_id ? get_the_title($featured_post_id) : '';
					$featured_meta = '';
					$featured_excerpt = '';
					$featured_img_url = '';
					$featured_img_alt = '';
					if ($featured_post_id) {
						$featured_meta = trim(get_the_author_meta('display_name', (int) $featured_post->post_author) . ' • ' . get_the_date('d M Y', $featured_post_id));
						$featured_excerpt = wp_trim_words(get_the_excerpt($featured_post_id), 55, '');
						$thumb_id = get_post_thumbnail_id($featured_post_id);
						$featured_img_url = get_the_post_thumbnail_url($featured_post_id, 'full');
						$featured_img_alt = $thumb_id ? (string) get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '';
					}
					?>
					<a
						href="<?php echo esc_url($featured_url); ?>"
						aria-label="<?php echo esc_attr(reacon_blog_fallback_text($featured_title, 'Featured blog')); ?>"
						class="group bg-card w-full border border-border rounded-[32px] overflow-hidden p-[10px] flex flex-col gap-[16px] transition-colors hover:border-primary lg:border-transparent lg:hover:border-transparent">
						<div class="h-[420px] relative rounded-[24px] w-full overflow-hidden">
							<img
								src="<?php echo esc_url($featured_img_url ? $featured_img_url : $blog_card_image); ?>"
								alt="<?php echo esc_attr(reacon_blog_fallback_text($featured_img_alt, 'Featured blog cover')); ?>"
								class="absolute inset-0 h-full w-full object-cover pointer-events-none"
								loading="eager"
								decoding="async" />
						</div>

						<div class="flex flex-col items-start gap-[8px] pt-[8px] px-[8px]">
							<p class="reacon-type-caption text-muted-foreground">
								<?php echo esc_html($featured_meta); ?>
							</p>
							<h3 class="reacon-type-h3 text-foreground">
								<?php echo esc_html(reacon_blog_fallback_text($featured_title, 'Latest blog post')); ?>
							</h3>
							<p class="reacon-type-body text-muted-foreground">
								<?php echo esc_html(reacon_blog_fallback_text($featured_excerpt, 'No blog posts found.')); ?>
							</p>
						</div>

					</a>

					<div class="w-full py-4" aria-hidden="true">
						<div class="h-px w-full bg-[#d6d6d6]"></div>
					</div>


					<div class="flex flex-col gap-[24px] w-full">
						<div class="grid grid-cols-1 gap-[24px] sm:grid-cols-2 lg:grid-cols-3">
							<?php if ($posts_query->have_posts()): ?>
								<?php foreach ($posts_query->posts as $index => $post): ?>
									<?php
									$post_id = $post instanceof WP_Post ? (int) $post->ID : 0;
									$card_img_url = $post_id ? get_the_post_thumbnail_url($post_id, 'large') : '';
									$card_thumb_id = $post_id ? get_post_thumbnail_id($post_id) : 0;
									$card_img_alt = $card_thumb_id ? (string) get_post_meta($card_thumb_id, '_wp_attachment_image_alt', true) : '';
									$card_meta = $post_id ? trim(get_the_author_meta('display_name', (int) $post->post_author) . ' • ' . get_the_date('d M Y', $post_id)) : '';
									$card_title = $post_id ? get_the_title($post_id) : '';
									$card_excerpt = $post_id ? wp_trim_words(get_the_excerpt($post_id), 24, '') : '';
									$card_url = $post_id ? get_permalink($post_id) : '#';
									?>
									<article class="bg-card border border-border rounded-[32px] p-[10px] flex flex-col gap-[24px] overflow-hidden transition-colors hover:border-primary">
										<div class="h-[240px] relative rounded-[24px] overflow-hidden">
											<img
												src="<?php echo esc_url($card_img_url ? $card_img_url : $blog_card_image); ?>"
												alt="<?php echo esc_attr($card_img_alt !== '' ? $card_img_alt : ('Blog cover ' . ((int) $index + 1))); ?>"
												class="absolute inset-0 h-full w-full object-cover pointer-events-none"
												loading="lazy"
												decoding="async" />
										</div>
										<div class="flex flex-col items-start gap-[12px] pt-[8px] px-[8px]">
											<p class="reacon-type-caption text-muted-foreground">
												<?php echo esc_html($card_meta); ?>
											</p>
											<h4 class="reacon-type-h4 text-foreground">
												<a href="<?php echo esc_url($card_url); ?>" class="no-underline text-inherit">
													<?php echo esc_html($card_title); ?>
												</a>
											</h4>
											<p class="reacon-type-body line-clamp-3 text-muted-foreground">
												<?php echo esc_html($card_excerpt); ?>
											</p>
										</div>
										<a
											href="<?php echo esc_url($card_url); ?>"
											class="reacon-type-button mt-auto flex w-fit self-end items-center justify-end rounded-[24px] border border-border px-[16px] py-[8px] text-muted-foreground no-underline transition-colors hover:border-primary hover:text-foreground">
											<?php echo esc_html(reacon_blog_fallback_text($read_more_label, 'Read More')); ?>
										</a>
									</article>
								<?php endforeach; ?>
							<?php else: ?>
								<article class="bg-card border border-border rounded-[32px] p-[10px] flex flex-col gap-[24px] overflow-hidden">
									<div class="reacon-type-body flex min-h-[240px] items-center justify-center rounded-[24px] bg-background px-6 text-center text-muted-foreground">
										<?php echo esc_html('Please add blog cards in ACF.'); ?>
									</div>
								</article>
							<?php endif; ?>
						</div>
					</div>

					<?php
					$max_pages = (int) $posts_query->max_num_pages;
					$show_pagination = $max_pages > 1 && $posts_query->found_posts > $posts_per_page;
					$prev_url = $paged > 1 ? get_pagenum_link($paged - 1) : '';
					$next_url = $paged < $max_pages ? get_pagenum_link($paged + 1) : '';
					$page_links = $show_pagination ? paginate_links(
						array(
							'total' => $max_pages,
							'current' => $paged,
							'type' => 'array',
							'end_size' => 1,
							'mid_size' => 1,
							'prev_next' => false,
						)
					) : array();
					?>
					<?php if ($show_pagination): ?>
						<nav
							class="mt-2 flex w-full items-center justify-center"
							aria-label="<?php esc_attr_e('Blog pagination', 'reacon-group'); ?>">
							<div class="flex items-center justify-center gap-2 rounded-[14px]  px-3 py-2 sm:gap-3 sm:px-4 sm:py-2.5">
								<button
									type="button"
									<?php echo $prev_url ? 'data-url="' . esc_attr($prev_url) . '"' : 'disabled'; ?>
									class="group inline-flex items-center gap-2 rounded-full px-1.5 py-1 text-[#475569] transition-colors hover:text-[#334155] disabled:cursor-not-allowed disabled:opacity-40">
									<i class="ph-bold ph-caret-left text-[22px] leading-none text-current" aria-hidden="true"></i>
									<span class="reacon-type-label text-current">
										<?php echo esc_html(reacon_blog_fallback_text($pagination_prev_label, 'Previous')); ?>
									</span>
								</button>

								<div class="flex items-center gap-1.5 px-1 sm:gap-2">
									<?php
									if (is_array($page_links)) {
										foreach ($page_links as $link_html) {
											$is_dots = strpos($link_html, 'dots') !== false;
											if ($is_dots) {
												echo '<span class="reacon-type-label select-none px-1 text-[#64748B]">...</span>';
												continue;
											}

											$is_current = strpos($link_html, 'current') !== false;
											$page_label = trim(wp_strip_all_tags($link_html));
											$page_url = '';
											if (preg_match("/href=[\\\\\"\']([^\\\\\"\']+)[\\\\\"\']/", $link_html, $m)) {
												$page_url = $m[1];
											}
									?>
											<a
												href="<?php echo esc_url($page_url ? $page_url : '#'); ?>"
												<?php echo $is_current ? 'aria-current="page"' : ''; ?>
												class="<?php echo $is_current
															? 'bg-primary text-white'
															: 'bg-transparent text-[#374151] hover:text-[#111827]'; ?> inline-flex h-10 w-10 items-center justify-center rounded-full transition-colors">
												<span class="reacon-type-label"><?php echo esc_html($page_label); ?></span>
											</a>
									<?php
										}
									}
									?>
								</div>

								<button
									type="button"
									<?php echo $next_url ? 'data-url="' . esc_attr($next_url) . '"' : 'disabled'; ?>
									class="group inline-flex items-center gap-2 rounded-full px-1.5 py-1 text-[#475569] transition-colors hover:text-[#334155] disabled:cursor-not-allowed disabled:opacity-40">
									<span class="reacon-type-label text-current">
										<?php echo esc_html(reacon_blog_fallback_text($pagination_next_label, 'Next')); ?>
									</span>
									<i class="ph ph-caret-right text-[22px] leading-none text-current" aria-hidden="true"></i>
								</button>
							</div>
						</nav>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End Major Section: Latest Blogs -->

	<!-- Cta Section: strategic call-to-action banner. -->
	<?php
	$solution_cta = array(
		'heading' => '',
		'description' => '',
		'primary' => array(
			'label' => '',
			'url' => '#',
			'target' => '_self',
		),
		'secondary' => array(
			'label' => '',
			'url' => '#',
			'target' => '_self',
		),
	);
	$cta_color = 'teal';
	$cta_icon_type = 'phosphor';
	$cta_icon_value = 'ph-bold ph-arrow-up-right';
	if ($acf_enabled) {
		$solution_cta['heading'] = (string) reacon_blog_get_acf('blog_cta_heading', '', $blog_page_id);
		$solution_cta['description'] = (string) reacon_blog_get_acf('blog_cta_description', '', $blog_page_id);
		$primary_link = reacon_blog_get_link(reacon_blog_get_acf('blog_cta_primary_button', array(), $blog_page_id), '#', 'Contact Us');
		$secondary_link = reacon_blog_get_link(reacon_blog_get_acf('blog_cta_secondary_button', array(), $blog_page_id), '#', 'Talk to Our Team');
		$solution_cta['primary'] = array('label' => $primary_link['title'], 'url' => $primary_link['url'], 'target' => $primary_link['target']);
		$solution_cta['secondary'] = array('label' => $secondary_link['title'], 'url' => $secondary_link['url'], 'target' => $secondary_link['target']);
		$cta_color = (string) reacon_blog_get_acf('blog_cta_color', 'teal', $blog_page_id);
		$cta_icon_type = (string) reacon_blog_get_acf('blog_cta_primary_icon_type', 'phosphor', $blog_page_id);
		$cta_icon_value = reacon_blog_get_acf('blog_cta_primary_icon_value', 'ph-bold ph-arrow-up-right', $blog_page_id);
	}
	$cta_bg_style = 'background-color:#0D6B75;';
	if ('blue' === $cta_color) {
		$cta_bg_style = 'background-color:#062B53;';
	}
	?>
	<?php if ($blog_sections['cta']): ?>
		<section
			id="solution-cta"
			class="py-10 xs:py-10 sm:py-12 md:py-14 "
			aria-labelledby="solution-cta-heading">
			<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
				<div class="relative overflow-hidden rounded-[22px] px-5 py-10 sm:px-8 sm:py-10 lg:rounded-[24px] lg:px-12" style="<?php echo esc_attr($cta_bg_style); ?>">
					<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_100%_at_50%_10%,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_58%)]" aria-hidden="true"></div>
					<div class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,#0E6D77_0%,#0A4E57_100%)] opacity-75" aria-hidden="true"></div>
					<div
						class="pointer-events-none absolute left-16 top-0 h-[205px] w-[1566px]"
						aria-hidden="true">
						<svg viewBox="0 0 1566 205" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
							<path
								d="M278.503 205L1566 -538.596L-556 -586L278.503 205Z"
								fill="url(#solutionCtaShardLeftGradient)"
								fill-opacity="0.15" />
							<defs>
								<linearGradient id="solutionCtaShardLeftGradient" x1="504.197" y1="170.056" x2="505.001" y2="-586" gradientUnits="userSpaceOnUse">
									<stop stop-color="#1ECAD3" />
									<stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
								</linearGradient>
							</defs>
						</svg>
					</div>
					<div
						class="pointer-events-none absolute  right-[-955px] h-[791px] w-[2122px]"
						aria-hidden="true">
						<svg width="2122" height="791" viewBox="0 0 2122 791" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">
							<path d="M1287.5 -60L0 683.596L2122 731L1287.5 -60Z" fill="url(#solutionCtaShardGradient)" fill-opacity="0.15" />
							<defs>
								<linearGradient id="solutionCtaShardGradient" x1="1061.8" y1="-25.0558" x2="1061" y2="731" gradientUnits="userSpaceOnUse">
									<stop stop-color="#1ECAD3" />
									<stop offset="1" stop-color="#1ECAD3" stop-opacity="0" />
								</linearGradient>
							</defs>
						</svg>
					</div>

					<div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center justify-center text-center">
						<h2
							id="solution-cta-heading"
							class="font-display text-[24px] font-bold leading-[1.1] text-white xs:text-[2.125rem] sm:text-[2.5rem] md:text-[2.75rem] lg:text-[3.25rem] xl:text-[3.5rem] 2xl:text-[3.75rem]">
							<?php echo esc_html($solution_cta['heading']); ?>
						</h2>
						<p class="mx-auto mt-4 max-w-3xl font-sans text-sm leading-relaxed text-white/90 xs:text-[0.9375rem] sm:text-base md:text-[1.0625rem] lg:text-lg">
							<?php echo esc_html($solution_cta['description']); ?>
						</p>

						<div class="mt-8 flex w-full flex-col items-center justify-center gap-3 sm:mt-9 sm:w-auto sm:flex-row sm:gap-2.5 md:mt-10">
							<a
								href="<?php echo esc_url($solution_cta['primary']['url']); ?>"
								target="<?php echo esc_attr($solution_cta['primary']['target']); ?>"
								class="group inline-flex w-full items-center justify-between gap-2.5 rounded-full bg-white py-1 pl-5 pr-1 font-sans text-base font-medium text-primary no-underline transition-all duration-300 hover:bg-white/90 sm:w-auto">
								<span><?php echo esc_html($solution_cta['primary']['label']); ?></span>
								<span class="relative flex h-[42px] w-[42px] shrink-0 items-center justify-center overflow-hidden rounded-full bg-secondary/15">
									<i class="ph-bold ph-arrow-up-right absolute text-base transition-all duration-300 group-hover:translate-x-3 group-hover:-translate-y-3 group-hover:opacity-0" aria-hidden="true"></i>
									<i class="ph-bold ph-arrow-up-right absolute translate-x-[-12px] translate-y-[12px] text-base opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:translate-y-0 group-hover:opacity-100" aria-hidden="true"></i>
								</span>
							</a>
							<a
								href="<?php echo esc_url($solution_cta['secondary']['url']); ?>"
								target="<?php echo esc_attr($solution_cta['secondary']['target']); ?>"
								class="inline-flex w-full items-center justify-start gap-2.5 rounded-full border border-solid border-white px-5 py-2.5 font-sans text-base font-normal text-white no-underline transition-all duration-300 hover:bg-white/10 sm:w-auto sm:justify-center sm:pr-4">
								<?php echo esc_html($solution_cta['secondary']['label']); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- End Cta Section -->

	<style>
		/* Desktop-only top notch that lets the fixed header "recess" into the hero. */
		@media (min-width: 1024px) {
			#masthead #site-navigation>ul {
				position: relative;
				box-shadow: 0 0 0 2px #fff;
				outline: 2px solid #fff;
				outline-offset: 0;
			}

			#masthead.top-0 #site-navigation>ul {
				box-shadow: 0 0 0 2px #fff, 0 10px 22px rgba(0, 0, 0, 0.16);
			}

			#blog-hero .reacon-blog-hero-card {
				--hero-notch-width: clamp(560px, 48vw, 720px);
				--hero-notch-radius: 40px;
				--hero-notch-height: 86px;
				--hero-notch-swoop: 40px;
			}

			#blog-hero .reacon-blog-hero-card::before {
				content: "";
				position: absolute;
				left: 50%;
				top: -1px;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: calc(var(--hero-notch-width) + 2px);
				height: calc(var(--hero-notch-height) + 1px);
				background: #fff;
				border-bottom-left-radius: var(--hero-notch-radius);
				border-bottom-right-radius: var(--hero-notch-radius);
				margin-left: -1px;
				box-shadow: 0 0 0 2px #fff;
				z-index: 3;
				pointer-events: none;
			}

			#blog-hero .reacon-blog-hero-card::after {
				content: "";
				position: absolute;
				top: -1px;
				left: 50%;
				transform: translateX(calc(-50% + var(--hero-notch-shift, 0px)));
				width: calc(var(--hero-notch-width) + (var(--hero-notch-swoop) * 2) + 2px);
				height: calc(var(--hero-notch-swoop) + 1px);
				background:
					radial-gradient(circle at 0% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat left bottom / var(--hero-notch-swoop) var(--hero-notch-swoop),
					radial-gradient(circle at 100% 100%, transparent var(--hero-notch-swoop), #fff calc(var(--hero-notch-swoop) + 1px)) no-repeat right bottom / var(--hero-notch-swoop) var(--hero-notch-swoop);
				margin-left: -1px;
				filter: drop-shadow(0 0 1px #fff) drop-shadow(0 0 1px #fff);
				z-index: 4;
				pointer-events: none;
			}
		}
	</style>

	<?php
	$blog_debug_enabled = isset($_GET['blog_debug']) && '1' === (string) $_GET['blog_debug'];
	if ($blog_debug_enabled && current_user_can('manage_options')):
		$debug_dump = array(
			'blog_page_id' => $blog_page_id,
			'acf_enabled' => $acf_enabled,
			'sections' => $blog_sections,
			'cta' => array(
				'heading' => $solution_cta['heading'],
				'description' => $solution_cta['description'],
				'primary' => $solution_cta['primary'],
				'secondary' => $solution_cta['secondary'],
				'color' => $cta_color,
				'icon_type' => $cta_icon_type,
				'icon_value' => $cta_icon_value,
			),
			'raw_fields' => array(
				'blog_enable_cta' => reacon_blog_get_acf('blog_enable_cta', null, $blog_page_id),
				'blog_cta_heading' => reacon_blog_get_acf('blog_cta_heading', null, $blog_page_id),
				'blog_cta_description' => reacon_blog_get_acf('blog_cta_description', null, $blog_page_id),
				'blog_cta_primary_button' => reacon_blog_get_acf('blog_cta_primary_button', null, $blog_page_id),
				'blog_cta_secondary_button' => reacon_blog_get_acf('blog_cta_secondary_button', null, $blog_page_id),
				'blog_cta_color' => reacon_blog_get_acf('blog_cta_color', null, $blog_page_id),
			),
		);
	?>
		<pre style="margin:16px;background:#111;color:#0f0;padding:12px;border-radius:8px;white-space:pre-wrap;word-break:break-word;"><?php echo esc_html(print_r($debug_dump, true)); ?></pre>
	<?php endif; ?>
</main>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		if (window.lucide && typeof window.lucide.createIcons === 'function') {
			window.lucide.createIcons();
		}

		const syncBlogHeroNotchToDesktopMenu = () => {
			const heroCard = document.querySelector('#blog-hero .reacon-blog-hero-card');
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

		let blogNotchSyncRaf = null;
		const scheduleBlogNotchSync = () => {
			if (blogNotchSyncRaf) {
				cancelAnimationFrame(blogNotchSyncRaf);
			}
			blogNotchSyncRaf = requestAnimationFrame(syncBlogHeroNotchToDesktopMenu);
		};

		scheduleBlogNotchSync();
		window.addEventListener('resize', scheduleBlogNotchSync);
		window.addEventListener('load', scheduleBlogNotchSync);
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(scheduleBlogNotchSync).catch(() => {});
		}

		document.querySelectorAll('#blog-latest nav button[data-url]').forEach((btn) => {
			btn.addEventListener('click', () => {
				const url = btn.getAttribute('data-url');
				if (url) window.location.href = url;
			});
		});
	});
</script>
<?php get_footer(); ?>