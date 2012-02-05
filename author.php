<?php get_header(); ?>

<section id="content" class="span9">

	
	<h1><?php	echo wpbootstrap2_get_loop_title(); ?></h1>
		
	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<section class="author-info">
			<figure>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpbootstrap2_author_bio_avatar_size', 60 ) ); ?>
			</figure>
	    
	    <h2>
	    	<?php printf( __( 'About %s', 'wpbootstrap2' ), get_the_author() ); ?>
	    </h2>
	    
	    <p class="description"><?php the_author_meta( 'description' ); ?></p>
		</section>
	<?php endif; ?>
	
	<?php while ( have_posts() ) : the_post(); ?>

	


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
	    <h2><a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>"><?php the_title(); ?></a></h2> 
			<section class="info">
				<?php echo __( 'Posted by' , 'wpbootstrap2' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>, 
				<?php echo get_the_date(); ?>, 
				<?php comments_popup_link( __( 'Comment' , 'wpbootstrap2' ), __( '1 Comment' , 'wpbootstrap2' ), __( '% Comments' , 'wpbootstrap2' ) ); ?>
			</section>
		</header>

		<div class="thecontent">
					
			<?php if(has_post_thumbnail()): ?>
				<figure class="thumb"><?php the_post_thumbnail('thumbnail'); ?></figure>
			<?php endif;?>
	    
	    <?php the_excerpt( __( 'Continue reading &rarr;' , 'wpbootstrap2' ) ); ?>             
		</div><!-- .text -->     
	
	  <footer>
	    <nav class="categories">
	    	<?php echo __( 'Categories' , 'wpbootstrap2' ) . ': '; the_category(', '); ?>                          
	  	</nav>
	    <?php $tags_list = get_the_tag_list( '', ' ' );
		  if ( $tags_list ): ?>
	    <nav class="tags">
	    	<?php echo __( 'Tags' , 'wpbootstrap2' ) . ': ' . $tags_list ; ?>                          
	  	</nav>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'wpbootstrap2' ), '<p class="edit">', '</p>' ); ?>
	  </footer>
	</article>

 
	<?php endwhile; ?>

	<?php /* The pagination*/ ?>
	<nav id="pagination">
	<?php echo wpbootstrap2_paginate_links( ) ?>
	</nav>


</section><!-- #content -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>