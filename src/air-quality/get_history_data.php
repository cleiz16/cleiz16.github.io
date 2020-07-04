<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
    $tsCO2 = array();
	$dataCO2 = array();
    $dataPM25 = array();
    $tsPM25 = array();
    $data_aqi_PM25 = array();
    $data_aqi_PM10 = array();
    $quantity = 30;
	function data_history($url_tb,$deviceID,$datalabel){
        if($datalabel=="CO2"){
	        global $tsCO2,$dataCO2;
        } else if ($datalabel =="pm25"){
            global $dataPM25 , $tsPM25;
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
        if(!is_null($obj)){
    		if(!count($obj) == 0){
                $count = count($obj[$datalabel]) - 1;
        		for ($j = $count; $j >= 0; $j--){
                    if($datalabel=="CO2"){
                        $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                        array_push($tsCO2 , $date);
                        array_push($dataCO2 ,$obj[$datalabel][$j]["value"]);  
                    } else if ($datalabel == "pm25"){
                        $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                        array_push($tsPM25 , $date);
                        array_push($dataPM25 ,$obj[$datalabel][$j]["value"]);  
                    }              
                };
        }
        }
	}
    function data_history_for_aqi($url_tb,$deviceID,$data){
        global $quantity;
        if($data=="pm25"){
            global $data_aqi_PM25;
        } else if ($data =="pm10"){
            global $data_aqi_PM10;
        }
        $headers =array(
            'Accept: application/json',
            'X-Authorization: Bearer '. $_SESSION["token"]
        );
        $ch= curl_init();
        $url = $url_tb."/api/plugins/telemetry/DEVICE/".$deviceID."/values/timeseries?interval=60000&limit=".$quantity."&agg=NONE&keys=".$data."&startTs=".((time()-7200)*1000)."&endTs=".(time()*1000);
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
        if(!is_null($obj)){
            if(!count($obj) == 0){
                $count = count($obj[$data]) - 1;
                for ($j = $count; $j >= 0; $j--){
                    if ($data == "pm25"){
                        array_push($data_aqi_PM25 ,$obj["pm25"][$j]["value"]);  
                    } else if ($data =="pm10"){
                        array_push($data_aqi_PM10 ,$obj["pm10"][$j]["value"]);  
                    }
                    }              
                };
        }
        }
	data_history($url_tb,$deviceZwave,"CO2");
    data_history($url_tb,$deviceLoRa,"pm25");
    data_history_for_aqi($url_tb,$deviceLoRa,"pm25");

?>
<script type="text/javascript">
    var tslabelCO2 = <?php echo json_encode($tsCO2); ?>;
    var tslabelPM = <?php echo json_encode($tsPM25); ?>;
    var data_aqi_PM25 = <?php echo json_encode($data_aqi_PM25); ?>;
    var value_PM25 = <?php echo json_encode($dataPM25); ?>;
    var value_CO2 = <?php echo json_encode($dataCO2); ?>;

    // console.log(data_aqi_PM25);
    var data_PM = {
        labels: tslabelPM,
        datasets:[
            {
            label: 'Nồng độ bụi PM2.5',
            data: value_PM25,
            borderWidth: 1,
            backgroundColor:"blue",
            borderColor:"green",
            fill:false
            }]
    };
    var data_CO2 = {
        labels: tslabelCO2,
        datasets:[
            {
            label: 'Nồng độ CO2',
            data: value_CO2 ,
            borderWidth: 1,
            backgroundColor:"blue",
            borderColor:"black",
            fill:false
            }]
    };
</script>

