<?php

/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package reacon-group
 */

?>

<section class="rounded-[1.75rem] border border-border/10 bg-surface p-6 shadow-sm sm:p-8">

	<header class="page-header mb-5">
		<?php if (is_search()) : ?>

			<h1 class="page-title text-3xl font-semibold tracking-tight text-foreground sm:text-4xl">
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<span class="text-xs font-semibold uppercase tracking-[0.28em] text-primary/90">Search</span><br>%1$s <span class="text-primary">%2$s</span>',
					esc_html__('No results for:', 'reacon-group'),
					esc_html(get_search_query())
				);
				?>
			</h1>

		<?php else : ?>

			<h1 class="page-title text-3xl font-semibold tracking-tight text-foreground sm:text-4xl"><?php esc_html_e('Nothing Found', 'reacon-group'); ?></h1>

		<?php endif; ?>
	</header><!-- .page-header -->

	<div <?php reacon_group_content_class('page-content space-y-6 text-base leading-7 text-muted-foreground'); ?>>
		<?php
		if (is_home() && current_user_can('publish_posts')) :
		?>

			<div class="space-y-4">
				<p>
					<?php esc_html_e('Your site is set to show the most recent posts on your homepage, but you have not published any posts yet.', 'reacon-group'); ?>
				</p>

				<p>
					<a href="<?php echo esc_url(admin_url('edit.php')); ?>" class="font-semibold text-primary transition-colors duration-200 hover:text-secondary">
						<?php esc_html_e('Add or publish posts', 'reacon-group'); ?>
					</a>
				</p>
			</div>

		<?php
		elseif (is_search()) :
		?>

			<div class="space-y-6">
				<p>
					<?php esc_html_e('Your search returned no results. Try another keyword or use the search box below to refine the query.', 'reacon-group'); ?>
				</p>

				<div class="rounded-[1.5rem] border border-border/10 bg-background p-6">
					<?php get_search_form(); ?>
				</div>

				<a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center justify-center rounded-full bg-foreground px-6 py-3 text-sm font-semibold text-background transition duration-200 hover:bg-foreground/90">
					<?php esc_html_e('Return to homepage', 'reacon-group'); ?>
				</a>
			</div>

		<?php
		else :
		?>

			<div class="space-y-6">
				<p>
					<?php esc_html_e('No content matched your request. Please try a different keyword or browse through the site navigation.', 'reacon-group'); ?>
				</p>

				<div class="rounded-[1.5rem] border border-border/10 bg-background p-6">
					<?php get_search_form(); ?>
				</div>
			</div>

		<?php
		endif;
		?>
	</div><!-- .page-content -->

</section>