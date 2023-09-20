/**
 * 
 */
import { formatoFecha } from './getfecha.js' 
import { setMessageAlert } from './message.js'
import { consultaRemanente } from './funciones.js'
import { ultimaProduccion } from './startProduccion.js'
/**
 * Codigo by: Gerardo Jimenez Castillo
 */
$(document).ready(function () {
    var options
    $('#form-mat-prima').submit(function (e) { 
        e.preventDefault()
        var nombre = document.getElementById('selectRem').value
        var peso = document.getElementById('cantidadMP').value
        var btn_radio = document.getElementsByName('btnradio')
        var descripcion
        var opcion
        const hoy = new Date()
        var fecha = formatoFecha(hoy,'yy-mm-dd')
        var ultimaProd = ultimaProduccion()
        var op
        var data
        if (nombre === 'Choose..' || peso === '') alert('Algunos datos estan vacio')
        if (nombre !== 'Choose..' && peso !== '') {
            opcion = 1
            console.log(fecha)
            for (var btn of btn_radio) {
                if (btn.checked && btn.value === 'Materia prima') {
                    op = 1 //opcion para insertar materia prima en la BD
                    console.log(`${nombre} ${peso} ${btn.value}`)
                    data = JSON.stringify({"nombre": nombre,"cantidad": peso,"op": op,"fecha": fecha})
                }
                if (btn.checked && btn.value === 'Remanente') { 
                    op = 2 //opcion para insertar remanente en la BD
                    descripcion = 'utilizado'
                    console.log(`${nombre} ${peso} ${btn.value}`)
                    data = JSON.stringify({"nombre": nombre,"cantidad": peso,"descripcion": descripcion,"op": op,"fecha": fecha})
                }
            }
            $.ajax({
                type: "POST",
                url: "php/remanenteMp.php",
                data: data,
                dataType: false,
                success: function (response) {
                    var remanentes = ['Lingote Retorno','Pza Rechazada','Gota','Coladas']
                        let datos =  remanentes.map(rem => rem)
                        console.log(`Arreglo datos: ${datos}`)
                            let data = JSON.stringify({
                                'opcion': opcion,
                                'ultimaprod': ultimaProd,
                                'fechahoy': fecha,
                                'remanente': datos
                            })
                    if (response === 'Insercion exitosa') {
                        setMessageAlert('Insercion exitosa','success')
                        consultaRemanente(data)
                        $('#form-mat-prima').trigger('reset')
                        $('#selectRem').empty()
                        $('#selectRem').append($('<option />', {
                            text: 'Choose..',
                            selected: true
                        }))
                    }
                    if (response === 'Error') setMessageAlert('Error al insertar los datos','danger')
                }
            })
        }
    })

    $('.btnradio').change(function (e) { 
        e.preventDefault()
        var radios = document.getElementsByName('btnradio')
        $('#selectRem').empty()//vaciamos las opciones
        for (var radio of radios){
            if (radio.checked && radio.value === 'Materia prima') {
                options = ['Choose..','Lingote Virgen','Placa']
                for (let i = 0; i < options.length; i++) {
                    $('#selectRem').append($('<option />', {
                        text: options[i],
                        value: options[i],
                    }))
                }
            }
            if (radio.checked && radio.value === 'Remanente') {
                options = ['Choose..','Lingote Retorno','Pza Rechazada','Gota','Coladas']
                for (let i = 0; i < options.length; i++) {
                    $('#selectRem').append($('<option />', {
                        text: options[i],
                        value: options[i],
                    }))
                }
            }
        }
    })
    
})