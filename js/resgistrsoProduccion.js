/**
 * 
 */

function registredProduct() {
    var empleado = document.getElementById('controlNumber').value
    var clavePieza = document.getElementById('clavePieza').value
    var pzasAcept = document.getElementById('aceptadas').value
    var pzasRech = document.getElementById('rechazadas').value
    $.ajax({
        type: 'POST',
        url: 'php/registredProduccion.php',
        data: {
            'idEmpleado': empleado,
            'clavePieza': clavePieza,
            'pzasAcept': pzasAcept,
            'pzasRech': pzasRech
        },
        dataType: false,
        success: function (resp) {
            if (resp === '1') {
                alertMessage('Insercion Exitosa','success')
            }
            if (resp === '0') {
                alertMessage('Error al capturar los datos','danger')
            }
            if (resp === 'Datos vacios') {
                alertMessage('Datos sin valor, vuelve a intentarlo','warning')
            }
        }
    });

}
