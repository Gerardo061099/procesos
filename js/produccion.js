/**
 * 
 */
import { formatoFecha } from './getfecha.js'
import { startProduccion, ultimaProduccion } from './startProduccion.js'
import { setMessageAlert } from './message.js'
import { consultaRemanente } from './funciones.js'
import { addData,removeData,graphic,año,queryBar,data,pzastotalesmes } from './graphicBar.js'
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$(document).ready(function () {
    var opcion
    var fila
    const hoy = new Date()
    var registro_id
    var area
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
                let data = JSON.stringify({'opcion': opcion,'ultimaprod': ultimaProd,'fechahoy': fechahoy,'remanente': datos})
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

    $('#nuevoRegistro').click(function(e) { 
        opcion = 2
        registro_id = null
        $('#registro_p').trigger('reset')
        $('#modalResgistros').modal('show')
    })

    $('#registro_p').submit(function(e) {   
        e.preventDefault() //evita el comportamiento normal del submit, es decir, recarga total de la página
        var num_c_emp = $.trim($('#controlNumber').val())
        var id_emp = $.trim($('#idEmpleado').val())
        var nombre = $.trim($('#nombreMoldeador').val())
        var apellidos = $.trim($('#apellidosMoldeador').val())
        var pieza = $.trim($('#clavePieza').val())
        var aceptadas = $.trim($('#aceptadas').val())
        var rechazadas = $.trim($('#rechazadas').val())
        var newData = {'registro_id':registro_id,'id':id_emp,'pieza':pieza,'aceptadas':aceptadas,'rechazadas':rechazadas,'opcion':opcion,'num_control':num_c_emp}
        if (num_c_emp != '' && nombre != '' && apellidos != '' && pieza != '' && aceptadas != '' ) {
            $.ajax({
                url: 'php/registProduccion.php',
                type: 'POST',
                datatype: 'json',
                data: newData,    
                success: function() {
                    tablaProduc.ajax.reload(null, false)
                    setMessageAlert('La información se insertó correctamente','success')
                    queryBar(data)
                }
            })
        } else {
            alert('Intentalo nuevamente')
        }
    })

    $(document).on('click', '.btnEditar', function () {
        $('#modalResgistros').modal('show')
        opcion = 4
        area = 'Fundicion 1'
        fila = $(this).closest('tr')
        registro_id = fila.find('td:eq(0)').text()
        var numero_em = fila.find('td:eq(1)').text()
        var nombre = fila.find('td:eq(2)').text() 
        var apellidos = fila.find('td:eq(3)').text()
        var pieza = fila.find('td:eq(4)').text()
        var aceptadas = fila.find('td:eq(5)').text()
        var rechazadas = fila.find('td:eq(6)').text()
        $('#controlNumber').val(numero_em)
        $('#nombreMoldeador').val(nombre)
        $('#apellidosMoldeador').val(apellidos)
        $('#areaMoldeador').val(area)
        $('#clavePieza').val(pieza)
        $('#aceptadas').val(aceptadas)
        $('#rechazadas').val(rechazadas)
    })

    $(document).on('click','.btnBorrar', function () {
        opcion = 3
        fila = $(this)
        var delete_id = parseInt($(this).closest('tr').find('td:eq(0)').text())
        var resp = confirm(`¿Estás seguro de eliminar el registro ${delete_id}?`)
        if (resp) {
            $.ajax({
                type: 'POST',
                url: 'php/registProduccion.php',
                data: {'id_delete':delete_id,'opcion':opcion},
                dataType: 'json',
                success: function () {
                    tablaProduc.row(fila.parents('tr')).remove().draw()
                    setMessageAlert('El registro se elimino exitosamente!!','success')
                    queryBar(data)
                }
            })
        } else {
            setMessageAlert('Accion cancelada','success')
        }
    })

    $('#frm-rem-sobrante').submit(function (e) { 
        e.preventDefault()
        var nombre = document.getElementById('remRetorno').value
        var peso = document.getElementById('peso').value
        var desc = "sobrante"
        var peso_kg = parseFloat(peso)
        var dataPetition = JSON.stringify({"nombre": nombre,"peso": peso_kg,"descripcion": desc,"fechahoy": fechahoy})
        if(nombre != 'Choose..' && peso_kg != '' ) {
            $.post('php/setSobranteRem.php', dataPetition,(dataresult, textStatus) => {
                if (dataresult === '1') {
                    setMessageAlert('Insercion exitosa!!','success')
                    consultaRemanente(data)
                }
                if (dataresult === '0') setMessageAlert('Error en la insercion!!','error')
            }) 
        } else{
            setMessageAlert('No se pudo completar el registro :(','error')
        }
    })

    $(document).on('click','.btn-total-producido',function (params) {
        function sumaPzasTotales(n1,n2) {
            return n1 + n2
        }
        function parsetoInt(num1,num2) {
            let number1 = parseInt(num1)
            let number2 = parseInt(num2)
            let total_suma_piezas = sumaPzasTotales(number1,number2)
            return total_suma_piezas
        }
        $.get('php/totalProduction.php', (data,status) => {
            console.log(data)
                $('#pza_aceptada').text(data[0].Total_A + ' Piezas')
                $('#pza_rechazada').text(data[0].Total_R + ' Piezas')
                let suma_total = parsetoInt(data[0].Total_A,data[0].Total_R)
                $('#pzas_totales').text(suma_total + ' Piezas') 
            },'json')
    })

})

