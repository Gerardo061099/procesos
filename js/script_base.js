/**
 *  script base de pruebas
 *  Este script se desarrollo para realizar pruebas en el sistema 
 */
const hoy = new Date();
function formatoFecha(fecha, formato) {
    const map = {
        dd: fecha.getDate(),
        mm: fecha.getMonth() + 1,
        yy: fecha.getFullYear().toString().slice(-2),
        yyyy: fecha.getFullYear()
    }
    return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])
}
var fechahoy = formatoFecha(hoy, 'dd/mm/yy')
$("#time").html("<p>Fecha: " + fechahoy + "<p/>")
$("#time2").html("<p>Fecha: " + fechahoy + "<p/>")
console.log(fechahoy)

function changeicon(a) {
    var dato = document.getElementById(a)
    switch (dato.className) {
        case "fa-solid fa-plus":
            dato.className = "fa-solid fa-minus"
            break;
        case "fa-solid fa-minus":
            dato.className = "fa-solid fa-plus"
            break;
        case "fa-solid fa-angle-down":
            dato.className = "fa-solid fa-angle-up"
            break;
        case "fa-solid fa-angle-up":
            dato.className = "fa-solid fa-angle-down"
            break;
        default:
            console.error("No hay class en el elemento")
    }
}

function showInfoMoldeador() {
    var numerOperador = document.getElementById('controlNumber').value
    var datos = {
        "numerOperador": numerOperador
    }
    $.ajax({
        type: "POST",
        url: "infomoldeador.php",
        data: datos,
        dataType: "json",
        success: function (data) {
            if (data.status === 'ok') {
                $('#apellidosMoldeador').val(data.result.apellidos)
                $('#areaMoldeador').val(data.result.area)
                $('#nombreMoldeador').val(data.result.nombre)
            } else {
                // mostramos un alert mediante una funcion previamente creada con dos parametros (mensaje,tipo = danger, success etc)
                alert('No existe ningun usuario con el número de control ingresado','danger')
                // esta funcion fue creada en el script script_user
            }
        }
    });
}

