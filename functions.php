<?php

/** Tell WordPress to run wpbootstrap2_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'wpbootstrap2_setup' );

if ( ! function_exists( 'wpbootstrap2_setup' ) ):

function wpbootstrap2_setup() {

	//add_theme_support( 'post-formats', array( 'aside', 'video' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );


	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'wpbootstrap2', TEMPLATEPATH . '/languages' );

	register_nav_menus( array(
		'primary' => __( 'Header navigation' , 'wpbootstrap2' ),
	) );
}
endif;


/**
 * Removes some links from the header 
 */
add_action('init', 'remheadlink');
function remheadlink() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
}

/**
 * Removing the WP version
 */
function wpbootstrap2_remove_version() 
{
	return '';
}
add_filter('the_generator', 'wpbootstrap2_remove_version');


/**
 * Get some loop information
 */
function wpbootstrap2_get_loop_title()
{
	$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

	if (is_category()) : $title = __( 'Category' , 'wpbootstrap2' ) . ' : ' . single_cat_title( '', false );
	elseif (is_tag()) : $title = __( 'Tag' , 'wpbootstrap2' ) . ' : ' . single_tag_title( '', false);
	elseif (is_month()) : $title = __( 'Monthly Archives' , 'wpbootstrap2' ) . ' : ' . get_the_date('F Y');
	elseif (is_year()) : $title = __( 'Yearly Archives' , 'wpbootstrap2' ). ' : ' . get_the_date('Y');
	elseif (is_search()) : $title = __( 'Search results for' , 'wpbootstrap2' ) . ' : ' . get_search_query();
	elseif (is_author()) : $title = __( 'Author Archives', 'wpbootstrap2' ) . ' : ' . $curauth->display_name;
	elseif (is_archive()) : $title = __( 'Archive' , 'wpbootstrap2' );
	endif;
	
	return $title;
}




include_once('config/sidebars.php');
include_once('config/posts.php');
include_once('config/breadcrumb.php');
include_once('config/pagination.php');
include_once('config/navbar.php');
include_once('config/settings.php');
