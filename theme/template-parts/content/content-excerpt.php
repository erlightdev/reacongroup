<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group flex h-full flex-col overflow-hidden rounded-[1.75rem] border border-border/10 bg-card p-6 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_20px_40px_rgba(15,23,42,0.08)]'); ?>>

	<header class="entry-header">
		<?php
		if (is_sticky() && is_home() && ! is_paged()) {
			printf('<span class="mb-4 inline-flex rounded-full border border-primary/20 bg-primary/10 px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.28em] text-primary">%s</span>', esc_html_x('Featured', 'post', 'reacon-group'));
		}
		the_title(sprintf('<h2 class="entry-title text-2xl font-semibold tracking-tight text-foreground transition-colors duration-200 hover:text-primary"><a href="%s" rel="bookmark" class="no-underline">', esc_url(get_permalink())), '</a></h2>');
		?>
	</header><!-- .entry-header -->

	<?php reacon_group_post_thumbnail(); ?>

	<div <?php reacon_group_content_class('entry-content mt-4 text-[15px] leading-7 text-muted-foreground'); ?>>
		<?php
		$excerpt = wp_strip_all_tags(get_the_excerpt());
		echo esc_html(wp_trim_words($excerpt, 10, '...'));
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->