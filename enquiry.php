<!DOCTYPE html>


<?php /* all client-side checks have to be done again! */ 
   if(!empty($_POST['theName'])) //includes isset()
      $name =  $_POST['theName'];
   else
      $name = "Foobar";
  
   if(!empty($_POST['theEmail'])) //includes isset()
      $email =  $_POST['theEmail'];
   else
      $email = "xyz@abc.com";
   
   if(!empty($_POST['theMessage']))
	  $message = $_POST['theMessage'];
   else
	  $message = "Hi!";
	
   if(isset($_POST['contact']))
      $contact =  $_POST['contact'];
   else
      $contact = "";
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="enquiry.css">
    <title>Enquiry Sent!</title>
  </head>

  <body>
    <h3>Hello, <?php echo $name ?>!</h3>

    <p>Your message will be sent to 
       <?php echo "$contact "; ?>
       and will be replied to in the next few days!</p>

  </body>
</html>

<?php 
  $recipients = array(
    "Madhur" => "mmahalingam@stud.hs-offenburg.de",
    "Frederick" => "fokumu@stud.hs-offenburg.de",
    "Farhan" => "fsubi@stud.hs-offenburg.de"
  );

  // Get the recipient email based on the selected radio button
  if (array_key_exists($contact, $recipients)) {
    $to = $recipients[$contact];
  } else {
    $to = "abc@xyz.com"; // fallback email
  }

  // Construct the message
  $subject = "Enquiry";
  $body = "Message from $name <$email>\n\n";
  $body .= "They said: $message\n";

  // Send the email
  mail($to, $subject, $body, "From: $email");
?>