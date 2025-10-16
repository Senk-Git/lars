<?php
require_once '../config.php'; 

try {
    $pdo = conectarBaseDeDatos();
    echo "✅ Conexión exitosa a la base de datos 'sistema_utec'.";
} catch (\Exception $e) {
    echo "❌ ERROR FATAL DE CONEXIÓN: " . $e->getMessage();
}
?>