function initChart() {
    // Variables globales para el contexto y el gráfico
    var ctx1 = document.getElementById('chartBar1').getContext('2d');
    var chart1 = null;

    Livewire.on('chartRendered', function (chartData) {
        // Si el gráfico ya existe, destrúyelo antes de crear uno nuevo
        if (chart1) {
            chart1.destroy();
        }

        // Crear un nuevo gráfico
        chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: chartData.labels,  // Agregar etiquetas para cada barra
                datasets: [{
                    data: chartData.data,
                    backgroundColor: '#66a4fb'
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        display: false,
                        barPercentage: 0.5
                    },
                    y: {
                        gridlines: {
                            color: '#ebeef3'
                        },
                        ticks: {
                            fontColor: '#8392a5',
                            fontSize: 20,
                            min: 80,
                            max: 200,
                        }
                    }
                }
            }
        });
    });
}

// Llamar a la función de inicialización al cargar la página y después de cargar Livewire
document.addEventListener('DOMContentLoaded', function () {
    initChart();
    
    // Escuchar a Livewire para saber cuándo ha completado su proceso
    Livewire.hook('message.sent', () => {
        initChart();
    });
});
