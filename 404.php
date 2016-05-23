<?php
/**
 * 404 page
 *
 * @package dkoo dot net
 * @since 0.1.0
 */

get_header(); ?>

<main class="container">
	<section class="intro">
		<div class="not-found">
			<?php
				$posts_page_id = get_option( 'page_for_posts' );
				$posts_page_url = get_page_uri( $posts_page_id );
			?>
			<h1>Not Found</h1>
			<p>Sorry, I couldn’t find the page you were looking for.</p>

			<p>Would you like to visit the <a href="/<?php echo $posts_page_url ?>">blog</a> instead?</p> 
		</div>
	</section>
</main>

<?php get_footer(); ?>