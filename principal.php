<?php
session_start();
include('php/conexion.php');

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
    $ses_id = $_SESSION['id'];
    $query = mysqli_query($conexion, "SELECT u.user AS user, r.nombre AS rolename FROM $tb_users u INNER JOIN $tb_roles r ON u.id_role = r.id WHERE u.id = $id");
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
    <link rel="shortcut icon" href="img/data-analytics.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
</head>

<body class="c_principal">
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" id="container-op-titulo">
            <h3 class="titulo-principal">ALUXSA S.A de C.V</h3>
        </div>
        <div class="op-usuario">
            <div class="dropdown" id="op-user">
                <div>
                    <img src="img/man.png" alt="" class="user-profile">
                </div>
                <p class="nombreUsuario"><span class="text-white" id="usuario">
                        <?php if (!empty($user)) : ?>
                            <?= $user['user'];
                            ?>
                        <?php else : ?>
                            Usuario no obtenido
                        <?php endif; ?>
                    </span></p>
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
                <div class="container-perfil">
                    <img src="img/man.png" alt="" class="img-perfil">
                    <h6 class="role-text" style="color: white;"><?= $user['rolename'] ?></h6>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="divicion"></div>
            <div class="offcanvas-body">
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
                            <li class="options"><a href="#" class="links"><i class="fa-solid fa-chart-column"></i> Productividad</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
            <footer class="footer">
                <div class="container-perfil">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V &reg;</h5>
                </div>
            </footer>
        </div>
        <div class="text-dash">
            <h4 id="text">Dashboard</h4>
        </div>
    </div>
    <main class="container-p">
        <section class="container-p-b">
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
                            <table id="tableProduccion" class="table table-striped tabla-prod-today">
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
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen-sm-down">
                        <div class="modal-content">
                            <div class="modal-header bg-dark" id="header-modal-add-user">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pencil"></i> Editar registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" id="frm-editProd">
                                    <div id="alerta"></div>
                                    <div class="col-md-4">
                                        <label for="id">Id</label>
                                        <input type="text" class="form-control" id="id" disabled>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre">
                                    </div>
                                    <div class="col-md-7">
                                        <label for="apellidos">Apellidos:</label>
                                        <input type="text" class="form-control" id="apellidos">
                                    </div>
                                    <div class="col-md-5" id="show-item1">
                                        <label for="pieza">Pieza:</label>
                                        <input type="text" class="form-control" id="pieza">
                                    </div>
                                    <div class="col-md-6" id="show-item2">
                                        <label for="aceptadas">Aceptadas:</label>
                                        <input type="numbre" class="form-control" id="aceptadas" min="1">
                                    </div>
                                    <div class="col-md-6" id="show-item2">
                                        <label for="rechazadas">Rechazadas:</label>
                                        <input type="numbre" class="form-control" id="rechazadas" min="1">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success btn-sm" id="show-item3">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <aside class="container-rem">
            <div class="container2">
                <div class="card bg-dark">
                    <div class="card-header cabecera text-white">
                        <h5 class="title-card"><i class="fa-solid fa-chart-pie"></i> Remanente utilizado</h5>
                        <div class="plus btn-sm">
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
            <div class="container-p-a">
                <div class="card bg-dark text-white">
                    <div class="card-header header-container-p">
                        <h5 class="title-card"><i class="fa-solid fa-list-ol"></i> Resumen</h5>
                        <div class="plus btn-sm">
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
            <div class="container2-consumos">
                <div class="card bg-dark tag-graphis">
                    <div class="card-header text-white">
                        <h5 class="title-card"><i class="fa-solid fa-ranking-star"></i> Ranking de empleados</h5>
                        <div class="plus btn-sm">
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


    <footer></footer>
    <!-- Card dinamico -->
    

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="js/contenTablaProduccion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/graficas.js"></script>
</body>

</html>