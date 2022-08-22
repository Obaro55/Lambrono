
<?php
/**
 * Template Name: My Listings
 *
 */
 


$current_user = wp_get_current_user();
$userID = $current_user->ID;

/*

if(!is_user_logged_in()) {   
    wp_redirect(esc_url(home_url('/')));
	exit();
} 

*/

 
 
get_header(); ?>


 

<div class="template-page">

	
	<div class="template-page-header protected-page">
		
		<div class="template-page-header-container protected-page">
		
			<h1>My Listings</h1>
			
		</div>
	
	</div>

		
	
	

	
	<?php
		
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       
        $args = array(
                'post_type' => 'car',
				'post_author' => $userID,
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => 10,
                'order' => 'DESC',
            );

          
        $my_listings = new WP_Query($args);
			
		if ($my_listings->have_posts()) { ?>
		
		<div class="template-page-container">
		
		
		<div class="template-text-container">
		
		<div class="admin-return-link"><a href="https://www.lambronoautos.com/custom-admin-dashboard/">Go back to admin page</a></div>
		
		
		<div class="my-listings">
		
		<?php             
            
        while ($my_listings->have_posts()) { $my_listings->the_post(); 
					
		$listing_id = $post->ID;
			
		?> 
     
		<div class="my-listings-container">
	 
		<span class="my-listing-title">
		
		<?php 
		
		$listing_title = get_the_title($listing_id);
		$listing_title = strlen($listing_title) > 35 ? substr($listing_title, 0, 35)."..." : $listing_title;
		
		
		
		echo '<a href="'. get_permalink($listing_id) .'">' . esc_html($listing_title) . '</a>';
		
		?>
		
		</span><span class="my-listing-edit-delete"><span class="edit"><a href="<?php 
		
		$edit_url = add_query_arg('listing_id', get_the_ID(), get_permalink(129 + $_POST['_wp_http_referer'])); 
		$edit_url = add_query_arg('lambrono_url_nonce', wp_create_nonce( 'action' ), $edit_url);
		
		echo $edit_url; ?>"><span class="border">Edit</a></a></span><span class="delete">
		
		<?php if(!(get_post_status() == 'trash')) { ?>
		<a onclick="return confirm('Are you sure you want to delete listing: <?php echo get_the_title() ?>?')" href="<?php echo get_delete_post_link(get_the_ID(), "", true); ?>">Delete</a>
		<?php } ?>
		</span>
		
		</span>
		</span>
		
		</div>
		
		<?php	}  ?>    
		
		
			<?php
			
			
			$total_pages = $my_listings->max_num_pages;
			
			if($total_pages > 1) {  ?>
			
			<div class="page-navigation"> 	
			
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
			
			
			<?php } 
			
		
			
			?>
			
			</div>
			
			
			</div>
			
			
	   
      
		
		
		
		<?php } else {

			echo '<div class="template-page-container">
				  <div class="template-text-container"><p class="no-listings-yet">You don\'t have any cars listed yet.</p>
				  </div></div>';
			}	
 
		
			wp_reset_postdata();
		
			
		
		?>
			
	
	
</div>	



<?php get_footer(); ?>
