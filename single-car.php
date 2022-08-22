<?php
/**
 * The template for displaying all single posts and attachments
 */
  
 
 
  
get_header(); ?>


<div class="template-page">




	
		
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'car' );

		

			// End of the loop.
		endwhile;
		?>

		
		
		
	
</div>


<?php get_footer(); ?>
