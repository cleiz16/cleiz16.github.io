console.log(zone);
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

function set_data(pH,EC,temp,time_pH,time_EC,time_temp){
            addnewData_temp(time_temp,temp);
            addnewData_pH(time_pH,pH);
            addnewData_EC(time_EC,EC);
            document.getElementById("pH_index").innerHTML = pH;
            document.getElementById("EC_index").innerHTML = EC;
            document.getElementById("tempw_index").innerHTML = temp+"°C";
            document.getElementById("date").innerHTML = "Ngày đo: " + convert_time(timeUpdate(time_temp,time_EC,time_pH));
            setDivColor();
        }

        function convert_time(time){
        	var date = new Date(time);
        	var hours = ('0' + date.getHours()).slice(-2);
			// Minutes part from the timestamp
			var minutes = ('0' + date.getMinutes()).slice(-2);
			// Seconds part from the timestamp
			var seconds = ('0' + date.getSeconds()).slice(-2);

			// Will display time in 10:30:23 format
			var formattedTime =date.getDate() +"/"+ (date.getMonth()+1) + "/" + date.getFullYear()+"   " +hours + ':' + minutes+":"+seconds;
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
        if(data_Temp_w1.labels[data_Temp_w1.labels.length-1] != convert_time_get_hour(time)){
            data_Temp_w1.labels.push(convert_time_get_hour(time));
            data_Temp_w1.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
        }
    }

    function addnewData_pH(time,data){
        if(data_pH_w1.labels[data_pH_w1.labels.length-1] != convert_time_get_hour(time)){
            data_pH_w1.labels.push(convert_time_get_hour(time));
            data_pH_w1.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
        }
    }

    function addnewData_EC(time,data){
        if(data_EC_w1.labels[data_EC_w1.labels.length-1] != convert_time_get_hour(time)){
            data_EC_w1.labels.push(convert_time_get_hour(time));
            data_EC_w1.datasets.forEach((dataset) => {
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