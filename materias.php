<!DOCTYPE html>
      <html lang="es">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Enlace a la fuente de Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
        <title>Grupos Asignados</title>

        <?php include "css/stylesDash.php"; ?>
        <style>
.container-scroll {
      width: 100%;
      height: 90vh; /* Altura fija de la caja */
      overflow-y: auto; /* Permite el desplazamiento vertical */
      padding: 10px;
      border: 2px solid #ddd;
      background-color: #fff;
      border-radius: 8px;
    }
.card-container {
  display: flex;
  flex-direction: column; /* Esto sigue alineando las tarjetas en una columna */
  gap: 15px; /* Espacio entre las tarjetas */
  width: 100%; /* El contenedor ocupa todo el ancho disponible */
  max-width: 100%; /* Asegura que no se desborde */
  height: 100vh; /* Contenedor ocupa toda la altura de la ventana */
  justify-content: flex-start; /* Alinea las tarjetas hacia la parte superior */
}

.card {
  background: #fff;
  border-radius: 10px;
  flex-grow: 1; /* Permite que las tarjetas crezcan en el espacio disponible */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  color: #333;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s ease; /* Animación al hacer hover */
  width: auto; /* El ancho de las tarjetas es flexible */
  margin-bottom: 40px; /* Espacio entre cada card */
}

.card:hover {
  transform: scale(1.05); /* Ligeramente más grande al pasar el mouse */
}

.card-img-top {
  width: 100%; /* La imagen ocupa todo el ancho */
  max-height: 100px; /* Limita la altura de la imagen */
  object-fit: cover; /* Mantiene la imagen bien ajustada */
}

.card-body {
  padding: 15px;
}

.card-title {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 10px;
}

.card-text {
  font-size: 14px;
  color: #555;
}

.card-footer {
  font-size: 12px;
  color: #888;
}


.btn-primary {
  background: linear-gradient(90deg, #007bff, #0056b3);
  color: white;
}

.btn-primary:hover {
  background: linear-gradient(90deg, #0056b3, #003f7f);
  transform: scale(1.05);
}

.btn-success {
  background: linear-gradient(90deg, #28a745, #218838);
  color: white;
}

.btn-success:hover {
  background: linear-gradient(90deg, #218838, #1e7e34);
  transform: scale(1.05);
}

.text-muted {
  font-size: 0.85rem;
  color: #888;
}

/* Espaciado entre las tarjetas */
.mb-3 {
  margin-bottom: 1.5rem;
}

/* Responsividad */
@media (max-width: 768px) {
  .insights {
    flex-direction: column;
  }

  .card {
    width: 100%;
  }
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
      /* Estilos para el botón general */
      .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 8px;
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease; /* Animación  */
        cursor: pointer;
        margin: 0.5rem; 
      }
      /* Botón de Pasar Lista (Primario) */
      .btn-primary {
        color: #fff;
        background: linear-gradient(90deg, #007bff, #0056b3); /* Degradado moderno */
        box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
      }

      .btn-primary:hover {
        background: linear-gradient(90deg, #0056b3, #003f7f);
        transform: scale(1.05); /* Ligeramente más grande al pasar el mouse */
        box-shadow: 0 6px 8px rgba(0, 123, 255, 0.5);
      }

      /* Botón de Registrar Actividades (Secundario) */
      .btn-success {
        color: #fff;
        background: linear-gradient(90deg, #28a745, #218838);
        box-shadow: 0 4px 6px rgba(40, 167, 69, 0.3);
      }

      .btn-success:hover {
        background: linear-gradient(90deg, #218838, #1e7e34);
        transform: scale(1.05);
        box-shadow: 0 6px 8px rgba(40, 167, 69, 0.5);
      }

      .btn i {
        margin-right: 8px;
        font-size: 1.2rem;
      }

      .btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
      }

      /* Tamaño grande (para botones principales) */
      .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.25rem;
        border-radius: 10px;
      }
      #attendance-modal {
                  display: none;
                  position: fixed;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  width: 70%;
                  background: white;
                  border-radius: 8px;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                  padding: 20px;
              }
              #attendance-modal.active {
                  display: block;
              }
              .attendance-icon {
                  cursor: pointer;
                  font-size: 1.5em;
              }
              .icon-success {
                  color: green;
              }
              .icon-fail {
                  color: red;
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
              <a href="grupos.php" >
                <span class="material-symbols-outlined">group</span>
                <h3>Grupos</h3>
              </a>
              <a href="materias.php" class="active">
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

  
  <div class="container-scroll">
    <!-- Card 1 -->
    <div class="card">
      <img class="card-img-top" src="img/fondo.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">1DSM1</h5>
        <h5 class="card-title">PENSAMIENTO CACHONDO</h5>
        <h5 class="card-title">MAYITO JOTO</h5>
        <p class="card-text">Alumnos: 30</p>
        <p class="card-text"><small class="text-muted">Última actualización hace 5 mins</small></p>
        <div class="mt-3">
          <button class="btn btn-secondary">1ER PARCIAL</button>
          <button class="btn btn-secondary">2DO PARCIAL</button>
          <button class="btn btn-secondary">3ER PARCIAL</button>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img class="card-img-top" src="img/image.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">2DSM1</h5>
        <h5 class="card-title">ANÁLISIS CRÍTICO</h5>
        <h5 class="card-title">JUANITO CORTES</h5>
        <p class="card-text">Alumnos: 28</p>
        <p class="card-text"><small class="text-muted">Última actualización hace 10 mins</small></p>
        <div class="mt-3">
          <button class="btn btn-secondary">1ER PARCIAL</button>
          <button class="btn btn-secondary">1ER PARCIAL</button>
          <button class="btn btn-secondary">1ER PARCIAL</button>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <img class="card-img-top" src="" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">3DSM1</h5>
        <h5 class="card-title">DESARROLLO HUMANO</h5>
        <h5 class="card-title">ALBERTO RIVERA</h5>
        <p class="card-text">Alumnos: 35</p>
        <p class="card-text"><small class="text-muted">Última actualización hace 15 mins</small></p>
        <div class="mt-3">
          <button class="btn btn-secondary">1ER PARCIAL</button>
          <button class="btn btn-secondary">1ER PARCIAL</button>
          <button class="btn btn-secondary">1ER PARCIAL</button>
        </div>
      </div>
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
document.addEventListener('DOMContentLoaded', () => {
    const openModalButton = document.getElementById('open-modal');
    const closeModalButton = document.getElementById('close-modal');
    const attendanceModal = document.getElementById('attendance-modal');
    const studentList = document.getElementById('student-list');
    const submitAttendanceButton = document.getElementById('submit-attendance');
    const attendanceData = {};

    const openModal = () => {
        attendanceModal.style.display = 'block';

        fetch('test_alumnos.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ groupId: '1DSM1' })
        })
        .then(response => response.text()) // Usar text() para inspección
        .then(data => {
            console.log('Respuesta del servidor (texto sin procesar):', data);
            try {
                const parsedData = JSON.parse(data); // Intentar convertir la respuesta a JSON
                console.log('Datos procesados de test_alumnos.php:', parsedData);
                studentList.innerHTML = '';

                if (parsedData.status === 'success' && parsedData.students.length > 0) {
                    parsedData.students.forEach(student => {
                        attendanceData[student.id] = { present: false, absent: false, late: false, justified: false };
                        const row = `
                            <tr>
                                <td>${student.id}</td>
                                <td>${student.nombre}</td>
                                <td>${student.apellido}</td>
                                <td><button class="btn-present" data-id="${student.id}">✅</button></td>
                                <td><button class="btn-absent" data-id="${student.id}">❌</button></td>
                                <td><button class="btn-late" data-id="${student.id}">⏳</button></td>
                                <td><button class="btn-justified" data-id="${student.id}">📝</button></td>
                            </tr>
                        `;
                        studentList.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    studentList.innerHTML = '<tr><td colspan="7">No hay estudiantes registrados en este grupo.</td></tr>';
                }
            } catch (error) {
                console.error('Error al analizar JSON:', error);
                studentList.innerHTML = '<tr><td colspan="7">Error al cargar la lista de estudiantes. Inténtelo más tarde.</td></tr>';
            }
        })
        .catch(error => {
            console.error('Error al cargar la lista de estudiantes:', error);
            studentList.innerHTML = '<tr><td colspan="7">Error al cargar la lista de estudiantes. Inténtelo más tarde.</td></tr>';
        });
    };

    studentList.addEventListener('click', (event) => {
        const target = event.target;
        if (target.tagName === 'BUTTON') {
            const id = target.getAttribute('data-id');
            if (id) {
                if (target.classList.contains('btn-present')) {
                    attendanceData[id] = { present: true, absent: false, late: false, justified: false };
                } else if (target.classList.contains('btn-absent')) {
                    attendanceData[id] = { present: false, absent: true, late: false, justified: false };
                } else if (target.classList.contains('btn-late')) {
                    attendanceData[id] = { present: false, absent: false, late: true, justified: false };
                } else if (target.classList.contains('btn-justified')) {
                    attendanceData[id] = { present: false, absent: false, late: false, justified: true };
                }

                target.closest('tr').querySelectorAll('button').forEach(btn => btn.classList.remove('active'));
                target.classList.add('active');
            }
        }
    });

    submitAttendanceButton.addEventListener('click', () => {
        console.log('Enviando los siguientes datos al servidor:', attendanceData);

        fetch('guardar_asistencia.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(attendanceData)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta del servidor:', data);
            if (data.success) {
                alert('Asistencia guardada exitosamente.');
                attendanceModal.style.display = 'none';
            } else {
                alert(`Hubo un error al guardar la asistencia: ${data.error}`);
            }
        })
        .catch(error => {
            console.error('Error de conexión con el servidor:', error);
            alert('Error de conexión con el servidor.');
        });
    });

    openModalButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', () => (attendanceModal.style.display = 'none'));
});



      </script>

      </body>
      </html>
