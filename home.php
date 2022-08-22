<?php
/**
 * Template Name: Home Page
 *
 */
 
 
get_header(); 

?>






<div class="home-page-intro">
	
	<div class="home-page-intro-container">
	
	<h1>The authority on used and new vehicles</h1>
	
	<form action="<?php esc_url(home_url()); ?>" method="GET" role="search">	
	<div class="search-container"><label for="keywords">Keywords</label><input type="text" name="s" placeholder="Start here: brand. model, year, etc." value="<?php get_search_query();  ?>" /><input type="submit" value="" id="search-button" /></div>
   </form>
	
	</div>

</div>






	<?php


		$args = array(
					'post_type' => 'car',
					'posts_per_page' => 4
				);

		$cars = new WP_Query($args);;
		
		
		if ( $cars->have_posts() ) { ?>
		
		
		<div class="homepage-listings">
		
		<div class="homepage-listings-container">	
		
		
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
		
		
		<?php } // end while ?>
		
		</div>
		
		
		<?php
		
		$number_of_cars = $cars->post_count;
		
		if($number_of_cars >= 5) {
		
		echo '<p class="see-more-cars">Want to see more cars? <a href="https://www.lambronoautos.com/all-cars/">Let\'s take a drive</a></p>';
		
		}
		
		?>
		
		
		</div>
		
		
		</div>
 
		<?php } // end if
 
		// Use reset to restore original query.

		wp_reset_postdata();

		?>

				
		
		


<div class="brand-logos">

	<div class="brand-logos-container">
	
	<ul>
	
    <li><img class="toyota" src="<?php bloginfo("template_url"); ?>/images/toyota-logo.svg"></li>      
	<li><img class="mercedes-benz" src="<?php bloginfo("template_url"); ?>/images/mercedes-benz-logo.svg"></li>
	<li><img class="lexus" src="<?php bloginfo("template_url"); ?>/images/lexus-logo.svg"></li>
	<li><img class="jeep" src="<?php bloginfo("template_url"); ?>/images/jeep-logo.svg"></li>
	<li><img class="honda" src="<?php bloginfo("template_url"); ?>/images/honda-logo.svg"></li>      
	<li><img class="nissan" src="<?php bloginfo("template_url"); ?>/images/nissan-logo.svg"></li>
	<li><img class="bmw" src="<?php bloginfo("template_url"); ?>/images/bmw-logo.svg"></li>
	<li><img class="acura" src="<?php bloginfo("template_url"); ?>/images/acura-logo.svg"></li>
	
	</ul>
	
	<p>+ More</p>
	
	</div>

</div>






<?php get_footer(); ?>
	