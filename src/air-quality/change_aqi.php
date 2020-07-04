<?php
if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION["token"])){
            require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
            get_token();
        }
    }
	$arr_PM25 = array();
	$total = -1;
	$avgPM25 = -1;
	$time_now = time();
	$seconds_now = date('s',$time_now);
	$minutes_now = date ('i', $time_now);
	$time_round = $time_now - $seconds_now - ($minutes_now-1)*60;
	$AQIPM25 =-1;

   if(isset($_POST["zone"]) && isset($_POST["type"])){
        $zone = $_POST["zone"];
        $type = $_POST["type"];
    };
    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');
	    function avg_PM25($url_tb,$deviceID){
            global $arr_PM25,$time_round;
            $headers =array(
                'Accept: application/json',
                'X-Authorization: Bearer '.$_SESSION["token"]
            );
            $ch= curl_init();
            $url = $url_tb."/api/plugins/telemetry/DEVICE/".$deviceID."/values/timeseries?interval=60000&limit=100&agg=NONE&keys=pm25&startTs=".(($time_round-3600)*1000)."&endTs=".(($time_round)*1000);
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
                    $count = count($obj["pm25"]) - 1;
    	            for ($j = $count; $j >= 0; $j--){
    	                array_push($arr_PM25 ,$obj["pm25"][$j]["value"]);  
    	                }               
                }
            };
        }
    function cal_AQI($url_tb,$deviceID){
    	global $avgPM25,$arr_PM25,$total,$AQIPM25;
    	avg_PM25($url_tb,$deviceID);
		foreach ($arr_PM25 as $key) {
			$total+=$key;
		}
        if (count($arr_PM25)==0){
            $AQIPM25=-10;
        }else{
		$avgPM25 = $total/count($arr_PM25);

		if($avgPM25 < 25){
            $AQIPM25 = 2 * $avgPM25;
            } else if ($avgPM25 >= 25 && $avgPM25 < 50){
                $AQIPM25 = round(2 * ($avgPM25 - 25)) +50;
            } else if ($avgPM25 >= 50 && $avgPM25 < 80){
                $AQIPM25 = round(1.67 * ($avgPM25 - 50)) +100;
            } else if ($avgPM25 >= 80 && $avgPM25 < 150){
                $AQIPM25 = round(1.43 * ($avgPM25 - 80)) +150;
            } else if ($avgPM25 >= 150 && $avgPM25 < 250){
                $AQIPM25 = round($avgPM25 - 150) +200;
            } else if ($avgPM25 >= 250){
                $AQIPM25 = round($avgPM25 - 420) +300;
            } 
        }
	}
	cal_AQI($url_tb,$deviceLoRa);
	// echo "<br/>".$avgPM25."<br/>";
	// echo $AQIPM25."<br/>";
?>
<script type="text/javascript">
	var AQIPM25 = <?php echo round($AQIPM25);?>;
	    function render_div(AQI){
        document.getElementById("aqis").innerHTML = AQI;
        add_Warning(AQI);
    	// document.getElementById("debug").innerHTML = totalPM25+" "+ totalPM10;
        }
    render_div(AQIPM25);
</script>