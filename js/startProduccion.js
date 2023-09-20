/**
 * 
 */

/**
 * Codigo by: Gerardo Jimenez Castillo
 */
export function startProduccion(fecha){
    var action = 2
    var datosenv = JSON.stringify({
        'opcion': action,
        'fechahoy': fecha
    })
    $.post('php/tags.php', datosenv,(data, statuss) => {
            if (data.result === '1') {
                console.log("Ya se a iniciado la produccion previamente")
            }
            if (data.result === '2') {
                console.log("Se inicio la produccion")
            }
            if (data.result === '0') {
                console.log('Error')
            }
        },'json'//definimos el formato de datos recibido
    )
}
export function ultimaProduccion(){
    var resp
    $.ajax({
        async: false,
        type: 'GET',
        url: 'php/lastProduccion.php',
        data: false,
        dataType: "json",
        success: function (data) {
            if (data.status === 'ok') {
                resp = data.result.fecha_produccion
            }
            if (data.status === 'error') {
                resp = 'No se encontro la ultima produccion!'
            }
        }
    })
    return resp
}

