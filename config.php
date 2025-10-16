<?php
/**
 * Archivo de conexión a la base de datos (Usando PDO)
 * El archivo está al mismo nivel que dashboard_alumno.php y crear_recordatorio.php
 */

function conectarBaseDeDatos() {
    // === ⚠️ REVISA ESTAS TRES LÍNEAS ⚠️ ===
    $db_host = 'localhost';
    $db_name = 'sistema_utec'; // CONFIRMADO: Este es el nombre de tu base de datos
    $db_user = 'root';        // CONFIRMADO: Usuario por defecto de XAMPP/MySQL
    $db_pass = '';            // CONFIRMADO: Contraseña vacía por defecto de XAMPP/MySQL
    
    // Configuración DSN (Data Source Name)
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    
    // Opciones de PDO
    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Genera excepciones en caso de error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $db_user, $db_pass, $opciones);
        return $pdo; // Devuelve el objeto PDO si la conexión es exitosa
    } catch (\PDOException $e) {
        // Si hay un error de conexión, lanzamos una excepción simple.
        // ESTO ES LO QUE CAPTURA dashboard_alumno.php y te envía al login con ?error=db_fail
        throw new \Exception("Error al conectar con la base de datos: " . $e->getMessage()); 
    }
}
?>