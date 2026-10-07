<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $correo = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['subject']);
    $mensaje = htmlspecialchars($_POST['message']);

    // Destinatario del correo
    $destinatario = "raguesal64@gmail.com"; // Cambia esto por tu correo

    // Cabeceras del correo
    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $correo\n\n";
    $contenido .= "Mensaje:\n$mensaje";

    // Enviar el correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "¡Su mensaje ha sido enviado, gracias!";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
