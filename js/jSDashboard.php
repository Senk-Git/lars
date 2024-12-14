<script>
    //////////LA BARRA DE NAVEGACION ///////////////////////

const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

document.addEventListener('DOMContentLoaded', () => {
    const sidebarLinks = document.querySelectorAll('.sidebar a');

    sidebarLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Remove 'active' class from all links
            sidebarLinks.forEach(item => item.classList.remove('active'));

            // Add 'active' class to the clicked link
            link.classList.add('active');
        });
    });
});

///////////////// CAMBIAR TEMA ////////////////////////

const themeToggler = document.querySelector(".theme-toggler");

// Función para aplicar el tema guardado
function applySavedTheme() {
    const savedTheme = localStorage.getItem('theme');

    if (savedTheme === 'dark') {
        document.body.classList.add('dark-theme-variable');
        themeToggler.querySelector('span:nth-child(1)').classList.add('active');
        themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
    } else {
        document.body.classList.remove('dark-theme-variable');
        themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
        themeToggler.querySelector('span:nth-child(2)').classList.add('active');
    }
}

// Cambiar tema y guardar en localStorage
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variable');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

    // Guardar el estado del tema en localStorage
    if (document.body.classList.contains('dark-theme-variable')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});

// Aplicar el tema guardado al cargar la página
applySavedTheme();

//////////////////// EL RELOG /////////////////////////////

const tiempo = document.querySelector('.tiempo'),
    fecha = document.querySelector('.fecha');

function Reloj() {
    let f = new Date(),
        dia = f.getDate(),
        mes = f.getMonth() + 1, // Los meses son 0-indexados (0 es enero)
        anio = f.getFullYear(),
        diaSemana = f.getDay();

    // Asegurarse de que el día y mes tengan siempre 2 dígitos
    dia = ('0' + dia).slice(-2); 
    mes = ('0' + mes).slice(-2);

    // Obtener la hora en formato 24h
    let timeString = f.toLocaleTimeString();
    tiempo.innerHTML = timeString;

    // Definir los días de la semana en español
    let semana = ['DOMINGO', 'LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO'];
    let showSemana = semana[diaSemana];

    // Mostrar la fecha en el formato correcto: "Día Semana, DD-MM-AAAA"
    fecha.innerHTML = `${showSemana}, ${dia}-${mes}-${anio}`;
}

// Actualizar el reloj y la fecha cada segundo
setInterval(() => {
    Reloj();
}, 1000);

</script>