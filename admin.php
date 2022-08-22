
<?php
/**
 * Template Name: Admin Page
 *
 */
 /*

if(!is_user_logged_in() || !$current_user) {   
    wp_redirect(esc_url(home_url('/login/')));
	exit();
} 

 */

$current_user = wp_get_current_user();
$admin = $current_user->display_name;
$userID = $current_user->ID;




 
get_header(); ?>



<div class="template-page admin-page">

<div class="template-page-container admin-page">

		
		<div class="admin-area">
		
			<div class="top-area">
		    
			<h1><?php echo "Welcome " . $admin; ?></h1>
			
			</div>
			
			<div class="bottom-area">
            
			<div class="admin-links">
			
			<ul>
			
			<li><i class="fa fa-angle-right"></i> <a href="https://www.lambronoautos.com/submit-listing/">Submit Listing</a></li>
			<li><i class="fa fa-angle-right"></i> <a href="https://www.lambronoautos.com/my-listings/">My Listings</a></li>
			
			<li class="admin-sign-out"><i class="fa fa-angle-right"></i> <a href="<?php
			
			$logout_url = "https://www.lambronoautos.com/wp-login.php";
			$logout_url = add_query_arg('action', 'logout', $logout_url); 
			$logout_url = add_query_arg('_wpnonce', wp_create_nonce( 'log-out' ), $logout_url);
			echo $logout_url;
			
			?>">Sign Out</a></li>
			
			
			</ul>
			
			
			</div>
			
			</div>
			

	   </div>
		

</div>


</div>



<?php get_footer(); ?>
