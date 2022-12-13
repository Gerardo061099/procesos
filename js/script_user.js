function Update_infousers(data) {
    var d = data.split("||");
    $("#idmodal").val(d[0]);//id
    $("#nombremodal").val(d[1]);//nombre
    $("#apellidosmodal").val(d[2]);//apellidos
    $("#usuariomodal").val(d[3]);//name_user
    $("#num_empleadomodal").val(d[4]);//numero_empleado
    $("#rolemodal").val(d[5]);//rolename
    if(d[6]==1){
        $("#estadomodal").val("Activo");
    }else{
        $("#estadomodal").val("Inactivo");
    }
}
function record_user(e){
    //e.preventDefault();
    var nombre_u = document.getElementById("nombre").value;
    var apellidos_u = document.getElementById("apellidos").value;
    var numero_control = document.getElementById("num_empleado").value;
    if (nombre_u != "" && apellidos_u != "" && numero_control != "") {
        var Modal_u = new bootstrap.Modal(document.getElementById('add_user'), {
        });
        var modalToggle_u = document.getElementById('add_user'); // relatedTarget
        Modal_u.hide(modalToggle_u);
        var myModal = new bootstrap.Modal(document.getElementById('modal2'), {
            keyboard: false
        });
        var modalToggle = document.getElementById('modal2'); // relatedTarget
        myModal.show(modalToggle);
    }else {
        var alerta = document.getElementById("message");
        alerta.className = "alert alert-warning";
        alerta.textContent = "¡Debes llenar toda la informacion solicitada!";
    }
}
/*
$(document).ready(function() {
    var a = document.getElementById("c_principal");
    var titles = document.getElementById("text");
    $("#switch").find("input[type=checkbox]").on("change",function() {
        var checked = $(this).prop('checked');
        console.log(checked);
        if (checked == true) {
            a.className = "oscuro";
            titles.className = "text-claro";
        }else{
            a.className = "claro"
            titles.className = "text-oscuro"
        }
    });
});
*/
function update_user() {
    var id = document.getElementById("idmodal").value;
    var nombre = document.getElementById("nombremodal").value;
    var apellidos = document.getElementById("apellidosmodal").value;
    var num_empleado = document.getElementById("num_empleadomodal").value;
    var mail = document.getElementById("usuariomodal").value;
    var pass = document.getElementById("pwdmodal").value;
    var estado = document.getElementById("estadomodal").value;
    var role = document.getElementById("rolemodal").value;
    var data = new FormData();
    data.append("idmodal",id);
    data.append("nombremodal",nombre);
    data.append("apellidosmodal",apellidos);
    data.append("num_empleadomodal",num_empleado);
    data.append("usuariomodal",mail);
    data.append("pwdmodal",pass);
    data.append("estadomodal",estado);
    data.append("rolemodal",role);
    $.ajax({
        type: "POST",
        url: "php/update_user.php",
        data: data,
        processData: false,
        contentType: false,
        success: function (d) {
            if (d == "1") {
                console.log("Actualizacion exitosa!!");
            } else {
                console.log("No se pudo actualizar");
            }
        }
    });
}
