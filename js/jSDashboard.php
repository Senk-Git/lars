<script>
    
    const sideMenu = document.querySelector("aside");
    const menuBtn = document.querySelector("#menu-btn");
    const closeBtn = document.querySelector("#close-btn");
    const themeToggler = document.querySelector(".theme-toggler");

    menuBtn.addEventListener('click', ()=>{
        sideMenu.style.display= 'block';
    })

    closeBtn.addEventListener('click', ()=>{
        sideMenu.style.display = 'none';
    })

    //Cambiar tema
    themeToggler.addEventListener('click', () =>{
        document.body.classList.toggle('dark-theme-variable');

        themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
        themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
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


</script>