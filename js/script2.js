const $graficacirculo = document.querySelector("#circulo1");
// Las etiquetas son las porciones de la gráfica
const etiquetascirculo = ["Fundicion 1", "Fundicion 2", "Lija", "Empaque","ING. y Diseño","Administracion","Inspeccion Calidad","Jefes de Area","Almacen","Carpinteria","Chofer","Corte","Desarrollo de Proyectos","Herreria","Limpieza","Valvulas","Lavado","Mantenimiento","Pintura","Produccion","Recubrimiento","Seguridad","Tornos"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosIngresoscirculo = {
    data: [12.35,4.49,14.60,3.37,6.74,5.61,6.74,2.24,1.12,1.12,1.12,1.12,1.12,1.12,1.12,1.12,3.37,2.24,4.49,2.24,11.23,3.37,7.86], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
    backgroundColor: [
        '#E14D2A',
        '#FD841F',
        '#3E6D9C',
        '#F2D388',
        '#BAD1C2',
        '#e07a5f',
        '#3d405b',
        '#81b29a',
        '#f2cc8f',
        '#99d98c',
        '#34a0a4',
        '#f3722c',
        '#52796f',
        '#2f3e46',
        '#226f54',
        '#da2c38',
        '#f4d35e',
        '#b08968',
        '#06d6a0',
        '#f0a6ca',
        '#118ab2',
        '#bb9457',
        '#40798c'
    ]
};
new Chart($graficacirculo, {
    type: 'pie',// Tipo de gráfica. Puede ser dougnhut o pie
    data: {
        labels: etiquetascirculo,
        datasets: [
            datosIngresoscirculo,
            // Aquí más datos...
        ]
    },
});
// Obtener una referencia al elemento canvas del DOM
const $grafica = document.querySelector("#grafica");
// Las etiquetas son las que van en el eje X. 
const etiquetas = ["Enero", "Febrero", "Marzo", "Abril"]
// Podemos tener varios conjuntos de datos

const datosVentas2018 = {
    label: "Ventas por mes - 2018",
    data: [500, 900, 134, 2000], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(211,93,110, 0.2)',// Color de fondo
    borderColor: 'rgba(211,93,110, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};
const datosVentas2019 = {
    label: "Ventas por mes - 2019",
    data: [700, 700, 4500, 2500], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(209,234,163,0.5)',// Color de fondo
    borderColor: 'rgba(209,234,163,1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};
const datosVentas2020 = {
    label: "Ventas por mes - 2020",
    data: [5000, 1500, 8000, 5102], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
const datosVentas2021 = {
    label: "Ventas por mes - 2021",
    data: [10000, 1700, 5000, 5989], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(255, 159, 64, 0.2)',// Color de fondo
    borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};

new Chart($grafica, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datosVentas2018,
            datosVentas2019,
            datosVentas2020,
            datosVentas2021,
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