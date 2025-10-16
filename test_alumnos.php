<?php
header('Content-Type: application/json');

$mysqli = new mysqli("localhost", "root", "", "lars");

if ($mysqli->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Error al conectar con la base de datos: " . $mysqli->connect_error
    ]); 
    exit;
}

// Decodificar el JSON recibido
$input = json_decode(file_get_contents('php://input'), true);
$groupId = $input['groupId'] ?? null;

if (!$groupId) {
    echo json_encode([
        "status" => "error",
        "message" => "No se recibió el ID del grupo."
    ]);
    exit;
}

$query = "SELECT id, nombre, apellido FROM alumnos_1dsm1 WHERE grupo = ?";
$stmt = $mysqli->prepare($query);

if (!$stmt) {
    echo json_encode([
        "status" => "error",
        "message" => "Error al preparar la consulta: " . $mysqli->error
    ]);
    exit;
}

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("s", $groupId);

if (!$stmt->execute()) {
    echo json_encode([
        "status" => "error",
        "message" => "Error al ejecutar la consulta: " . $stmt->error
    ]);
    exit;
}

$result = $stmt->get_result();

$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

echo json_encode([
    "status" => "success",
    "students" => $students
]);

$stmt->close();
$mysqli->close();
?>
