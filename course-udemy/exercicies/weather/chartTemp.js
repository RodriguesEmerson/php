export default function createChart(labels, values) {
   Chart.register(ChartDataLabels);
   const ctx = document.getElementById('hourly-chart');
   const lower = Math.min(values);

   new Chart(ctx, {
      type: 'line',
      data: {
         labels: labels,
         datasets: [{
            data: values,
            borderWidth: 2,
            fill: true, // Habilitar preenchimento abaixo da linha
            tension: 0.4 // Suaviza a linha
         }]
      },
      options: {
         responsive: true, // Permite esticar o gráfico com base no container 
         maintainAspectRatio: false, // Faz o gráfico se ajustar ao container

         scales: {
            y: {
               grid: {
                  display: false,
               },
               // beginAtZero: true,
               min: lower, // Define o valor mínimo do eixo Y
               ticks: {
                  display: false // Desativa os números do eixo Y
               },
            },
            x: {
               grid: {
                  display: false,
               }
            }
         },
         layout: {
            padding: {
               top: 25, // Adiciona espaço no topo para evitar cortes
            }
         },
         plugins: {
            tooltip: {
               enabled: false // Desabilita os tooltips padrão
            },
            legend: false,
            afterDatasetsDraw: function (chart) {
               const ctx = chart.ctx;
               ctx.font = "12px Arial";
               ctx.fillStyle = "gray";
               ctx.textAlign = "center";
               ctx.textBaseline = "bottom";

               chart.data.datasets.forEach((dataset, i) => {
                  const meta = chart.getDatasetMeta(i);
                  meta.data.forEach((point, index) => {
                     const value = dataset.data[index];
                     ctx.fillText(value, point.x, point.y - 5);
                  });
               });
            },
            datalabels: {
               align: 'top',
               anchor: 'end',
               color: 'gray',
               font: { weight: 'bold' }
            }
         },
         animation: true,
      }
   });
};


