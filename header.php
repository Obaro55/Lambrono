<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="theme-color" content="#aefc8f" />
	

	
	
<?php 
	
	$protected_page_ids = array(); 
	
	if(in_array($post->ID, $protected_page_ids)) {
		
		echo '<meta name="robots" content="noindex,nofollow">'; 
		
	}
	
?>
	
		
		
<?php wp_head(); ?>
	


</head>


<body <?php body_class() ?>>


<header>
	
	<nav>
	
	<div class="logo">
	<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo("template_url"); ?>/images/Lambrono-Autos-Logo.svg"></a>
	</div>
	
	
	<div class="menu-items">
	
		<ul class="menu">
		
		<li class="home"><a href="https://www.lambronoauto.com/">Home</a></li>
		<li><a href="https://www.lambronoautos.com/about-us/">About Lambrono</a></li>
		<li class="no-padding-right"><a href="https://www.lambronoautos.com/contact-us/">Contact Us</a></li>
		
		<li class="header-social-media">
		<a href="https://www.facebook.com/lambronoautos/"><i class="fa fa-facebook"></i></a>
		<a href="https://www.twitter.com/lambronoautos/"><i class="fa fa-twitter"></i></a>
		<a href="https://www.instagram.com/lambronoautos/"><i class="fa fa-instagram"></i></a>
		</li>
	
		</ul>	
	
	</div>
	
	
	
	
		<div class="menu-toggle-container">
		<div class="menu-icon">
		<div class="bar one"></div>
		<div class="bar two"></div>
		<div class="bar three"></div>			
		</div>
		</div>
	
	
	</nav>
	
		
</header>
		
	
		
		
			
