<?php
/**
 * Template Name: Contact Us
 *
 */
 
 

require("/home/lambrono/public_html/PHPMailer-master/src/PHPMailer.php");
require("/home/lambrono/public_html/PHPMailer-master/src/SMTP.php");
require("/home/lambrono/public_html/PHPMailer-master/src/Exception.php");




 

if (isset($_POST['send_message']))  {
	



$full_name = sanitize_text_field($_POST['full_name']);
$phone_number = sanitize_text_field($_POST['phone_number']);
$email_address = sanitize_email($_POST['email']); 
$message_text = sanitize_textarea_field($_POST['message_text']);



$message = "Name: $full_name <br>";

if(!empty($phone_number)) {
$message .= "Phone number: $phone_number <br>";
}

$message .= "Email: $email_address <br><br>";

$message .= "Message: <br>";

$message .= "$message_text";


$body = "<html><body>" . $message . "<br></body></html>";






$mail = new PHPMailer\PHPMailer\PHPMailer();


$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Host = "mail@lambronoautos.com"; // sets the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "mail@lambronoautos.com"; // SMTP account username
$mail->Password = "up.M,Y_huy+L"; // SMTP account password

$mail->SetFrom("$email_address", "$full_name");
$mail->AddReplyTo("$email_address", "$full_name");
$mail->Subject = "Email from Website";
$mail->MsgHTML($body);
$mail->AddAddress("info@lambronoautos.com");


	if($mail->Send()) {
		wp_redirect(esc_url( home_url('/email-received/')));
		exit();
	}
	
	else if(!$mail->Send()) {
		echo "Message is not sent at this time. Kindly try again later!";
	}  


    
}


get_header(); ?>	






<div class="template-page">



<div class="template-page-header contact-us">
		
	
	<div class="template-page-header-container contact-us">
		
		<h1>Contact Us</h1>
		
	</div>
		
</div>



		
		
				
<div class="template-page-container contact-us">
		
		
	<div class="contact-form-container">
	
	<div class="form-intro-container">


		<h2>Lambrono Automobiles Limited</h2>

		<p class="address">31, Wemco Road, Ogba, Ikeja, Lagos, Nigeria</p>
		<p class="phone-number"><span class="phone-number">T:</span> 0909000510, 08033086017</p>
		<p class="email"><span class="email">E:</span> info@lambronoautos.com</span></p>
		
		<span class="form-design-line"></span>

		
	</div>
	
	
	
	
	
	<div class="form-container">
			
		
<form id="contact-form" action="<?php the_permalink(); ?>"  method="post">		

			<?php wp_nonce_field('contact_us', 'contact_us_form'); ?>

			
            <div class="field-full-width form-field">
                <label for="name">Name <span class="required">*</span></label>
				<input type="text" id="name" name="full_name">
				<span class="error"></span>	
            </div>
        

						
						
			<div class="form-spacing">
			
				<div class="field-left form-field">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="text" id="email" name="email">
					<span class="error"></span>	
				</div>
        
				<div class="field-right">
                    <label for="phone_number">Phone number</label>
                    <input id="phone_number" type="text" name="phone_number">
                </div>
			
			</div>
					
		
		
			<div class="field-full-width form-field">
                     <label for="message_text">Message <span class="required">*</span></label>
                    <textarea id="message_text" name="message_text"></textarea>
					<span class="error"></span>	
			</div>
				
				
			
					
			<div class="form-button output_message">
					<input type="submit" id="send_message" class="submit-form" name="send_message" value="Send Message">
			</div>
			
			
						 
		</form> 
		
		
	</div>	


	</div>
		
	
</div>



</div>




<?php get_footer(); ?>
	