import  Chart  from "chart.js/auto"; 

//Chart for the Income and Expenses
Chart.defaults.color = "#adabab";
let chartId = document.getElementById('chart')
let OverallChart = new Chart(chartId,  {
    type: 'bar',
    data: {
      labels: ['', '', '', '','', '','', '', '', '','', ''],
      datasets: [
        {
        label: "Ok",
        data: [0, 0, 0,0,0, 0, 0, 0,0, 0, 0, 0],
        borderWidth: 0,
        backgroundColor: [
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
            "rgb(0, 174, 143)",
        ],
        borderRadius: 6,
        // barThickness: 15, 
        borderSkipped: false,
      },
      {
        label: "Ok",
        data: [0, 0, 0,0,0, 0, 0, 0,0, 0, 0, 0],
        borderWidth: 0,
        backgroundColor: [
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
            "rgb(243, 90, 137)",
        ],
        borderRadius: 6,
        // barThickness: 15, 
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
  });

  //PieChart
  let pieChartId = document.getElementById('pie-chart');

  //Configure settings for pie chart
  let data = {
    labels: [
      'Income',
      'Expense',
    ],
    datasets: [{
      // label: 'My First Dataset',
      data: [parseFloat(income), parseFloat(expense)],
      backgroundColor: [
            "rgb(0, 174, 143)",
            "rgb(243, 90, 137)",
      ],
      hoverOffset: 4,
      hoverBorderWidth: 0,
      rotation: 110,
    }]
  }
  let PieChart = new Chart(pieChartId,{
    type: 'doughnut',
    data,
  });

  let filterBtn = document.querySelectorAll(".filter-btn");
  filterBtn.forEach(doc => 
    doc.addEventListener("click", function(event) {

    let target = event.target;
    filterBtn.forEach(btn => {
      btn.classList.remove('active');
      btn.ariaPressed = false;
    });

    doc.classList.add('active');
    doc.ariaPressed = true;



    fetch(`${app_url}/api/stats/${user_id}?filter=${target.dataset.filter}`,{
      method: "Get",
    })
    .then((response)=>{
      return response.json();
    })
    .then((result) => {
        if (!result.ok) {
          return ;
        }

        OverallChart.data.datasets[0].data = result.income["amounts"];
        OverallChart.data.datasets[1].data = result.expense["amounts"];
        OverallChart.data.labels= result.label["days"];
        OverallChart.update();

    });


  })
  );

  //Perform the search on page load
  fetch(`${app_url}/api/stats/${user_id}?filter=days`,{
    method: "Get",
  })
  .then((response)=>{
    return response.json();
  })
  .then((result) => {
      if (!result.ok) {
        return ;
      }

      OverallChart.data.datasets[0].data = result.income["amounts"];
      OverallChart.data.datasets[1].data = result.expense["amounts"];
      OverallChart.data.labels= result.label["days"];
      OverallChart.update();
  });

 

