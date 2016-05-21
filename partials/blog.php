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
					<article class="excerpt">
						<a name="<?php the_id(); ?>" href="<?php the_permalink() ?>">
							<header>
								<h2><?php the_date(); ?></h2>
							</header><div>
								<h1><?php the_title(); ?></h1>
								<?php the_excerpt(); ?>
							</div>
						</a>
						<?php the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<article class="excerpt">
					<p><em>No posts found.</em></p>
				</article>
			<?php endif; ?>

			<a class="more" href="#">more</a>
		</div>
	</section>
</main>