<?php

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;

/* Include the Composer generated autoload.php file. */
require '..\composer\vendor\autoload.php';

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);
  
/* SMTP parameters. */

$mail->SMTPDebug = 4; 
$mail->isSMTP();                                // Tells PHPMailer to use SMTP.
$mail->Host = 'smtp.gmail.com';                 // SMTP server address. 
$mail->SMTPAuth = TRUE;                         // Use SMTP authentication. 
$mail->SMTPSecure = 'tls';                      // Set the encryption system.
$mail->Username = 'bethabbadessonne@gmail.com'; // SMTP authentication username.
$mail->Password = 'asefthil99';                 // SMTP authentication password.
$mail->Port = 587;                              // Set the SMTP port.

/* Disable some SSL checks. */
$mail->SMTPOptions = array(
   'ssl' => array(
   'verify_peer' => false,
   'verify_peer_name' => false,
   'allow_self_signed' => true
   )
);

/* Recipients. */

$mail->setFrom($_POST['email'], $_POST['name']);   // Set the mail sender.
$mail->addAddress('leaifergan15@gmail.com');       // Add a recipient.

/* Content. */

$mail->Subject = $_POST['subject'];                // Set the subject.
$mail->MsgHTML($_POST['message']);                 // Set the mail message body.


/* Finally send the mail. */

$mail->send();
