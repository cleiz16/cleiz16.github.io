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

    if(isset($_POST["zone"])){
        $zone = $_POST["zone"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

     function get_data_from_Zigbee($url_tb,$deviceID){
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
            array_push($value_lastest_land,$obj["temperature"][0]["value"]);

            array_push($ts_lastest_data_land,$obj["humidity"][0]["ts"]);
            array_push($ts_lastest_data_land,$obj["temperature"][0]["ts"]);              
        }
    }
    get_data_from_Zigbee($url_tb,$deviceZigBee);
?>
<script type="text/javascript">
    var value_lastest_land = <?php echo json_encode($value_lastest_land);?>;
    zigbee_temperature_gauge.value = value_lastest_land[1];
    zigbee_humidity_gauge.value = value_lastest_land[0];
    $('#zigBee_temperature_value').html(zigbee_temperature_gauge.value + " °C");
    $('#zigBee_humidity_value').html(zigbee_humidity_gauge.value + " %");

</script>
