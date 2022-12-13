<?php
    include("php/open_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="c_principal">
<?php
    include("php/verify_session.php")
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" id="container-op-titulo">
        <h3 class="titulo-principal">Producciones</h3>
    </div>
    <div class="op-usuario">
        <!--
        <div class="form-check form-switch" id="switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        </div>
        -->
        <div class="dropdown" id="op-user">
            <img src="img/man.png" alt="" class="user-profile">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
            </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="settings"><a href="perfil.php" class="texto-li"><img src="img/man.png" alt="" class="img-menu"> Perfil</a></li>
                    <li class="settings"><a href="#" class="texto-li"><img src="img/gear.png" alt="" class="img-menu"> Configuracion</a></li>
                    <li class="sesion-close"><a href="php/close_session.php" class="texto-li"><img src="img/log-out.png" alt="" class="img-menu"> Cerra sesion</a></li>
                </ul>
        </div>
    </div>
</nav>
<div class="container-principal">
    <div class="container-btn-menu">
        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <img src="img/menu.png" alt="" class="menu">
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
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-user"></i>  Administrar Usuarios</a></li>
                <li class="options"><a href="produccion.php" class="links"><i class="fa-solid fa-list-check"></i>  Gestion de produccion</a></li>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-square-poll-horizontal"></i>  Resumenes</a></li>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-file-invoice-dollar"></i>  Nominas por trabajadores</a></li>
                <li class="options"><a href="#" class="links"><i class="fa-solid fa-people-group"></i>  Empleados</a></li>
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
    <div class="modal fade" id="add_user" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" id="header-modal-add-user">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="img/add-user-img.png" alt=""> Agrega un Usuario al sistema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                    <div role="alert" id="message"></div>
                        <h5><center>Datos personales</center></h5>
                        <div class="col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="col-md-4">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos">
                        </div>
                        <div class="col-md-3">
                            <label for="num_empleado">Numero Control</label>
                            <input type="number" class="form-control" id="num_empleado">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="record_user(event);">Resgistrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="header-modal-add-user">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Datos de usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <h5><center>Crea un Usuario y una contraseña</center></h5>
                        <div class="col-md-4">
                            <label for="usuario">Usuario</label>
                            <input type="email" class="form-control" id="usuario" placeholder="anyone@mail.com">
                        </div>
                        <div class="col-md-4">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" placeholder="********">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
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
                <th scope="col"><center>N°</center></th>
                <th scope="col"><center>Role</center></th>
                <th scope="col"><center>Estado</center></th>
                <th scope="col"><center>Registro</center></th>
                <th scope="col"><center></center></th>
            </tr>
        </thead>
        <tbody>
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
                    <td><center>'?><button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addUsers" onclick="Update_infousers('<?php echo $datos?>');">Editar</button>
                    <?php echo'</center></td>
                </tr>';
            }
        include("cerrar_conexion.php");
    ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="addUsers" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-primary" onclick="update_user();">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="js/script_user.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>