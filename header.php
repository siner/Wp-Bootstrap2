<!doctype html>
<!--[if lt IE 7 ]> <html lang="es" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="es" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="es" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="es" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>
		<?php
 			global $page, $paged; 
 			wp_title( '|', true, 'right' ); 
 			bloginfo( 'name' ); 
 			$site_description = get_bloginfo( 'description', 'display' ); 
 				if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; 
 				if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'wpbootstrap2' ), max( $paged, $page ) ); 
 		?>
 </title>

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">


	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
 

	<!-- !LEGACY -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/libs/selectivizr-min.js"></script>
	<![endif]-->
		 
<?php
 if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 

	/* Charging the Google Jquery */
	 wp_deregister_script('jquery');
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false, '1.7.1');
   wp_enqueue_script('jquery');
 
 wp_head(); 
?>
 
 
<!-- The google analytics script -->
 	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']); /* Change the value to your own */
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
<!-- End of the Google Analytics script -->

</head>
 
<body <?php body_class(); ?>>


<div id="topnavbar" class="navbar">
	<div class="navbar-inner">
		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

			<a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			
			<div class="nav-collapse">
				<?php 
					$menu_args = array( 
						'theme_location' => 'primary',
						'walker'	=>	new WPBootstrap2_Walker_Nav_Menu
					);
					wp_nav_menu( $menu_args ); 
				?>
				<?php if (function_exists('wpbootstrap2_topnavbar_search_form')): wpbootstrap2_topnavbar_search_form(); endif; ?>
			</div>
		</div>
	</div>
</div>


	<div class="container">
    
		<div id="center" class="row">
		
			<div class="span12">
				<?php if(function_exists('wpbootstrap2_breadcrumb')): wpbootstrap2_breadcrumb(); endif; ?>
			</div>