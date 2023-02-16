/**
 *  Las siguientes funciones nos ayudan a llenar los modales 
 */
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
    }else {
        $("#estadomodal").val("Inactivo");
    }
}
/* */
function addRole(data) {
    var d = data.split("||");
    $("#idmodal2").val(d[0]);//id
    $("#nombremodal2").val(d[1]);//nombre
    $("#apellidosmodal2").val(d[2]);//apellidos
    $("#num_empleadomodal2").val(d[3]);//numero_empleado 
}

