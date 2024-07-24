<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login  </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      position: relative;
      width: 500px;
      max-width: 900px; /* Ajustado el máximo ancho */
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 93vh; /* Ajustado la altura */
      margin-top: -70px;
    }
    .form-container {
      padding: 40px;
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    img {
      max-width: 100%;
      height: auto;
    }
    .social-container {
      margin: 20px 0;
    }
    .social-container a {
      font-size: 20px;
      margin: 0 10px;
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      transform: translateY(-100%);
      transition: transform 0.6s ease-in-out;
    }
    footer {
      width: 100%;
      height: 6%;
      text-align: center;
      padding: 10px 0;
      background-color: #333;
      color: #fff;
      position: fixed;
      bottom: 0;
      left: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container sign-in-container">
      <img src="img/lars_limpio.png" alt="LARS Logo" class="mb-4">
      <form method="POST" action="login.php">
        <h1 class="mb-4">Inicia sesión</h1>
        <div class="social-container mb-4">
          <a href="https://www.facebook.com/CorpSenk" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fa fa-eye" id="togglePassword"></i>
            </span>
          </div>
        </div>
        <input type="hidden" name="redirect" value="dashboard.php">
        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
      </form>
      
      <a href="registro.php" target="_blank" class="mt-3">¿No tienes usuario? Regístrate</a>
    </div>
  </div>

  <footer>
    <p>@Senk - Todos los derechos reservados &copy; 2024</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
