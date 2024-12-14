
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
  <title>Grupos Asignados</title>

  <?php include "css/stylesDash.php"; ?>
  <style>
    .insights {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    .card {
      background: #2c2f33;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      color: #333;
      flex: 1 0 300px;
      max-width: 300px;
      margin: 10px;
      position: relative; /* New for modal positioning */
    }

    .card h2 {
      font-size: 20px;
      margin: 15px 0;
    }

    .card p {
      font-size: 16px;
    }

    .card .material-symbols-outlined {
      font-size: 40px;
      margin-bottom: 10px;
      color: #555;
    }

    /* Modal Styles */
    .modal {
      display: none; /* Initially hidden */
      position: fixed; /* Stays in place when scrolling */
      z-index: 1; /* Sits on top of other content */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scrolling if modal content overflows */
      background-color: rgba(0, 0, 0, 0.4); /* Transparent background */
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto; /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Modal content width */
    }

    .close { /* Style for close button within modal */
      color: #fff;
      float: right;
      font-size: 36px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus { /* Hover and focus effects */
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    table {
  width: 100%;
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #ddd;
}

th, td {
  padding: 10px;
  text-align: center;
}

input[type="checkbox"] {
  transform: scale(1.2);
}

    </style>
    
</head>
<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <img src="img/lars_limpio.png" alt="">
          <h2>LA<span class="primary">RS</span></h2>
        </div>

        <div class="close" id="close-btn">
          <span class="material-symbols-outlined">close</span>
        </div>
      </div>

      <div class="sidebar">
        <a href="dashboard.php">
          <span class="material-symbols-outlined">space_dashboard</span>
          <h3>Inicio</h3>
        </a>
        <a href="#" class="active">
          <span class="material-symbols-outlined">group</span>
          <h3>Grupos</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">collections_bookmark</span>
          <h3>Materias</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">school</span>
          <h3>Totales</h3>
        </a>
        <a href="login/logout.php">
          <span class="material-symbols-outlined">logout</span>
          <h3>Cerrar sesión</h3>
        </a>
      </div>
    </aside>

    <main>
      <h1>Grupos Asignados</h1>

      <div class="date">
        <h3 class="fecha"></h3>
        <h3 class="tiempo"></h3>
      </div>

      <div class="insights">
      <div class="card">
  <span class="material-symbols-outlined">group</span>
  <h2>1DSM1</h2>
  <p>Alumnos: 30</p>
  
  <!-- Botón mejorado con Bootstrap -->
  <button class="btn btn-primary btn-lg show-attendance-btn" data-group="1DSM1" data-bs-toggle="modal" data-bs-target="#attendance-modal">
    <i class="material-icons">check_circle</i> Pasar lista
  </button>
</div>




<!-- Modal para mostrar lista de alumnos -->
<div id="attendance-modal" class="modal">
  <div class="modal-content">
    <span class="close" id="close-modal">&times;</span>
    <h2>Lista de Alumnos</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>apellido</th>
          <th>Asistencia</th>
        </tr>
      </thead>
      <tbody id="student-list">
        <!-- Aquí se cargarán los alumnos dinámicamente -->
      </tbody>
    </table>
  </div>
</div>




        <div class="card">
          <span class="material-symbols-outlined">group</span>
          <h2>2DSM2</h2>
          <p>Alumnos: 25</p>
        </div>
        <div class="card">
          <span class="material-symbols-outlined">group</span>
          <h2>3DSM3</h2>
          <p>Alumnos: 28</p>
        </div>
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

  <?php include "js/jSDashboard.php"; ?>


  <script>
  document.querySelectorAll('.show-attendance-btn').forEach(button => {
    button.addEventListener('click', function() {
      const group = this.dataset.group;

      // Realiza una petición AJAX al servidor
      fetch(`fetch_students.php?group=${group}`)
        .then(response => response.json())
        .then(data => {
          const tableBody = document.getElementById('student-list');
          tableBody.innerHTML = '';

          data.forEach(student => {
            tableBody.innerHTML += `
              <tr>
                <td>${student.id_alumno}</td>
                <td>${student.nombre}</td>
                <td>${student.apellido}</td>
                <td>
                  <input type="checkbox" name="attendance[]" value="${student.id}">
                </td>
              </tr>
            `;
          });
          document.getElementById('attendance-modal').style.display = 'block';
        });
    });
  });

  // Cierra el modal
  document.getElementById('close-modal').onclick = function() {
    document.getElementById('attendance-modal').style.display = 'none';
  };
</script>

</body>
</html>
