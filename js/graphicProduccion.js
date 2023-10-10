/**
 * todo: Grafica de produccion piezas totales realizadas
 */
import {addData,removeData,graphic,año,queryBar,data,pzastotalesmes} from './graphicBar.js'
/**
 * ? By: Gerardo Jiménez Castillo
*/

Chart.defaults.borderColor = '#424949'
Chart.defaults.color = '#fff'

//console.log(`El año actual es: ${año}`)

queryBar(data)

console.log(pzastotalesmes)




