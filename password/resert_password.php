<?php
$host = '127.0.0.1:3306';  
$username = 'u569309670_admon_1';  
$password = 'Senk1419&';      
$dbname = 'u569309670_proyecto_lars';  

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    // Verificar que la contraseña no esté vacía
    if (empty($new_password)) {
        echo "La contraseña no puede estar vacía.";
        exit;
    }

    // Hashear la nueva contraseña para la columna `password`
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Verificar si el token es válido
    $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND email = ?");
    $stmt->bind_param("ss", $token, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si el token existe
    if ($result->num_rows > 0) {
        // Actualizar la contraseña en ambas columnas
        $update_stmt = $conn->prepare("UPDATE users SET password = ?, password_normal = ? WHERE email = ?");
        $update_stmt->bind_param("sss", $hashed_password, $new_password, $email);

        if ($update_stmt->execute()) {
            // Eliminar el token para que no se pueda usar más
            $delete_stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
            $delete_stmt->bind_param("s", $token);
            $delete_stmt->execute();

            echo "Contraseña actualizada exitosamente. Redirigiendo...";

            header("Location: ../index.php");
            exit();
        } else {
            echo "Error al actualizar la contraseña. Inténtalo de nuevo.";
        }
    } else {
        echo "El token no es válido o ha expirado.";
    }
}

$conn->close();
?>
