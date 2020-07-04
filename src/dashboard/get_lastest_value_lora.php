<?php
    if(!isset($_SESSION)) 
        { 
            session_start();
            if(!isset($_SESSION["token"])){
                require_once($_SERVER['DOCUMENT_ROOT'].'../pr3tcurl/src/generateToken/get_token.php');
                get_token();
            }
        } 
    $ts_lastest_data_LoRa = array();
    $value_lastest_LoRa = array();

    if(isset($_POST["zone"])){
        $zone = $_POST["zone"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'../pr3tcurl/src/controller/controller.php');
function get_lastest_value_lora($url_tb,$deviceID){
        global $ts_lastest_data_LoRa,$value_lastest_LoRa;
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

                array_push($value_lastest_LoRa,$obj["pm25"][0]["value"]);
                array_push($ts_lastest_data_LoRa,$obj["pm25"][0]["ts"]);

                array_push($value_lastest_LoRa,$obj["pm10"][0]["value"]);
                array_push($ts_lastest_data_LoRa,$obj["pm10"][0]["ts"]);

                array_push($value_lastest_LoRa,$obj["co2"][0]["value"]);
                array_push($ts_lastest_data_LoRa,$obj["co2"][0]["ts"]);
        }
    }
    get_lastest_value_lora($url_tb,$deviceLoRa);
?>
<script>
    var value_lastest_LoRa = <?php echo json_encode($value_lastest_LoRa);?>;
    var ts_lastest_data_LoRa = <?php echo json_encode($ts_lastest_data_LoRa);?>;

    if(Number(ts_lastest_data_LoRa[0])>= Number(ts_lastest_data_LoRa[1])){
        var ts_lastest_pm = ts_lastest_data_LoRa[0];
    } else {
        var ts_lastest_pm = ts_lastest_data_LoRa[1];
    }
        addnewDataPM(ts_lastest_pm,value_lastest_LoRa[0],value_lastest_LoRa[1]);
        addnewDataCO2(ts_lastest_data_LoRa[2],value_lastest_LoRa[2]);
</script>