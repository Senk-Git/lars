<?php
include 'config.php'; /

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $groupId = $_POST['group_id']; // Recibir el ID del grupo desde el frontend

    $query = "SELECT id, nombre, apellido FROM alumnos_1dsm1 WHERE grupo_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $groupId);
    $stmt->execute();
    $result = $stmt->get_result();

    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    echo json_encode($students); /
}
?>
