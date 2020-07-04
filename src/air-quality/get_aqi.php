<?php 
    if(!isset($_SESSION)) 
        { 
            session_start();
            if(!isset($_SESSION["token"])){
                require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
                get_token();
            }
        } 
    $ts_lastest_data_LoRa1 = -1;
    $value_lastest_LoRa1 = array();
    $ts_lastest_data_Zwave1 = -1;
    $value_lastest_Zwave1 = array();

    if(isset($_POST["zone"]) && isset($_POST["type"])){
        $zone = $_POST["zone"];
        $type = $_POST["type"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

    function get_data_from_device($url_tb,$deviceID,$device){
        if( $device == "Zwave"){
            global $ts_lastest_data_Zwave1,$value_lastest_Zwave1;
        } else if ( $device == "LoRa"){
             global $ts_lastest_data_LoRa1,$value_lastest_LoRa1;
        }
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
            if ($device == "LoRa") {
                array_push($value_lastest_LoRa1,$obj["pm25"][0]["value"]);
                $ts_lastest_data_LoRa1 = $obj["pm25"][0]["ts"];
            } else if ($device == "Zwave"){
                array_push($value_lastest_Zwave1,$obj["co2"][0]["value"]);             
                array_push($value_lastest_Zwave1,$obj["voc"][0]["value"]);
                array_push($value_lastest_Zwave1,$obj["temperature"][0]["value"]);              
                array_push($value_lastest_Zwave1,$obj["humidity"][0]["value"]);            
                array_push($value_lastest_Zwave1,$obj["brightness"][0]["value"]);
                $ts_lastest_data_Zwave1 = $obj["co2"][0]["ts"];
            }
        }
    }

    function timeUpdate($a,$b){
        if ($a >= $b)
            return $a;
        else return $b;
    }
    get_data_from_device($url_tb,$deviceLoRa,"LoRa");
    get_data_from_device($url_tb,$deviceZwave,"Zwave");
    $lastest = timeUpdate($ts_lastest_data_LoRa1,$ts_lastest_data_Zwave1);
?>
<script type="text/javascript">
    var value_lastest_Zwave1 = <?php echo json_encode($value_lastest_Zwave1);?>;
    var ts_lastest_data_Zwave1 = <?php echo $ts_lastest_data_Zwave1;?>;
    var value_lastest_LoRa1 = <?php echo json_encode($value_lastest_LoRa1);?>;
    var ts_lastest_data_LoRa1 = <?php echo $ts_lastest_data_LoRa1;?>;
    function set_data_realtime(){
    set_data_Zwave1(value_lastest_Zwave1[0],value_lastest_Zwave1[1],value_lastest_Zwave1[2],value_lastest_Zwave1[3],value_lastest_Zwave1[4],ts_lastest_data_Zwave1);
    set_data_LoRa1(value_lastest_LoRa1,ts_lastest_data_LoRa1);
    $("#date").html("Ngày đo: " + convert_time(<?php echo $lastest; ?>));
    }
    set_data_realtime();
</script>