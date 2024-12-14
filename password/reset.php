<?php
// Configuración de la base de datos
$host = '127.0.0.1:3306';  
$username = 'u569309670_admon_1';  
$password = 'Senk1419&';      
$dbname = 'u569309670_proyecto_lars';  

// Crear conexión a la base de datos
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha pasado el token en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Buscar el token en la base de datos
    $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el token existe en la base de datos
    if ($result->num_rows > 0) {
        // Token encontrado, podemos mostrar el formulario de restablecimiento de contraseña
        $row = $result->fetch_assoc();
        $email = $row['email'];

        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Restablecer Contraseña</title>
            <!-- Incluir los archivos CSS de Bootstrap -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
            <!-- Incluir los archivos JS de Bootstrap -->
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
            <!-- Incluir Bootstrap Icons para el ojo -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container'>
                <div class='row justify-content-center mt-5'>
                    <div class='col-md-6'>
                        <div class='card'>
                            <div class='card-header'>
                                <h3 class='text-center'>Restablecer Contraseña</h3>
                            </div>
                            <div class='card-body'>
                                <form method='POST' action='reset_password.php'>
                                    <input type='hidden' name='email' value='$email'>
                                    <input type='hidden' name='token' value='$token'>
                                    <div class='mb-3'>
                                        <label for='new_password' class='form-label'>Nueva contraseña:</label>
                                        <div class='input-group'>
                                            <input type='password' name='new_password' id='new_password' class='form-control' required>
                                            <button type='button' class='btn btn-outline-secondary' id='togglePassword' style='cursor: pointer;'>
                                                <i class='bi bi-eye-slash' id='eyeIcon'></i> <!-- Icono inicial de ojo cerrado -->
                                            </button>
                                        </div>
                                    </div>
                                    <div class='d-grid'>
                                        <input type='submit' value='Restablecer contraseña' class='btn btn-primary'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const togglePassword = document.getElementById('togglePassword');
                const newPassword = document.getElementById('new_password');
                const eyeIcon = document.getElementById('eyeIcon');

                togglePassword.addEventListener('click', function (e) {
                    // Alternar el tipo de campo entre password y text
                    const type = newPassword.type === 'password' ? 'text' : 'password';
                    newPassword.type = type;

                    // Alternar el icono del ojo entre abierto y cerrado
                    eyeIcon.classList.toggle('bi-eye-slash');
                    eyeIcon.classList.toggle('bi-eye');
                });
            </script>
        </body>
        </html>
        ";
    } else {
        // Token no válido o expirado
        echo "Este token no es válido o ha expirado.";
    }
} else {
    // Si no se pasa un token en la URL
    echo "No se proporcionó un token. Asegúrate de que el enlace sea correcto.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
