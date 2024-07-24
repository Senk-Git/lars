<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
  <?php include "css/stylesindex.php"; ?>
</head>

<body>
  <div class="container">

    <div class="theme-toggler">
      <span class="material-symbols-outlined active">routine</span>
      <span class="material-symbols-outlined">nights_stay</span>
    </div>
    <div class="form-container sign-in-container">
      <img src="img/lars_limpio.png" alt="LARS Logo" class="mb-4">
      <form method="POST" action="login/login.php">
        <h1 class="mb-4">Inicia sesión</h1>
        <div class="social-container mb-4">
          <a href="https://www.facebook.com/CorpSenk" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/los_senk/" class="social"><i class="fab fa-instagram"></i></a>
          <a href="https://wa.me/5574063108" class="social"><i class="fab fa-whatsapp"></i></a>
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

    togglePassword.addEventListener('click', function(e) {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
    const themeToggler = document.querySelector('.theme-toggler');
    themeToggler.addEventListener('click', () => {
      document.body.classList.toggle('dark-theme-variable');
      themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
      themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
    });
  </script>

</body>

</html>