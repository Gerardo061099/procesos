/**
 * 
 */

$(document).ready(function () {
    
    $('#frmNewConsumos').submit(function (e) { 
        e.preventDefault();
        var excel = document.getElementById('filexcel').files[0]
        var fecha1 = document.getElementById('fecha1')
        var fecha2 = document.getElementById('fecha2')
        if(typeof(excel) != 'undefined' && fecha1.value != '' && fecha2.value != ''){
            alert('Archivo: '+excel.name+ '. Intervalos de fecha: '+fecha1.value+ ' - '+fecha2.value)
        }else {
            alert('Seleccione un archivo he intentelo nuevamente.')
        }
    })

})

