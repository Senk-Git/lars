<?php
require '../config.php'; // Archivo con conexión a la base de datos

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Incluye PHPMailer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Verificar si el correo existe en la base de datos
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Verificar si el correo ya tiene un token pendiente de restablecimiento
        $token = bin2hex(random_bytes(50)); // Genera un token único

        // Insertar el token en la tabla password_resets
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $email, $token);
        
        if ($stmt->execute()) {
            // Configurar y enviar el correo con PHPMailer
            $resetLink = "http://senk.host/proyecto/password/reset.php?token=$token"; 
            $mail = new PHPMailer(true);
            
            // Crear el contenido HTML con Bootstrap
            $bodyContent = "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Restablecer Contraseña</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body>
                <div class='container mt-5'>
                    <div class='row justify-content-center'>
                        <div class='col-md-8'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='text-center'>Restablecer tu contraseña</h4>
                                </div>
                                <div class='card-body'>
                                    <p>Hemos recibido una solicitud para restablecer tu contraseña en el sitio web de <strong>Senk Host</strong>.</p>
                                    <p>Para restablecerla, simplemente haz clic en el siguiente enlace:</p>
                                    <a href='$resetLink' class='btn btn-primary btn-lg btn-block' target='_blank'>Restablecer Contraseña</a>
                                    <hr>
                                    <p>Si no solicitaste este cambio, puedes ignorar este mensaje.</p>
                                    <p>Atentamente,</p>
                                    <p><strong>El equipo de Senk Host</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            </html>";

            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com'; // Servidor SMTP de Hostinger
                $mail->SMTPAuth = true;
                $mail->Username = 'soporte@senk.host'; // Tu correo de soporte
                $mail->Password = 'Senk1419&'; // Cambia a la contraseña real
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configuración del correo
                $mail->setFrom('soporte@senk.host', 'Soporte Senk Host'); // Cambié el nombre del remitente
                $mail->addAddress($email); // El correo del usuario que está solicitando el restablecimiento
                $mail->Subject = 'Restablecer tu contraseña';
                $mail->isHTML(true);
                $mail->Body = $bodyContent;

                $mail->send();
                
                // Mensaje de éxito con Bootstrap y diseño atractivo
                echo "
                <div class='container mt-5'>
                    <div class='row justify-content-center'>
                        <div class='col-md-8'>
                            <div class='alert alert-success text-center py-5' role='alert'>
                                <h4 class='alert-heading'><i class='bi bi-check-circle'></i> ¡Éxito!</h4>
                                <p class='lead'>Se ha enviado un correo con las instrucciones para restablecer tu contraseña.</p>
                                <hr>
                                <p class='mb-0'>Revisa tu bandeja de entrada y sigue las instrucciones. Si no ves el correo, revisa la carpeta de spam.</p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            } catch (Exception $e) {
                // Mensaje de error con Bootstrap y diseño atractivo
                echo "
                <div class='container mt-5'>
                    <div class='row justify-content-center'>
                        <div class='col-md-8'>
                            <div class='alert alert-danger text-center py-5' role='alert'>
                                <h4 class='alert-heading'><i class='bi bi-x-circle'></i> ¡Error!</h4>
                                <p class='lead'>Hubo un problema al enviar el correo: {$mail->ErrorInfo}</p>
                                <hr>
                                <p class='mb-0'>Por favor, intenta de nuevo más tarde o contacta con el soporte.</p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            // Mensaje de error si no se guardó el token con Bootstrap y diseño atractivo
            echo "
            <div class='container mt-5'>
                <div class='row justify-content-center'>
                    <div class='col-md-8'>
                        <div class='alert alert-danger text-center py-5' role='alert'>
                            <h4 class='alert-heading'><i class='bi bi-x-circle'></i> ¡Error!</h4>
                            <p class='lead'>Hubo un problema al guardar el token de restablecimiento.</p>
                            <hr>
                            <p class='mb-0'>Por favor, intenta nuevamente más tarde.</p>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
        // Mensaje si el correo no está registrado con Bootstrap y diseño atractivo
        echo "
        <div class='container mt-5'>
            <div class='row justify-content-center'>
                <div class='col-md-8'>
                    <div class='alert alert-warning text-center py-5' role='alert'>
                        <h4 class='alert-heading'><i class='bi bi-exclamation-circle'></i> ¡Atención!</h4>
                        <p class='lead'>El correo ingresado no está registrado en nuestro sistema.</p>
                        <hr>
                        <p class='mb-0'>Por favor, revisa el correo ingresado o regístrate en el sitio.</p>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}
?>
