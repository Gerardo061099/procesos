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
    <title>Perfil</title>
    <link rel="shortcut icon" href="img/data-analytics.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" href="css/stylesBS.css">
    <!-- CDN iconos de Bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> -->
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
                    <li><a href="perfil.php" class="dropdown-item active">
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
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="container-perfil">
                    <img src="<?= $user['img_perfil']; ?>" alt="" class="img-perfil rounded-circle">
                    <a class="role-text text-white text-decoration-none " href="#" role="button"><?= $user['rolename'] ?></a>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr class="bg-light my-2">
            <div class="offcanvas-body">
                <ul class="menu-lista">
                    <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i> Inicio</a></li>
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
        <div class="text-dash">
            <h4 id="text">Tu perfil de usuario</h4>
        </div>
    </header>
    <main class="container py-3">
        <section class="w-100">
            <div class="card mb-3">
                <img src="<?= $user['img_perfil']?>" class="rounded-circle rounded-img-usuario" alt="Foto de tu perfil">
                <a href="#modal-acciones" data-bs-toggle="modal" role="button"><img src="img/camera.svg" alt="icono para editar foto" class="rounded-circle camera-add-picture"></a>
                <div class="card-body align-middle">
                    <!-- <p class="card-text">Descripcion: </p>
                    <p class="card-text"><small class="text-muted">Última actualización hace 3 minutos</small></p> -->
                    <br><br>
                </div>
                <footer class="card-footer">
                </footer>
            </div>
            <!-- Modal Principal -->
            <div class="modal fade" id="modal-acciones" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark">
                        <div class="modal-header text-white">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Elige una opcion</h5>
                            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <button class="btn btn-primary mb-2 col-12" data-bs-target="#add-picture" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-regular fa-image"></i> Agregar una foto a tu perfil</button>
                            <button class="btn btn-primary mb-2 col-12" data-bs-target="#update-picture" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-regular fa-images"></i> Actualizar foto de perfil</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modales de navegacion -->
            <div class="modal fade" id="add-picture" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Agrega una foto a tu perfil</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="picture-perfil">
                                <label class="input-group-text form-control-sm" for="picture-perfil">Upload</label>
                            </div>
                            <img src="" class="img-thumbnail" alt="...">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#modal-acciones" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-solid fa-arrow-left"></i> Back to first</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="update-picture" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalToggleLabel2">Actualiza tu foto de perfil</h5>
                        </div>
                        <div class="modal-body">
                            Inserta la imagen que quieres poner de perfil.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#modal-acciones" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-solid fa-arrow-left"></i> Back to first</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de los Modales -->
        </section>
        <h5 class="card-title text-start mt-5"><?= $user['nombre'].' '.$user['apellidos'];?> <a href="#"><i class="fa-solid fa-pencil"></i></a></h5> 
        <p class="card-text"><small class="text-muted"><i><?= $user['user'];?></i></small></p>
        <div class="card text-center">
            <header class="card-header">
                <i>Informacion de tu usuario:</i>
            </header>
            <article class="card-body">
                <section class="text-start p-3">
                    <h6>Datos de tu usuario</h6>
                    <p><b>Nombre:</b> <span><?= $user['nombre'].' '.$user['apellidos'];?></span></p>
                    <p><b>Numero de empleado:</b> <span class="badge bg-success"><?= $user['numero_empleado'] ?></span></p>
                    <p><b>Usuario:</b> <span class="badge bg-primary"><?= $user['user'] ?></span></p>
                    <p><b>Role de usuario:</b> <span class="badge bg-success"><?= $user['rolename'] ?></span></p>
                </section>
                <hr>
                <h4>Tabla de usuarios</h4>
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
                <span class="card-title badge bg-dark"><b>Role</b></span>
                <span class="card-title badge bg-dark"><b>Permisos</b></span>
                <span class="card-title badge bg-dark"><b>Modulos</b></span>
                <p class="card-text">Este usuario tiene todos los privilegios para el manejo del sistema, por lo tanto los demas usuarios no podran visualizarte.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </article>
        </div>
        <aside class="">
        </aside>
    </main>
    <footer class="bg-dark p-3 sticky-bottom mt-5">
        <div class="container">
            <nav class="d-flex justify-content-center ">
                <small class="text-white" >&#174;Todos los derechos reservados &#169;2024 Aluxsa S.A de C.V </small>
            </nav>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="js/usersTable.js"></script>
</body>
</html>