/**
 * 
 */

/**
 * Codigo by: Gerardo Jimenez Castillo
 */

export function consultaRemanente(data) {
    $.ajax({ 
        type: 'POST',
        url: 'php/tags.php',
        data: data,
        dataType: 'json',
        success: function (dataResponse) {
            let remanentes = dataResponse.result
            console.log(remanentes)
                $('.lingoteR').text(`${remanentes[0]} kg`)
                $('.pzaRechazada').text(`${remanentes[1]} kg`)
                $('.GoteoR').text(`${remanentes[2]} kg`)
                $('.ColadaC').text(`${remanentes[3]} kg`)
                if (remanentes[0] > "0" && remanentes[1] > "0" && remanentes[2] > "0" && remanentes[3] > "0" ) {
                    $('#radio1').attr('disabled', true)
                    $('#btnReg').attr('disabled', true)
                }
        }
    })
}