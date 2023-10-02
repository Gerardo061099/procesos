/**
 * 
 */

/**
 * Code by: Gerardo Jimenez Castillo
 */
$(document).ready(function () {
    let suma
    $(document).on('change','#mod-rechazo-kg', function () {
        var kg_aceptados = document.getElementById('mod-aceptadas-kg').value
        var kg_rechazados = document.getElementById('mod-rechazo-kg').value
        if (typeof(kg_aceptados)!= 'number' && typeof(kg_rechazados) != 'number') {
        let kg_acept = parseFloat(kg_aceptados)
        let kg_rech = parseFloat(kg_rechazados)
        suma = kg_acept + kg_rech
        }
        $('#kg_tot_prod').text(''+suma);
    })

})


