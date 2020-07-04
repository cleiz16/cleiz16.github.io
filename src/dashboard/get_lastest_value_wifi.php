<?php 
    if(!isset($_SESSION)) 
        { 
            session_start();
            if(!isset($_SESSION["token"])){
                require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
                get_token();
            }
        } 
    $value_lastest_wifi = array();

    if(isset($_POST["zone"])){
        $zone = $_POST["zone"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

    function get_data_from_device($url_tb,$deviceID){
            global $value_lastest_wifi;
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
                array_push($value_lastest_wifi,$obj["temperature"][0]["value"]);              
                array_push($value_lastest_wifi,$obj["humidity"][0]["value"]);            
        }
    }
    get_data_from_device($url_tb,$deviceWifi);
?>
<script type="text/javascript">
    var value_lastest_wifi = <?php echo json_encode($value_lastest_wifi);?>;
    wifi_temperature_gauge.value = value_lastest_wifi[0];
    wifi_humidity_gauge.value = value_lastest_wifi[1];
</script>