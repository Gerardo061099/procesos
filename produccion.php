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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la produccion</title>
    <link rel="shortcut icon" href="img/data-analytics.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
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
                    <i class="fa-solid fa-ellipsis-vertical fa-bounce"></i>
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
    </div>
    <div class="container-init-tags">
        <div class=" bg-dark text-white container-tags Lingote_Ret" draggable="true">
            <div class="img-remanente">
                <img src="img/silver.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h2 class="lingoteR"><strong ></strong></h2>
                <label for="lingote">Lingote Ret.</label>
            </div>
        </div>
        <div class=" bg-success text-white container-tags Goteo" draggable="true">
            <div class="img-remanente">
                <img src="img/gotas.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h2 class="GoteoR"><strong></strong></h2>
                <label for="goteo">Goteo</label>
            </div>
        </div>
        <div class=" bg-primary text-white container-tags Pza_rechazada" draggable="true">
            <div class="img-remanente">
                <img src="img/prohibition.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h2 class="pzaRechazada"><strong></strong></h2>
                <label for="rechazo">Pza rechazada</label>
            </div>
        </div>
        <div class=" bg-warning text-white container-tags Coladas" draggable="true">
            <div class="img-remanente">
                <img src="img/placa.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h2 class="ColadaC"><strong></strong></h2>
                <label for="rechazo">Coladas</label>
            </div>
        </div>
    </div>
    <main class="container-prod">
        <section class="container-table-registros-produccion">
            <div class="card bg-dark text-white contenedor-tb-produccion">
                <div class="card-header">
                    <h5 class="titulo-collaps">Producción de Fundición 1</h5>
                    <div class="plus btn-sm d-grid gap-2 d-md-flex justify-content-md-end">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Registro de piezas elaboradas">
                            <button type="button" class="btn btn-secondary btn-sm text-white" id="nuevoRegistro">
                                Registrar
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
                            </table>
                        </div>
                    </div>
                    <div class="card-footer footer-modal-btn">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#totales">Pesos totales</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="modalResgistros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header bg-dark" id="header-modal-retorno">
                        <h5 class="modal-title" id="exampleModalLabel"> Produccion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="registro_p">
                        <div class="modal-body row g-3">
                            <div class="col-md-2">
                                <label for="lingote">N°</label>
                                <input type="number" class="form-control form-control-sm" id="controlNumber" min="1" onchange="showInfoMoldeador();">
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
                                <input type="text" class="form-control form-control-sm" placeholder="TRUD46" id="clavePieza">
                            </div>
                            <div class="col-md-4">
                                <label for="placa">Aceptadas</label>
                                <input type="number" class="form-control form-control-sm" id="aceptadas" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="placa">Rechazadas</label>
                                <input type="number" class="form-control form-control-sm" id="rechazadas" min="0">
                            </div>
                            <div hidden>
                                <input type="number" class="form-control form-control-sm" id="idEmpleado" min="0" hidden>
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
        <div class="container-form registros-rem">
            <div class="container-rem-prod">
                <div class="card text-white bg-dark">
                    <div class="card-header">
                        <h5 class="titulo-collaps">Remanente/Materia prima producción</h5>
                        <div class="button-remanente-retorno d-grid gap-2 d-md-flex justify-content-md-end">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Registra el remanente">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#retorno">
                                    <i class="fa-solid fa-arrows-rotate"></i> Retorno
                                </button>
                            </span>
                            <button type="button" class="btn btn-dark btn-sm" onclick="changeicon('pluss');" type="button" data-bs-toggle="collapse" data-bs-target="#rem-produccion" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-minus" id="pluss"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse show" id="rem-produccion">
                        <form id="form-mat-prima">
                            <div class="card-body">
                                <section class="frm-mp">
                                    <div class="mb-2 row">
                                        <div class="form-check col-auto">
                                            <input class="form-check-input btnradio" type="radio" name="btnradio" id="radio1" value="Remanente">
                                            <label class="form-check-label" for="radio1">Remanente</label>
                                        </div>
                                        <div class="form-check col-auto">
                                            <input class="form-check-input btnradio" type="radio" name="btnradio" id="radio2" value="Materia prima">
                                            <label class="form-check-label" for="radio2">Materia Prima</label>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="nombreMP" class="col-sm-2 col-form-label form-control-sm">Nombre:</label>
                                        <div class="col-sm-5">
                                            <select class="form-select" id="selectRem" aria-label="Default select example">
                                                <option selected>Choose..</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="nombreMP" class="col-sm-2 col-form-label form-control-sm">Cantidad:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" id="cantidadMP" min="0">
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
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="totales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content ">
                <div class="modal-header header-modal-kg bg-dark text-white" id="header-modal-retorno">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-hands-holding-circle"></i> Produccion Total</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="frm-add-users">
                        <div class="col-md-5">
                            <label for="mod-lingote-c">Pzas Aceptadas:</label>
                            <p>345 Piezas</p>
                        </div>
                        <div class="col-md-5">
                            <label for="mod-rechazo-kg">Pzas Aceptadas (kg):</label>
                            <input type="number" class="form-control form-control-sm" id="mod-rechazo-kg" min="1">
                        </div>
                        <div class="col-md-5">
                            <label for="mod-rechazo-c">Pza rechazada:</label>
                            <p>100 Piezas</p>
                        </div>
                        <div class="col-md-5">
                            <label for="mod-rechazo-kg">Pza rechazada (kg):</label>
                            <input type="number" class="form-control form-control-sm" id="mod-rechazo-kg" min="1">
                        </div>
                        <div class="col-md-5">
                            <label for="mod-total">Total:</label>
                            <p id="pzas_totales"></p>
                        </div>
                        <div class="col-md-5">
                            <label for="mod-total-kg">Total (kg):</label>
                            <p id="kg_tot_prod"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success btn-sm">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="retorno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white" id="header-modal-retorno">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-arrows-rotate"></i> Remanente sobrante del día</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" id="frm-rem-sobrante">
                    <div class="modal-body">
                        <p><strong>Instrucciones:</strong> Registra el aluminio sobrante de la producción de hoy</p>
                        <div class="mb-2 row">
                            <label for="nombreMP" class="col-sm-2 col-form-label form-control-sm">Nombre:</label>
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
                            <label for="nombreMP" class="col-sm-2 col-form-label form-control-sm">Cantidad:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control form-control-sm" id="peso" min="0">
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

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="js/produccion.js" type="module"></script>
    <script src="js/script_user.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/resgistrsoProduccion.js"></script>
    <script src="js/functionradio.js" type="module"></script>
</body>
</html>