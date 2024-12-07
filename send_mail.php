<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Cargar Composer autoload si usas Composer

// Datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Configuración de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor de correo
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 's.carmonawright@gmail.com'; // Tu correo electrónico de Gmail
    $mail->Password = 'rmds pvoq fvio ynns'; // Contraseña de tu correo electrónico
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar el cifrado TLS
    $mail->Port = 587; // Puerto SMTP seguro de Gmail

    // Remitente y destinatario
    $mail->setFrom($email, $name); // Dirección de correo del remitente
    $mail->addAddress('s.carmonawright@gmail.com'); // Dirección de correo del destinatario

    // Contenido del correo
    $mail->isHTML(true); // Formato de correo HTML
    $mail->Subject = $subject; // Asunto del correo
    $mail->Body = "<p>Nombre: $name</p><p>Correo: $email</p><p>Mensaje:</p><p>$message</p>"; // Cuerpo del correo

    // Enviar el correo
    $mail->send();
    echo json_encode(['success' => true]); // Devuelve respuesta de éxito
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]); // Devuelve respuesta de error
}
?>
