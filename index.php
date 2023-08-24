<!DOCTYPE html>
<html lang="es">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="img/data-analytics.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="cuerpo">
    <div class="barra"></div>
    <div class="container-login">
        <div class="log-in">
            <div class="login-head"><h1>Sign in</h1></div>
            <div class="linea"></div>
            <div class="container-img"><img src="img/man.png" alt="" class="user-img"></div>
            <form action="verify_session.php" method="POST" id="frm-logIn">
                <div class="container-form">
                    <div class="mb-2">
                        <label for="user" class="form-label">Usuario: </label>
                        <input type="text" class="form-control" id="user" placeholder="anyone56@mail.com" name="user">
                    </div>
                    <div class="mb-2">
                        <label for="pass" class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" id="pass" placeholder="*************" name="pwd">
                    </div>
                    <div class="form-check">
                        <label for="Checkpass" class="form-label">Show password</label>
                        <input class="form-check-input" type="checkbox" value="" id="Checkpass" onchange="showorhidepass('pass','Checkpass');">
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" name="btn1">Iniciar Sesion</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/282ec8cabc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.14/dist/sweetalert2.all.min.js"></script>
    <script src="js/showorhidepass.js"></script>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['sesion'])){ 
    if($_SESSION['sesion']==2){//Error de campos vacios
        echo '<script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
                title: "Campos Vacios:",
                text: "Debes llenar todos los campos.",
                icon: "error",
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: "Okay",
                showCloseButton: true,
                focusConfirm: false,
            });
        </script>';
    }
    if($_SESSION['sesion']==3){//Error de datos incorrectos 
        echo '<script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        })
            swalWithBootstrapButtons.fire({
                title: "DATOS INCORRECTOS:",
                text: "Verifica el usuario o la contraseña.",
                icon: "error",
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: "Okay",
                showCloseButton: true,
                focusConfirm: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "Informacion",
                        "Verifica que tengas asignado un usuario y una contraseña",
                        "info"
                    )
                }
            });
        </script>';
    }
}
else{
    $_SESSION['sesion']=0;//No se ha iniciado sesion
}
if($_SESSION['sesion']==4){
    echo '<script>
        swal({
            title: "Sesion Cerrada",
            text: "GRACIAS POR USAR NUESTROS SERVICIOS",
            icon: "success"
        });
    </script>';
}
$_SESSION['sesion']=0; //Despues de confirmar el error, igualo lo variable a 0

?>