<?php
/**
 * Single post page
 *
 * @package dkoo dot net
 * @since 0.1.0
 */

get_header(); ?>

	<main class="container blog">
		<section class="blog post">
			<div class="single">
				<?php
					// Start the loop.
					while ( have_posts() ) : the_post(); ?>
						<article>
							<a class="back" href="/blog"><i class="fa fa-angle-double-left"></i></a>
							<header>
								<h2><?php the_date(); ?></h2>
							</header><div>
								<h1><?php the_title(); ?></h1>

								<?php if ( has_excerpt() ) : ?>
									<!-- get excerpt without <p></p> wrapper -->
									<h3 class="dek"><?php echo get_the_excerpt(); ?></h3>
								<?php endif; ?>

								<section class="content">
									<?php the_content(); ?>
								</section>

								<?php the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' ); ?>
							</div>
						</article>
				<?php
					// End of the loop.
					endwhile; ?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>