<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    :root{
        --color-primary: #41f1b6;
        --color-danger: #ff7782;
        --color-success: #41f1b6;
        --color-warning: #ffbb55;
        --color-white: #fff;
        --color-info-dark: #7d8da1;
        --color-info-light: #dce1eb;
        --color-dark: #363949;
        --color-light: rgb(132, 139, 200, 0.18);
        --color-primary-variant: #111e88;
        --color-dark-variant: #677483;
        --color-background: #f6f6f9;

        --card-border-radius: 2rem;
        --border-radius-1: 0.4rem;
        --border-radius-2: 0.8rem;
        --border-radius-3: 1.2rem;

        --card-padding: 1.8rem;
        --padding-1: 1.2rem;

        --box-shadow: 0 2rem 3rem var(--color-light);
    }

    *{
        margin: 0;
        padding: 0;
        outline: 0;
        appearance: none;
        border: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }

    html{
        font-size: 14px;
    }

    body{
        width: 100vw;
        height: 100vh;
        font-family: poppins, sans-serif;
        font-size: 0.88rem;
        background: var(--color-background);
        user-select: none;
        overflow: hidden;
    }

    .container{
        display: grid;
        width: 96%;
        margin: 0 auto;
        gap: 1.8rem;
        grid-template-columns: 14rem auto 23rem;
    }

    a{
        color: var(--color-dark);
    }

    img{
        display: block;
        width: 100%;
    }

    h1{
        font-weight: 800;
        font-size: 1.8rem;
    }

    h2{
        font-size: 1.4rem;
    }

    h3{
        font-size: 0.8rem;
    }

    h5{
        font-size: 0.77rem;
    }

    .small{
        font-size: 0.75rem;
    }

    .profile-photo{
        width: 2.8rem;
        height: 2.8rem;
        border-radius: 50%;
        overflow-x: hidden;
    }

    /*Texto tipo pie de página*/
    .text-muted{
        color: var(--color-info-dark);
    }

    p{
        color: var(--color-dark-variant);
    }

    b{
        color: var(--color-dark);
    }

    .primary{
        color: var(--color-primary)
    }

    .danger{
        color: var(--color-danger)
    }

    .success{
        color: var(--color-success)
    }

    .warning{
        color: var(--color-warning)
    }

    aside{
        height: 100vh;
    }

    /* Logo y la X del nav */
    aside .top{
        background: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;
    }

    aside .logo{
        display: flex;
        gap: 0.8rem;
    }

    aside .logo img{
        width: 2rem;
        height: 2rem;
    }

    aside .close{
        display: none;
    }

    /*Todo lo que se despliega, es decir el sidebar */
    aside .sidebar{
        display: flex;
        flex-direction: column;
        height: 86vh;
        position: relative;
        top: 3rem;
    }

    aside h3{
        font-weight: 500;
    }

    aside .sidebar a{
        display: flex;
        color: var(--color-info-dark);
        margin-left: 2rem;
        gap: 1rem;
        align-items: center;
        position: relative;
        height: 3.7rem;
        transition: all 300 ms ease;
    }

    aside .sidebar a span{
        font-size: 1.6rem;
        transition: all 300ms ease;
    }

    aside .sidebar a:last-child{
        position: absolute;
        bottom: 2rem;
        width: 100%;
    }

    aside .sidebar a.active{
        background: var(--color-light);
        color: var(--color-primary);
        margin-left: 0;
    }

    aside .sidebar a.active::before{
        content: "";
        width: 6px;
        height: 100%;
        background: var(--color-primary);
    }

    aside .sidebar a.active span{
        color: var(--color-primary);
        margin-left: calc(1rem - 3px);
    }

    aside .sidebar a:hover{
        color: var(--color-primary);
    }

    aside .sidebar a:hover span{
        margin-left: 1rem;
    }

</style>