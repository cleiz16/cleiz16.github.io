<?php
if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION["token"])){
            require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/generateToken/get_token.php');
            get_token();
    }
    } 
    $position = array();

    if(isset($_POST["zone"]) && isset($_POST["type"])){
        $zone = $_POST["zone"];
        $type = $_POST["type"];
    };

    require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/controller.php');

     function get_data_from_device($url_tb,$deviceID){
        global $position;
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
            array_push($position,$obj["longitude"][0]["value"]);
            array_push($position,$obj["latitude"][0]["value"]);     //smaller       
        }
    }
    get_data_from_device($url_tb,$deviceGPS);
?>
<script>
	var position = <?php echo json_encode($position);?>;
    console.log (position);
    var long = position[0];
    var lat = position[1];
</script>