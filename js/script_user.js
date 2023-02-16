function update_user() {
    var id = document.getElementById("idmodal").value
    var nombre = document.getElementById("nombremodal").value
    var apellidos = document.getElementById("apellidosmodal").value
    var num_empleado = document.getElementById("num_empleadomodal").value
    var mail = document.getElementById("usuariomodal").value
    var pass = document.getElementById("pwdmodal").value
    var estado = document.getElementById("estadomodal").value
    var role = document.getElementById("rolemodal").value
    var data = new FormData()
    data.append("idmodal", id)
    data.append("nombremodal", nombre)
    data.append("apellidosmodal", apellidos)
    data.append("num_empleadomodal", num_empleado)
    data.append("usuariomodal", mail)
    data.append("pwdmodal", pass)
    data.append("estadomodal", estado)
    data.append("rolemodal", role)
    $.ajax({
        type: "POST",
        url: "php/update_user.php",
        data: data,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        success: function (d) {
            if (d == "1") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Actualizacion exitosa!!'
                })
            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Actualizacion exitosa!!'
                })
            }
            $("#addUsers").modal('hide')
        }
    });
}

var alerta = document.getElementById("alerta")
function alert(message, type) {
    var wrapper = document.createElement('div')
    wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    alerta.append(wrapper)
}
function record_user() {
    var nombre_u = document.getElementById("nombre").value
    var apellidos_u = document.getElementById("apellidos").value
    var numero_control = document.getElementById("num_empleado").value
    if (nombre_u != "" && apellidos_u != "" && numero_control != "") {
        $('#show-item1').removeAttr("hidden")
        $('#show-item2').removeAttr("hidden")
        $('#show-item3').removeAttr("hidden")
        $('#confirm').attr("hidden", "true")
    } else {
        alert('Debes llenar todos los datos', 'warning')
    }
}

function confirm_user() {
    var nombre_u = document.getElementById("nombre").value
    var apellidos_u = document.getElementById("apellidos").value
    var numero_control = document.getElementById("num_empleado").value
    var user = document.getElementById("newUser").value
    var pass = document.getElementById("pwd").value
    console.log(nombre_u + " " + apellidos_u + " " + numero_control + " " + user + " " + pass)
    if (user != "" && pass != "") {
        var data = new FormData()
        data.append("nombre", nombre_u)
        data.append("apellidos", apellidos_u)
        data.append("numero_control", numero_control)
        data.append("user", user)
        data.append("pass", pass)
        $.ajax({
            type: "POST",
            url: "php/add_new_user.php",
            data: data,
            processData: false,
            contentType: false,
            success: function (resp) {
                if (resp == "1") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Se agrego un usuario de forma exitosa!!'
                    })
                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrio un error inesperado'
                    })
                }
                $("#frm-add-users").trigger("reset")
            }
        })
    } else {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Faltan datos por ingresar'
        })
    }
}

function cerrar() {
    $("#frm-add-users").trigger("reset")
}

function ConfirmRole() {
    let role = document.getElementById("rolemodal2").value
    let id_user = document.getElementById("idmodal2").value
    let operacion = 2, datos //asignar role
    datos = {
        "role": role,
        "id_user": id_user,
        "operacion": operacion
    }
    if (role != "") {
        $.ajax({
            type: "POST",
            url: "php/addroles.php",
            data: datos,
            success: function (resp) {
                if (resp === "Role asignado") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Se asigno el role de forma exitosa!!'
                    });
                } else if (resp == "El role ya existe") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'El role ya existe!!'
                    })
                } else if (resp == "Role no asignado") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'error',
                        title: 'El role no se pudo asignar'
                    })
                }
            }
        })
    } else {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Role no asignado'
        })
    }

}


