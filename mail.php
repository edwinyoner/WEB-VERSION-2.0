<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$nombres = $_POST["nombres"];
$email = $_POST["email"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

$body = "De:  $nombres <a href = 'mailto:$email'>$email</a><br>";
$body .= "Asunto: $asunto <br>";
$body .= "<p style = 'text-align: justify'>" . $mensaje . "</p><br>";
$body .= "<p>-- Este mensaje se ha enviado desde un formulario de contacto de la página EDWIN YONER --</p>";
//echo $body;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
try {
   //Server settings
   $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
   $mail->isSMTP();                                            //Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   $mail->Username   = 'companycorporationwinner@gmail.com';                     //SMTP username
   $mail->Password   = 'iqlqkarsohwihdjr';                               //SMTP password
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
   $mail->Port       = 465;                                    //465TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

   //Recipients
   $mail->setFrom($email, $nombres);
   $mail->addAddress('edwinyoner@edwinyoner.com');     //Add a recipient
   $mail->addAddress('edwinyoner@gmail.com');          //Add a recipient
   $mail->addAddress('edwinyoner@protonmail.com'); 
   $mail->addAddress('edwinyoner@mailfence.com');     //Add a recipient
   $mail->addAddress('edwinyoner@hotmail.com');
   $mail->addAddress('edwinyoner@outlook.com');                //Name is optional
   //$mail->addReplyTo('info@example.com', 'Information');
   //$mail->addCC('cc@example.com');
   //$mail->addBCC('bcc@example.com'); 

   //Attachments
   //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

   //Content
   $mail->isHTML(true);                                  //Set email format to HTML
   $mail->Subject = 'Formulario de contacto';
   $mail->Body    = $body; //'This is the HTML message body <b>in bold!</b>';
   //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   $mail->send();
   //echo 'Message has been sent'; 
   //header("Location: index.html");
   echo "<script>alert('Mensaje enviado');</script>";
   header("Location: contactos.html");   
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}