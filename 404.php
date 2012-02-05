<?php get_header(); ?>

	<div id="content" class="span9">		

		<article class="error404">

			<header>        		
  	  	<h1><?php echo __('Not Found','wpbootstrap2'); ?></h1>      
			</header>

      <div class="thecontent">
      	<p><?php echo __('We can find what you are looking for... You can use the search bar or the menu','wpbootstrap2'); ?></p>
			</div>

		</article>

	</div><!-- #content -->		

	<?php get_sidebar(); ?>

<?php get_footer(); ?>