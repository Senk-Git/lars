<?php
header('Content-Type: application/json');

$conexion = new mysqli('localhost', 'root', '', 'lars_1'); // Make sure this is the correct database name

if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión con la base de datos: ' . $conexion->connect_error]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Datos no válidos o JSON mal formado.']);
    $conexion->close();
    exit;
}

$fecha = date('Y-m-d');
$materia_id = 1; // This should be a dynamic value from your front-end

$stmt = $conexion->prepare("INSERT INTO asistencia (alumno_id, materia_id, presente, ausente, retardo, justificado, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Error al preparar la consulta: ' . $conexion->error]);
    $conexion->close();
    exit;
}

foreach ($data as $id => $attendance) {
    $id_alumno = intval($id);
    
    $presente = $attendance['present'] ? 1 : 0;
    $ausente = $attendance['absent'] ? 1 : 0;
    $retardo = $attendance['late'] ? 1 : 0;
    $justificado = $attendance['justified'] ? 1 : 0;

    $stmt->bind_param("iiiiiss", $id_alumno, $materia_id, $presente, $ausente, $retardo, $justificado, $fecha);
    
    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'error' => 'Error al guardar la asistencia para el alumno ' . $id_alumno . ': ' . $stmt->error]);
        $stmt->close();
        $conexion->close();
        exit;
    }
}

$stmt->close();
$conexion->close();

echo json_encode(['success' => true, 'message' => 'Asistencia guardada exitosamente.']);
?>