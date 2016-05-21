<?php
/**
 * The main template file
 *
 * @package dkoo dot net
 * @since 0.1.0
 */

get_header(); ?>
<?php
	// Start the loop.
	while ( have_posts() ) : the_post(); ?>
	<main class="container blog">
		<section class="blog post">
			<div class="single">
				<article>
					<a class="back" href="/blog"><i class="fa fa-angle-double-left"></i></a>
					<header>
						<h2><?php the_date(); ?></h2>
					</header><div>
						<h1><?php the_title(); ?></h1>

						<?php if ( has_excerpt() ) : ?>
							<h3 class="dek"><?php the_excerpt(); ?></h3>
						<?php endif; ?>

						<section class="content">
							<?php the_content(); ?>
						</section>

						{{#if tags}}
							<ul class="tags">
								{{#each tags}}<li><a href="{{uri this}}">{{this}}</a></li>{{/each}}
							</ul>
						{{/if}}
					</div>
				</article>
			</div>
		</section>
	</main>
	<?php
	// End of the loop.
	endwhile;
?>