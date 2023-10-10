/**
 * 
 */

/**
 * Code by: Gerardo Jimenez Castillo
 */
export function deleteOptions(a) {
    $(a).empty();
}
export async function getOptionsTipoEmp() {
   await $.get('php/dataTipoE.php',function (data, textStatus, jqXHR) {
            let datos = data    
             addOptions('select_empleados',datos)    
            },'json'
        )
}
export async function getOptionsArea() {
        //here our function should be implemented 
       await $.get('php/dataArea.php',function (data, textStatus, jqXHR) {
            let datos = data    
            addOptions('select_area',datos)    
            },'json'
        )
}

function addOptions(elementselect,array) {
    let select = document.getElementsByName(elementselect)[0]
    for (let elemento of array) {
        var option = document.createElement("option")
        option.value = elemento.id
        option.text = elemento.nombre
        select.add(option)
    }
}

export function queryIdselects(tipo_e) {
    let data = JSON.stringify({"nom_tipo":tipo_e})
    $.post("php/dataselects.php", data, function (data, textStatus, jqXHR) { 
        let datos_t = data
        showDataResponseTipo(datos_t)
        },'json'
    )
}

export function queryIdselectsarea(area_e) {
    let data = JSON.stringify({"nom_area":area_e})
    $.post("php/dataselectArea.php", data, function (data, textStatus, jqXHR) {
        let datos = data
        showDataResponseArea(datos)
        },'json'
    )
}

function showDataResponseTipo(data) {
    let id_t = data[0].id
    $('#select_empleados').val(id_t)
}

function showDataResponseArea(data) {
    let id_a = data[0].id
    $('#select_area').val(id_a)
}

export function createCheckToggleDOM(element) {
    let togglechk = document.createElement('div')
    togglechk.innerHTML = '<div class="form-check form-switch" id="div_child_toggle"><input class="form-check-input" type="checkbox" role="switch" id="status_toggle"><label class="form-check-label" for="status_toggle" id="check_toggle"></label></div>'
    element.append(togglechk)
}