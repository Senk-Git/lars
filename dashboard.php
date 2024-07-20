<?php
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['email'])) {
    // Si no está autenticado, redirigir al inicio de sesión
    header("Location: index.php");
    exit();
}


// Aquí va el contenido del dashboard
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
  <title>Dashboard</title>
</head>




<body>
  <h1>BIENVENIDO A LARS!</h1>
  <p>Contenido del dashboard...</p>

  <a href="logout.php">Cerrar sesión</a>
  <span class="material-symbols-outlined">
close
</span>

<!--Navegador -->
  <div class="container">
    <aside>

      <div class="top">
        <div class="logo">
          <img src="img/lars_limpio.png" alt="">
          <h2>LA<span class="succeses">RS</span></h2>
        </div>

        <div class="close" id="close-btn">
          <span class="material-symbols-outlined">close</span>
        </div>
      </div>

      <div class="sidebar">

        <a href="#">
          <span class="material-symbols-outlined">space_dashboard</span>
          <h3>Inicio</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">group</span>
          <h3>Grados</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">collections_bookmark</span>
          <h3>Materias</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">school</span>
          <h3>Totales</h3>
        </a>

      </div>

    </aside>
  </div>




  <script src="js/dashboard.js" ></script>
</body>
</html>
