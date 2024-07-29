<script>
    
//////////LA BARRA DE NAVEGACION ///////////////////////

    const sideMenu = document.querySelector("aside");
    const menuBtn = document.querySelector("#menu-btn");
    const closeBtn = document.querySelector("#close-btn");


    menuBtn.addEventListener('click', ()=>{
        sideMenu.style.display= 'block';
    })

    closeBtn.addEventListener('click', ()=>{
        sideMenu.style.display = 'none';
    })

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

    const tiempo= document.querySelector('.tiempo'),
    fecha = document.querySelector('.fecha');

    function Reloj(){
        let f = new Date(),
        dia= f.getDate(),
        mes= f.getMonth()+ 1,
        anio= f.getFullYear(),
        diaSemana= f.getDay();

        dia= ('0'+dia).slice(-2);
        mes= ('0'+mes).slice(-2)

        let timeString =f.toLocaleTimeString();
        tiempo.innerHTML=timeString;

        let semana=['DOMINGO', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'SABADO'];
        let showSemana= (semana[diaSemana])
        fecha.innerHTML= `${showSemana} ${dia}-${mes}-${anio}`
    }

    setInterval( ()=>{
        Reloj()
    }, 1000);


</script>