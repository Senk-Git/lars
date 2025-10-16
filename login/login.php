<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_utec";

// Captura de datos
$matricula = $_POST['matricula'] ?? null;
$password_input = $_POST['password'] ?? null;

// Validación de campos vacíos
if (empty($matricula) || empty($password_input)) {
    header("Location: ../index.php?login_error=campos_vacios");
    exit();
}

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Consulta segura
    $stmt = $conn->prepare("
        SELECT 
            u.id,
            u.contrasena,
            r.nombre AS rol
        FROM usuarios u
        LEFT JOIN roles r ON u.rol_id = r.id
        WHERE u.matricula = :matricula
    ");
    $stmt->bindParam(':matricula', $matricula);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validación de contraseña
    if ($user && password_verify($password_input, $user['contrasena'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['rol'] = $user['rol'];

        // Redirección según rol
        $redirect_url = ($user['rol'] === 'alumno') ? '../dashboard_alumno.php' : '../dashboard.php';
        header("Location: $redirect_url");
        exit();
    } else {
        header("Location: ../index.php?login_error=incorrecto");
        exit();
    }

} catch (PDOException $e) {
    error_log("Login DB Error: " . $e->getMessage());
    header("Location: ../index.php?login_error=db_fail");
    exit();
}
