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
    <title>Nominas</title>
    <link rel="shortcut icon" href="img/data-analytics.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles2.css">
    <!--<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">-->
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
                <p class="nombreUsuario">
                    <span class="text-white" id="usuario">
                        <?php if (!empty($user)) : ?>
                            <?= $user['user'];
                            ?>
                        <?php else : ?>
                            Usuario no obtenido
                        <?php endif; ?>
                    </span>
                </p>
                <span class="btn btn-dark btn-sm" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-white" aria-labelledby="dropdownMenuButton1">
                    <li><a href="perfil.php" class=" dropdown-item"><i class="fa-solid fa-user-tie"></i> Perfil</a></li>
                    <li><a href="#" class="dropdown-item"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
                    <li><hr class="dropdown-divider"></li>
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
                    <h5 class="role-text" style="color: white;"><?= $user['rolename'] ?></h5>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="divicion"></div>
            <div class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-users-gear"></i> Administrar usuarios</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i> Gestion de produccion <i class="fa-solid fa-angle-down" id="icon-angle"></i></a></li>
                    <div class="collapse show sub-menu" id="sub-menu">
                        <ul class="menu-lista">
                            <li class="options"><a href="produccion.php" class="links"><i class="fa-solid fa-industry"></i> Producción</a></li>
                            <li class="options"><a href="consumos.php" class="links"><i class="fa-solid fa-cash-register"></i> Consumos</a></li>
                            <li class="options"><a href="#" class="links"><i class="fa-solid fa-dollar-sign"></i> Costos de producción</a></li>
                        </ul>
                    </div>
                    <li class="options"><a href="#" class="links"><i class="fa-solid fa-square-poll-horizontal"></i> Resultados de producción</a></li>
                    <li class="options option-active"><a href="#" class="links"><i class="fa-solid fa-file-invoice-dollar"></i> Nominas</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu2" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle2');"><i class="fa-solid fa-people-group"></i> Empleados <i class="fa-solid fa-angle-down" id="icon-angle2"></i></a></li>
                    <div class="collapse sub-menu" id="sub-menu2">
                        <ul class="menu-lista">
                            <li class="options"><a href="empleados.php" class="links"><i class="fa-solid fa-chart-column"></i> Productividad</a></li>
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
        <div class="bread-crum">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Nomina</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-costos card">
        <div class="card-header">
            <h5 class="titulo-collaps">Sueldos y Salarios</h5>
            <div class="button-remanente-retorno">
                <div class="row g-3 align-items-center contenedor-funciones-nomina">
                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#Upfiles"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                <div>
                    <button type="button" class="btn btn-light btn-sm" onclick="changeicon('pluss');" type="button" data-bs-toggle="collapse" data-bs-target="#tabla-nomina" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-minus" id="pluss"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Upfiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sube tu archivo Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmNewConsumos">
                    <div class="modal-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <Label for="filexcel" class="col-form-label text-white">Load File:</Label>
                            </div>
                            <div class="col-auto">
                                <input type="file" id="filexcel" class="form-control form-control-sm bg-dark text-white" accept="xlsx">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="cantidad" class="col-form-label text-white">Periodo:</label>
                            </div>
                            <div class="col-auto">
                                <input type="date" id="fecha1" class="form-control form-control-sm bg-dark text-white">
                            </div>
                            <div class="col-auto text-white">al</div>
                            <div class="col-auto">
                                <input type="date" id="fecha2" class="form-control form-control-sm bg-dark text-white">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btn-sm">Subir archivo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="collapse show" id="tabla-nomina">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tb-consumos" class="table table-striped tabla-prod-today">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Empleado</th>
                                <th scope="col">Salario</th>
                                <th scope="col">Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="DataTables/datatables.min.js"></script>-->
    <script src="js/script_base.js"></script>
    <script src="js/nomina.js"></script>
</body>

</html>