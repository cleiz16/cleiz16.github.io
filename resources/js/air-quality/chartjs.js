var updateIntervalChart = 2000;
var ctx = document.getElementById('CO2_Chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: data_CO2,
    options: {
       responsive: false,
        scales: {
// xAxes: [{
//     display: true,
//     scaleLabel: {
//         display: true,
//         labelString: 'Time'
//     }
//  }],
            yAxes: [{
                ticks: {
                    // maxTicksLimit: 10  ,
                    stepSize: 10
                }
            }]
        }
    }
});

var ctx_PM = document.getElementById('PM_Chart').getContext('2d');
var pM_Chart = new Chart(ctx_PM, {
    type: 'line',
    data: data_PM,
    options: {
       responsive: false,
        scales: {
// xAxes: [{
//     display: true,
//     scaleLabel: {
//         display: true,
//         labelString: 'Time'
//     }
//  }],
            yAxes: [{
                ticks: {
                    suggestedMin: 30,   
                    suggestedMax: 60,
                    // maxTicksLimit: 10  ,
                    stepSize: 3
                }
            }]
        }
    }
});
function removeData_PM() {
  if(data_PM.labels.length>30){
        this.data_PM.labels.shift();
        this.data_PM.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    pM_Chart.update();
}
function removeData_CO2() {
  if(data_CO2.labels.length>30){
        this.data_CO2.labels.shift();
        this.data_CO2.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    myChart.update();
}
setInterval(function(){removeData_CO2();removeData_PM()}, updateIntervalChart);