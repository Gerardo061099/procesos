var alerta = document.getElementById("alerta")
function alertMessage(message, type) {
    var wrapper = document.createElement('div')
    wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    alerta.append(wrapper)
}
function record_user() {
    var nombre_u = document.getElementById("nombre").value
    var apellidos_u = document.getElementById("apellidos").value
    var numero_control = document.getElementById("num_empleado").value
    if (nombre_u != "" && apellidos_u != "" && numero_control != "") {
        $('#show-item1').removeAttr('hidden')
        $('#show-item2').removeAttr('hidden')
        $('#show-item3').removeAttr('hidden')
        $('#show-pass').removeAttr('hidden')
        $('#confirm').attr("hidden", "true")
    } else {
        alertMessage('Debes llenar todos los datos', 'warning')
    }
}

function cerrar() {
    $('#frm-add-users').trigger('reset')
    $('#show-item1').attr('hidden','true')
    $('#show-item2').attr('hidden','true')
    $('#show-item3').attr('hidden', 'true')
    $('#show-pass').attr('hidden','true')
    $('#confirm').removeAttr('hidden')
}


