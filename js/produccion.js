/**
 * 
 */
import { formatoFecha } from './getfecha.js'
import { startProduccion, ultimaProduccion } from './startProduccion.js'
import { setMessageAlert } from './message.js'
import { consultaRemanente } from './funciones.js';
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$(document).ready(function () {
    var opcion
    var fila
    const hoy = new Date()
    //var fechayer = getfechaAnterior(hoy,'yy-mm-dd')
    var fechahoy = formatoFecha(hoy,'yy-mm-dd')
    var tablaProduc
    var ultimaProd = ultimaProduccion()
    // todo: 
    opcion = 1
    if (ultimaProd !== '') {
        var inicioProduc = startProduccion(fechahoy)
        if (inicioProduc !== 'Error') {
            var remanentes = ['Lingote Retorno','Pza Rechazada','Gota','Coladas']
            let datos =  remanentes.map(rem => rem)
            console.log(`Arreglo datos: ${datos}`)
                let data = JSON.stringify({
                    'opcion': opcion,
                    'ultimaprod': ultimaProd,
                    'fechahoy': fechahoy,
                    'remanente': datos
                })
                var queryRemanente = consultaRemanente(data)
        }
    }
    console.log(`Fecha de la última produccion: ${ultimaProd}`)
    
    tablaProduc = $('#production').DataTable({ 
        'ajax':{
            'url':'php/registProduccion.php',
            'method':'POST',
            'data':{opcion:opcion},
            'dataSrc':''
        },
        'columns':[
            {'data':'id'},
            {'data':'num_empleado'},
            {'data':'nombre'},
            {'data':'apellidos'},
            {'data':'clave'},
            {'data':'Aceptadas'},
            {'data':'Rechazadas'},
            {'defaultContent':"<div class='text-center'><div class='btn-group'><button class='btn btn-warning btn-sm btnEditar'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa-solid fa-trash-can'></i></button></div></div>"}
        ]
    })

    $('#registro_p').submit(function(e){    
        e.preventDefault() //evita el comportambiento normal del submit, es decir, recarga total de la página
        var id = $.trim($('#idEmpleado').val())
        var nombre = $.trim($('#nombreMoldeador').val())
        var apellidos = $.trim($('#apellidosMoldeador').val())
        var pieza = $.trim($('#clavePieza').val())
        var aceptadas = $.trim($('#aceptadas').val())
        var rechazadas = $.trim($('#rechazadas').val())
        if (id != '' && nombre != '' && apellidos != '' && pieza != '' && aceptadas != '' && rechazadas !='') {
            $.ajax({
                url: 'php/registProduccion.php',
                type: 'POST',
                datatype: 'json',
                data: {
                    id:id,
                    pieza:pieza,
                    aceptadas:aceptadas,
                    rechazadas:rechazadas,
                    opcion:opcion
                },    
                success: function() {
                    tablaProduc.ajax.reload(null, false)
                }
            })
        } else {
            alert('Intentalo nuevamente')
        }
    })

    $('#nuevoRegistro').click(function (e) { 
        opcion = 2
        var registro_id = null
        $('#registro_p').trigger('reset')
        $('#modalResgistros').modal('show')
    })

    $(document).on('click', '.btnEditar', function () {
        $('#modalResgistros').modal('show')
        opcion = 4
        fila = $(this).closest('tr')
        registro_id = fila.find('td:eq(0)').text()
        id = fila.find('td:eq(1)').text()
        nombre = fila.find('td:eq(2)').text() 
        apellidos = fila.find('td:eq(3)').text()
        pieza = fila.find('td:eq(4)').text()
        aceptadas = fila.find('td:eq(5)').text()
        rechazadas = fila.find('td:eq(6)').text()
        $('#controlNumber').val(id)
        $('#nombreMoldeador').val(nombre)
        $('#apellidosMoldeador').val(apellidos)
        $('#areaMoldeador').val('Fundicion 1')
        $('#clavePieza').val(pieza)
        $('#aceptadas').val(aceptadas)
        $('#rechazadas').val(rechazadas)
    })

    $(document).on('click','.btnBorrar', function () {
        opcion = 3
        fila = $(this)
        id = parseInt($(this).closest('tr').find('td:eq(0)').text())
        resp = confirm(`¿Estás seguro de eliminar el registro ${id} ?`)
        if (resp) {
            $.ajax({
                type: 'POST',
                url: 'php/registProduccion.php',
                data: {id:id,opcion:opcion},
                dataType: 'json',
                success: function () {
                    tablaProduc.row(fila.parents('tr')).remove().draw()
                }
            })
        } else {
            alert('Accion cancelada')
        }
    })

    $('#frm-rem-sobrante').submit(function (e) { 
        e.preventDefault()
        var nombre = document.getElementById('remRetorno').value
        var peso = document.getElementById('peso').value
        var desc = "sobrante"
        var peso_kg = parseFloat(peso)
        var dataPetition = JSON.stringify({
            "nombre": nombre,
            "peso": peso_kg,
            "descripcion": desc,
            "fechahoy": fechahoy
        })
        alert(`${nombre} su peso es ${typeof(peso)}Kg`)
        $.post('php/setSobranteRem.php', dataPetition,(dataresult, textStatus) => {
                if (dataresult === '1') {
                    setMessageAlert('Insercion exitosa!!','success')
                    consultaRemanente(data)
                }
                if (dataresult === '0') {
                    setMessageAlert('Error en la insercion!!','error')
                }
            }
        )
    })

})

