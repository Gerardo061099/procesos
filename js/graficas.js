/**
 *  Graficas con informacion del remanente y
 *  consumos utilizados en producción
 */

const ctx = document.getElementById('myChart');
var pesoPlaca = '300kg';
const data = {
    labels: [
        'Placa '+pesoPlaca,
        'Gota ',
        'Pza rechazada ',
        'Coladas '
    ],
    datasets: [{
        label: 'Cantidad en kg',
        data: [300, 50, 100, 40],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(72, 201, 176)'
    ],
        hoverOffset: 4
    }]
};

new Chart(ctx, {
    type: 'doughnut',
    data: data,
});