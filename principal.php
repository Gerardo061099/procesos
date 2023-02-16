<?php
    include("php/open_session.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="c_principal">
<?php
    include("php/verify_session.php");
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" id="container-op-titulo">
        <h3 class="titulo-principal">ALUXSA S.A de C.V</h3>
    </div>
    <div class="op-usuario">
        <div class="dropdown" id="op-user">
            <div>
                <img src="img/man.png" alt="" class="user-profile">
            </div>
            <p class="nombreUsuario"><span class="text-white" id="usuario"></span></p>
            <span class="btn btn-dark btn-sm" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </span>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-white" aria-labelledby="dropdownMenuButton1">
                <li><a href="perfil.php" class=" dropdown-item"><i class="fa-solid fa-user-tie"></i> Perfil</a></li>
                <li><a href="#" class="dropdown-item"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
                <li><a href="php/close_session.php" class=" dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Cerra sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-principal">
    <div class="container-btn-menu">
        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </a>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V &reg;</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="divicion"></div>
        <div class="offcanvas-body">
            <ul class="menu-lista">
                <li class="options option-active"><a href="#" class="links"><i class="fa-solid fa-house"></i>  Inicio</a></li>
                <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-users-gear"></i>  Administrar usuarios</a></li>
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
    <div class="text-dash">
        <h4 id="text">Dashboard</h4>
    </div>
</div>
<div class="container-p">
    <ol class="list-group list-group-numbered">
        <center><h4>Producción kg</h4></center>
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Aceptadas:</div>
                Piezas aceptadas.
            </div>
            <span class="badge bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-light">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Rechazadas:</div>
                Piezas Rechazadas.
            </div>
            <span class="badge bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kg Aceptados:</div>
                Peso en kg Aceptados.
            </div>
            <span class="badge bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-light">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kg Rechazados:</div>
                Peso en kg Rechazados.
            </div>
            <span class="badge bg-primary rounded-pill">14</span>
        </li>
    </ol>
    <div class="container-p-b">
        <div class="card">
            <div class="card-header bg-dark text-white header-container-p">
                <h4 class="title-card">Producción Actual</h4>
                <div class="plus btn-sm">
                    <button class="btn btn-dark btn-sm" id="boton-c" onclick="changeicon('tbProd');" type="button" data-bs-toggle="collapse" data-bs-target="#tablaProduccion" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-minus" id="tbProd"></i>
                    </button>
                </div>
            </div>
            <div class="collapse show" id="tablaProduccion">
                <div class="card-body cuerpo-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Operador</th>
                                    <th scope="col">Pieza</th>
                                    <th scope="col">Aceptadas</th>
                                    <th scope="col">Rechazadas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Larry</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Larry</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card dinamico -->
<div class="container-rem">
    <div class="container2">
        <div class="card">
            <div class="card-header cabecera text-white bg-primary">
                <h5 class="title-card"><i class="fa-solid fa-chart-pie"></i> Remanente utilizado</h5>
                <div class="plus btn-sm">
                    <button class="btn btn-primary btn-sm" id="boton-b" onclick="changeicon('icon1');" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-minus" id="icon1"></i>
                    </button>
                </div>
            </div>
            <div class="collapse show" id="collapseExample">
                <div class="card-body">
                    <div class="chart-container" style="display: flex; justify-content: center; width:386px; height:280px">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container2-consumos">
        <div class="card text-white bg-success">
            <div class="card-header">
                <h5 class="title-card">Consumos</h5>
                <div class="plus btn-sm">
                    <button class="btn btn-success btn-sm" id="boton-c" onclick="changeicon('icon2');" type="button" data-bs-toggle="collapse" data-bs-target="#tarjeta2" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-minus" id="icon2"></i>
                    </button>
                </div>
            </div>
            <div class="collapse show" id="tarjeta2">
                <div class="card-body">
                    <h5 class="card-title">Material Utilizado</h5>
                        <form action="" class="row">
                            <div class="col-md-3">
                                <label for="">Combustible:</label>
                                <input class="form-control" type="text" name="" value="" id="placa" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="">Silisio:</label>
                                <input class="form-control" type="text" name="" value="" id="coladas" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="">Franelas:</label>
                                <input class="form-control" type="number" name="" value="" id="gota" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="">Fundente:</label>
                                <input class="form-control" type="text" name="" value="" id="pza_rechazada" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="">G. Carnaza:</label>
                                <input class="form-control" type="text" name="" value="" id="pza_rechazada" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="">Clavos:</label>
                                <input class="form-control" type="text" name="" value="" id="pza_rechazada" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="">Separador:</label>
                                <input class="form-control" type="text" name="" value="" id="pza_rechazada" disabled>
                            </div>
                            <div class="col-md-5">
                                <label for="">G. Calcetín:</label>
                                <input class="form-control" type="url" name="" value="" id="pza_rechazada" >
                            </div>
                        </form>
                </div>
                <div class="card-footer text-white" id="time2"></div>
            </div>
        </div>
    </div>
</div>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/LocalStorage.js"></script>
    <script src="js/script_user.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/graficas.js"></script>
</body>
</html>