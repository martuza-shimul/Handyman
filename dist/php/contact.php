<?php
// Check for empty fields
if(empty($_POST['name'])  		   ||
   empty($_POST['email'])	      ||
   empty($_POST['phone']) 		   ||
   empty($_POST['postcode']) 		||
   empty($_POST['message']) 		||
   
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Please fill up the form Properly, Maybe you have missed something!";
	return false;
   }


   // File upload functionality
$new_path = "No files Uploaded";
if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      $new_path: "File:  <a href=" .$path. ">Check here</a>";
  
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

   


$name= $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$postcode = $_POST['postcode'];
$message = $_POST['message'];

	
// Create the email and send the message

$to = 'tripkeys@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your Handyman London website contact form .\n\n"."Here are the details:\n\nFirst Name: $name\n\n Postcode: $postcode \n\n Phone: $phone\n\nEmail: $email\n\n  \n Message: $message \n Uploaded File: $new_path";
// if(!empty($new_path)){
//    echo $new_path;
// }else{
//    echo "No files uploaded";
// };
$headers = "From: noreply@handyman-london.co.uk\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);

// echo "<h4>The details have been sent and a member of staff will be in touch shortly!</h4>";

header("Location: ../../thank-you.html");
return true;	

?>