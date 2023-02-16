<?php
    include("php/open_session.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="c_principal">
<?php
    include("php/verify_session.php");
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" id="container-op-titulo">
        <h3 class="titulo-principal">ALUXSA S.A de C.V</h3>
    </div>
    <div class="op-usuario">
        <div class="dropdown" id="op-user">
            <div>
                <img src="img/man.png" alt="" class="user-profile">
            </div>
            <p class="nombreUsuario"><span class="text-white" id="usuario"></span></p>
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">ALUXSA S.A de C.V</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="divicion"></div>
        <div class="offcanvas-body">
            <ul class="menu-lista">
                <li class="options"><a href="principal.php" class="links"><i class="fa-solid fa-house"></i>  Inicio</a></li>
                <li class="options option-active"><a href="#" class="links"><i class="fa-solid fa-users-gear"></i>  Administrar usuarios</a></li>
                <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle');"><i class="fa-solid fa-list-check"></i>  Gestion de produccion  <i class="fa-solid fa-angle-down" id="icon-angle"></i></a></li>
                    <div class="collapse sub-menu" id="sub-menu">
                        <ul class="menu-lista">
                            <li class="options"><a href="produccion.php" class="links"><i class="fa-solid fa-industry"></i>  Producción</a></li>
                            <li class="options"><a href="#" class="links"><i class="fa-solid fa-cash-register"></i>  Consumos</a></li>
                            <li class="options"><a href="#" class="links"><i class="fa-regular fa-money-bill-1"></i>  Costos de producción</a></li>
                        </ul>
                    </div>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-square-poll-horizontal"></i>  Resultados de producción</a></li>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-file-invoice-dollar"></i>  Nominas</a></li>
                <li class="options"><a class="links" data-bs-toggle="collapse" href="#sub-menu2" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="changeicon('icon-angle2');"><i class="fa-solid fa-people-group"></i>  Empleados  <i class="fa-solid fa-angle-down" id="icon-angle2"></i></a></li>
                <div class="collapse sub-menu" id="sub-menu2">
                    <ul class="menu-lista"> 
                        <li class="options"><a href="#" class="links"><i class="fa-solid fa-chart-column"></i>   Productividad</a></li>
                    </ul>
                </div>
            </ul>
        </div>
        <footer class="footer">
            <div class="container-perfil">
                <img src="img/user.png" alt="" class="img-perfil">
                <h5 style="color: white;">Perfil</h5>
            </div>
        </footer>
    </div>
    <!-- Button trigger modal -->
    <div class="container-add-user">
        <button type="button" class="btn btn-primary btn-add-user" data-bs-toggle="modal" data-bs-target="#add_user">
            <img src="img/add-user.png" alt="">
        </button>
        <button type="button" class="btn btn-danger">
            <img src="img/delete.png" alt="">
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" id="header-modal-add-user">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="img/add-user-img.png" alt=""> Nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="frm-add-users">
                    <div id="alerta"></div>
                        <h5><center>Datos personales</center></h5>
                        <div class="col-md-4">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="col-md-4">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos">
                        </div>
                        <div class="col-md-3">
                            <label for="num_empleado">Numero Control:</label>
                            <input type="number" class="form-control" id="num_empleado">
                        </div>
                        <div class="col-md-6" id="show-item1" hidden>
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="newUser" placeholder="anyone@mail.com">
                        </div>
                        <div class="col-md-6" id="show-item2" hidden>
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="********">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cerrar();">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="confirm" onclick="record_user();">Confirmar</button>
                    <button type="button" class="btn btn-success" id="show-item3" onclick="confirm_user();" hidden>Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class ="table-responsive" id="tb_users">
    <table class="table table-success table-striped">
    <?php
        include("php/conexion.php");
            $query = mysqli_query($conexion,"SELECT u.id,u.Nombre,u.Apellidos,u.name_user,u.numero_empleado,r.nombre AS rolename,r.active AS estado,u.fecha_registro FROM $tb_users u INNER JOIN $tb_roles r WHERE u.id_role = r.id");
    ?>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"><center>#</center></th>
                <th scope="col"><center>Nombre</center></th>
                <th scope="col"><center>Apellidos</center></th>
                <th scope="col"><center>Usuario</center></th>
                <th scope="col"><center>N° Control</center></th>
                <th scope="col"><center>Role</center></th>
                <th scope="col"><center>Estado</center></th>
                <th scope="col"><center>Registro</center></th>
                <th scope="col"><center></center></th>
            </tr>
        </thead>
        <tbody id="tbody">
        <?php
        while ($res = mysqli_fetch_array($query)) {
            $datos = $res[0]."||".
                $res[1]."||".
                $res[2]."||".
                $res[3]."||".
                $res[4]."||".
                $res[5]."||".
                $res[6]."||";
            echo '
                <tr>
                    <td><center>
                        <input class="form-check-input" type="checkbox" value="'.$res['id'].'" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </center></td>
                    <td><center>'.$res['id'].'</center></td>
                    <td><center>'.$res['Nombre'].'</center></td>
                    <td><center>'.$res['Apellidos'].'</center></td>
                    <td><center>'.$res['name_user'].'</center></td>
                    <td><center>'.$res['numero_empleado'].'</center></td>
                    <td><center>'.$res['rolename'].'</center></td>
                    <td><center>';
                    if($res['estado'] == 1){
                        echo 'Activo';
                    } else {
                        echo 'Inactivo';
                    }
                    echo'</center></td>
                    <td><center>'.$res['fecha_registro'].'</center></td>
                    <td><center>'?><button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addUsers" onclick="Update_infousers('<?php echo $datos?>');"><i class="fa-solid fa-pen-to-square"></i></button>
                    <?php echo'</center></td>
                </tr>';
        }
        include("cerrar_conexion.php");
        ?>
        </tbody>
    </table>
</div>
<!-- Modal UpDate Users-->
<div class="modal fade" id="addUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header header-modal-edit">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-update-user" method="POST">
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
                        <input type="password" class="form-control" id="pwdmodal" placeholder="************">
                    </div>
                    <div class="col-md-4">
                        <label for="estadomodal">Estado</label>
                        <input type="text" class="form-control" id="estadomodal">
                    </div>
                    <div class="col-md-4">              
                        <label for="rolemodal">Role</label>
                        <input type="text" class="form-control" id="rolemodal">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick = "update_user();">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<div class ="table-responsive" id="tb_users">
    <center><h4>Usuarios sin role</h4></center>
    <table class="table table-dark table-striped">
        <thead>
        <?php
        include("php/conexion.php");
            $query = mysqli_query($conexion,"SELECT id,Nombre,Apellidos,name_user,numero_empleado,id_role AS roleid,fecha_registro FROM $tb_users WHERE id_role is null");
        ?>
            <tr>
                <th scope="col"><center>#</center></th>
                <th scope="col"><center>Nombre</center></th>
                <th scope="col"><center>Apellidos</center></th>
                <th scope="col"><center>Usuario</center></th>
                <th scope="col"><center>N° Control</center></th>
                <th scope="col"><center>Role</center></th>
                <th scope="col"><center>Registro</center></th>
                <th scope="col"><center></center></th>
            </tr>
        </thead>
        <tbody>
        <?php
        //verificamos si la consulta devuelve un resultado
        if(mysqli_num_rows($query) !=0){
        while ($res = mysqli_fetch_array($query)) {
            $datos = $res[0]."||".
                $res[1]."||".
                $res[2]."||".
                $res[4];
            echo '
                <tr>
                    <td><center>'.$res['id'].'</center></td>
                    <td><center>'.$res['Nombre'].'</center></td>
                    <td><center>'.$res['Apellidos'].'</center></td>
                    <td><center>'.$res['name_user'].'</center></td>
                    <td><center>'.$res['numero_empleado'].'</center></td>
                    <td><center>Sin role</center></td>
                    <td><center>'.$res['fecha_registro'].'</center></td>
                    <td><center>'?><button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addRole" onclick="addRole('<?php echo $datos?>');">Editar</button>
                    <?php echo'</center></td>
                </tr>';
            }
        } else {
            echo "
            <td><center></center></td>
            <td><center></center></td>
            <td><center></center></td>
            <td><center>No hay usuario sin Role..</center></td>
            <td><center></center></td>
            <td><center></center></td>
            <td><center></center></td>
            <td><center></center></td>";
        }
        include("cerrar_conexion.php");
        ?>
        </tbody>
    </table>
</div>
<!-- Modal AddRole-->
<div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header header-modal-add">
                <h5 class="modal-title" id="exampleModalLabel">Asignar Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="form-role-user" method="POST">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick = "ConfirmRole();">Asignar</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/script_user.js"></script>
    <script src="js/LocalStorage.js"></script>
    <script src="js/modales.js"></script>
    <script src="js/script_base.js"></script>
</body>
</html>