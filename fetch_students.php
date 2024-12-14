<?php
header('Content-Type: application/json');
include "./config.php"; // Conexión a la BD

if (isset($_GET['group'])) {
    $group = $_GET['group'];
    $stmt = $conn->prepare("SELECT id_alumno, nombre, apellido FROM alumnos_1dms1 WHERE grupo = ?");
    $stmt->bind_param("s", $group);
    $stmt->execute();
    $result = $stmt->get_result();

    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row; 
    }

    echo json_encode($students);
}
?>
