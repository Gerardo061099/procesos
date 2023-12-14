<?php
session_start();
include('php/conexion.php');

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la produccion</title>
    <link rel="icon" href="img/analytics-laptop-svgrepo-com.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
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
        <div class="container-btn-menu">
            <a class="btn btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars fa-beat"></i>
            </a>
        </div>
        <div class="bread-crum ">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Empleados</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productividad</li>
                </ol>
            </nav>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="container-perfil">
                    <img src="<?= $user['img_perfil']; ?>" alt="" class="img-perfil rounded-circle">
                    <a class="role-text text-white text-decoration-none " href="perfil.php" role="button"><?= $user['rolename'] ?></a>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr class="bg-light my-2">
            <div class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li class="options"><a href="usuarios_sistema.php" class="links"><i class="fa-solid fa-users-gear"></i> Administrar usuarios</a></li>
                    <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i> Gestion de produccion <i class="fa-solid fa-angle-up" id="icon-angle"></i></a></li>
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
                    <div class="collapse show sub-menu" id="sub-menu2">
                        <ul class="menu-lista">
                            <li class="options option-active-sub-me"><a href="#" class="links"><i class="fa-solid fa-chart-column"></i> Productividad</a></li>
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
    </header>
    <main class="container d-flex justify-content-center w-100">
        <section class="container-table-empleados w-100">
            <div class="card bg-dark bg-gradient text-white container-card w-100">
                <div class="card-header">
                    <h5 class="titulo-collaps">Lista de empleados</h5>
                    <div class="plus d-grid gap-2 d-md-flex justify-content-md-end">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Registro de piezas elaboradas">
                            <button type="button" class="btn btn-success btn-sm text-white" id="addEmpleado">
                                <i class="fa-solid fa-user-plus"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="Modal_empleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-dark text-white">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="title_form"></h5>
                                            <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="registred-empleado">
                                            <div class="modal-body px-10">
                                                <h6>Ingresa los datos requeridos a continuacion:</h6>
                                                <h6>Ingresa los datos personales del empleado</h6>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text">Nombre y apellido</span>
                                                    <input type="text" aria-label="First name" class="form-control form-control-sm bg-dark text-white" id="nombre_e" required>
                                                    <input type="text" aria-label="Last name" class="form-control form-control-sm bg-dark text-white" id="apellidos_e" required>
                                                </div>
                                                <h6 >Número de empledo del recibo de nomina</h6>
                                                <div class="input-group input-group-sm mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">N° Empleado</span>
                                                    <input type="text" class="form-control bg-dark text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="num_e" required>
                                                </div>
                                                <h6>Indica si es Trabajador o Estudiante(Practicas Profesionales)</h6>
                                                <div class="input-group input-group-sm mb-3">
                                                    <label class="input-group-text" for="select_empleados">Tipo empleado</label>
                                                    <select class="form-select bg-dark text-white" id="select_empleados" name="select_empleados" required>
                                                    </select>
                                                </div>
                                                <h6>Area en el cual se desempeña laborando</h6>
                                                <div class="input-group input-group-sm mb-3">
                                                    <label class="input-group-text" for="select_area">Area</label>
                                                    <select class="form-select bg-dark text-white" id="select_area" name="select_area" required>
                                                    </select>
                                                </div>
                                                <div id="div_toggle"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-light text-dark btn-sm">Registrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="collapse show" id="tbempleados">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <!-- Para que las tabla sea responsive con Data Tables usa la clase: display responsive nowrap. En la etiqueta table-->
                            <table id="tabla_empleados" class="table table-success table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Operador</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">N° Control</th>
                                        <th scope="col">Tipo de empleado</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Operador</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">N° Control</th>
                                        <th scope="col">Tipo de empleado</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </section>
    </main>
    <footer class="bg-dark p-3 sticky-bottom mt-5">
        <div class="container" >
            <nav class="d-flex justify-content-center ">
                <small class="text-white" >&#174;Todos los derechoz reservados &#169;2024 Aluxsa S.A de C.V </small>
            </nav>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/tbempleados.js" type="module"></script>
</body>
</html>