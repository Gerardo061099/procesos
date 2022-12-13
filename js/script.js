/*Obtener una referencia al elemento canvas del DOM*/
const $grafica1 = document.querySelector("#grafica1");
// Las etiquetas son las que van en el eje X. 
const etiquetas1 = ["Enero", "Febrero", "Marzo", "Abril"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosVentas202011 = {
    label: "Ventas por mes",
    data: [5000, 1500, 8000, 5102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($grafica1, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetas1,
        datasets: [
            datosVentas202011,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});
// Obtener una referencia al elemento canvas del DOM
const $graficas = document.querySelector("#grafica3");
// Las etiquetas son las que van en el eje X. 
const etiquetass = ["Enero", "Febrero", "Marzo", "Abril"]
// Podemos tener varios conjuntos de datos
const datosVentas2020s = {
    label: "Ventas por mes - 2020",
    data: [5000, 1500, 8000, 5102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
const datosVentas20210 = {
    label: "Ventas por mes - 2021",
    data: [10000, 1700, 5000, 5989], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(255, 159, 64, 0.2)',// Color de fondo
    borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};

new Chart($graficas, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetass,
        datasets: [
            datosVentas2020s,
            datosVentas20210,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});