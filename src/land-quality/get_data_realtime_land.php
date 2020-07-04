<?php 
if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION["token"])){
            require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
            get_token();
    }
    } 
    $ts_lastest_data_land = array();
    $value_lastest_land = array();

    if(isset($_POST["zone"]) && isset($_POST["type"])){
        $zone = $_POST["zone"];
        $type = $_POST["type"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

     function get_data_from_device($url_tb,$deviceID){
        global $ts_lastest_data_land,$value_lastest_land;
        $headers =array(
            'Accept: application/json',
            'X-Authorization: Bearer '. $_SESSION["token"]
        );
        $ch= curl_init();
        $url = $url_tb."/api/plugins/telemetry/DEVICE/".$deviceID."/values/timeseries";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Thực thi CURL
        $json = curl_exec($ch);
        // Ngắt CURL, giải phóng
        $result = curl_close($ch);
        // Giải mã chuỗi JSON
        $obj = json_decode($json,true);
        // var_dump($obj);
        //Lưu trữ giá trị trả về  
        if (!is_null($obj)){
            array_push($value_lastest_land,$obj["humidity"][0]["value"]);
            array_push($value_lastest_land,$obj["ec"][0]["value"]); 
            array_push($value_lastest_land,$obj["temperature"][0]["value"]);

            array_push($ts_lastest_data_land,$obj["humidity"][0]["ts"]);
            array_push($ts_lastest_data_land,$obj["ec"][0]["ts"]); 
            array_push($ts_lastest_data_land,$obj["temperature"][0]["ts"]);              
        } else{
            array_push($value_lastest_land,-1);
            array_push($value_lastest_land,-1); 
            array_push($value_lastest_land,-1);              
            
            array_push($ts_lastest_data_land,0);
            array_push($ts_lastest_data_land,0); 
            array_push($ts_lastest_data_land,0);   
        }
    }
    get_data_from_device($url_tb,$deviceZigBee);
?>
<script type="text/javascript">
        //Ham set data
        function set_data(hum,EC,temp,time_hum,time_EC,time_temp,check){
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

    // window.onload = function(){set_data(
    //     <?php 
    //         foreach ($value_lastest_land as $key) {
    //             echo $key.",";
    //         }; 
    //         foreach ($ts_lastest_data_land as $key) {
    //             echo $key.",";
    //         };
    //         echo 0;
    //         ?>
    //         )};
    set_data(
        <?php 
            foreach ($value_lastest_land as $key) {
                echo $key.",";
            }; 
            foreach ($ts_lastest_data_land as $key) {
                echo $key.",";
            };
            echo 0;?>);

</script>
