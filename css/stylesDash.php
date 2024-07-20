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


    .dark-theme-variable{
        --color-white: #202528;
        --color-dark: #edeffd;
        --color-light: rgb(0, 0, 0, 0.4);
        --color-dark-variant: #a3bdcc;
        --color-background: #181a1e;
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
        color: var(--color-dark);
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

    small{
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

    /*==================MAIN===================*/
    main{
        margin-top: 1.4rem;
    }

    main .date{
        display: inline-block;
        background: var(--color-light);
        border-radius: var(--border-radius-1);
        margin-top: 1rem;
        padding: 0.5rem 1.6rem;
    }

    main .date input[type="date"]{
        background: transparent;
        color: var(--color-dark);
    }

    main .insights{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.6rem;
    }

    main .insights > div{
        background: var(--color-white);
        padding: var(--card-padding);
        border-radius: var(--card-border-radius);
        margin-top: 1rem;
        box-shadow: var(--box-shadow);
        transition: all 300ms ease;
    }

    main .insights > div:hover{
        box-shadow: none;

    }

    main .insights > div span{
        background-color: var(--color-primary);
        padding: 0.5rem;
        border-radius: 50%;
        color: var(--color-white);
        font-size: 2rem;
    }

    main .insights > div.students span{
        background-color: var(--color-warning);
    }

    main .insights > div.grades span{
        background-color: var(--color-danger);
    }

    main .insights > div .middle{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    main .insights h3{
        margin: 1rem 0 0.6rem;
        font-size: 1rem;
    }

    /* ==========Derecha Superior =========== */
    .right{
        margin-top: 1.4rem;
    }

    .right .top{
        display: flex;
        justify-content: end;
        gap: 2rem;
    }

    .right .top button{
        display: none;
    }

    .right .theme-toggler{
        background: var(--color-light);
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 1.6rem;
        width: 4.2rem;
        cursor: pointer;
        border-radius: var(--border-radius-1);
    }

    .right .theme-toggler span{
        font-size: 1.2rem;
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .right .theme-toggler span.active{
        background: var(--color-primary);
        color: white;
        border-radius: var(--border-radius-1);
    }

    .right .top .profile{
        display: flex;
        gap: 2rem;
        text-align: right;
    }

    /* ==========UPTADES ========== */

    .right .recent-updates{
        margin-top: 1rem;
    }

    .right .recent-updates h2{
        margin-bottom: 0.8rem;
    }

    .right .recent-updates .updates{
        background: var(--color-white);
        padding: var(--card-padding);
        border-radius: var(--card-border-radius);
        box-shadow: var(--box-shadow);
        transition: all 300ms ease;
    }

    .right .recent-updates .updates:hover{
        box-shadow: none;
    }

    .right .recent-updates .updates .update{
        display: grid;
        grid-template-columns: 2.6rem auto;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    /*========== MEDIA QUERIESSSS O RESPONSIVO PA LOS COMPAS */
    @media screen and (max-width:1200px) {
        .container{
            width: 94%;
            grid-template-columns: 7rem auto 23rem;
        }

        aside .logo h2{
            display: none;
        }

        aside .sidebar h3{
            display: none;
        }

        aside .sidebar a{
            width: 5.6rem;
        }
        
        aside .sidebar a:last-child{
            position: relative;
            margin-top: 1.8rem;
        }

        main .insights{
            grid-template-columns: 1fr;
            gap: 0;
        }
    }

    /*====MEDIA QUERIES PARA MOBILE*/

    @media screen and (max-width: 768px) {
        .container{
            width: 100%;
            grid-template-columns: 1fr;
        }

        aside{
            position: fixed;
            left: -100%;
            background: var(--color-white);
            width: 18rem;
            z-index: 3;
            box-shadow: 1rem 3rem 4rem var(--color-light);
            height: 100vh;
            padding-left: var(--card-padding);
            display: none;
            animation: showMenu 400ms ease forwards;
        }

        @keyframes showMenu{
            to{
                left:0;
            }
        }

        aside .logo{
            margin-left: 1rem;
        }

        aside .logo h2{
            display: inline;
        }

        aside .sidebar h3{
            display: inline;
        }

        aside .sidebar a{
            width: 100%;
            height: 3.4rem;
        }

        aside .sidebar a:last-child{
            position: absolute;
            bottom: 5rem;
        }

        aside .close{
            display: inline-block;
            cursor: pointer;
        }

        main{
            margin-top: 8rem;
            padding: 0 1rem;
        }

        .right{
            width: 94%;
            margin: 0 auto 4rem;
        }

        .right .top{
            position: fixed;
            top: 0;
            left: 0;
            align-items: center;
            padding: 0 0.8rem;
            height: 4.6rem;
            background: var(--color-white);
            width: 100%;
            margin: 0;
            z-index: 2;
            box-shadow: 0 1rem 1rem var(--color-light);
        }

        .right .top .theme-toggler{
            width: 4.4rem;
            position: absolute;
            left: 66%;
        }

        .right .profile .info{
            display: none;
        }

        .right .top button{
            display: inline-block;
            background: transparent;
            cursor: pointer;
            color: var(--color-danger);
            position: absolute;
            left: 1rem;
        }

        .right .top button span{
            font-size: 2rem;
        }
    }

</style>