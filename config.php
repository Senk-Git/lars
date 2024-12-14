<?php
$conn = new mysqli("localhost", "root", "", "users");

if ($conn->connect_error) {
    echo 'Error de conexion ' . $conn->connect_error;
    exit;
}

?>
