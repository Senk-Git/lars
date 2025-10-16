<?php
session_start();
// **INCLUSIÓN DE CONEXIÓN CORREGIDA**
require_once 'config.php'; 

// === Verificación de Autenticación Rígida ===
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $user_id = $_SESSION['user_id'];
    
    // Recoger y validar datos
    // Usamos el filtro de string, pero aseguramos la validación.
    $titulo = filter_input(INPUT_POST, 'recordatorio_titulo', FILTER_SANITIZE_STRING); 
    $fecha_vencimiento = filter_input(INPUT_POST, 'recordatorio_fecha', FILTER_SANITIZE_STRING);

    if (empty($titulo) || empty($fecha_vencimiento)) {
        $_SESSION['error_message'] = "El título y la fecha son obligatorios.";
        header("Location: dashboard_alumno.php");
        exit();
    }

    try {
        // CONEXIÓN USANDO LA FUNCIÓN DEFINIDA EN config.php
        $pdo = conectarBaseDeDatos(); 
        
        $sql = "INSERT INTO recordatorios (user_id, titulo, fecha_vencimiento, fecha_creacion) 
                VALUES (:user_id, :titulo, :fecha_vencimiento, NOW())";
        
        $stmt = $pdo->prepare($sql);
        
        // Bind de parámetros
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_vencimiento', $fecha_vencimiento, PDO::PARAM_STR);

        $stmt->execute();

        $_SESSION['success_message'] = "✅ Recordatorio **'{$titulo}'** creado con éxito.";

    } catch (\Exception $e) {
        // Capturamos errores de base de datos o conexión y dejamos un mensaje seguro.
        $_SESSION['error_message'] = "❌ Error en el proceso. No se pudo guardar el recordatorio.";
        
        // Si quieres ver el error real, descomenta la línea de abajo (solo para desarrollo)
        // $_SESSION['error_message'] = "❌ Error: " . $e->getMessage();
    }

} else {
    $_SESSION['error_message'] = "Acceso directo no permitido.";
}

// === REDIRECCIÓN FINAL ===
header("Location: dashboard_alumno.php");
exit();
?>