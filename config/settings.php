<?php

/**
 * Creating Theme Admin page 
 */
function wpbootstrap2_settings_init(){
	register_setting( 'theme_settings', 'theme_settings' );
}

function wpbootstrap2_add_settings_page() {
	add_menu_page( __( 'Nakeme Theme Settings' ), __( 'Nakeme Theme Settings' ), 'manage_options', 'settings', 'wpbootstrap2_settings_page');
}

add_action( 'admin_init', 'wpbootstrap2_settings_init' );
add_action( 'admin_menu', 'wpbootstrap2_add_settings_page' );

function wpbootstrap2_settings_page() {
?>
	<div>
		<div id="icon-options-general"></div>
		<h2><?php _e( 'Nakeme Theme Options' ) ?></h2>
		<p><span>Version 1.0</span></p>
		<div>
			<p>This theme was made by <a title="Fran Moreno" href="http://www.franmoreno.com" target="_blank" >Fran Moreno</a>.</p>
		</div>
	</div>
<?php
}



