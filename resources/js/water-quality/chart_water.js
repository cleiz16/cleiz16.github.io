var updateIntervalChart = 5000;
var ctx = document.getElementById('Temp_w1_Chart').getContext('2d');
var my_temp_w1_chart = new Chart(ctx, {
    type: 'line',
    data: data_Temp_w1,
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
                    suggestedMin: 20,   
                    suggestedMax: 40,
                    // maxTicksLimit: 10  ,
                    stepSize: 2
                }
            }]
        }
    }
});

var EC_w1 = document.getElementById('EC_w1_Chart').getContext('2d');
var my_EC_w1_chart = new Chart(EC_w1, {
    type: 'line',
    data: data_EC_w1,
    options: {
       responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 0,   
                    suggestedMax: 5,
                    // maxTicksLimit: 10  ,
                    stepSize: 0.5
                }
            }]
        }
    }
});

var pH_w1 = document.getElementById('pH_w1_Chart').getContext('2d');
var my_pH_w1_chart = new Chart(pH_w1, {
    type: 'line',
    data: data_pH_w1,
    options: {
       responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 0,   
                    suggestedMax: 14,
                    // maxTicksLimit: 10  ,
                    stepSize: 2
                }
            }]
        }
    }
});


function removeData_water_1() {
  if(data_Temp_w1.labels.length>30){
        this.data_Temp_w1.labels.shift();
        this.data_Temp_w1.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    my_temp_w1_chart.update();
}
function removeData_pH_w_1() {
  if(data_pH_w1.labels.length>30){
        this.data_pH_w1.labels.shift();
        this.data_pH_w1.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    my_pH_w1_chart.update();
}
function removeData_EC_w_1() {
  if(data_EC_w1.labels.length>30){
        this.data_EC_w1.labels.shift();
        this.data_EC_w1.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    my_EC_w1_chart.update();
}
setInterval(function(){removeData_water_1();removeData_EC_w_1();removeData_pH_w_1()}, updateIntervalChart);