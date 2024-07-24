
<style>

    :root {
    --color-primary: #41f1b6;
    --color-danger: #ff7782;
    --color-success: #41f1b6;
    --color-warning: #ffbb55;
    --color-white: #fff;
    --color-info-dark: #7d8da1;
    --color-info-light: #dce1eb;
    --color-dark: #363949;
    --color-light: rgba(132, 139, 200, 0.18);
    --color-primary-variant: #111e88;
    --color-dark-variant: #677483;
    --color-background-light: #f6f6f9;
    --color-background-dark: #181a1e;

    --card-border-radius: 2rem;
    --border-radius-1: 0.4rem;
    --border-radius-2: 0.8rem;
    --border-radius-3: 1.2rem;

    --box-shadow: 0 2rem 3rem var(--color-light);
  }

  body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--color-background-light);
    color: var(--color-dark);
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    width: 80%;
    max-width: 600px;
    background-color: var(--color-white);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    padding: var(--card-padding);
    text-align: center;
    margin-top: -70px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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

  .social-container a .fab {
    color: #000;
    font-size: 20px;
    margin: 0 10px;
  }
  body.dark-theme-variable .social-container a .fab {
    color: #fff; /* Color blanco */
  }
  .theme-toggler {
    margin-top: 20px;
    background: var(--color-light);
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 1.6rem;
    width: 4.2rem;
    cursor: pointer;
    border-radius: var(--border-radius-1);
    transition: background-color 0.3s ease;
  }

  .theme-toggler span {
    font-size: 1.2rem;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
  }

  .theme-toggler span.active {
    background: var(--color-primary);
    color: var(--color-white);
    border-radius: var(--border-radius-1);
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

  /* Estilos específicos para el tema oscuro */
  body.dark-theme-variable {
    background-color: var(--color-background-dark);
    color: var(--color-white);
  }

  body.dark-theme-variable .container {
    background-color: #161b24; /* Color oscuro deseado */
    box-shadow: var(--box-shadow);
  }

  body.dark-theme-variable .theme-toggler {
    background: var(--color-dark);
  }

  body.dark-theme-variable .theme-toggler span.active {
    background: var(--color-primary);
    color: var(--color-white);
  }
  body.dark-theme-variable button.btn-primary {
    background-color: var(--color-primary);
    border-color: var(--color-primary); /* opcional: ajustar el color del borde */
    color: #000; 
  }
  button.btn-primary {
    background-color: var(--color-primary);
    color: #000; /* Color negro para el texto */
    border-color: var(--color-primary); /* Opcional: ajustar el color del borde */
  }
</style>