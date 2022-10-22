<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "youremail@mail.com" );


// Read the form values
$success = false;
$firstName = isset( $_POST['firstname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['firstname'] ) : "";
$lastName = isset( $_POST['lastname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lastname'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $firstName && $lastName && $senderEmail && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $firstName . " <" . $senderEmail . ">";
  $msgBody = " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.html');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html');	
}

?>