<?php
/**
 * Home page template file
 *
 * @package dkoo dot net
 * @since 0.1.0
 */

get_header(); ?>

	<main class="container {{#if viewingBlog}}blog{{/if}}">
		<section class="intro">
			<div>
				<?php 
					$posts_page_id = get_option( 'page_for_posts' );
					$posts_page_url = get_page_uri( $posts_page_id );
				if ( have_posts() ) : ?>
					<?php while ( have_posts() ): the_post(); ?>
						<h1><a href="/<?php echo $posts_page_url ?>"><?php the_title(); ?></a></h1>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<a class="pull" href="/<?php echo $posts_page_url ?>"><i class="fa fa-angle-double-down"></i></a>
		</section>
	</main>

<?php get_footer();
