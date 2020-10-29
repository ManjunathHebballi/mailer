<?php 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); 

try { 
    $mail->SMTPDebug = 4;                                    
    $mail->isSMTP();                                             
    $mail->Host  = 'smtp.gmail.com;';                  
    $mail->SMTPAuth = true;                          
    $mail->Username = $_POST['email'];                
    $mail->Password = $_POST['password'];  
    // echo $mail->Username;
    // exit();                      
    $mail->SMTPSecure = 'tls';                           
    $mail->Port  = 587; 
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->setfrom($_POST['email']);      
   $mail->addAddress($_POST['toemail']);
// $mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
// $mail->addReplyTo("Manjunath.Hebballi.17@gmail.com", "Reply");

//CC and BCC
$mail->addCC($_POST['cc']);
$mail->addBCC($_POST['bcc']);

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
// $mail->AltBody = "local to SMTP";
   
    $mail->send(); 
    echo "Mail has been sent successfully!"; 
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 

?> 