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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
  <title>Dashboard</title>

  <?php include "css/stylesDash.php"; ?>
</head>



<body>



<!--Navegador -->
  <div class="container">
    <aside>

      <div class="top">
        <div class="logo">
          <img src="img/lars_limpio.png" alt="">
          <h2>LA<span class="primary">RS</span></h2>
        </div>

        <d  iv class="close" id="close-btn">
          <span class="material-symbols-outlined">close</span>
        </d>
      </div>

      <div class="sidebar">

        <a href="#" class="active" id="1">
          <span class="material-symbols-outlined">space_dashboard</span>
          <h3>Inicio</h3>
        </a>
        <a href="grupos.php" id="2">
          <span class="material-symbols-outlined">group</span>
          <h3>Grados</h3>
        </a>
        <a href="#" id="3">
          <span class="material-symbols-outlined">collections_bookmark</span>
          <h3>Materias</h3>
        </a>
        <a href="#" id="4">
          <span class="material-symbols-outlined">school</span>
          <h3>Totales</h3>
        </a>
        <a href="login/logout.php">
          <span class="material-symbols-outlined">logout</span>
          <h3>Cerrar sesión</h3>
        </a>

      </div>

    </aside>
    <!--fin del Nav -->

    <!--===========MAIN================!-->

    <main>

      <h1>Bienvenido a LARS</h1>
      <div class="date">
        <h3 class="fecha"></h3>
        <h3 class="tiempo"></h3>
      </div>

      <!-- TARJETITAS DE ARRIBAS -->
      <div class="insights">
        <div class="groups">
          <span class="material-symbols-outlined">groups</span>
          <div class="middle">
            <div class="left">
              <h3>GRUPOS ASIGNADOS</h3>
              <h2>10</h2>  
            </div>
          </div>
        </div>


        <div class="students">
            <span class="material-symbols-outlined">badge</span>
            <div class="middle">
              <div class="left">
                <h3>ALUMNOS ASIGNADOS</h3>
                <h2>600</h2>
              </div>
            </div>
          </div>

          <div class="grades">
            <span class="material-symbols-outlined">123</span>
            <div class="middle">
              <div class="left">
                <h3>PARCIAL DE EVALUACION</h3>
                <h2>3°</h2>
              </div>
            </div>
          </div>
      </div>
      <!--Fin de las tarjetitas-->





    </main>


    <div class="right">
      <div class="top">

        <button id="menu-btn">
          <span class="material-symbols-outlined">menu_open</span>
        </button>
        <div class="theme-toggler">
          <span class="material-symbols-outlined active">routine</span>
          <span class="material-symbols-outlined">nights_stay</span>
        </div>
        <div class="profile">
          <div class="info">
            <p>Hola!, <b>Harold</b></p>
            <small class="text-muted">CEO SENK</small>
          </div>
          <div class="profile-photo">
            <img src="img/harold.jpeg">
          </div>
        </div>

      </div>
      <!--Esquina superior derecha teminada-->

      <div class="recent-updates">

        <h2>¡Ultimas actualizaciones!</h2>
        <div class="updates">
          <div class="update">
            <div class="profile-photo">
              <img src="img/4.jpg">
            </div>
            <div class="message">
              <p><b>Senk</b> Esta contratando diseñadoras! Manda tu cv</p>
              <small class="text-muted">Hace 10 horas</small>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>


<?php include "js/jSDashboard.php" ?>


</body>
</html>
