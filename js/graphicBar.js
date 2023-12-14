/**
 * 
 */

/**
 *  Code by: Gerardo Jimenez Castillo
 */
export const graphic = document.getElementById('chartProduccion')
export const year_act = new Date()
export let año = year_act.getFullYear().toString()
export const meses = ['1','2','3','4','5','6','7','8','9','10','11','12']
const months = ['En','Feb','Mar','Ab','May','Jun','Jul','Ag','Sep','Oct','Nov','Dic']
export let pzastotalesmes
export var data = JSON.stringify({'meses': meses,'año': año})

let graphicBar = new Chart(graphic, {
  type: 'bar',
  data: {
    labels: '',
    datasets: [{
      label: 'Año '+ año,
      data: '',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
    layout: {
      padding: 10
    }
  }
})

export function addData(chart, label, newData) {
  chart.data.labels = label
  console.log(newData)
  chart.data.datasets.forEach((dataset) => {
      dataset.data = newData;
  })
  chart.update()
}

export function removeData(chart) {
  chart.data.labels.pop()
  chart.data.datasets.forEach((dataset) => {
    dataset.data.pop()
  })
  chart.update()
}

export function queryBar(data) {
  $.ajax({
      async: false,
      type: "POST",
      url: "php/informationGraphics.php",
      data: data,
      dataType: "json",
      success: function (data) {
        if (data.status == 'ok') {
          pzastotalesmes = data.result
            removeData(graphicBar)
            addData(graphicBar,months,pzastotalesmes)
        }
        if (data.status == 'error') console.error('error')
      }
  })
}