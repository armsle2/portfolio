<?php
	// Check for empty fields
	if(empty($_POST['c_name'])  		||
	   empty($_POST['c_email']) 		||
	   empty($_POST['c_message'])	||
	   !filter_var($_POST['c_email'],FILTER_VALIDATE_EMAIL))
	   {
		echo "No arguments Provided!";
		return false;
	   }
	$name = strip_tags(htmlspecialchars($_POST['c_name']));
	$email_address = strip_tags(htmlspecialchars($_POST['c_email']));
	$message = strip_tags(htmlspecialchars($_POST['c_message']));
	// Create the email and send the message
	$to = 'leaveil.armstrong@gmail.com';
	$email_subject = "Website Contact Form:  $name";
	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
	$headers = "From: noreply@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers .= "Reply-To: $email_address";
	mail($to,$email_subject,$email_body,$headers);
	return true;
?>