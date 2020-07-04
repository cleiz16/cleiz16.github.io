<?php
	if(!isset($_SESSION)) 
    	{ 
        	session_start();
        	if(!isset($_SESSION["token"])){
            	require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
           		get_token();
    		}
    	} 
    	date_default_timezone_set('Asia/Ho_Chi_Minh');

    if(isset($_POST["time_start"]) && isset($_POST["time_end"]) && isset($_POST["deviceType"])){

        $time_start = strtotime($_POST["time_start"])*1000;
        $time_end = strtotime($_POST["time_end"])*1000;
        $deviceType = $_POST["deviceType"]; 
        $zone = 1;
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');
    function data_history($url_tb,$deviceID,$time_start,$time_end,$datalabel){
        global $deviceType,$data;
        
		$headers =array(
			'Accept: application/json',
			'X-Authorization: Bearer '. $_SESSION["token"]
		);
		$ch= curl_init();
		$url = $url_tb."/api/plugins/telemetry/DEVICE/".$deviceID."/values/timeseries?interval=60000&limit=1000&agg=NONE&keys=".$datalabel."&startTs=".$time_start."&endTs=".$time_end;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Thực thi CURL
		$json = curl_exec($ch);
		// Ngắt CURL, giải phóng
		$result = curl_close($ch);
		// Giải mã chuỗi JSON
		$obj = json_decode($json,true);
        $data = $obj;
    }

    if(!strcmp($deviceType, 'BLE')){
        data_history($url_tb,$deviceBLE,$time_start,$time_end,"temperature,ph,tds");
    } elseif (!strcmp($deviceType, 'ZigBee')) {
        data_history($url_tb,$deviceZigBee,$time_start,$time_end,"temperature,humidity");
    } elseif (!strcmp($deviceType, 'Z-Wave')) {
        data_history($url_tb,$deviceZwave,$time_start,$time_end,"temperature,humidity,brightness,co2,voc");
    } elseif (!strcmp($deviceType, 'LoRa')) {
        data_history($url_tb,$deviceLoRa,$time_start,$time_end,"pm10,pm25");
    } elseif (!strcmp($deviceType, '4G')) {
        data_history($url_tb,$device4G,$time_start,$time_end,"Temperature,Humidity,Lux");
    } elseif (!strcmp($deviceType, 'wifi')) {
        data_history($url_tb,$deviceWifi,$time_start,$time_end,"temperature,humidity");
    } else {
        $data = array();
    }
?>
<script>
    var data = <?php echo json_encode($data);?>;
    var deviceType = <?php echo json_encode($deviceType);?>;
    var keys = Object.keys(data);
    for(var i=0;i<keys.length;i++){
        for (var j = 0; j < data[keys[i]].length; j++) {
            data[keys[i]][j].ts = convert_time(data[keys[i]][j].ts);
        }
    }
    function convert_time(time){
    var date = new Date(time);
    var hours = ('0' + date.getHours()).slice(-2);
    // Minutes part from the timestamp
    var minutes = ('0' + date.getMinutes()).slice(-2);
    // Seconds part from the timestamp
    var seconds = ('0' + date.getSeconds()).slice(-2);

    // Will display time in 10:30:23 format
    var formattedTime =date.getDate() +"-"+ (date.getMonth()+1) + "-" + date.getFullYear()+"   " +hours + ':' + minutes+":"+seconds;
    return String(formattedTime);
    }

    if (deviceType=="BLE"){
        ble_draw_table(data);
    } else if (deviceType=="ZigBee"){
        zigbee_draw_table(data);
    } else if (deviceType=="Z-Wave"){
        zwave_draw_table(data);
    } else if (deviceType=="LoRa"){
        lora_draw_table(data);
    } else if (deviceType=="4G"){
        _4G_draw_table(data);
    } else if (deviceType=="wifi"){
        zigbee_draw_table(data);
    } else {
        $('.place_table').html("fail");
    }
</script>

