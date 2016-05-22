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
			<?php get_template_part('partials/search'); ?>

			<?php if ( is_tag( $tag ) ) : 
					$posts_page_id = get_option( 'page_for_posts' );
					$posts_page_url = get_page_uri( $posts_page_id );
				?>
				<p class="tag-label"><em>Showing posts with tag <?php single_tag_title() ?> (<a href="/<?php echo $posts_page_url ?>">show all posts</a>)</em></p>
			<?php endif ?>

			<!-- The loop. -->
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ): the_post(); ?>
					<!-- post excerpt -->
					<?php get_template_part('partials/listing') ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('partials/noposts') ?>
			<?php endif; ?>

			<!-- Show "more" link only if there are more posts to show -->
			<a id="js-more" class="more 
				<?php if ( ($wp_query->post_count = $wp_query->found_posts) ) : ?>
						hidden
					<?php endif ?>" href="<?php echo get_next_posts_page_link() ?>">more</a>
		</div>
	</section>
</main>