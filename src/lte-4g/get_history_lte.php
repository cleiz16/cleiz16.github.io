<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ts_temperature = array();
	$data_temperature = array();
    $data_humidity = array();
    $ts_humidity = array();
    $data_brightness = array();
    $ts_brightness = array();

	function data_history($url_tb,$deviceID,$datalabel){
        global $device;
        if($datalabel=="Temperature"){
	        global $ts_temperature,$data_temperature;
        } else if ($datalabel == "Humidity"){
            global $data_humidity , $ts_humidity;
        } else if ($datalabel =="Lux"){
            global $data_brightness , $ts_brightness;
        }
		$headers =array(
			'Accept: application/json',
			'X-Authorization: Bearer '. $_SESSION["token"]
		);
		$ch= curl_init();
		$url = $url_tb."/api/plugins/telemetry/DEVICE/".$deviceID."/values/timeseries?interval=60000&limit=30&agg=NONE&keys=".$datalabel."&startTs=".((time()-7200)*1000)."&endTs=".(time()*1000);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Thực thi CURL
		$json = curl_exec($ch);
		// Ngắt CURL, giải phóng
		$result = curl_close($ch);
		// Giải mã chuỗi JSON
		$obj = json_decode($json,true);
		//Lưu trữ giá trị trả về
        // var_dump($obj);
        if (!is_null($obj)){
    		if(!count($obj) == 0){
                $count = count($obj[$datalabel]) - 1;
        		for ($j = $count; $j >= 0; $j--){
                    $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                    if($datalabel=="Temperature"){
                        array_push($ts_temperature , $date);
                        array_push($data_temperature ,$obj[$datalabel][$j]["value"]);  
                    } else if ($datalabel == "Humidity"){
                        array_push($ts_humidity , $date);
                        array_push($data_humidity ,$obj[$datalabel][$j]["value"]);
                    } else if ($datalabel == "Lux"){
                        array_push($ts_brightness , $date);
                        array_push($data_brightness ,$obj[$datalabel][$j]["value"]);  
                    }             
                };
            }
        }
	}
	data_history($url_tb,$device4G,"Temperature"); 
    data_history($url_tb,$device4G,"Humidity");
    data_history($url_tb,$device4G,"Lux");
?>
<script type="text/javascript">
    var tslabel_temperature_4G = <?php echo json_encode($ts_temperature); ?>;
    var tslabel_humidity_4G = <?php echo json_encode($ts_humidity); ?>;
    var tslabel_brightness_4G = <?php echo json_encode($ts_brightness); ?>;
    var data_Temp_l1 = {
        labels: tslabel_temperature_4G,
        datasets:[
            {
            label: 'Nhiệt độ theo thời gian',
            data: <?php echo json_encode($data_temperature); ?>,
            borderWidth: 1,
            backgroundColor:"blue",
            borderColor:"black",
            fill:false
            }]
    };   
    var data_humidity_l1 = {
        labels: tslabel_humidity_4G,
        datasets:[
            {
            label: 'Độ ẩm theo thời gian',
            data: <?php echo json_encode($data_humidity); ?>,
            borderWidth: 1,
            backgroundColor:"yellow",
            borderColor:"green",
            fill:false
            }]
    };  
    var data_EC_l1 = {
        labels: tslabel_brightness_4G,
        datasets:[
            {
            label: 'Cường độ ánh sáng theo thời gian',
            data: <?php echo json_encode($data_brightness); ?>,
            borderWidth: 1,
            backgroundColor:"red",
            borderColor:"blue",
            fill:false
            }]
    };     
</script>
