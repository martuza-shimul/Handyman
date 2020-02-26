<?php
// Check for empty fields
if(empty($_POST['first-name'])  		||
   empty($_POST['email'])	||
   empty($_POST['phone']) 		||
   empty($_POST['postcode'])	||
   empty($_POST['message']) 		||
   
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Please fill up the form Properly, Maybe you have missed something!";
	return false;
   }

   // File upload functionality
$new_path = "No files Uploaded";
$counter = 0;
if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
    //   $new_path = "<a href=" .$path. ">Check here</a>";
    //   $new_path = "<a href=" echo $path ">Check here</a>";
      $new_path = "https://handymanco.co.uk/dist/php/".$path;
    //   $counter = 1;
  
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }



   
$service_type = $_POST['first'];
// $second = $_POST['check'];
// $type = implode(', ', $second); //vehicle type
$service_name = $_POST['second'];
//$area = $_POST['type']; // in which area
$urgency = $_POST['third']; //timeline
$materials = $_POST['fourth']; //material purchase


// if(!empty($second)) {

//    foreach($_POST['lang'] as $value){
//        echo "value : ".$value.'<br/>';
//    }

// }

$first_name = $_POST['first-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$postcode = $_POST['postcode'];
$message = $_POST['message'];

	
// Create the email and send the message

$to = 'tripkeys@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Quote Engine:  $first_name";

$email_body = "You have received a new message from your Handyman website Quote Engine .\n\n"."Here are the details:\n\nFirst Name: $first_name\n Postcode: $postcode \nPhone: $phone\nEmail: $email\n Message: $message

\n\n\n Here is the Quote Request: \n Place to service: $service_type\n Service Name: $service_name\n Urgency: $urgency\n Materials: $materials\n Uploaded File: " .$new_path;

// Weekly Price range: $price_range\n Area: $area \n How urgent : $urgency \n  For how long: $timeline 

$headers = "From: noreply@handymanco.co.uk\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);

// echo "<h4>The details have been sent and a member of staff will be in touch shortly!</h4>";

header("Location: ../../thank-you.html");
return true;	

?>