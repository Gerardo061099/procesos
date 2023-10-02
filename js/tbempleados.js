/**
 * 
 */

/**
 * Code by: Gerardo Jimenez Castillo
 */


$(document).ready(function () {
    let tablaempleados
    let opcion = 1
    let data = JSON.stringify({opcion:opcion})
    tablaempleados = $('#tabla_empleados').DataTable({ 
        'ajax':{
            'url':'php/empleadosInfo.php',
            'method':'POST',
            'data':data,
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'nombre'},
            {'data':'apellidos'},
            {'data':'num_empleado'},
            {'data':'tipo'},
            {'data':'status',
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
            },},
            {'data':'area'},
            {'defaultContent':"<div class='text-center'><div class='btn-group'><button class='btn btn-warning btn-sm btnEditar'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa-solid fa-trash-can'></i></button></div></div>"}
        ]
    })
});