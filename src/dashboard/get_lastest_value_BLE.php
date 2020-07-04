<?php 
if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION["token"])){
            require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
            get_token();
    }
    } 
    $value_lastest_water = array();

    if(isset($_POST["zone"])){
        $zone = $_POST["zone"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

     function get_data_from_BLE($url_tb,$device){
        global $ts_lastest_data_water,$value_lastest_water,$obj;
        $headers =array(
            'Accept: application/json',
            'X-Authorization: Bearer '. $_SESSION["token"]
        );
        $ch= curl_init();
        $url = $url_tb."/api/plugins/telemetry/DEVICE/".$device."/values/timeseries";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Thực thi CURL
        $json = curl_exec($ch);
        // Ngắt CURL, giải phóng
        $result = curl_close($ch);
        // Giải mã chuỗi JSON
        $obj = json_decode($json,true);
        return $obj;
    }
    
    function get_data_BLE($url_tb,$device){
        global $ts_lastest_data_water,$value_lastest_water;
        $data = get_data_from_BLE($url_tb,$device);
        if (!is_null($data)){
            array_push($value_lastest_water,$data["ph"][0]["value"]);
            if($data["ec"][0]["value"]!=" NAN"){
            array_push($value_lastest_water,$data["ec"][0]["value"]);
            } else
            array_push($value_lastest_water,0);
            array_push($value_lastest_water,$data["temperature"][0]["value"]);              
        }
    }
    get_data_BLE($url_tb,$deviceBLE);   
?>
<script type="text/javascript">
    var value_lastest_water = <?php echo json_encode($value_lastest_water);?>;
    ble_pH_gauge.value = value_lastest_water[0];
    ble_EC_gauge.value = value_lastest_water[1];
    ble_temp_gauge.value = value_lastest_water[2];
</script>
