<?php
$name = $_POST["name"];
$phone = $_POST["phone"];
$emailn = $_POST["email"];
$service = $_POST["service"];
$date = $_POST["date"];
$message = $_POST["message"];



$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Phone: ";
$Body .= $emailn;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Service: ";
$Body .= $service;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Date: ";
$Body .= $date;
$Body .= "\n";
$Body .= "\r\n";
$Body .= "Message: ";
$Body .= $message;

require 'php/class.phpmailer.php';


try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true; 
	$mail->Port       = 465;   
    $mail->SMTPSecure = 'ssl';
	$mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true)
               );
	$mail->Host       = ""; // SMTP server
	$mail->Username   = "";     // SMTP server username
	$mail->Password   = "";            // SMTP server password


	$mail->AddReplyTo($emailn,$name);

	$mail->From       = $emailn;
	$mail->FromName   = $name;

	$to = ""; //email address where you want to recive email

	$mail->AddAddress($to);

	$mail->Subject  = "Mail Inquiry";

	$mail->Body = $Body;


	$mail->Send();
	echo 'Message  sent.';
	
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}

?>
