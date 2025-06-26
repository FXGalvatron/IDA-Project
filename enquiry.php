<?php /* all client-side checks have to be done again! */ 
      $name =  $_POST['theName'];
      $email =  $_POST['theEmail'];
      $message = $_POST['theMessage'];

	
   if(isset($_POST['contact'])){
    $contact =  $_POST['contact'];
    $ack_message = "Your message has been sent to $contact";
   }
   else{
    $contact = "";
    $ack_message = "Your message has been sent to the team.";
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="enquiry.css">
    <title>Enquiry Sent!</title>
    
  </head>

  <body>
    <h3>Hello, <?php echo $name ?>!</h3>

    
    <p>We're excited to read your ideas! <br> 
       <?php echo "$ack_message "; ?>
       and you will get a response in a few days.</p>

  </body>
</html>

<?php 
  $recipients = array(
    "Madhur" => "mmahalin@stud.hs-offenburg.de",
    "Fredrick" => "fokumu@stud.hs-offenburg.de",
    "Farhan" => "fsubi@stud.hs-offenburg.de"
  );

  // Get the recipient email based on the selected radio button
  if (array_key_exists($contact, $recipients)) {
    $to = $recipients[$contact];
  } else {
    $to = "mmahalin@stud.hs-offenburg.de"; // fallback email
  }

  // Construct the message
  $subject = "Enquiry";
  $body = "Message from $name <$email>\n\n";
  $body .= "They said: $message\n";

  // Send the email
  mail($to, $subject, $body, "From: $email");
?>