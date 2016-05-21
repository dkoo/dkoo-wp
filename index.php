<?php
/**
 * The main template file
 *
 * @package dkoo dot net
 * @since 0.1.0
 */

get_header(); ?>

	<?php // if ( have_posts() ) : ?>
		<?php // while ( have_posts() ): the_post(); ?>
			<!-- <h2><?php //the_title(); ?></h2> -->
			<?php // the_content(); ?>
		<?php // endwhile; ?>
	<?php // endif; ?>

	<main class="container blog">
		<section class="blog">
			<div class="posts">
				<a class="back" href="/"><i class="fa fa-angle-double-up"></i></a>
				<a class="search" href="#"><i class="fa fa-search-minus"></i></a>
				<!-- {{#if searching}} -->
					<?php get_template_part('search'); ?>
				<!-- {{/if}} -->

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ): the_post(); ?>
						<!-- post excerpt -->
						<article class="excerpt">
							<a name="<?php the_id(); ?>" href="<?php the_permalink() ?>">
								<header>
									<!-- {{#if published}} -->
										<h2><?php the_date(); ?></h2>
									<!-- {{/if}} -->
								</header><div>
									<h1><?php the_title(); ?></h1>
									<p><?php the_excerpt(); ?></p>
								</div>
							</a>
							<!-- {{#if tags}} -->
								<ul class="tags">
									<li><a href="{{uri this}}">{{this}}</a></li>
								</ul>
							<!-- {{/if}} -->
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<article class="excerpt">
						<p><em>No posts found.</em></p>
					</article>
				<?php endif; ?>

				<!-- {{#if more}}<a class="more" href="#">more</a>{{/if}} -->
			</div>
			<!-- <div class="single">
				<article>
					{{> single}}
				</article>
			</div> -->
		</section>
	</main>
<?php get_footer();
