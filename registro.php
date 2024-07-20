<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Estilos para los inputs */
    input.form-control {
      background-color: rgb(182, 228, 199); 
    
    }
    /* Estilo para el icono */
    .password-toggle-icon {
      cursor: pointer;
      pointer-events: auto;
    }
    input.form-control:focus,
    select.form-control:focus {
      outline: none; 
      box-shadow: none; 
    }
    
    #imagen-esquina {
    position: fixed;
    top: 20px; /* Ajusta la distancia desde el borde superior según tus necesidades */
    right: 20px; /* Ajusta la distancia desde el borde derecho según tus necesidades */
    width: 150px; /* Tamaño inicial para dispositivos más grandes */
    height: auto;
    z-index: 1000; /* Asegura que esté por encima del resto del contenido */
  }

  @media (max-width: 768px) {
    /* Estilos para dispositivos móviles y tablets */
    #imagen-esquina {
      width: 100px; /* Tamaño más grande para dispositivos móviles */
      top: 50px; /* Ajusta la distancia desde el borde superior para dispositivos móviles */
      right: 20px; /* Ajusta la distancia desde el borde derecho para dispositivos móviles */
    }
  }

  </style>
</head>
<body>
<img src="img/lars_limpio.png" alt="Imagen de ejemplo" id="imagen-esquina">
<br><br>
<div class="container">
    <h1>Registro de Usuario</h1>

    <form method="POST" action="registro_procesar.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group col-md-6">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email">Correo Electrónico</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group col-md-6">
          <label for="escuela">Escuela</label>
          <input type="text" class="form-control" id="escuela" name="escuela" required>
        </div>
      </div>
      <div class="form-group">
        <label for="turno">Turno</label>
        <select class="form-control" id="turno" name="turno" required>
          <option value="">Seleccionar turno</option>
          <option value="Mañana">Mañana</option>
          <option value="Tarde">Tarde</option>
          <option value="Noche">Noche</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="input-group-append">
            <span class="input-group-text password-toggle-icon" onclick="togglePasswordVisibility()">
              <i class="fas fa-eye"></i>
            </span>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>

</body>
</html>

  <!-- Script para manejar la visibilidad de la contraseña -->
  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById('password');
      var icon = document.querySelector('.password-toggle-icon i');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>
