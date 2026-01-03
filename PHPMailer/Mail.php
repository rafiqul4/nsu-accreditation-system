<?php
session_start();
	require 'PHPMailer.php';
	require 'SMTP.php';
	require 'Exception.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
	$mail->Username = "accreditation.portal.nsu@gmail.com";
	$mail->Password = "kmpqtmwrsvnvgrck";
	$mail->Subject = "Password reset requested for your Accreditation Portal";
	$mail->setFrom('accreditation.portal.nsu@gmail.com');
	$mail->isHTML(true);
	$mail->Body = "Hi,</br></br><p>Here is a temporary security code for your Accreditation Portal Account. It can only be used once within the next 10 minutes, after
    which it will expire: <p>"." </br><p>"."<b><h3>".$_SESSION['code']."</b></h3>"."</p>";
	$mail->addAddress($_SESSION['email']);
	if ( $mail->send() ) {
		header("location:../code.php?");
	}else{
		header("location:../forgot.php?error=Mail could not be sent, try again a few minutes later");
	}
	$mail->smtpClose();
    ?>
