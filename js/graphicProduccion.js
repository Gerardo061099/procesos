/**
 * Grafica de produccion 
 */

/**
 * By: Gerardo Jiménez Castillo
 */
Chart.defaults.borderColor = '#424949'
Chart.defaults.color = '#fff'
const graphic = document.getElementById('chartProduccion')
const meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
let año= 2023;
new Chart(graphic, {
    type: 'bar',
    data: {
      labels: meses,
      datasets: [{
        label: 'Año '+ año,
        data: [0, 373, 0, 172, 138, 0, 312, 106, 0, 0, 0, 0],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });



