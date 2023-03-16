/**
 *  Funciones para el CRUD de la tabla consumos
 *  Se utilisa la var opcion para mandar la accion que debe realizar php para 
 *  Insertar,Eliminar,Editar o Mostrar informacion de los consumos
 */

$(document).ready(function () {
    var opcion
    var fila
    opcion = 3 // ? valor 3, idicamos la consulta de informacion de consumos
    tablaConsumos = $('#tb-consumos').DataTable({
        'ajax':{
            'url':'php/Prod.php',
            'method':'POST',
            'data':{opcion:opcion},
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'concepto'},
            {'data':'cantidad'},
            {'data':'fecha'},
            {'defaultContent':"<div class='text-center'><div class='btn-group'><button class='btn btn-warning btn-sm btnEditar'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa-solid fa-trash-can'></i></button></div></div>"},
        ]
    })
    $('#frmNewConsumos').submit(function (e) { 
        e.preventDefault()
        var concepto = $.trim($('#concepto').val())
        var cantidad = $.trim($('#cantidad').val()) 
        //alert(`El Consumo es: ${concepto} con un stock de: ${cantidad}`)
        $.ajax({
            type: "POST",
            url: "php/Prod.php",
            data: {
                id:id,
                concepto:concepto,
                cantidad:cantidad,
                opcion:opcion
            },
            dataType: 'json',
            success: function () {
                tablaConsumos.ajax.reload(null, false);
            }
        })
        $('#consumosModal').modal('hide')
    })

    $('#newConsumo').click(function (e) { 
        opcion = 2 //* opcion para agregar un consumo
        id = null
        e.preventDefault()
        $('#frmNewConsumos').trigger('reset')
        $('#consumosModal').modal('show')
    })

    $(document).on('click','.btnEditar', function () {
        opcion = 4 // todo: opcion 4 para editar un registro de la tabla consumos 
        //alert('Editando registro')
        fila = $(this).closest('tr')
        id = parseInt(fila.find('td:eq(0)').text())
        concepto = fila.find('td:eq(1)').text()
        cantidad = fila.find('td:eq(2)').text()
        $('#concepto').val(concepto)
        $('#cantidad').val(cantidad)
        $('.modal-title').text('Editar')
        $('#consumosModal').modal('show')
    })

    $(document).on('click','.btnBorrar', function(){
        //alert('Funcion Borrar')
        opcion = 5 // todo: opcion para eliminar
        fila = $(this)
        id = parseInt($(this).closest('tr').find('td:eq(0)').text())
        resp = confirm(`¿Estás seguro de eliminar el registro ${id} ?`)
        if (resp) {
            $.ajax({
                type: "POST",
                url: "php/Prod.php",
                data: {id:id,opcion:opcion},
                dataType: "json",
                success: function () {
                    tablaConsumos.row(fila.parents('tr')).remove().draw();
                }
            })
        } else {
            alert('Accion cancelada')
        }
    })
})