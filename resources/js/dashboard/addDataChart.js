function convert_time_get_hour(time){
    var date = new Date(time);
    var hours = ('0' + date.getHours()).slice(-2)
        // Minutes part from the timestamp
    var minutes = ('0' + date.getMinutes()).slice(-2);
        // Seconds part from the timestamp
    var seconds = ('0' + date.getSeconds()).slice(-2);
        // Will display time in 10:30:23 format
    var formattedTime = hours + ':' + minutes + ':' + seconds;
    return formattedTime;
}

function addnewDataCO2(time,data_CO2){
    if(tslabelCO2[tslabelCO2.length-1] != convert_time_get_hour(time)){
        tslabelCO2.push(convert_time_get_hour(time));
        value_CO2.push(data_CO2);
    }
    chart_CO2.update();
}
function addnewDataPM(time,data_pm25,data_pm10){
	if(tslabel[tslabel.length-1] != convert_time_get_hour(time)){
		tslabel.push(convert_time_get_hour(time));
		value_pm25.push(data_pm25);
		value_pm10.push(data_pm10);
    }
    chart_pm.update();
}