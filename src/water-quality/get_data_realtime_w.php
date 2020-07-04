<?php 
if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION["token"])){
            require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
            get_token();
    }
    } 
    $ts_lastest_data_water = array();
    $value_lastest_water = array();

    if(isset($_POST["zone"]) && isset($_POST["type"])){
        $zone = $_POST["zone"];
        $type = $_POST["type"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

     function get_data_from_device($url_tb,$device){
        global $ts_lastest_data_water,$value_lastest_water;
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
        // var_dump($obj);
        //Lưu trữ giá trị trả về  
        if (!is_null($obj)){
            array_push($value_lastest_water,$obj["ph"][0]["value"]);
            array_push($value_lastest_water,$obj["tds"][0]["value"]);
            array_push($value_lastest_water,$obj["temperature"][0]["value"]);              

            array_push($ts_lastest_data_water,$obj["ph"][0]["ts"]);
            array_push($ts_lastest_data_water,$obj["tds"][0]["ts"]); 
            array_push($ts_lastest_data_water,$obj["temperature"][0]["ts"]); 
        }
    }
    get_data_from_device($url_tb,$deviceBLE);
?>
<script type="text/javascript">

	var value_lastest_water = <?php echo json_encode($value_lastest_water);?>;
	var ts_lastest_data_water = <?php echo json_encode($ts_lastest_data_water);?>;
	console.log(value_lastest_water);
    set_data(value_lastest_water[0],value_lastest_water[1],value_lastest_water[2],ts_lastest_data_water[0],ts_lastest_data_water[1],ts_lastest_data_water[2]);
</script>
