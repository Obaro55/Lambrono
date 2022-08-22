
<?php
/**
 * Template Name: Edit Listing
 *
 */
 


$current_user = wp_get_current_user();
$userID = $current_user->ID;


if(!is_user_logged_in()) {   
    wp_redirect(esc_url(home_url('/')));
	exit();
} 



$query = new WP_Query(array('post_type' => 'car', 'posts_per_page' =>'-1', 'post_status' => array('publish', 'pending', 'draft', 'private', 'trash')));

if ($query->have_posts()) { 

	while ($query->have_posts()) { $query->the_post();
	
	if(isset($_GET['listing_id'])) {
		
		if($_GET['listing_id'] == $post->ID) {
			
			$current_listing_id = $post->ID;
			$listing_title = get_the_title();

		}
	}

} 

}

wp_reset_query();

global $current_listing_id;


$price = get_post_meta($current_listing_id, 'price', true);
$model = get_post_meta($current_listing_id, 'model', true);
$year_of_manufacture = get_post_meta($current_listing_id, 'year_of_manufacture', true);
$color = get_post_meta($current_listing_id, 'color', true);
$number_of_seats = get_post_meta($current_listing_id, 'number_of_seats', true);
$brand = get_post_meta($current_listing_id, 'brand', true);
$type = get_post_meta($current_listing_id, 'type', true);
$status = get_post_meta($current_listing_id, 'status', true);
$fuel_type = get_post_meta($current_listing_id, 'fuel_type', true);
$transmission = get_post_meta($current_listing_id, 'transmission', true);
$airbag = get_post_meta($current_listing_id, 'airbag', true);





if(isset($_POST['submit'])) { 
 

if(!isset($_POST['new_listing_nonce']) || !wp_verify_nonce($_POST['new_listing_nonce'],'new_listing') ){
        exit('No Access!'); 
 }


$current_listing_id = intval($_POST['current_listing_id']);


$title = uc_hyphenated_words(sanitize_text_field($_POST['title']));	


if(empty($title)) {
	$title = $listing_title;
}


// $title = ucfirst(strtolower(sanitize_text_field($_POST['title'])));
$price = sanitize_text_field($_POST['price']);
$model = ucfirst(strtolower(sanitize_text_field($_POST['model'])));
$year_of_manufacture = sanitize_text_field($_POST['year_of_manufacture']);
$color = ucfirst(strtolower(sanitize_text_field($_POST['color'])));
$number_of_seats = sanitize_text_field($_POST['number_of_seats']);
$brand = sanitize_text_field($_POST['brand']);
$type = sanitize_text_field($_POST['type']);
$status = sanitize_text_field($_POST['status']);
$fuel_type = sanitize_text_field($_POST['fuel_type']);
$transmission = sanitize_text_field($_POST['transmission']);
$airbag = sanitize_text_field($_POST['airbag']);




$post = array(
		'ID' => $current_listing_id,
		'post_title' => $title,
		'post_name' => $title,
		'post-type' => 'car',
		'post_status' => 'publish'
);

	$post_id = wp_update_post($post);
				

	if(!empty($brand)) {
	wp_set_object_terms($post_id, $brand, 'brand', false);
	}
	
	if(!empty($type)) {
    wp_set_object_terms($post_id, $type, 'type', false);
	}
	

	if(!empty($price)) {
	update_post_meta($post_id, 'price', $price);
	}
	
	if(!empty($model)) {
	update_post_meta($post_id, 'model', $model);
	}
	
	if(!empty($year_of_manufacture)) {
	update_post_meta($post_id, 'year_of_manufacture', $year_of_manufacture);
	}
	
	if(!empty($color)) {
	update_post_meta($post_id, 'color', $color);
	}
	
	if(!empty($number_of_seats)) {
	update_post_meta($post_id, 'number_of_seats', $number_of_seats);
	}
	
	if(!empty($brand)) {
	update_post_meta($post_id, 'brand', $brand);
	}
	
	if(!empty($type)) {
	update_post_meta($post_id, 'type', $type);
	}
	
	if(!empty($status)) {
	update_post_meta($post_id, 'status', $status);
	}
	
	if(!empty($fuel_type)) {
	update_post_meta($post_id, 'fuel_type', $fuel_type);
	}
	
	if(!empty($transmission)) {
	update_post_meta($post_id, 'transmission', $transmission);
	}
	
	if(!empty($airbag)) {
	update_post_meta($post_id, 'airbag', $airbag);
	}
	
	
  	wp_redirect(esc_url( home_url('/my-listings/')));
	exit();

	}
 

 
get_header(); ?>


 

<div class="template-page">



	<div class="template-page-header protected-page">
		
		<div class="template-page-header-container protected-page">
		
			<h1>Edit Listing</h1>
		
		</div>
		
	</div>


	
	
	<div class="template-page-container">
		
		
	<div class="template-text-container">

	
	<div class="admin-return-link"><a href="https://www.lambronoautos.com/custom-admin-dashboard/">Go back to admin page</a></div>
	
		
	<div class="form-container">
		    
		<form id="edit-listing" action="<?php the_permalink(); ?>"  method="post" enctype="multipart/form-data">
		
		    <?php wp_nonce_field('new_listing', 'new_listing_nonce'); ?>
			
		
			
			<div class="form-spacing">
			
			<div class="field-left title form-field">
                    <label for="title"><?php esc_html_e('Title', 'lambrono'); ?></label>
                    <input id="title" type="text" value="<?php echo $listing_title; ?>" name="title"/>
					<span></span>
            </div>
			
			
			<div class="field-right form-field">
                    <label for="price"><?php esc_html_e('Price', 'lambrono'); ?></label>
                    <input id="price" type="text" value="<?php echo $price; ?>" name="price"/>
					<span></span>
            </div>
			
			
			</div>
						
			
			
			<div class="form-spacing">
			
			<div class="field-left form-field">
			<label for="model"><?php esc_html_e('Model', 'lambrono'); ?></label>
            <input id="model" type="text" value="<?php echo $model; ?>" name="model"/>
			
			<span></span>

			</div>
			
			
			<div class="field-right form-field">
			<label for="year_of_manufacture"><?php esc_html_e('Year of manufacture', 'lambrono'); ?></label>
            <input id="year_of_manufacture" type="text" value="<?php echo $year_of_manufacture; ?>" name="year_of_manufacture"/>
			
			<span></span>

			</div>
			
			</div>
			
			
			
			<div class="form-spacing">
			
			<div class="field-left form-field">
			<label for="color"><?php esc_html_e('Color', 'lambrono'); ?></label>
            <input id="color" type="text" value="<?php echo $color; ?>" name="color"/>
			
			<span></span>

			</div>
			
			
			<div class="field-right form-field">
			<label for="number_of_seats"><?php esc_html_e('Number of seats', 'lambrono'); ?></label>
            <input id="number_of_seats" type="text" value="<?php echo $number_of_seats; ?>" name="number_of_seats"/>
			
			<span></span>

			</div>
			
			</div>
			
			
			
			<div class="form-spacing">
			
			<div class="field-left form-field">		
			<select class="brand" id="select_car_brand" name="brand"/>
			<option disabled selected value=""><?php esc_html_e('Brand', 'lambrono'); ?></option>
			
			<?php 
			
				$args = array(
				'post_type' => 'car',
				'taxonomy' => 'brand',
				'hide_empty' => false
				);
	
				$types = get_terms ($args);

				foreach($types as $type) {
			?>
					
				<option value="<?php echo $type->name; ?>"><?php echo $type->name; ?></option>
				
			<?php
	
			}
			
			?>
			
			</select> 
			
			<span></span>

			</div>
		
			
			<div class="field-right form-field">
			<select class="type" id="select_car_type" name="type"/>
			<option disabled selected value=""><?php esc_html_e('Type', 'lambrono'); ?></option>
			
			<?php 
			
				$args = array(
				'post_type' => 'car',
				'taxonomy' => 'type',
				'hide_empty' => false
				);
	
				$types = get_terms ($args);

				foreach($types as $type) {
			?>
					
				<option value="<?php echo $type->name; ?>"><?php echo $type->name; ?></option>
				
			<?php
	
			}
			
			?>
			
			</select> 
			
			<span></span>
			
			</div>
			
			</div>
			
			
			
			<div class="form-spacing">
			
			<div class="field-left form-field">	
			<select class="status" id="select_car_status" name="status"/>
			<option disabled selected value=""><?php esc_html_e('Status', 'lambrono'); ?></option>
			<option value="Brand new">Brand new</option>
			<option value="Foreign-used">Foreign-used</option>
			<option value="Nigeria-used">Nigeria-used</option>
			</select>
			
			<span></span>
			</div>
			
		
			<div class="field-right form-field">
			<select class="fuel-type" id="select_car_fuel_type" name="fuel_type"/>
			<option disabled selected value=""><?php esc_html_e('Fuel type', 'lambrono'); ?></option>
			<option value="Petrol">Petrol</option>
			<option value="Diesel">Diesel</option>
			<option value="Electric">Electric</option>
			<option value="Hybrid">Hybrid</option>
			<option value="Diesel hybrid">Diesel hybrid</option>
			</select> 
			
			<span></span>
			</div>
			
			</div>
			
			
			<div class="form-spacing">
			
			<div class="field-left form-field">	
			<select class="transmission" id="select_car_transmission" name="transmission"/>
			<option disabled selected value=""><?php esc_html_e('Transmission', 'lambrono'); ?></option>
			<option value="Manual">Manual</option>
			<option value="Intelligent manual">Intelligent manual</option>
			<option value="Automated manual">Automated manual</option>
			<option value="Automatic">Automatic</option>
			<option value="Continuously variable">Continuously variable</option>
			<option value="Semi automatic">Semi automatic</option>
			<option value="Dual clutch">Dual clutch</option>
			<option value="Sequential">Sequential</option>
			</select> 
			
			<span></span>
			</div>
			
			
			<div class="field-right form-field">
			<select class="airbag" id="select_car_airbag" name="airbag"/>
			<option disabled selected value=""><?php esc_html_e('Airbag', 'lambrono'); ?></option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
			</select> 
			
			<span></span>
			</div>
			
			</div>
			
			
			
			
			<div>
			<input type="hidden"  name="current_listing_id" value="<?php echo $_GET['listing_id']; ?>">
            </div>
					
						
			<div class="form-button">
					<input type="submit" class="submit-form" name="submit" value="Submit Listing"/>
            </div>
			
			
		</form> 
		
	
	</div>
	
	
	</div>
	
	
	</div>
	   
      
</div>



<?php get_footer(); ?>
