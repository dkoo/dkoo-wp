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
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ): the_post(); ?>
						<h1><a href="/blog"><?php the_title(); ?></a></h1>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<a class="pull" href="/blog"><i class="fa fa-angle-double-down"></i></a>
		</section>


<?php get_footer();
