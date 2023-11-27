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
    <title>Usuarios</title>
    <link rel="icon" href="img/analytics-laptop-svgrepo-com.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
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
                    </span></p>
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
                    <h6 class="role-text" style="color: white;"><?= $user['rolename'] ?></h6>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="divicion"></div>
            <div class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li class="options option-active"><a href="#" class="links"><i class="fa-solid fa-users-gear"></i> Administrar usuarios</a></li>
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
            </div>
            <footer class="footer">
                <div class="container-perfil">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V</h5>
                </div>
            </footer>
        </div>
        <div class="bread-crum">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Administrar usuarios</li>
                </ol>
            </nav>
        </div>
        <!-- Button trigger modal -->
        <div class="container-add-user">
            <button type="button" class="btn btn-primary btn-sm btn-add-user" data-bs-toggle="modal" data-bs-target="#add_user">
                <i class="fa-solid fa-user-plus"></i>
            </button>
        </div>
    </div>
    <main class="container p-3">
        <div class="table-responsive" id="tb_users">
            <table class="table table-success table-bordered" id="tbUserRole">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">N° Control</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Modal Registrar-Usuario-->
        <div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header bg-dark" id="header-modal-add-user">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Nuevo usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="frm-add-users">
                        <div class="modal-body row g-3">
                            <div id="alerta"></div>
                            <h5 class="text-center">Información personal</h5>
                            <div class="col-md-4">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" required>
                            </div>
                            <div class="col-md-4">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" required>
                            </div>
                            <div class="col-md-3">
                                <label for="num_empleado">N° de Control:</label>
                                <input type="number" class="form-control" id="num_empleado" min="1" required>
                            </div>
                            <div class="col-md-6" id="show-item1" hidden>
                                <label for="newUser">Usuario:</label>
                                <input type="email" class="form-control" id="newUser" placeholder="anyone@mail.com" required>
                            </div>
                            <div class="col-md-6" id="show-item2" hidden>
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="********" required>
                            </div>
                            <div class="form-check" id="show-pass" hidden>
                                <label for="Checkpass2" class="form-label text-black">Show password</label>
                                <input class="form-check-input" type="checkbox" id="Checkpass2" onchange="showorhidepass('pwd','Checkpass2');">
                            </div>
                            <div id="alerta"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cerrar();">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="confirm" onclick="record_user();">Continuar</button>
                            <button type="submit" class="btn btn-success" id="show-item3" hidden disabled>Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Update Users-->
        <div class="modal fade" id="editUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form-update-user" method="POST">
                        <div class="modal-body row g-3">
                            <div class="col-md-1">
                                <label for="idmodal">ID</label>
                                <input type="number" class="form-control" id="idmodal" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="nombremodal">Nombre</label>
                                <input type="text" class="form-control" id="nombremodal">
                            </div>
                            <div class="col-md-4">
                                <label for="apellidosmodal">Apellidos</label>
                                <input type="text" class="form-control" id="apellidosmodal">
                            </div>
                            <div class="col-md-3">
                                <label for="num_empleadomodal">Numero Control</label>
                                <input type="number" class="form-control" id="num_empleadomodal">
                            </div>
                            <div class="col-md-4">
                                <label for="usuariomodal">Usuario</label>
                                <input type="email" class="form-control" id="usuariomodal" placeholder="anyone@mail.com">
                            </div>
                            <div class="col-md-4">
                                <label for="pwdmodal">Password</label>
                                <input type="password" class="form-control" id="passmodal" placeholder="************">
                            </div>
                            <div class="col-md-2">
                                <label for="estadomodal">Estado</label>
                                <input type="text" class="form-control" id="estadomodal" placeholder="Activo o Inactivo">
                            </div>
                            <div class="col-md-4">
                                <label for="rolemodal">Role</label>
                                <input type="text" class="form-control" id="rolemodal">
                            </div>
                            <div class="form-check">
                                <label for="Checkpass" class="form-label text-black">Show password</label>
                                <input class="form-check-input" type="checkbox" value="" id="Checkpass" onchange="showorhidepass('passmodal','Checkpass');">
                            </div>
                        </div>
                        <div class="modal-footer d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal AddRole-->
        <div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="exampleModalLabel">Asignar Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form-role-user" method="POST">
                        <div class="modal-body row g-3">
                            <div class="col-md-1">
                                <label for="idmodal2">ID</label>
                                <input type="number" class="form-control" id="idmodal2" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="nombremodal2">Nombre</label>
                                <input type="text" class="form-control" id="nombremodal2">
                            </div>
                            <div class="col-md-4">
                                <label for="apellidosmodal2">Apellidos</label>
                                <input type="text" class="form-control" id="apellidosmodal2">
                            </div>
                            <div class="col-md-3">
                                <label for="num_empleadomodal2">Numero Control</label>
                                <input type="number" class="form-control" id="num_empleadomodal2">
                            </div>
                            <div class="col-md-4">
                                <label for="rolemodal2">Role</label>
                                <input type="text" class="form-control" id="rolemodal2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive" id="tb_users">
            <h4 class="text-center">Usuarios sin role</h4>
            <table class="table table-dark table-striped" id="userNoRole">
                <thead>
                    <tr>
                        <th scope="col"><center>#</center></th>
                        <th scope="col"><center>Nombre</center></th>
                        <th scope="col"><center>Apellidos</center></th>
                        <th scope="col"><center>Usuario</center></th>
                        <th scope="col"><center>N° Control</center></th>
                        <th scope="col"><center>Role</center></th>
                        <th scope="col"><center>Registro</center></th>
                        <th scope="col"><center>Asignar role</center></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-dark p-3 sticky-bottom">
        <div class="container" >
            <nav class="d-flex justify-content-center ">
                <small class="text-white" >&#174;Todos los derechoz reservados &#169;2024 Aluxsa S.A de C.V </small>
            </nav>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="js/usersTable.js"></script>
    <script src="js/tbuserNoRole.js"></script>
    <script src="js/script_user.js"></script>
    <script src="js/modales.js"></script>
    <script src="js/script_base.js"></script>
    <script src="js/showorhidepass.js"></script>
</body>

</html>