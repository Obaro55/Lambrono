<?php




function lambrono_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );



	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	


	// Custom logo.
	$logo_width  = 260;
	$logo_height = 260;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);


}

add_action( 'after_setup_theme', 'lambrono_theme_support' );






/**
 * For creating "cars" custom post type
 */
 
function car_custom_post_type() {
	
	$labels = array(
		'name' => __('All Cars', 'lambrono'),
		'singular_name' => __('Car', 'lambrono'),
		'add_new' => __('Add New Car', 'lambrono'),
		'add_new_item' => __('Add New Car', 'lambrono'),
		'edit_item' => __('Edit Car', 'lambrono'),
		'view_item' => __('View Cars', 'lambrono'),
		'update_item' => __('Update Car', 'lambrono'),
		'search_items' => __('Search Cars', 'lambrono'),
		'not_found' => __('No Cars Found', 'lambrono'),
		'not_found_in_trash' => __('No Cars Found in Trash', 'lambrono')
	);
	
	$args = array(
		'labels' => $labels,
		'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public' => true,
		'hierarchical' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'has_archive' => true,
		'can_export' => true,
		'exclude_from_search' => false,
		'taxonomies' => array('type', 'brand'),
		'publicly_queryable' => true,
		'rewrite' => array('slug' => 'car', 'with_front' => true),
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-multisite',	
		'capability_type' => 'post',
		'show_in_rest' => true
);

	register_post_type('car', $args);
	
}

add_action('init', 'car_custom_post_type');






/**
 * Register "type" custom taxonomy
 */

 function car_custom_taxonomy() {
	
		$labels = array(
		'name' => __('Type', 'lambrono'),
		'label' => __('Type', 'lambrono'),
		'add_new_item' => __('Add New Type', 'lambrono')
		);


		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'type', 'with_front' => true),
		'show_admin_column' => true,
		);	
	
	register_taxonomy('type', array('car'), $args);
	
} 


add_action('init', 'car_custom_taxonomy');






/**
 * Register "brand" custom taxonomy
 */

 function brand_custom_taxonomy() {
	
		$labels = array(
		'name' => __('Brand', 'lambrono'),
		'label' => __('Brand', 'lambrono'),
		'add_new_item' => __('Add New Brand', 'lambrono')
		);


		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'brand', 'with_front' => true),
		'show_admin_column' => true,
		);	
	
	register_taxonomy('brand', array('car'), $args);
	
} 


add_action('init', 'brand_custom_taxonomy');




	

/**
 * Enqueueing styles and scripts
 */

function lambrono_load_styles() {
	
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper-bundle.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('dashicons'); 
	wp_enqueue_style('choices', get_template_directory_uri() . '/css/choices.min.css');
	
}

add_action('wp_enqueue_scripts', 'lambrono_load_styles');






function lambrono_load_scripts() {
		
	wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js', array(), NULL, true);
	wp_enqueue_script('contact-form', get_template_directory_uri().'/js/contact-form.js', array(), NULL, true);
	wp_enqueue_script('choices-activation', get_template_directory_uri().'/js/choices.js', array(), NULL, true);
	wp_enqueue_script('swiper', get_template_directory_uri().'/js/swiper-bundle.min.js', array(), NULL, true);
	wp_enqueue_script('choices', get_template_directory_uri().'/js/choices.min.js', array(), NULL, true);
		
}

add_action('wp_enqueue_scripts', 'lambrono_load_scripts');






/**
 * Enqueueing Google Fonts
 */

add_image_size('lambrono_slider', 900, 550, true); 






/**
 * Enqueueing Google Fonts
 */
 
function lambrono_google_fonts() {
    $fonts = array(
			   'Roboto:200,300,400,600,700,800'
            );
        
	$lambrono_fonts = add_query_arg(array(
            'family' => urlencode(implode('|', $fonts)),
            'subset' => 'latin'
            ),'https://fonts.googleapis.com/css');
        
		return $lambrono_fonts;
     }

function lambrono_load_google_font(){
		
    wp_enqueue_style('lambrono-fonts', lambrono_google_fonts());
}
	 
add_action('wp_enqueue_scripts', 'lambrono_load_google_font');






/**
 * For removing the top of the admin dashboard for logged-in users
 */

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if(!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}






/**
 * Function for prevent login fail redirect to wp-login
 */

function prevent_wp_login() {
	
if(isset($_POST['log']) && isset($_POST['pwd'])) {
if($_POST['log']=='' && $_POST['pwd']=='') {
	
   $redirect_url = home_url('login');
   $redirect_url = add_query_arg('username', 'blank', $redirect_url);
   $redirect_url = add_query_arg('password', 'blank', $redirect_url);
   wp_redirect($redirect_url);	
   exit();
}

elseif($_POST['log']=='') {
   $redirect_url = home_url('login');
   $redirect_url = add_query_arg('username', 'blank', $redirect_url);
   wp_redirect($redirect_url);
   exit();
}

else if($_POST['pwd']=='') {
   $redirect_url = home_url('login');
   $redirect_url = add_query_arg('password', 'blank', $redirect_url);
   wp_redirect($redirect_url);
   exit();
}

}

}


add_action('init', 'prevent_wp_login');


 



/**
 * Function for outputting login (where both the username and password are used) error to the login page
 */
 
function lambrono_front_end_login_fail($username) {
	
	$redirect_url = home_url('login');
    if (!empty($redirect_url) && !strstr($redirect_url,'wp-login') && !strstr($redirect_url,'wp-admin')) {
	$redirect_url = add_query_arg('login-attempt', 'failed', $redirect_url);
	wp_redirect($redirect_url);	  
    exit();
	
   }
}


add_action( 'wp_login_failed', 'lambrono_front_end_login_fail' ); 






/**
 * Function for redirecting after logging out
 */
 

function lambrono_redirect_external_after_logout(){
	$redirect_url = home_url('login');
	$redirect_url = add_query_arg('loggedout', 'true', $redirect_url);
	wp_redirect($redirect_url);
	exit();
}


add_action('wp_logout','lambrono_redirect_external_after_logout');






/**
 * Function for blocking wp-login and wp-admin
 */

add_action('init','custom_login');

function custom_login(){
	
 global $pagenow;
 
 if( 'wp-login.php' == $pagenow && $_GET['action']!="logout" && $_GET['action']!="lostpassword" && $_GET['action']!="rp") {
  wp_redirect( home_url( '/' ) );
 }

}






/**
 * For re-directing logged-in users to the appropriate pages
 */
 
function custom_login_redirect($redirect_to, $request, $user) {
	
	$user_status = get_user_meta($userID, 'user_status', true);
	
	if(is_array($user->roles) && in_array('administrator', $user->roles)) {
		
		return admin_url();
	} 
	
	elseif(is_array($user->roles) && in_array('owner', $user->roles)) {
		
		return site_url('/custom-admin-dashboard/', 'https');
	}
	
	else {
	
		return site_url('/', 'https');
	}

}

add_filter("login_redirect", "custom_login_redirect", 10, 3);






/**
 * For creating user roles
 */
 
add_role('owner', 'Website Owner', 'read');






/**
 * Function formating prices
 */

function price_convert($price) {
$price = intval(preg_replace('/[^\d.]/', "", $price));
$price = number_format($price, 0, ".", ",");
$price = "₦" . $price . "";

return $price;

}






/**
 * For populating the img tag alt and title atttribute with the post title
 */

function lambrono_add_img_title_and_tag($attr) {

global $post;

$listing_title = get_the_title($post->ID);
$listing_title = trim($listing_title);

$attr['title'] = $listing_title;
$attr['alt'] = $listing_title;

return $attr;

}

add_filter('wp_get_attachment_image_attributes', 'lambrono_add_img_title_and_tag', 10, 2);






/**
 * For setting the featured and ensuring that the first picture becomes the featured image
 */

function lambrono_set_featured_image() {
	
    global $post;
              
	$featured_image_exists = has_post_thumbnail($post->ID);
    
	if (!$featured_image_exists)  {
	
	$attachments = get_children(array(
            'post_parent' => $post->ID, 
            'post_status' => 'inherit', 
            'post_type' => 'attachment', 
            'post_mime_type' => 'image', 
            'order' => 'ASC', 
            'orderby' => 'ID'
    ));
    
	if($attachments) {
            
		foreach ($attachments as $attachment) {
                set_post_thumbnail($post->ID, $attachment->ID);
                break;
        }

    }
			  
    }
    
}


add_action('the_post', 'lambrono_set_featured_image');






/**
 * Function for capitalizing the word after an hyphen
 */

function uc_hyphenated_words($text) {
	
	return str_replace("- ", "-", ucwords(str_replace("-", "- ", $text)));
	
}






?>
