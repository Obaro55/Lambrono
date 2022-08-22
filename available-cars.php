<?php
/**
 * Template Name: Available Cars
 *
 */
 
 
get_header(); ?>	



<div class="template-page">



<div class="template-page-header">
		
	
	<div class="template-page-header-container custom">
		
		<h1>Available Cars</h1>
		
	</div>
		
</div>

			
		


	
	<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
					'post_type' => 'car',
					'post_status' => 'publish',
					'paged' => $paged,
					'posts_per_page' => 10,
					'order' => 'DESC'
				);

		$cars = new WP_Query($args);
		
		
		if ( $cars->have_posts() ) { ?>
		
		
		<div class="available-cars">

		<div class="available-cars-container">
		
		
		<div class="items-container">
		
		<?php while ( $cars->have_posts() ) { $cars->the_post(); ?>
			
		
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
		
		
		<?php }  ?>
		
		</div>
		
		<?php 
		
		$total_pages = $cars->max_num_pages;
			
			if($total_pages > 1) {  ?>
			
			<div class="page-navigation custom"> 	
			
			<?php
			
			$current_page = max(1, get_query_var('paged'));
			
			echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'prev_text' => __( '<i class="fa fa-caret-left"></i>', 'lambrono' ),
			'next_text' => __( '<i class="fa fa-caret-right"></i>', 'lambrono' ),
			));
			
			?> 
			
			</div>
			
			
			<?php } 
		
			?>
		
		</div>
		
		
		</div>
 
		<?php } else {

			echo '<div class="template-page-container custom">
				  <div class="template-text-container"><p class="no-listings-yet">No cars have been listed yet.</p>
				  </div></div>';

		}	

		wp_reset_postdata();
		
		

		?>

	
		
		



</div>





<?php get_footer(); ?>
	