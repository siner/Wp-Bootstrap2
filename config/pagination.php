<?php

/**
 * Shows the paginate links
 */
function wpbootstrap2_paginate_links( $args = array() )
{

	$defaults = array(
		'range'           => 4,
		'custom_query'    => FALSE,
		'previous_string' => '«',
		'next_string'     => '»',
		'view_fp'         => TRUE,
		'view_lp'         => TRUE,
		'before_output'   => '<div class="pagination"><ul>',
		'after_output'    => '</ul></div>'
	);
	$args = wp_parse_args(
		$args,
		apply_filters( 'wpbootstrap2_paging_bar_defaults', $defaults )
	);
	$args['range'] = (int) $args['range'] - 1;
	if ( !$args['custom_query'] )
		$args['custom_query'] = @$GLOBALS['wp_query'];
	
	$count = (int) $args['custom_query']->max_num_pages;
	$page  = intval( get_query_var( 'paged' ) );
	$ceil  = ceil( $args['range'] / 2 );
	
	if ( $count <= 1 )
		return FALSE;
	if ( !$page )
		$page = 1;
	if ( $count > $args['range'] ) {
		if ( $page <= $args['range'] ) {
			$min = 1;
			$max = $args['range'] + 1;
		} elseif ( $page >= ($count - $ceil) ) {
			$min = $count - $args['range'];
			$max = $count;
		} elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
			$min = $page - $ceil;
			$max = $page + $ceil;
		}
	} else {
		$min = 1;
		$max = $count;
	}
	
	$echo = '';
	$previous = intval($page) - 1;
	$previous = esc_attr( get_pagenum_link($previous) );

	if ( $previous && (1 != $page) )
		$echo .= '<li><a href="' . $previous . '" title="' . __( 'Previous', 'wpbootstrap2') . '">' . $args['previous_string'] . '</a></li>';
	$firstpage = esc_attr( get_pagenum_link(1) );
	if ( !empty($min) && !empty($max) ) {
		for( $i = $min; $i <= $max; $i++ ) {
			if ($page == $i) {
				$echo .= '<li class="active"><a href="#">' . $i . '</a></li>';
			} else {
				$echo .= sprintf( '<li><a href="%s">%d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
			}
		}
	}

	$next = intval($page) + 1;
	$next = esc_attr( get_pagenum_link($next) );
	if ($next && ($count != $page) )
		$echo .= '<li><a href="' . $next . '" title="' . __( 'Next', 'wpbootstrap2') . '">' . $args['next_string'] . '</a></li>';
	if ( isset($echo) )
		return $args['before_output'] . $echo . $args['after_output'];

}




