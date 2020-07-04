    var count = 0;
    var totalPM10 = 0;
    var totalPM25 = 0;
    var avgPM25 =0;
    var avgPM25 = 0;
    var AQIPM10 = -1;
    var AQIPM25 = -1;
    var AQI = -1;
    var times = 12;

    function set_data_Zwave1(CO2,TVOC,temp,hum,Lux,time){
        addnewDataCO2(time,CO2);
        document.getElementById("CO2_index").innerHTML = CO2;
        document.getElementById("TVOC_index").innerHTML =TVOC;
        document.getElementById("temp_index").innerHTML = temp +"°C";
        document.getElementById("hum_index").innerHTML = hum + "%";
        document.getElementById("cdas_index").innerHTML = Lux;
    }
    function set_data_LoRa1(PM25,time){
        addnewDataPM(time,PM25);
        document.getElementById("PM25_index").innerHTML =PM25;
    }

        function convert_time(time){
            var date = new Date(time);
            var hours = ('0' + date.getHours()).slice(-2);
            // Minutes part from the timestamp
            var minutes = ('0' + date.getMinutes()).slice(-2);
            // Will display time in 10:30:23 format
            var formattedTime =date.getDate() +"/"+ (date.getMonth()+1) + "/" + date.getFullYear()+"   " +hours + ':' + minutes;
            return formattedTime;
        }

        function convert_time_get_hour(time){
            var date = new Date(time);
            var hours = ('0' + date.getHours()).slice(-2);
            // Minutes part from the timestamp
            var minutes = ('0' + date.getMinutes()).slice(-2);
            // Seconds part from the timestamp
            var seconds = ('0' + date.getSeconds()).slice(-2);
            // Will display time in 10:30:23 format
            var formattedTime = hours + ':' + minutes + ':' + seconds;
            return formattedTime;
        }
    function addnewDataCO2(time,data){
        if(data_CO2.labels[data_CO2.labels.length-1] != convert_time_get_hour(time)){
            data_CO2.labels.push(convert_time_get_hour(time));
            data_CO2.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
        }
    }
    function addnewDataPM(time,data){
        if(data_PM.labels[data_PM.labels.length-1] != convert_time_get_hour(time)){
        data_PM.labels.push(convert_time_get_hour(time));
        data_PM.datasets.forEach((dataset) => {
            dataset.data.push(data);
        }); 
    }
    }