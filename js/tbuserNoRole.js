/**
 * 
 */

$(document).ready(function () {
    var opcion
    var fila
    opcion = 1
    showUsersRole = $('#userNoRole').DataTable({
        'ajax':{
            'url':'php/usersRole.php',
            'method': 'POST',
            'data':{
                opcion:opcion
            },
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'nombre'},
            {'data':'apellidos'},
            {'data':'user'},
            {'data':'numero_empleado'},
            {
                'data': 'id_role',
                render: function (data,type) {
                    if (type === 'display') {
                        let text = ''
                        switch (data) {
                            case null:
                                text = 'Sin Role'
                                break
                        
                            default:
                                text = 'Error'
                                break
                        }
                        return text
                    }
                    return data
                }
            },
            {'data':'create_at'},
            {'defaultContent':"<center><button type='button' class='btn btn-warning btn-sm addRole'><i class='fa-solid fa-pen-to-square'></i></button></center>"},
        ]
    })

    $('#form-role-user').submit(function (e) {
        opcion = 2
        fila = $(this)
        e.preventDefault()
        var id = $.trim($('#idmodal2').val())
        var role = $.trim($('#rolemodal2').val())
        $.ajax({
            type: 'POST',
            url: 'php/usersRole.php',
            data: {id: id,role: role,opcion:opcion},
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
                            title: 'Puede que el role este asignado a otro usuario'
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
                            title: 'Asignación de role exitosa!!'
                        })
                }
                $('#addRole').modal('hide')
                showUsersRole.ajax.reload(null,false)
                tablaUsers.ajax.reload(null, false)
            }
        });
    })


    $(document).on('click', '.addRole', function () {
        fila = $(this).closest('tr')
        id = parseInt(fila.find('td:eq(0)').text())
        nombre = fila.find('td:eq(1)').text()
        apellidos = fila.find('td:eq(2)').text()
        numControl = fila.find('td:eq(4)').text()
        $('#idmodal2').val(id)
        $('#nombremodal2').val(nombre)
        $('#apellidosmodal2').val(apellidos)
        $('#num_empleadomodal2').val(numControl)
        $('#rolemodal2').trigger('reset')
        $('#addRole').modal('show')
    })
})