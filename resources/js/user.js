import  Chart  from "chart.js/auto"; 

Chart.defaults.color = "#adabab";
let chartId = document.getElementById('chart')
let OverallChart = new Chart(chartId,  {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Purple', 'Orange'],
      datasets: [{
        label: "Ok",
        data: [12, 19, 3,3],
        borderWidth: 0,
        backgroundColor: [
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(0, 174, 143)",
            "rgb(243, 90, 137)",
        ],
        borderRadius: 10,
        barThickness: 40, 
        borderSkipped: false,
      },
    ]
    },
    //This what i need for now on the axis
    options: {
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            display: false
          },
          border: {
            display: false
          },
          ticks: {
            callback: function(value) { 
                return "₵" + value;
             }
          }
        },
        x: {
            grid: {
                offset: true,
                display: false
              },
              border: {
                display: false
              },
        }
      },
      plugins:{
        legend: {
            display: false,
        }
      },
      responsive: true,
      aspectRatio: false,
    }
  })

 
document.getElementById('update').addEventListener("click", () => {
   OverallChart.data.datasets[0].data[1]= 100;
   OverallChart.data.labels[0]= "Roland Dodoo";

   OverallChart.update();
})

