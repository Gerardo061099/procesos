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
    <link rel="icon" href="img/analytics-laptop-svgrepo-com.svg">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
</head>

<body class="c_principal">
    <nav class="navbar sticky-top navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <h3 class="text-white fs-5">ALUXSA S.A de C.V</h3>
        </div>
        <div class="px-3">
            <div class="dropdown" id="op-user">
                <div>
                    <img src="img/man.png" alt="" class="user-profile">
                </div>
                <p class="nombreUsuario d-none d-sm-block">
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
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="container-perfil">
                    <img src="img/man.png" alt="" class="img-perfil">
                    <h5 class="role-text" style="color: white;"><?= $user['rolename'] ?></h5>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr class="bg-light my-2">
            <div class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-users-gear"></i> Administrar usuarios</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i> Gestion de produccion <i class="fa-solid fa-angle-down" id="icon-angle"></i></a></li>
                    <div class="collapse show sub-menu" id="sub-menu">
                        <ul class="menu-lista">
                            <li class="options"><a href="produccion.php" class="links"><i class="fa-solid fa-industry"></i> Producción</a></li>
                            <li class="options option-active-sub-me"><a href="#" class="links"><i class="fa-solid fa-cash-register"></i> Consumos</a></li>
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
            </div>
            <hr class="bg-light my-2">
            <footer class="footer p-3">
                <div class="container-perfil">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V &reg;</h5>
                </div>
            </footer>
        </div>
        <div class="container-btn-menu">
            <a class="btn btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>
        <div class="bread-crum">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Gestion de producción</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consumos</li>
                </ol>
            </nav>
        </div>
    </div>
    <main class="px-3">
        <div class="card">
            <div class="card-header">
                <h5 class="titulo-collaps">Consumos de Fundicion 1</h5>
                <div class="button-remanente-retorno">
                    <button type="button" class="btn btn-primary btn-sm" id="newConsumo">
                        <i class="fa-solid fa-square-plus"></i>
                    </button>
                    <button type="button" class="btn btn-light btn-sm" onclick="changeicon('pluss');" type="button" data-bs-toggle="collapse" data-bs-target="#consumos" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-minus" id="pluss"></i>
                    </button>
                </div>
            </div>
            <div class="collapse show" id="consumos">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb-consumos" class="table table-striped tabla-prod-today">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="consumosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consumos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="frmNewConsumos">
                        <div class="modal-body row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="concepto" class="col-form-label text-white">Concepto:</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="concepto" class="form-control form-control-sm bg-dark text-white">
                            </div>
                            <div class="col-auto">
                                <label for="cantidad" class="col-form-label text-white">Cantidad:</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="cantidad" class="form-control form-control-sm bg-dark text-white">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <br><br><br><br><br><br><br><br><br><br>
    <footer class="bg-dark p-3 sticky-bottom mt-5">
        <div class="container" >
            <nav class="d-flex justify-content-center ">
                <small class="text-white" >&#174;Todos los derechoz reservados &#169;2024 Aluxsa S.A de C.V </small>
            </nav>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/addConsumos.js"></script>
</body>

</html>