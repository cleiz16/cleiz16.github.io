<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
    $tsCO2 = array();
	$dataCO2 = array();
    $dataPM25 = array();
    $tsPM25 = array();
    $dataPM10 = array();
    $tsPM10 = array();
    $quantity = 30;
	function data_history($url_tb,$deviceID,$datalabel){
        global $quantity;
        if($datalabel == "co2"){
	        global $tsCO2,$dataCO2;
        } else if ($datalabel == "pm25"){
            global $dataPM25 , $tsPM25;
        } else if ($datalabel == "pm10"){
            global $dataPM10 , $tsPM10;
        }
		$headers =array(
			'Accept: application/json',
			'X-Authorization: Bearer '. $_SESSION["token"]
		);
		$ch= curl_init();
		$url = $url_tb."/api/plugins/telemetry/DEVICE/".$deviceID."/values/timeseries?interval=60000&limit=".$quantity."&agg=NONE&keys=".$datalabel."&startTs=".((time()-7200)*1000)."&endTs=".(time()*1000);
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
                    if($datalabel=="co2"){
                        $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                        array_push($tsCO2 , $date);
                        array_push($dataCO2 ,$obj[$datalabel][$j]["value"]);  
                    } else if ($datalabel == "pm25"){
                        $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                        array_push($tsPM25 , $date);
                        array_push($dataPM25 ,$obj[$datalabel][$j]["value"]);  
                    } else if ($datalabel == "pm10"){
                        $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                        array_push($tsPM10 , $date);
                        array_push($dataPM10 ,$obj[$datalabel][$j]["value"]);  
                    }              
                };
        }
        }
	}
	data_history($url_tb,$deviceLoRa,"co2");
    data_history($url_tb,$deviceLoRa,"pm25");
    data_history($url_tb,$deviceLoRa,"pm10");

?>
<script type="text/javascript">
    var type = <?php echo json_encode($type);?>;
    var tslabelCO2 = <?php echo json_encode($tsCO2); ?>;
    var tslabelpm25 = <?php echo json_encode($tsPM25); ?>;
    var tslabelpm10 = <?php echo json_encode($tsPM10); ?>;
    var value_pm25 = <?php echo json_encode($dataPM25); ?>;
    var value_pm10 = <?php echo json_encode($dataPM10); ?>;
    var value_CO2 = <?php echo json_encode($dataCO2); ?>;
    if (tslabelpm10.length >= tslabelpm25.length){
        var tslabel = tslabelpm10;
    } else {
        var tslabel = tslabelpm25;
    }
</script>

