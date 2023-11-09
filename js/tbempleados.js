/**
 * 
 */
import { getOptionsTipoEmp,getOptionsArea,deleteOptions, queryIdselects, queryIdselectsarea,createCheckToggleDOM } from './funciones_Modal_Emp.js'
import { setMessageAlert } from './message.js'
/**
 * Code by: Gerardo Jimenez Castillo
 */

$(document).ready(function () {
    let tablaempleados
    let opcion 
    let registro_id
    let nombre_empleado
    let apellidos
    let mensaje
    let num_empleado
    let area
    let fila
    let tipo_t
    let status_e
    let status_em
    let div_child_toggle
    let divToggle
    opcion = 1
    var datainfo = JSON.stringify({'opcion':opcion})
    tablaempleados = $('#tabla_empleados').DataTable({ 
        'ajax':{
            'url':'php/empleadosInfo.php',
            'method':'POST',
            'data':function (d) {
                return datainfo
                },
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'nombre'},
            {'data':'apellidos'},
            {'data':'num_empleado'},
            {'data':'tipo'},
            {'data':'status_e',
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
                            status = 'En planta'
                        break
                        
                        default:
                            claseName = 'error'
                            status = 'error'
                        break
                    }
                    return "<span class='badge rounded-pill "+claseName+"'>"+status+"</span>"
                }
                return data
            }
            },
            {'data':'area'},
            {'defaultContent':"<div class='text-center'><div class='btn-group'><button class='btn btn-dark btn-sm btnEditar'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-light btn-sm btnBorrar'><i class='fa-solid fa-trash-can'></i></button></div></div>"}
        ]
    })

    $('#addEmpleado').click(function (e) { 
        e.preventDefault()
        $('#title_form').text('Nuevos empleados')
        registro_id = null
        opcion = 2
        status_em = 1
        mensaje = "El usuario se agrego exitosamente!!"
        divToggle = document.getElementById('div_toggle')
        div_child_toggle = document.getElementById ('div_child_toggle')
        if (div_child_toggle !== null) { 
            div_child_toggle.remove()
            $('#div_toggle').text('')
        }
        deleteOptions('#select_empleados')
        deleteOptions('#select_area')
        $('#registred-empleado').trigger('reset')
        getOptionsTipoEmp()
        getOptionsArea()
        $('#Modal_empleados').modal('show')
    })

    $('#registred-empleado').submit(function (e) { 
        e.preventDefault()
        let datos
        nombre_empleado = $.trim($('#nombre_e').val())   
        apellidos = $.trim($('#apellidos_e').val())
        num_empleado = $.trim($('#num_e').val())
        area = $.trim($('#select_area').val())
        tipo_t = $.trim($('#select_empleados').val())
        if(num_empleado == '') num_empleado = null
        if(nombre_empleado !== '' && apellidos !== "" && area !== '' && tipo_t !== '') {
        datos = JSON.stringify({'nombre':nombre_empleado,'apellidos':apellidos,'num_e':num_empleado,'area_e':area,'tipo_t':tipo_t,'registro_id':registro_id,'opcion':opcion,'status_e':status_em})
            $.ajax({
                type: "POST",
                url: "php/empleadosInfo.php",
                data: datos,
                dataType: "json",
                success: function (data) {
                    if (data == 1) setMessageAlert(mensaje,'success')
                    if (data == 0) setMessageAlert('Ohh no a ocurrido un problema','error')
                    tablaempleados.ajax.reload(null,false)
                }
            })
        } else {
            setMessageAlert('Debes llenar toda la información que se te pide.','error')
        }
    })

    $(document).on('click','.btnEditar', async function () {
        $('#registred-empleado').trigger('reset')
        $('#title_form').text('Editar Informacion')
        $('#div_toggle').text('Status')
        mensaje = "El registro se acualizo correctamente!!"
        divToggle = document.getElementById('div_toggle')
        div_child_toggle = document.getElementById('div_child_toggle')
        if (div_child_toggle == null) createCheckToggleDOM(divToggle)
        opcion = 3
        deleteOptions('#select_empleados')
        deleteOptions('#select_area')
        await getOptionsTipoEmp()
        await getOptionsArea()
        fila = $(this).closest('tr')
        registro_id = fila.find('td:eq(0)').text()
        let nombre_op = fila.find('td:eq(1)').text()
        let apellidos_op = fila.find('td:eq(2)').text()
        let num_op = fila.find('td:eq(3)').text()
        let tipo_op = fila.find('td:eq(4)').text()
        status_e = fila.find('td:eq(5)').text()
        if (status_e == "En planta") {
            $('#status_toggle').attr('checked', true)
            $('#check_toggle').text('En planta')
            status_em = 1
        }
        if (status_e == "Inactivo") {
            $('#status_toggle').attr('checked', false)
            $('#check_toggle').text('Inactivo')
            status_em = 0
        }
        let area_op = fila.find('td:eq(6)').text()
        queryIdselects(tipo_op)
        queryIdselectsarea(area_op)
        $('#nombre_e').val(nombre_op)
        $('#apellidos_e').val(apellidos_op)
        $('#num_e').val(num_op)
        $('#Modal_empleados').modal('show')
    })

    $(document).on('change','#status_toggle', function (e) {
        e.preventDefault()
        let toggle = $(this).prop('checked')
        if (toggle == true) {
            status_em = 1
            console.log(status_em)
            $('#check_toggle').text('En planta')
        }
        if (toggle == false) {
            status_em = 0
            console.log(status_em)
            $('#check_toggle').text('Inactivo')
        }
    })

    $(document).on('click','.btnBorrar', function () {
        opcion = 4
        fila = $(this)
        let delete_row = parseInt($(this).closest('tr').find('td:eq(0)').text())
        let data = JSON.stringify({'opcion':opcion,'id_delete':delete_row})
        var resp = confirm(`¿Estás seguro de eliminar el registro ${delete_row}?`)
        if (resp) {
            $.ajax({
                type: "POST",
                url: "php/empleadosInfo.php",
                data: data,
                dataType: "json",
                success: function (data) {
                    if (data === '1') {
                        setMessageAlert('Se elimino el registro de manera exitosa!!','success')
                        tablaempleados.row(fila.parents('tr')).remove().draw()
                    } 
                    if (data === '0') {
                        setMessageAlert('Ohh ha ocurrido un error inesperado','error')
                    }
                }
            })
        } else {
            setMessageAlert('Accion cancelada','info')
        }
    })

})