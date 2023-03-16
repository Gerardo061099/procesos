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
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V</h5>
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
                            <li class="options"><a href="#" class="links"><i class="fa-regular fa-money-bill-1"></i> Costos de producción</a></li>
                        </ul>
                    </div>
                    <li class="options"><a href="#" class="links"><i class="fa-solid fa-square-poll-horizontal"></i> Resultados de producción</a></li>
                    <li class="options"><a href="#" class="links"><i class="fa-solid fa-file-invoice-dollar"></i> Nominas</a></li>
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
                    <img src="img/man.png" alt="" class="img-perfil">
                    <h6 class="role-text" style="color: white;"><?= $user['rolename'] ?></h6>
                </div>
            </footer>
        </div>
    </div>
    <div class="modal fade" id="retorno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header header-modal-retorno" id="header-modal-retorno">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-arrows-rotate"></i> Remanente sobrante del día</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="frm-add-users">
                        <p><strong>Instrucciones:</strong> Registra el aluminio sobrante de la producción de hoy</p>
                        <div class="col-md-6">
                            <label for="mod-lingote">Lingote (kg):</label>
                            <input type="text" class="form-control" id="mod-lingote" min="1">
                        </div>
                        <div class="col-md-6">
                            <label for="mod-goteo">Gota (kg):</label>
                            <input type="text" class="form-control" id="mod-goteo" min="1">
                        </div>
                        <div class="col-md-6">
                            <label for="mod-rechazo">Pza rechazada (kg):</label>
                            <input type="text" class="form-control" id="mod-rechazo" min="1">
                        </div>
                        <div class="col-md-6">
                            <label for="mod-placa">Placa (kg):</label>
                            <input type="text" class="form-control" id="mod-placa" min="1">
                        </div>
                        <div class="col-md-3">
                            <label for="mod-escoria">Escoria:</label>
                            <input type="text" class="form-control" id="mod-escoria" min="1">
                        </div>
                        <p><strong>Nota:</strong> La cantidad registrada se considerará como peso en kg.</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-init-tags">
        <div class="text-white bg-danger container-tags">
            <div class="img-remanente">
                <img src="img/plata-en-lingotes.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h3><strong>425 Kg</strong></h3>
                <label for="lingote">Lingote</label>
            </div>
        </div>
        <div class="text-white bg-success container-tags">
            <div class="img-remanente">
                <img src="img/gotas.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h3><strong>354 Kg</strong></h3>
                <label for="goteo">Goteo</label>
            </div>
        </div>
        <div class="text-white bg-primary container-tags">
            <div class="img-remanente">
                <img src="img/maceta.png" alt="">
            </div>
            <div class="line-separator"></div>
            <div class="body-tags">
                <h3><strong>100 Kg</strong></h3>
                <label for="rechazo">Pza rechazada</label>
            </div>
        </div>
    </div>
    <div class="container-prod">
        <div class="card container-prod-f1 bg-dark text-white">
            <div class="card-header">
                <h5 class="titulo-collaps">Producción de Fundición 1</h5>
                <div class="plus btn-sm">
                    <button class="btn btn-dark btn-sm" id="boton-b" onclick="changeicon('plus');" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-minus" id="plus"></i>
                    </button>
                </div>
            </div>
            <div class="collapse show" id="collapseExample">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-2">
                            <label for="lingote">N°</label>
                            <input type="number" class="form-control form-control-sm" id="controlNumber" min="1" onchange="showInfoMoldeador();">
                        </div>
                        <div class="col-md-3">
                            <label for="lingote">Nombre</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Input deshabilitado" id="nombreMoldeador" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="rechazo">Apellidos</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Input deshabilitado" id="apellidosMoldeador" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="colada">Area</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Input deshabilitado" id="areaMoldeador" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="placa">Pieza (clave)</label>
                            <input type="text" class="form-control form-control-sm" placeholder="TRUD46" id="clavePieza">
                        </div>
                        <div class="col-md-2">
                            <label for="placa">Aceptadas</label>
                            <input type="number" class="form-control form-control-sm" id="aceptadas" min="1">
                        </div>
                        <div class="col-md-2">
                            <label for="placa">Rechazadas</label>
                            <input type="number" class="form-control form-control-sm" id="rechazadas" min="1">
                        </div>
                        <div><span id="alerta"></span></div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="btn-group btn-group-sm group-options" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#totales">Pesos totales</button>
                        <button type="button" class="btn btn-primary" onclick="registredProduct();">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-form registros-rem">
        <div class="container-rem-prod">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <h5 class="titulo-collaps">Remanente para producción</h5>
                    <div class="button-remanente-retorno">
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
                    <div class="card-body">
                        <form class="row g-3" action="">
                            <div class="col-md-2">
                                <label for="placa">Coladas (Kg)</label>
                                <input type="number" class="form-control" id="placa" min="1">
                            </div>
                            <div class="col-md-2">
                                <label for="placa">Placa (Kg)</label>
                                <input type="number" class="form-control" id="placa" min="1">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-dark">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-success btn-sm">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-list-rem">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <h5 class="titulo-collaps">Disponible</h5>
                    <div class="button-remanente-retorno">
                        <button type="button" class="btn btn-dark btn-sm" onclick="changeicon('esconder');" type="button" data-bs-toggle="collapse" data-bs-target="#disponible" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-minus" id="esconder"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="disponible">
                    <div class="card-body">
                        <ol class="list-group list-group-numbered lista-rem">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Lingote:</div>Lingote retorno
                                </div>
                                <span class="badge bg-danger rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Goteo:</div>Goteo retorno
                                </div>
                                <span class="badge bg-danger rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Pza rechazada:</div>Pza retorno
                                </div>
                                <span class="badge bg-danger rounded-pill">14</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="totales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header header-modal-kg" id="header-modal-retorno">
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
                            <input type="number" class="form-control" id="mod-rechazo-kg" min="1">
                        </div>
                        <div class="col-md-5">
                            <label for="mod-rechazo-c">Pza rechazada:</label>
                            <p>100 Piezas</p>
                        </div>
                        <div class="col-md-5">
                            <label for="mod-rechazo-kg">Pza rechazada (kg):</label>
                            <input type="number" class="form-control" id="mod-rechazo-kg" min="1">
                        </div>
                        <div class="col-md-5">
                            <label for="mod-total">Total:</label>
                            <p>445 Piezas</p>
                        </div>
                        <div class="col-md-5">
                            <label for="mod-total-kg">Total (kg):</label>
                            <p></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success btn-sm">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script_user.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/resgistrsoProduccion.js"></script>

</body>

</html>