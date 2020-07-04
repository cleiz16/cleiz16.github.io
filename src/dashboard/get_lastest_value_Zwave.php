<?php 
    if(!isset($_SESSION)) 
        { 
            session_start();
            if(!isset($_SESSION["token"])){
                require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
                get_token();
            }
        } 
    $value_lastest_Zwave1 = array();

    if(isset($_POST["zone"])){
        $zone = $_POST["zone"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

    function get_data_from_device($url_tb,$deviceID){
            global $value_lastest_Zwave1;
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
        //Lưu trữ giá trị trả về
        if(!is_null($obj)){
                array_push($value_lastest_Zwave1,$obj["co2"][0]["value"]);             
                array_push($value_lastest_Zwave1,$obj["voc"][0]["value"]);
                array_push($value_lastest_Zwave1,$obj["temperature"][0]["value"]);              
                array_push($value_lastest_Zwave1,$obj["humidity"][0]["value"]);            
                array_push($value_lastest_Zwave1,$obj["brightness"][0]["value"]);
        }
    }
    get_data_from_device($url_tb,$deviceZwave);
?>
<script type="text/javascript">
    var value_lastest_Zwave1 = <?php echo json_encode($value_lastest_Zwave1);?>;
    zWave_co2_gauge.value = value_lastest_Zwave1[0];
    zWave_tvoc_gauge.value = value_lastest_Zwave1[1];
    zWave_temperature_gauge.value = value_lastest_Zwave1[2];
    zWave_humidity_gauge.value = value_lastest_Zwave1[3];
    zWave_brightness_gauge.value = value_lastest_Zwave1[4];
</script>