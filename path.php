<?php
// Cargar las clases de PHPMailer manualmente si no estás usando Composer
require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Crear instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.tuservidor.com'; // Cambia esto al servidor SMTP que vas a usar
    $mail->SMTPAuth = true;
    $mail->Username = 'tu_correo@tudominio.com'; // Cambia esto a tu correo
    $mail->Password = 'tu_contraseña'; // Cambia esto a la contraseña de tu correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Puedes usar 'PHPMailer::ENCRYPTION_SMTPS' para SSL
    $mail->Port = 587; // Cambia esto si tu servidor usa un puerto diferente (587 para TLS, 465 para SSL)

    // Configuración del correo
    $mail->setFrom('tu_correo@tudominio.com', 'Tu Nombre');
    $mail->addAddress('destinatario@ejemplo.com', 'Destinatario'); // Correo y nombre del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Correo de prueba';
    $mail->Body = '<p>Este es un mensaje de prueba enviado desde PHPMailer.</p>';
    $mail->AltBody = 'Este es un mensaje de prueba enviado desde PHPMailer (solo texto).';

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo "El correo no se pudo enviar. Error: {$mail->ErrorInfo}";
}
