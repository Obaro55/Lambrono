<?php
/**
 * The template for displaying archive pages
 *
 */
 
get_header(); ?>

		
		
<div class="template-page">



<div class="template-page-header">
		
	
	<div class="template-page-header-container custom">
		
		<?php  
		
		echo '<h1>' . get_the_archive_title() . '</h1>';
		
		?>
		
	</div>
		
</div>
	
			
		<?php

		
		
		if ( have_posts() ) { ?>
		
		
		<div class="available-cars">

		<div class="available-cars-container">
		
		
		<div class="items-container">
		
		
		<?php while ( have_posts() ) {  the_post();		?> 
			
		
        <div id="post-<?php the_ID(); ?>" class="item">
     
  
	    <a href="<?php the_permalink(); ?>">
		
		<div class="item-picture">
		
		<?php the_post_thumbnail(); ?>
		
		</div>
		
		<div class="item-text">
		
		<div class="status-and-brand">
		
		<?php 
		
		$terms = get_the_terms($post->ID , 'brand');
		
		if($terms && !is_wp_error($terms)) {
		
		foreach ($terms as $term) {
		    
			echo '<p class="brand">' . ucfirst($term->name) . '</p>';
	
		}
		
		}
		
		?>
		
		<span class="interpunct">&middot;</span>
		
		<p class="status">
		
		<?php $status = get_post_meta($post->ID, 'status', true); 
		
			echo $status;
		
		?>
		
		</p>
					
		</div>
		
		<p class="title"><?php the_title(); ?></p>
		        
		<p class="price">
		
        <?php 
		
		$price = price_convert(get_post_meta($post->ID, 'price', true));
		
		echo $price;
		
		?>
				
		</p>
		
		</div>
		
		</a>
	
	
		</div>
		
		
		<?php }   ?>
		
		</div>
		
			
			
			<div class="page-navigation custom"> 	
			
			<?php
			
			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( '<i class="fa fa-caret-left"></i>', 'lambronoautos' ),
				'next_text' => __( '<i class="fa fa-caret-right"></i>', 'lambronoautos' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'lambronoautos' ) . ' </span>',
			) );
			
			?> 
			
			</div>
			
			
			
		
		</div>
		
		
		</div>
 
		<?php } else {

			echo '<div class="template-page-container custom">
				  <div class="template-text-container"><p class="no-listings-yet">No cars have been listed yet.</p>
				  </div></div>';

		}	

		

		?>



	</div>
	
	
</div>


<?php get_footer(); ?>
