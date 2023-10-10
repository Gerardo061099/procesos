/**
 *  Graficas con informacion del remanente y
 *  consumos utilizados en producción
 */
Chart.defaults.borderColor = '#424949'
Chart.defaults.color = '#fff'
const dona = document.getElementById('myChart')
var pesoPlaca = '300 kg'
var piezarech = '250 kg'
var gota = '267 kg'
var coladas = '78 kg'
const data = {
    labels: ['Placa: '+pesoPlaca,'Gota: '+gota,'Pza rechazada: '+piezarech,'Coladas: '+coladas],
    datasets: [{
        label: 'Cantidad en kg',
        data: [300, 50, 100, 40],
        backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(72, 201, 176)'],
        hoverOffset: 4
    }]
};

new Chart(dona, {
    type: 'doughnut',
    data: data,
    options: {
        responsive:true,
        plugins: {
            legend: {
                position:'right',
                labels: {
                    // This more specific font property overrides the global property
                    font: {size: 10,},
                    boxWidth:10,
                }
            },
            maxWidth: 5,
            title: {
                display: true,
                text: 'Materia prima utilizada',
                padding:15
            }
        }
    }
});


const graphLine = document.getElementById('myChart2')
const data1 = {
    labels: ['Ramiro ','Ezequiel ','Daniel'],
    datasets: [{
        label: ['Piezas realizadas'],
        data: [ 99, 32, 45],
        backgroundColor: ['rgb(54, 162, 235,0.8)','rgb(255, 205, 86,0.8)','rgb(255, 99, 132,0.8)'],
        borderColor: ['rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(255, 99, 132)'],
        borderWidth:4,
        hoverOffset: 4
    }]
}
new Chart(graphLine, {
    type: 'bar',
    data: data1,
    options: {
        responsive: 1,
        plugins: {
            legend: {
                display:false,
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 10,
                    }
                }
            },
            title: {
                display: true,
                text: 'Empleados con mayor desempeño de hoy',
                padding: 15,
            },
            
        },
        layout: {
            padding: 10
        }
    }
});