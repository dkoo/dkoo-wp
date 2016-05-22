<?php

/**
 * dkoo dot net functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package dkoo dot net
 * @since 0.1.0
 */

// Useful global constants
define( 'DKOO_VERSION',	  '0.1.0' );
define( 'DKOO_URL',		  get_stylesheet_directory_uri() );
define( 'DKOO_TEMPLATE_URL', get_template_directory_uri() );
define( 'DKOO_PATH',		 get_template_directory() . '/' );
define( 'DKOO_INC',		  DKOO_PATH . 'includes/' );

// Include compartmentalized functions
require_once DKOO_INC . 'functions/core.php';

// Include lib classes

// Run the setup functions
TenUp\dkoodot_net\Core\setup();


// add actions
add_action( 'wp_ajax_nopriv_fetch_posts', 'dkoo_fetch_posts' );
add_action( 'wp_ajax_fetch_posts', 'dkoo_fetch_posts' );

// fetch posts for ajax request
function dkoo_fetch_posts() {
	$query_vars = json_decode( stripslashes( $_GET['query_vars'] ), true );

	$query_vars['offset'] = $_GET['offset'];

	$posts = new WP_Query( $query_vars );

	if( $posts->have_posts() ) {
		while ( $posts->have_posts() ) {
			$posts->the_post();
			get_template_part( 'partials/listing', get_post_format() );
		}
	}
	die();
}