/**
 *  todo: script base muestra datos de los empleados
 *  todo: Cambiar iconos de los cards para mostrar y ocultar el contenido
 */
//import * as remanente from './showTags.js'

$(document).ready(function () {
    
    var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll("[data-bs-toggle='tooltip']"))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    
    var tipoConsulta = 1
    $.ajax({
        type: 'POST',
        url: 'php/showresult.php',
        data: {tipoConsulta:tipoConsulta},
        dataType: 'json',
        success: function (data) {
            if (data.status === 'ok') {
                if (data.result.TotalAceptadas !== null && data.result.TotalRechazadas !== null) {
                    totalPiezas = parseInt(data.result.TotalAceptadas) + parseInt(data.result.TotalRechazadas)
                    $('#stock-accep').text(data.result.TotalAceptadas)
                    $('#stock-deni').text(data.result.TotalRechazadas)
                    $('#stock-total').text(totalPiezas)
                }
                if (data.result.TotalAceptadas === null && data.result.TotalRechazadas === null) {
                    $('#stock-accep').text('0')
                    $('#stock-deni').text('0')
                    $('#stock-total').text('0')
                }
            } else {
                $('#stock-accep').text('0')
                $('#stock-deni').text('0')
                $('#stock-total').text('0')
            }
        }
    })
})



function changeicon(a) {
    var dato = document.getElementById(a)
    switch (dato.className) {
        case 'fa-solid fa-plus':
            dato.className = 'fa-solid fa-minus'
            break
        case 'fa-solid fa-minus':
            dato.className = 'fa-solid fa-plus'
            break
        case 'fa-solid fa-angle-down':
            dato.className = 'fa-solid fa-angle-up'
            break
        case 'fa-solid fa-angle-up':
            dato.className = 'fa-solid fa-angle-down'
            break
        default:
            console.error('No existe el atributo class en el elemento')
    }
}

function showInfoMoldeador() {
    var numerOperador = document.getElementById('controlNumber').value
    var data = JSON.stringify({'numerOperador': numerOperador})
    $.ajax({
        type: 'POST',
        url: 'php/infomoldeador.php',
        data: data,
        dataType: 'json',
        success: function (data) {
            if (data.status === 'ok') {
                console.log(`El id del empleado es: ${data.result.id}`)
                $('#idEmpleado').val(data.result.id)
                $('#nombreMoldeador').val(data.result.nombre)
                $('#apellidosMoldeador').val(data.result.apellidos)
                $('#areaMoldeador').val(data.result.area)
            } else {
                // mostramos un alert mediante una funcion previamente creada con dos parametros (mensaje,tipo = danger, success etc)
                alertMessage('No existe ningun usuario con el número de control ingresado o este corresponda a otra area','danger')
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    })
                }, 5000)
                // esta funcion fue creada en el script script_user
            }
        }
    })
}

