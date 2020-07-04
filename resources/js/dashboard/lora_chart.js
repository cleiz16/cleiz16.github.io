var data_chart_pm = {
        labels: tslabel,
        datasets: [{
            label: 'pm2.5',
            data: value_pm25,
            fill:false,
            borderColor:"blue",
            borderWidth: 1
        },{
            label: 'pm10',
            data: value_pm10,
            fill:false,
            borderColor:"green",
            borderWidth: 2
        }
        ]
    };
var data_chart_CO2 = {
        labels: tslabelCO2,
        datasets: [{
            label: 'CO2',
            data: value_CO2,
            fill:false,
            borderColor:"blue",
            borderWidth: 1
        }
        ]
    };
var ctx_pm = document.getElementById('plotChart_pm').getContext('2d');
var chart_pm = new Chart(ctx_pm, {
    type: 'line',
    data: data_chart_pm,
    options: {
        responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    // suggestedMin: 00,   
                    // suggestedMax: 40,
                    maxTicksLimit: 10  ,
                    stepSize: 1
                }
            }]
        }
    }
});

var ctx_CO2 = document.getElementById('plotChart_CO2').getContext('2d');
var chart_CO2 = new Chart(ctx_CO2, {
    type: 'line',
    data: data_chart_CO2,
    options: {
        // responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    // suggestedMin: 00,   
                    // suggestedMax: 40,
                    maxTicksLimit: 10  ,
                    stepSize: 1
                }
            }]
        }
    }
});


var updateInterval = 2000;

function removeData_pm() {
	if(this.data_chart_pm.labels.length>30){
        this.data_chart_pm.labels.shift();
        this.data_chart_pm.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
    }
    chart_pm.update();
}
function removeData_CO2() {
    if(this.data_chart_CO2.labels.length>30){
    this.data_chart_CO2.labels.shift();
    this.data_chart_CO2.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
}
    chart_CO2.update();
}
setInterval(function(){
	removeData_pm();
    removeData_CO2();
}, 
	updateInterval);
