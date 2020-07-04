var updateIntervalChart = 5000;
var ctx = document.getElementById('temperature_lte_Chart').getContext('2d');
var my_temp_l1_chart = new Chart(ctx, {
    type: 'line',
    data: data_Temp_l1,
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

var brightness_lte = document.getElementById('brightness_lte_Chart').getContext('2d');
var my_brightness_lte_chart = new Chart(brightness_lte, {
    type: 'line',
    data: data_EC_l1,
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

var humidity_l1 = document.getElementById('humidity_lte_Chart').getContext('2d');
var my_humidity_l1_chart = new Chart(humidity_l1, {
    type: 'line',
    data: data_humidity_l1,
    options: {
       responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 50,   
                    suggestedMax: 100,
                    // maxTicksLimit: 10  ,
                    stepSize: 5
                }
            }]
        }
    }
});


function removeData_temp_l_1() {
  if(data_Temp_l1.labels.length>30){
        this.data_Temp_l1.labels.shift();
        this.data_Temp_l1.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    my_temp_l1_chart.update();
}
function removeData_humidity_l_1() {
  if(data_humidity_l1.labels.length>30){
        this.data_humidity_l1.labels.shift();
        this.data_humidity_l1.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    my_humidity_l1_chart.update();
}
function removeData_EC_l_1() {
  if(data_EC_l1.labels.length>30){
        this.data_EC_l1.labels.shift();
        this.data_EC_l1.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
      }

    my_brightness_lte_chart.update();
}
setInterval(function(){removeData_temp_l_1();removeData_EC_l_1();removeData_humidity_l_1()}, updateIntervalChart);