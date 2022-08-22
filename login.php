<?php
/**
 * Template Name: Login
 *
 */


if (is_user_logged_in()) {   
    wp_redirect(esc_url(home_url('/')));
	exit();
} 

 
 
get_header(); ?>





<div class="template-page login">


<div class="template-page-container login">




<?php if($_REQUEST['username'] == 'blank' && $_REQUEST['password'] == 'blank') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">Username and password required.</div></div>'; }  
		
		elseif($_REQUEST['username'] == 'blank') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">Username required.</div></div>'; }
		
		elseif($_REQUEST['password'] == 'blank') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">Password required.</div></div>'; }  
		
		?>
		
		
		<?php if($_REQUEST['login-attempt'] == 'failed') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">Incorrect login details.</div></div>'; }  ?>
		<?php if($_REQUEST['loggedout'] == 'true') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">You\'ve successfully logged out.</div></div>'; }  ?>
		<?php if($_REQUEST['checkemail'] == 'confirm') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">A password reset link has been sent to your email.</div></div>'; }  ?>
		<?php if($_REQUEST['login'] == 'expiredkey') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">The password reset key has expired.</div></div>'; }  ?>
		<?php if($_REQUEST['login'] == 'invalidkey') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">The password reset key is invalid.</div></div>'; }  ?>
		<?php if($_REQUEST['password'] == 'changed') { echo '<div class="krisokservicesltd-login-errors"><div class="custom-form-error">Password sucessfully changed.</div></div>'; }  ?>
		
		
		
		
		<div class="form-container login">
		
		
		<h1>Login</h1>
		
		<form action="<?php echo wp_login_url(); ?>"  id="krisokservicesltd-custom-login" method="post">		
			
			
            <div class="field-full-width">
                <label for="user_login"><?php esc_html_e('Username or Email', 'krisokservicesltd'); ?></label>
				<input type="text" name="log" placeholder="">
            </div>
						
		
			
						
			<div class="field-full-width">
                    <label for="user_pass"><?php esc_html_e('Password', 'krisokservicesltd'); ?></label>
					<input type="password" name="pwd" placeholder="">
            </div>
        
					
			
			<div class="lower-login-details">
			
			
			<div class="rememberme">
					
					<input name="rememberme" type="checkbox" value="forever" id="rememberme" /> <label for="rememberme">Remember me</label>
			</div>
				
				
			<div class="form-button login">
					<input type="submit" id="login-submit" class="submit-form" name="wp-submit" value="Log In" />
            </div>
			
			</div>
			
			
						 
		</form> 
		
		
		</div>	


</div>


	
          
</div>






<?php get_footer(); ?>
