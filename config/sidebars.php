<?php
/**
 *	The sidebar declarations
 */
function wpbootstrap2_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'wpbootstrap2' ),
		'id' => 'main-sidebar',
		'description' => __( 'The sidebar', 'wpbootstrap2' ),
		'before_widget' => '<nav id="%1$s" class="widget %2$s">',
		'after_widget' => "</nav>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


}
add_action( 'widgets_init', 'wpbootstrap2_widgets_init' );