<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $tsTemp = array();
	$dataTemp = array();
    $datapH = array();
    $tspH = array();
    $dataEC = array();
    $tsEC = array();

	function data_history($url_tb,$deviceID,$datalabel){
        if($datalabel=="temperature"){
	        global $tsTemp,$dataTemp;
        } else if ($datalabel =="ph"){
            global $datapH , $tspH;
        } else if ($datalabel =="tds"){
            global $dataEC , $tsEC;
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
                    $date = strval(date("H:i:s",$obj[$datalabel][$j]["ts"]/1000));
                    if($datalabel=="temperature"){
                        array_push($tsTemp , $date);
                        array_push($dataTemp ,$obj[$datalabel][$j]["value"]);  
                    } else if ($datalabel == "ph"){
                        array_push($tspH , $date);
                        array_push($datapH ,$obj[$datalabel][$j]["value"]);  
                    } else if ($datalabel == "tds"){
                        array_push($tsEC , $date);
                        if($obj[$datalabel][$j]["value"]!=" NAN"){
                            array_push($dataEC ,$obj[$datalabel][$j]["value"]); 
                        }else
                        array_push($dataEC ,0); 
                    }             
                };
            }
	   }
    }
	data_history($url_tb,$deviceBLE,"temperature");
    data_history($url_tb,$deviceBLE,"tds");
    data_history($url_tb,$deviceBLE,"ph");
?>
<script type="text/javascript">
    var tslabelTemp = <?php echo json_encode($tsTemp); ?>;
    var tslabelpH = <?php echo json_encode($tspH); ?>;
    var tslabelEC = <?php echo json_encode($tsEC); ?>;

    var data_Temp_w1 = {
        labels: tslabelTemp,
        datasets:[
            {
            label: 'Nhiệt độ theo thời gian',
            data: <?php echo json_encode($dataTemp); ?>,
            borderWidth: 1,
            backgroundColor:"blue",
            borderColor:"black",
            fill:false
            }]
    };   
    var data_pH_w1 = {
        labels: tslabelpH,
        datasets:[
            {
            label: 'Độ pH theo thời gian',
            data: <?php echo json_encode($datapH); ?>,
            borderWidth: 1,
            backgroundColor:"yellow",
            borderColor:"green",
            fill:false
            }]
    };  
    var data_EC_w1 = {
        labels: tslabelEC,
        datasets:[
            {
            label: 'Độ dẫn điện EC theo thời gian',
            data: <?php echo json_encode($dataEC); ?>,
            borderWidth: 1,
            backgroundColor:"red",
            borderColor:"blue",
            fill:false
            }]
    };     
</script>
