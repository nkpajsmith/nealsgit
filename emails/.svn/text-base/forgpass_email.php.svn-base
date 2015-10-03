<?php
require_once('../includes/class.phpmailer.php');
require_once('../includes/class.smtp.php');

$email_forg = $_SESSION['email_forg'];
$new_password = $_SESSION['new_pass'];

include_once "/var/www/tmconfig/dev/emailsettings.php";

///for testing i have set it to gmail
// You can set it to any email service you want to.

$headers  = "MIME-Version: 1.0;\n";
$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
$mail->AddCustomHeader($headers);

$mail->FromName	= "Techmatcher Help"; // name of the username ...like Subscription etc
$mail->AddAddress($_SESSION['email_forg']);// To address

$mail->Subject  = "Techmatcher! Your New Password";
$body = "<p> your email address : $email_forg </p>
         <br/>
         <p> your pasword is : $new_password </p>

         <br/>
         <p> Thank you for using Techmatcher. Have a good day!</p>";
$mail->Body     = $body;
$mail->WordWrap = 50;

if(!$mail->Send()) {
    echo 'Email message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
}
?>