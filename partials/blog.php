<?php
/**
 * Posts snippet
 *
 * @package dkoo dot net
 * @since 0.1.0
 */
?>

<main class="container blog">
	<section class="blog">
		<div class="posts">
			<a class="back" href="/"><i class="fa fa-angle-double-up"></i></a>
			<a class="search" href="#"><i class="fa fa-search"></i></a>
			<!-- {{#if searching}} -->
			<?php // get_template_part('partials/search'); ?>
			<!-- {{/if}} -->

			<!-- The loop. -->
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ): the_post(); ?>
					<!-- post excerpt -->
					<?php get_template_part('partials/listing') ?>
				<?php endwhile; ?>
			<?php else : ?>
				<article class="excerpt">
					<p><em>No posts found.</em></p>
				</article>
			<?php endif; ?>

			<?php if ( $wp_query->post_count < $wp_query->found_posts ) : ?>
				<a id="js-more" class="more" href="<?php echo get_next_posts_page_link() ?>">more</a>
			<?php endif ?>
		</div>
	</section>
</main>