/**
 *  script base ara mostrar datos de los empleados
 *  Cambiar iconos de los cards para mostrar ocultar el contenido
 *  Obtenemos la fecha del día
 */
$(document).ready(function () {
    var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll("[data-bs-toggle='tooltip']"))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
})

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
console.log(fechahoy)

function changeicon(a) {
    var dato = document.getElementById(a)
    switch (dato.className) {
        case 'fa-solid fa-plus':
            dato.className = 'fa-solid fa-minus'
            break;
        case 'fa-solid fa-minus':
            dato.className = 'fa-solid fa-plus'
            break;
        case 'fa-solid fa-angle-down':
            dato.className = 'fa-solid fa-angle-up'
            break;
        case 'fa-solid fa-angle-up':
            dato.className = 'fa-solid fa-angle-down'
            break;
        default:
            console.error('No existe el atributo class en el elemento')
    }
}

function showInfoMoldeador() {
    var numerOperador = document.getElementById('controlNumber').value
    var datos = {
        'numerOperador': numerOperador
    }
    $.ajax({
        type: 'POST',
        url: 'php/infomoldeador.php',
        data: datos,
        dataType: 'json',
        success: function (data) {
            if (data.status === 'ok') {
                $('#apellidosMoldeador').val(data.result.apellidos)
                $('#nombreMoldeador').val(data.result.nombre)
                $('#areaMoldeador').val(data.result.area)
            } else {
                // mostramos un alert mediante una funcion previamente creada con dos parametros (mensaje,tipo = danger, success etc)
                alertMessage('No existe ningun usuario con el número de control ingresado o este corresponda a otra area','danger')
                // esta funcion fue creada en el script script_user
            }
        }
    });
}

