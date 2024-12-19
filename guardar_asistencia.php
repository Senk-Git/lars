<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Datos no válidos.']);
    exit;
}

$conexion = new mysqli('localhost', 'root', '', 'users');

if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión con la base de datos.']);
    exit;
}

foreach ($data as $id => $attendance) {
    $id_alumno = intval($id);
    $presente = $attendance['present'] ? 1 : 0;
    $ausente = $attendance['absent'] ? 1 : 0;
    $retardo = $attendance['late'] ? 1 : 0;
    $justificado = $attendance['justified'] ? 1 : 0;
    $fecha = date('Y-m-d');

    $stmt = $conexion->prepare("INSERT INTO asistencia (id_alumno, presente, ausente, retardo, justificado, fecha) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiis", $id_alumno, $presente, $ausente, $retardo, $justificado, $fecha);
    $stmt->execute();
}

echo json_encode(['success' => true, 'message' => 'Asistencia guardada exitosamente.']);
$conexion->close();
