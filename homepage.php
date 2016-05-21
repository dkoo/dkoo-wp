<?php
/*
Template Name: Home Page
*/

get_header(); ?>

	<main class="container">
		<section class="intro">
			<div>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ): the_post(); ?>
						<h1><a href="/blog"><?php the_title(); ?></a></h1>
						<ul class="social">
							<li><a href="https://github.com/dkoo"><i class="fa fa-github"></i></a></li>
							<li><a href="https://instagram.com/dkoooooooo/"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://twitter.com/derrick_koo"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/pub/derrick-koo/1/966/614"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="mailto:d@dkoo.net"><i class="fa fa-envelope-o"></i></a></li>
						</ul>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<a class="pull" href="/blog"><i class="fa fa-angle-double-down"></i></a>
		</section>
	</main>

<?php get_footer();
