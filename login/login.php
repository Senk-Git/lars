<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Recibe los datos del formulario
$email = $_POST['email'];
$password_input = $_POST['password'];

try {
    // Conecta a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta preparada para obtener el usuario por email
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verifica si se encontró algún usuario
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        // Comparar la contraseña directamente (no recomendado para producción)
        if ($password_input === $user['password']) {
            // Si las contraseñas coinciden, se guarda la información en la sesión
            $_SESSION['email'] = $email;
            // Redirige al dashboard
            header("Location: ../dashboard.php");
            exit; // Asegúrate de salir después de redirigir
        } else {
            // Si la contraseña no es correcta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Si no se encontró el usuario en la base de datos
        echo "No se encontró ningún usuario con el correo electrónico: " . htmlspecialchars($email);
    }

} catch (PDOException $e) {
    // Maneja cualquier error de conexión o consulta
    echo "Error: " . $e->getMessage();
}

// Cierra la conexión
$conn = null;
?>
