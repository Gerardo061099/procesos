/**
 * 
 * Tabla que muestra la produccion de fundicion 1 y sus funciones de CRUD
 */
$(document).ready(function () {
    var opcion
    opcion = 1
    tablaProduccion = $('#tableProduccion').DataTable({
        'ajax':{
            'url':'php/Prod.php',
            'method':"POST",
            'data':{opcion:opcion},
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'nombre'},
            {'data':'apellidos'},
            {'data':'clave'},
            {'data':'Aceptadas'},
            {'data':'Rechazadas'},
            {'defaultContent':"<div class='text-center'><div class='btn-group'><button class='btn btn-warning btn-sm btnEditar'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa-solid fa-trash-can'></i></button></div></div>"}
        ]
    })
    $('#frm-editProd').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id = $.trim($('#id').val())
        nombre = $.trim($('#nombre').val())
        apellidos = $.trim($('#apellidos').val())
        pieza = $.trim($('#pieza').val())
        aceptadas = $.trim($('#aceptadas').val())
        rechazadas = $.trim($('#rechazadas').val())              
            $.ajax({
                url: 'php/Prod.php',
                type: 'POST',
                datatype: 'json',
                data:  {
                    id:id,
                    nombre:nombre, 
                    apellidos:apellidos, 
                    pieza:pieza, 
                    aceptadas:aceptadas, 
                    rechazadas:rechazadas,
                    opcion:opcion
                },    
                success: function(data) {
                    tablaUsuarios.ajax.reload(null, false);
                }
            })
        $('#modalCRUD').modal('hide')     			
    })

    var fila
    $(document).on('click','.btnEditar',function () {
        opcion = 2
        fila = $(this).closest('tr')
        id = fila.find('td:eq(0)').text()
        nombre = fila.find('td:eq(1)').text()
        apellidos = fila.find('td:eq(2)').text()
        pieza = fila.find('td:eq(3)').text()
        aceptadas = fila.find('td:eq(4)').text()
        rechazadas = fila.find('td:eq(5)').text()
        $('#id').val(id)
        $('#nombre').val(nombre)
        $('#apellidos').val(apellidos)
        $('#pieza').val(pieza)
        $('#aceptadas').val(aceptadas)
        $('#rechazadas').val(rechazadas)
        $('#editProd').modal('show')
    })
    $(document).on('click','.btnBorrar',function (){
        return console.log('Presionaste el boton eliminar')
    })
})