function get_location(){
if(zone == 1){
	$('#location_sensor').html(location_sensor[0]);
} else if(zone == 2){
	$('#location_sensor').html(location_sensor[1]);
} else if(zone == 3){
	$('#location_sensor').html(location_sensor[2]);
} else if(zone == 4){
	$('#location_sensor').html(location_sensor[3]);
};
};
function select_zone(){
		$('#dropdown_1').attr('href',"./index.php");
		$('#dropdown_2').attr('href',"./zone2.php");
		$('#dropdown_3').attr('href',"./zone3.php");
		$('#dropdown_4').attr('href',"./zone4.php");
};
function set_data(hum,EC,temp,time_hum,time_EC,time_temp){
            addnewData_temp(time_temp,temp);
            addnewData_humidity(time_hum,hum);
            addnewData_EC(time_EC,EC);
            document.getElementById("humidity_index").innerHTML = hum + "%";
            document.getElementById("EC_index").innerHTML = EC;
            document.getElementById("tempw_index").innerHTML = temp + "°C";
            document.getElementById("date").innerHTML = "Ngày đo: " + convert_time(timeUpdate(time_EC,time_hum,time_temp));
            setDivColor();
        }
        // window.onload = get_data_wqi;
        function convert_time(time){
        	var date = new Date(time);
        	var hours = date.getHours();
			// Minutes part from the timestamp
			var minutes = "0" + date.getMinutes();
			// Seconds part from the timestamp
			var seconds = "0" + date.getSeconds();

			// Will display time in 10:30:23 format
			var formattedTime =date.getDate() +"/"+ (date.getMonth()+1) + "/" + date.getFullYear()+"   " +hours + ':' + minutes.substr(-2);
			return formattedTime;
        }
                function convert_time_get_hour(time){
            var date = new Date(time);
            var hours = date.getHours();
            // Minutes part from the timestamp
            var minutes = ('0' + date.getMinutes()).slice(-2);
            // Seconds part from the timestamp
            var seconds = ('0' + date.getSeconds()).slice(-2);
            // Will display time in 10:30:23 format
            var formattedTime = hours + ':' + minutes + ':' + seconds;
            return formattedTime;
        }

    function addnewData_temp(time,data){
        if(data_Temp_l1.labels[data_Temp_l1.labels.length-1] != convert_time_get_hour(time)){
            data_Temp_l1.labels.push(convert_time_get_hour(time));
            data_Temp_l1.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
        }
    }

    function addnewData_humidity(time,data){
        if(data_humidity_l1.labels[data_humidity_l1.labels.length-1] != convert_time_get_hour(time)){
            data_humidity_l1.labels.push(convert_time_get_hour(time));
            data_humidity_l1.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
        }
    }

    function addnewData_EC(time,data){
        if(data_EC_l1.labels[data_EC_l1.labels.length-1] != convert_time_get_hour(time)){
            data_EC_l1.labels.push(convert_time_get_hour(time));
            data_EC_l1.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
        }
    }

    function timeUpdate(a,b,c){
        if (a>=b){
            if(a>=c){
                return a;
            }else return c;
        } else if (b>=c){
            return b;
        }else return c;
    }