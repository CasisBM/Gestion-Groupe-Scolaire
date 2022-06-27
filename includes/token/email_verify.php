<?php
$emailBody = "";
$emailBody = $emailBody ."Hello  " . $username . ",\n<br />";
$emailBody = $emailBody .'Thanks so much for joining us. <br><br>To get started <a href="https://www.sitename.com/verification?email='.$email.'&token='.$token.'">Verify your account</a><br><br> OR copy and past the following code on your browser:<br>https://www.sitename.com/verification?email='.$email.'&token='.$token.' <br><br>to continue.<br><br>Thanks for signing up into the system. <br />';

// Sending mail
$to = "$email"; 
$from = "Site name <noreply@sitename.com>"; 
$subject = 'Verify Your Email Address'; 
//$message = ""; 
$headers = "From: $from\n"; 
$headers .= "MIME-Version: 1.0\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
mail($to, $subject, $emailBody, $headers);
?>