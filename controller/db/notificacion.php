<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';
require '../assets/conexion_correo.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings               //Enable verbose debug output
   $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $uhost;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $ucorreo;                     //SMTP username
    $mail->Password   = $ccontra;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //$mail->SMTPDebug = 2;
    //$mail->isSMTP();                                            //Send using SMTP
   // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //$mail->Username   = 'brimovil.energuate@gmail.com';                     //SMTP username
    //$mail->Password   = 'kbiw wooe psfy cotb';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    //$mail->Port       = 587;

    //Recipients
    $mail->setFrom($ucorreo, $unombre);
    //$mail->setFrom('brimovil.energuate@gmail.com', 'Notificacion Acceso');
    //$mail->addAddress($template_email, $template_nombre);     //Add a recipient
    $mail->addAddress('herrarte.angel@outlook.com', 'Angel');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Codigo de Verificacion';
    //$mail->Body    = 'hola tu codigo de verificacion es: <b>'. $numAleatorio .'!</b>';
    $mail->Body    = 'hola tu codigo de verificacion es:';
    //$mail->AltBody = 'hola tu codigo de verificacion es: '. $numAleatorio;
    $mail->AltBody = 'hola tu codigo de verificacion es: ';

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}