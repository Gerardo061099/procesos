<?php
session_start();
include('php/conexion.php');

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
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
    <title>Gestion de la produccion</title>
    <link rel="shortcut icon" href="img/analytics-laptop-svgrepo-com.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
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
                <p class="nombreUsuario d-none d-sm-block"><span class="text-white" id="usuario">
                        <?php if (!empty($user)) : ?>
                            <?= $user['user'];
                            ?>
                        <?php else : ?>
                            Usuario no obtenido
                        <?php endif; ?>
                    </span></p>
                <span class="btn btn-dark btn-sm" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical fa-bounce"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-white" aria-labelledby="dropdownMenuButton1">
                    <li><a href="#" class="dropdown-item"><i class="fa-solid fa-gear"></i> Configuracion</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="perfil.php" class=" dropdown-item"><i class="fa-solid fa-user-tie"></i> Perfil</a></li>
                    <li><a href="php/close_session.php" class=" dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Cerra sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="container-principal">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="container-perfil">
                    <img src="img/man.png" alt="" class="img-perfil">
                    <h6 class="role-text" style="color: white;"><?= $user['rolename'] ?></h6>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr class="bg-light my-2" >
            <div class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-users-gear"></i> Administrar usuarios</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i> Gestion de produccion <i class="fa-solid fa-angle-up" id="icon-angle"></i></a></li>
                    <div class="collapse show sub-menu" id="sub-menu">
                        <ul class="menu-lista">
                            <li class="options option-active-sub-me"><a href="#" class="links"><i class="fa-solid fa-industry"></i> Producción</a></li>
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
                <i class="fa-solid fa-bars fa-beat"></i>
            </a>
        </div>
        <div class="bread-crum">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Gestion de producción</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Producción</li>
                </ol>
            </nav>
        </div>
    </header>
    <main class="container p-2">
        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2 g-sm-3 g-md-3 g-xl-3 g-xxl-3">
            <article class="col">
                <div class="bg-dark text-white Lingote_Ret d-flex justify-content-between p-3 rounded container-tags" draggable="true">
                    <div class="img-remanente">
                        <img src="img/silver.png" alt="">
                    </div>
                    <div class="line-separator"></div>
                    <div class="body-tags">
                        <h2 class="lingoteR"><strong></strong></h2>
                        <label for="lingote">Lingote Ret.</label>
                    </div>
                </div>
            </article>
            <article class="col">
                <div class="bg-success text-white Goteo d-flex justify-content-between p-3 rounded container-tags" draggable="true">
                    <div class="img-remanente">
                        <img src="img/gotas.png" alt="">
                    </div>
                    <div class="line-separator"></div>
                    <div class="body-tags">
                        <h2 class="GoteoR"><strong></strong></h2>
                        <label for="goteo">Goteo</label>
                    </div>
                </div>
            </article>
            <article class="col">
                <div class="bg-primary text-white Pza_rechazada d-flex justify-content-between p-3 rounded container-tags" draggable="true">
                    <div class="img-remanente">
                        <img src="img/prohibition.png" alt="">
                    </div>
                    <div class="line-separator"></div>
                    <div class="body-tags">
                        <h2 class="pzaRechazada"><strong></strong></h2>
                        <label for="rechazo">Pza rechazada</label>
                    </div>
                </div>
            </article>
            <article class="col">
                <div class="bg-warning text-white Coladas d-flex justify-content-between p-3 rounded container-tags" draggable="true">
                    <div class="img-remanente">
                        <img src="img/placa.png" alt="">
                    </div>
                    <div class="line-separator"></div>
                    <div class="body-tags">
                        <h2 class="ColadaC"><strong></strong></h2>
                        <label for="rechazo">Coladas</label>
                    </div>
                </div>
            </article>
        </section>
        <section class="p-2 row">
            <article class="p-2 col-12 col-sm-12 col-md-8">
                <div class="card bg-dark text-white contenedor-tb-produccion">
                    <div class="card-header">
                        <h5 class="titulo-collaps fs-6">Producción de Fundición 1</h5>
                        <div class="plus d-flex gap-2 d-md-flex justify-content-md-end">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Registro de piezas elaboradas">
                                <button type="button" class="btn btn-success btn-sm text-white" id="nuevoRegistro">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </span>
                            <button class="btn btn-dark btn-sm" id="boton-b" onclick="changeicon('plus');" type="button" data-bs-toggle="collapse" data-bs-target="#productiones" aria-expanded="false" aria-controls="productiones">
                                <i class="fa-solid fa-minus" id="plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse show" id="productiones">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="production" class="table table-success table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">N° Control</th>
                                            <th scope="col">Operador</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Pieza</th>
                                            <th scope="col">Aceptadas</th>
                                            <th scope="col">Rechazadas</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">N° Control</th>
                                            <th scope="col">Operador</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Pieza</th>
                                            <th scope="col">Aceptadas</th>
                                            <th scope="col">Rechazadas</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer footer-modal-btn">
                            <button type="button" class="btn btn-warning btn-sm btn-total-producido" data-bs-toggle="modal" data-bs-target="#totales">Pesos totales</button>
                        </div>
                    </div>
                </div>
            </article>
            <div class="modal fade" id="totales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header header-modal-kg bg-dark text-white" id="header-modal-retorno">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-hands-holding-circle"></i> Piezas Producidas</h5>
                            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="frm-production-t">
                            <div class="modal-body text-black row g-3">
                                <div class="col-md-5">
                                    <label for="pza_aceptada">Pzas Aceptadas:</label>
                                    <p id="pza_aceptada"></p>
                                </div>
                                <div class="col-md-5">
                                    <label for="mod-aceptadas-kg">Pzas Aceptadas (kg):</label>
                                    <input type="text" class="form-control form-control-sm" id="mod-aceptadas-kg">
                                </div>
                                <div class="col-md-5">
                                    <label for="pza_rechazada">Pza rechazada:</label>
                                    <p id="pza_rechazada"></p>
                                </div>
                                <div class="col-md-5">
                                    <label for="mod-rechazo-kg">Pza rechazada (kg):</label>
                                    <input type="text" class="form-control form-control-sm" id="mod-rechazo-kg">
                                </div>
                                <div class="col-md-5">
                                    <label for="mod-total">Total:</label>
                                    <p id="pzas_totales"></p>
                                </div>
                                <div class="col-md-5">
                                    <label for="mod-total-kg">Total (kg):</label>
                                    <p id="kg_tot_prod"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success btn-sm">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="registros-rem p-2 col-12 col-sm-12 col-md-4">
                <div class="container-rem-prod">
                    <div class="card w-40 text-white bg-dark">
                        <div class="card-header">
                            <h5 class="titulo-collaps fs-6">Remanente</h5>
                            <div class="button-remanente-retorno d-flex gap-2 d-md-flex justify-content-md-end">
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Registra el remanente">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#retorno">
                                        <i class="fa-solid fa-arrows-rotate"></i> Retorno
                                    </button>
                                </span>
                                <button type="button" class="btn btn-dark btn-sm" onclick="changeicon('pluss');" data-bs-toggle="collapse" data-bs-target="#rem-produccion" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa-solid fa-minus" id="pluss"></i>
                                </button>
                            </div>
                        </div>
                        <div class="collapse show" id="rem-produccion">
                            <form id="form-mat-prima">
                                <div class="card-body">
                                    <section class="frm-mp container">
                                        <div class="mb-2 row">
                                            <div class="form-check col">
                                                <input class="form-check-input btnradio" type="radio" name="btnradio" id="radio1" value="Remanente">
                                                <label class="form-check-label" for="radio1">Remanente</label>
                                            </div>
                                            <div class="form-check col">
                                                <input class="form-check-input btnradio" type="radio" name="btnradio" id="radio2" value="Materia prima">
                                                <label class="form-check-label" for="radio2">Materia Prima</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="selectRem" class="col-12 col-sm-4 col-form-label form-control-sm">Nombre:</label>
                                            <div class="col-12 col-sm-8">
                                                <select class="form-select form-select-sm" id="selectRem" aria-label="Default select example">
                                                    <option selected>Choose..</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="cantidadMP" class="col-12 col-sm-4 col-form-label form-control-sm">Cantidad:</label>
                                            <div class="col-12 col-sm-8">
                                                <div class="input-group input-group-sm sm-3">
                                                    <input id="cantidadMP" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                                                    <span class="input-group-text bg-dark text-white" id="basic-addon2">kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="card-footer bg-dark">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-success btn-sm" id="btnReg">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal fade" id="retorno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen-sm-down">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white" id="header-modal-retorno">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-arrows-rotate"></i> Remanente sobrante del día</h5>
                                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3" id="frm-rem-sobrante">
                                        <div class="modal-body text-black">
                                            <p><strong>Instrucciones:</strong> Registra el aluminio sobrante de la producción de hoy</p>
                                            <div class="mb-2 row">
                                                <label for="remRetorno" class="col-sm-2 col-form-label form-control-sm">Nombre:</label>
                                                <div class="col-sm-5">
                                                    <select class="form-select" id="remRetorno" aria-label="Default select example">
                                                        <option selected>Choose..</option>
                                                        <option value="Lingote Retorno">Lingote Retorno</option>
                                                        <option value="Pza Rechazada">Pza Rechazada</option>
                                                        <option value="Gota">Gota</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="peso" class="col-sm-2 col-form-label form-control-sm">Cantidad:</label>
                                                <div class="col-sm-5">
                                                    <div class="input-group sm-3">
                                                        <input type="text" class="form-control" placeholder="200, 150, 300..." aria-label="Nombre de usuario del destinatario" aria-describedby="basic-addon2" id="peso">
                                                        <span class="input-group-text bg-dark text-white" id="basic-addon2">kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p><strong>Nota:</strong> La cantidad registrada se considerará como peso en kg.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-dark btn-sm">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="modalResgistros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-center" id="header-modal-retorno">
                        <h5 class="modal-title" id="exampleModalLabel"> Produccion</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="registro_p">
                        <div class="modal-body row g-3">
                            <div class="col-md-2">
                                <label for="lingote">N°</label>
                                <input type="number" class="form-control form-control-sm" id="controlNumber" min="1" onchange="showInfoMoldeador();" required>
                            </div>
                            <div class="col-md-4">
                                <label for="lingote">Nombre</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input deshabilitado" id="nombreMoldeador" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="rechazo">Apellidos</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input deshabilitado" id="apellidosMoldeador" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="colada">Area</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Input deshabilitado" id="areaMoldeador" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="placa">Pieza (clave)</label>
                                <input type="text" class="form-control form-control-sm" placeholder="TRUD46" id="clavePieza" required>
                            </div>
                            <div class="col-md-4">
                                <label for="placa">Aceptadas</label>
                                <input type="number" class="form-control form-control-sm" id="aceptadas" min="0" required>
                            </div>
                            <div class="col-md-4">
                                <label for="placa">Rechazadas</label>
                                <input type="number" class="form-control form-control-sm" id="rechazadas" min="0" required>
                            </div>
                            <div hidden>
                                <input type="number" class="form-control form-control-sm" id="idEmpleado" min="0" hidden required>
                            </div>
                            <div><span id="alerta"></span></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success btn-sm">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section class="">
            <article class="card h-auto text-center bg-dark text-white">
                <header class="card-header">
                    <i class="fa-solid fa-chart-column"></i>
                    Total de piezas elaboradas por Mes
                </header>
                <div class="card-body">
                    <div class="container">
                        <canvas id="chartProduccion"></canvas>
                    </div>
                </div>
                <footer class="card-footer text-muted">
                    Hace 2 días
                </footer>
            </article>
        </section>
    </main>
    <footer class="bg-dark p-3 sticky-bottom">
        <div class="container">
            <nav class="d-flex justify-content-center">
                <small class="text-white" >&#174;Todos los derechos reservados &#169;2024 Aluxsa S.A de C.V </small>
            </nav>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/produccion.js" type="module"></script>
    <script src="js/script_user.js"></script>
    <script src="js/graphicProduccion.js" type="module"></script>
    <script src="js/script_base.js"></script>
    <script src="js/resgistrsoProduccion.js"></script>
    <script src="js/functionradio.js" type="module"></script>
    <script src="js/modal_totales.js" type="module"></script>
</body>
</html>