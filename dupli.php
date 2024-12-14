
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <?php include "css/stylesDash.php"; ?>
</head>




<body>



<!--Navegador -->
  <div class="container">
    <aside>

      <div class="top">
        <div class="logo">
          <img src="img/lars_limpio.png" alt="">
          <h2>LA<span class="success">RS</span></h2>
        </div>

        <div class="close" id="close-btn">
          <span class="material-symbols-outlined">close</span>
        </div>
      </div>

      <div class="sidebar">

        <a href="#" class="active">
          <span class="material-symbols-outlined">space_dashboard</span>
          <h3>Inicio</h3>
        </a>
        <a href="grupos.php">
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
        <a href="logout.php">
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
