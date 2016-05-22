<?php
/**
 * Listing snippet
 *
 * @package dkoo dot net
 * @since 0.1.0
 */
?>

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