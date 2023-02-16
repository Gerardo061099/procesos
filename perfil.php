<?php
    include("php/open_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="c_principal">
<?php
    include("php/verify_session.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" id="container-op-titulo">
        <h3 class="titulo-principal">Producciones</h3>
    </div>
    <div class="op-usuario">
        <div class="dropdown" id="op-user">
            <img src="img/man.png" alt="" class="user-profile">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="settings"><a href="principal.php" class="texto-li"><img src="img/home.png" alt="" class="img-menu"> Inicio</a></li>
                <li class="settings"><a href="#" class="texto-li"><img src="img/gear.png" alt="" class="img-menu"> Configuracion</a></li>
                <li class="sesion-close"><a href="php/close_session.php" class="texto-li"><img src="img/log-out.png" alt="" class="img-menu"> Cerra sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-btn-menu">
    <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="fa-solid fa-bars"></i>
    </a>
</div>
<div>
    <img src="img/man.png" alt="" class="profile-picture">
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" >
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="divicion"></div>
    <div class="offcanvas-body">
    <ul class="menu-lista">
                <li class="options option-active"><a href="#" class="links"><i class="fa-solid fa-house"></i>  Inicio</a></li>
                <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-user"></i>  Administrar usuarios</a></li>
                <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i>  Gestion de produccion  <i class="fa-solid fa-angle-down" id="icon-angle"></i></a></li>
                    <div class="collapse sub-menu" id="sub-menu">
                        <ul class="menu-lista">
                            <li class="options"><a href="produccion.php" class="links"><i class="fa-solid fa-industry"></i>  Producción</a></li>
                            <li class="options"><a href="#" class="links"><i class="fa-solid fa-cash-register"></i>  Consumos</a></li>
                            <li class="options"><a href="#" class="links"><i class="fa-regular fa-money-bill-1"></i>  Costos de producción</a></li>
                        </ul>
                    </div>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-square-poll-horizontal"></i>  Resultados de producción</a></li>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-file-invoice-dollar"></i>  Nominas</a></li>
                <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu2" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle2');"><i class="fa-solid fa-people-group"></i>  Empleados  <i class="fa-solid fa-angle-down" id="icon-angle2"></i></a></li>
                <div class="collapse sub-menu" id="sub-menu2">
                    <ul class="menu-lista"> 
                        <li class="options"><a href="#" class="links"><i class="fa-solid fa-chart-column"></i>   Productividad</a></li>
                    </ul>
                </div>
            </ul>
    </div>
    <footer class="footer">
        <div class="container-perfil">
            <img src="img/user.png" alt="" class="img-perfil">
            <h5 style="color: white;">Perfil</h5>
        </div>
    </footer>
</div>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/script_user.js"></script>
</body>
</html>