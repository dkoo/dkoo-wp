<?php
/**
 * The main template file
 *	
 * @package dkoo dot net
 * @since 0.1.0
 */

get_header();

// if the posts page
if ( is_home() ) :
	get_template_part('partials/blog');
endif;

get_footer(); ?>