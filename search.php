<?php
/**
 * The template for displaying archive pages
 *
 */
 
get_header(); ?>

		
		
<div class="template-page">



<div class="search-page-header">
		
	
	<div class="search-page-header-container">
		
		<?php  
		
		echo '<h1>Search results for "' . esc_html(ucwords(get_search_query())) . '"</h1>';
   
		global $wp_query;
		
		$searchQuery = get_search_query();
		
		if($searchQuery == "") {
			
			echo '<p class="search-result-count">0 results found</p>';
			
		}
		
		else {
		
		$search_results = $wp_query->found_posts > 1 ? 'results' : 'result'; 
		
		echo '<p class="search-result-count">' . $wp_query->found_posts . ' ' . $search_results .  ' found</p>';
		
		}

		?>
		
		
		
	</div>
		
</div>
	
			
		<?php

		
		
		if ( have_posts() && $_GET['s'] != '' ) { ?>
		
		
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
 
		<?php }  
		
		else if($searchQuery == "") {
			
			echo '<div class="search-page-container">
				  <div class="search-text-container"><p class="no-search-matches">You didn\'t enter any search queries. Input at least one to search.</p>
				  </div></div>';
			
		}
		
		else {

			echo '<div class="search-page-container">
				  <div class="search-text-container"><p class="no-search-matches">Your search query doesn\'t match any of the cars available. Maybe you should try another search.</p>
				  </div></div>';

		}	
		
		
		?>



	</div>
	
	
</div>


<?php get_footer(); ?>
