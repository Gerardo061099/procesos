/**
 * 
 */
$(document).ready(function () {
    var opcion
    var fila
    opcion = 6
    tablaUsers = $('#tbUserRole').DataTable({
        'ajax':{
            'url':'php/Prod.php',
            'method':'POST',
            'data':{opcion:opcion},
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'Nombre'},
            {'data':'Apellidos'},
            {'data': 'user' },
            {'data':'numero_empleado'},
            {'data':'rolename'},
            { data:'estado',
            
                render: function (data,type) {
                    if (type === 'display') {
                        let claseName = ''
                        let status = ''
                        switch (data) {
                            case '0':
                                claseName = 'bg-danger'
                                status = 'Inactivo'
                            break
                            
                            case '1':
                                claseName = 'bg-success'
                                status = 'Activo'
                            break
                            
                            default:
                                claseName = 'error'
                                status = 'error'
                            break
                        }
                        return "<span class='badge rounded-pill "+claseName+"'>"+status+"</span>"
                    }
                    return data
                },
            },
            {'data':'create_at'},
            {'defaultContent':"<div class='btn-group' role='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-warning btn-sm' id='editarUser'><i class='fa-solid fa-pen-to-square'></i></button><button type='button' class='btn btn-danger btn-sm' id='btnEliminar'><i class='fa-solid fa-trash-can'></i></button></div>"},
        ]
    })

    $('#form-update-user').submit(function (e) { 
        e.preventDefault()
        var nombre = $.trim($('#nombremodal').val())
        var apellidos = $.trim($('#apellidosmodal').val())
        var numControl = $.trim($('#num_empleadomodal').val())
        var usuario = $.trim($('#usuariomodal').val())
        var pass = $.trim($('#passmodal').val())
        var estado = $.trim($('#estadomodal').val())
        var role = $.trim($('#rolemodal').val())
        // alert(id + ' ' +nombre + ' ' + apellidos + ' ' + numControl + ' ' + usuario + ' ' + pass + ' ' + estado + ' ' + role)
        if (pass === '') {
            $.ajax({
                type: 'POST',
                url: 'php/Prod.php',
                data: {
                    id:id,
                    nombre:nombre,
                    apellidos:apellidos,
                    numControl:numControl,
                    usuario:usuario,
                    pass:pass,
                    estado:estado,
                    role:role,
                    opcion:opcion
                },
                dataType: 'json',
                success: function (data) {
                    if (data === '') {
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
                            title: 'Error al actualizar'
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
                    tablaUsers.ajax.reload(null, false)
                }
            })
        } else {
            opcion = 9
            $.ajax({
                type: 'POST',
                url: 'php/Prod.php',
                data: {
                    id:id,
                    nombre:nombre,
                    apellidos:apellidos,
                    numControl:numControl,
                    usuario:usuario,
                    pass:pass,
                    estado:estado,
                    role:role,
                    opcion:opcion
                },
                dataType: 'json',
                success: function (data) {
                    if (data === '') {
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
                            title: 'Error al actualizar'
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
                    tablaUsers.ajax.reload(null, false)
                }
            })
        }
        $('#editUsers').modal('hide')
    })

    $('#frm-add-users').submit(function (e) {
        e.preventDefault()
        opcion = 7
        var nombre = $.trim($('#nombre').val())
        var apellidos = $.trim($('#apellidos').val())
        var numControl = $.trim($('#num_empleado').val())
        var usuario = $.trim($('#newUser').val())
        var pass = $.trim($('#pwd').val())
        if (nombre !== '' && apellidos !== '' && numControl !== '' && usuario !== '' && pass !== '') {
            $.ajax({
                type: 'POST',
                url: 'php/Prod.php',
                data: {nombre:nombre,apellidos:apellidos,numControl:numControl,usuario:usuario,pass:pass,opcion:opcion
                },
                dataType: 'json',
                success: function (data) {
                    if (data !== '') {
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
                            title: 'Verifique bien su infromación'
                        })
                    }
                    $('#add_user').modal('hide')
                    $('#frm-add-users').trigger('reset')
                    $('#show-item1').attr('hidden','true')
                    $('#show-item2').attr('hidden','true')
                    $('#show-item3').attr('hidden', 'true')
                    $('#show-pass').attr('hidden','true')
                    $('#confirm').removeAttr('hidden')
                    showUsersRole.ajax.reload(null, false)
                }
            })
        } else {
            alertMessage('Falta informacion','warning');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                })
            }, 5000)
        }
        
    })

    $(document).on('click','#editarUser', function(e) {
        opcion = 8
        $('#passmodal').val('')
        fila = $(this).closest('tr')
        id = parseInt(fila.find('td:eq(0)').text())
        nombre = fila.find('td:eq(1)').text()
        apellidos = fila.find('td:eq(2)').text()
        usuario = fila.find('td:eq(3)').text()
        numControl = fila.find('td:eq(4)').text()
        role = fila.find('td:eq(5)').text()
        status = fila.find('td:eq(6)').text()
        $('#idmodal').val(id)
        $('#nombremodal').val(nombre)
        $('#apellidosmodal').val(apellidos)
        $('#num_empleadomodal').val(numControl)
        $('#usuariomodal').val(usuario)
        $('#estadomodal').val(status)
        $('#rolemodal').val(role)
        $('#editUsers').modal('show')
    })
    $(document).on('click', '#btnEliminar', function () {
        opcion = 10
        fila = $(this)
        id = parseInt($(this).closest('tr').find('td:eq(0)').text())
        resp = confirm(`¿Estás seguro de eliminar el registro ${id}?`)
        if (resp) {
            $.ajax({
                type: 'POST',
                url: 'php/Prod.php',
                data: {id:id,opcion:opcion},
                dataType: 'json',
                success: function () {
                    tablaUsers.row(fila.parents('tr')).remove().draw();
                }
            })
        } else {
            alert('Accion cancelada')
        }
    })
})
