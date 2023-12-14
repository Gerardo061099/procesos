<?php
session_start();
include('php/conexion.php');

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
    $ses_id = $_SESSION['id'];
    $query = mysqli_query($conexion, "SELECT u.nombre AS nombre, u.apellidos AS apellidos, u.user AS user,u.img_perfil AS img_perfil,u.numero_empleado AS numero_empleado ,r.nombre AS rolename FROM $tb_users u INNER JOIN $tb_roles r ON u.id_role = r.id WHERE u.id = $id");
    $result = mysqli_fetch_array($query);

    $user = null;
    if ($result == true) {
        $user = $result;
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="icon" href="img/analytics-laptop-svgrepo-com.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" href="css/stylesBS.css">
</head>

<body class="c_principal">
    <nav class="navbar sticky-top navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <h3 class="text-white fs-5">ALUXSA S.A de C.V</h3>
        </div>
        <div class="px-3">
            <div class="dropdown" id="op-user">
                <div>
                    <img src="<?= $user['img_perfil']; ?>" alt="" class="user-profile rounded-circle">
                </div>
                <p class="nombreUsuario d-none d-sm-block">
                    <span class="text-white" id="usuario">
                        <?php if (!empty($user)) : ?>
                            <?= $user['user'];?>
                        <?php else : ?>
                            Usuario no obtenido     
                        <?php endif; ?>
                    </span>
                </p>
                <span class="btn btn-dark btn-sm" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-white" aria-labelledby="dropdownMenuButton1">
                    <li><a href="#" class="dropdown-item"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="perfil.php" class="dropdown-item">
                            <p class="profile-sm-user">
                            <i class="fa-solid fa-user-tie"></i>
                            <?php if (!empty($user)) : ?>
                                    <?= $user['user'];?>
                                <?php else : ?>
                                    Usuario no obtenido  
                                <?php endif; ?>
                            </p>
                            <p class="profile-md-user">
                                <i class="fa-solid fa-user-tie"></i>
                                Perfil
                            </p>
                        </a>
                    </li>
                    <li><a href="php/close_session.php" class=" dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Cerra sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="container-principal">
        <aside class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <header class="offcanvas-header">
                <div class="container-perfil">
                    <img src="<?= $user['img_perfil']; ?>" alt="" class="img-perfil rounded-circle">
                    <a class="role-text text-white text-decoration-none " href="perfil.php" role="button"><?= $user['rolename'] ?></a>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </header>
            <hr class="bg-light my-2">
            <!-- <div class="divicion"></div> -->
            <section class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options option-active"><a href="#" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-users-gear"></i> Administrar usuarios</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i> Gestion de produccion <i class="fa-solid fa-angle-down" id="icon-angle"></i></a></li>
                    <div class="collapse sub-menu" id="sub-menu">
                        <ul class="menu-lista">
                            <li class="options"><a href="produccion.php" class="links"><i class="fa-solid fa-industry"></i> Producción</a></li>
                            <li class="options"><a href="consumos.php" class="links"><i class="fa-solid fa-cash-register"></i> Consumos</a></li>
                            <li class="options"><a href="#" class="links"><i class="fa-solid fa-dollar-sign"></i> Costos de producción</a></li>
                        </ul>
                    </div>
                    <li class="options"><a href="#" class="links"><i class="fa-solid fa-square-poll-horizontal"></i> Resultados de producción</a></li>
                    <li class="options"><a href="nomina.php" class="links"><i class="fa-solid fa-file-invoice-dollar"></i> Nominas</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu2" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle2');"><i class="fa-solid fa-people-group"></i> Empleados <i class="fa-solid fa-angle-down" id="icon-angle2"></i></a></li>
                    <div class="collapse sub-menu" id="sub-menu2">
                        <ul class="menu-lista">
                            <li class="options"><a href="empleados.php" class="links"><i class="fa-solid fa-chart-column"></i> Productividad</a></li>
                        </ul>
                    </div>
                </ul>
            </section>
            <hr class="bg-light my-2">
            <footer class="footer p-3">
                <div class="container-perfil">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V</h5>
                </div>
            </footer>
        </aside>
        <div class="container-btn-menu">
            <a class="btn btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>
        <div class="text-dash">
            <h4 id="text">Dashboard</h4>
        </div>
    </header>
    <main class="container-fluid p-3 d-xl-block d-xxl-flex">
        <section class="row p-2 w-xxl-75">
            <div class="card border-0 col-12 col-sm-12 col-md-12 col-xl-12 col-xxl-12 p-0">
                <header class="card-header bg-dark text-white header-container-p">
                    <h4 class="title-card">Producción Actual</h4>
                    <div class="plus btn-sm">
                        <button class="btn btn-dark btn-sm" id="boton-c" onclick="changeicon('tbProd');" type="button" data-bs-toggle="collapse" data-bs-target="#tablaProduccion" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-minus" id="tbProd"></i>
                        </button>
                    </div>
                </header>
                <section class="collapse show" id="tablaProduccion">
                    <div class="card-body cuerpo-card">
                        <div class="table-responsive">
                            <table id="tableProduccion" class="table table-striped tabla-prod-today display">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre de operador</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Pieza</th>
                                        <th scope="col">Aceptadas</th>
                                        <th scope="col">Rechazadas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre de operador</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Pieza</th>
                                        <th scope="col">Aceptadas</th>
                                        <th scope="col">Rechazadas</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <aside class="row d-xxl-block gy-3 w-xxl-25 p-2">
            <div class="col-12 col-sm-6 col-md-6 col-xl-4 col-xxl-12">
                <div class="card bg-dark">
                    <div class="card-header cabecera text-white">
                        <h5 class="title-card"><i class="fa-solid fa-chart-pie"></i> Remanente utilizado</h5>
                        <div class="plus">
                            <button class="btn btn-dark btn-sm" id="boton-b" onclick="changeicon('icon1');" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-minus" id="icon1"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse show" id="collapseExample">
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-4 col-xxl-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h5 class="title-card"><i class="fa-solid fa-list-ol"></i> Resumen</h5>
                        <div class="plus ">
                            <button class="btn btn-dark btn-sm" id="boton-c" onclick="changeicon('icon-resumen');" type="button" data-bs-toggle="collapse" data-bs-target="#resumen" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-minus" id="icon-resumen"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse show" id="resumen">
                        <div class="">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start bg-dark text-white">
                                    <div class="ms-2 me-auto text-white">
                                        <div class="fw-bold text-success">Aceptadas:</div>
                                        Piezas aceptadas.
                                    </div>
                                    <span class="badge bg-success rounded-pill" id="stock-accep"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start bg-dark text-white">
                                    <div class="ms-2 me-auto text-white">
                                        <div class="fw-bold text-danger">Rechazadas:</div>
                                        Piezas Rechazadas.
                                    </div>
                                    <span class="badge bg-danger rounded-pill" id="stock-deni"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start bg-dark text-white">
                                    <div class="ms-2 me-auto text-white">
                                        <div class="fw-bold text-info">Total piezas:</div>
                                        Total producidas.
                                    </div>
                                    <span class="badge bg-info rounded-pill" id="stock-total"></span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-4 col-xxl-12">
                <div class="card bg-dark tag-graphis">
                    <div class="card-header text-white">
                        <h5 class="title-card"><i class="fa-solid fa-ranking-star"></i> Ranking de empleados</h5>
                        <div class="plus">
                            <button class="btn btn-dark btn-sm" id="boton-c" onclick="changeicon('icon2');" type="button" data-bs-toggle="collapse" data-bs-target="#tarjeta2" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-minus" id="icon2"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse show" id="tarjeta2">
                        <div class="card-body">
                            <div class="">
                                <canvas id="myChart2" class="text-white"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </main>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="bg-dark p-3 sticky-bottom">
        <div class="container" >
            <nav class="d-flex justify-content-center ">
                <small class="text-white" >&#174;Todos los derechoz reservados &#169;2024 Aluxsa S.A de C.V </small>
            </nav>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="js/contenTablaProduccion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/graficas.js"></script>
</body>
</html>