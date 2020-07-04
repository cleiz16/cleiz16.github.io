<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Lay chuoi JSON thoi tiet hien tai cua Vi tri User
function getCurrentData($access_key) {
    $array_json = "http://api.openweathermap.org/data/2.5/weather?q=hanoi" . $access_key;
    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    return $obj;
}
 
//Lay chuoi JSON chua du lieu du bao thoi tiet trong 5 ngay
function getForecast($access_key) {
    $array_json = "http://api.openweathermap.org/data/2.5/forecast?q=hanoi" . "&units=metric" . $access_key;
    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    return $obj;
    $tokenAP = $obj->token;
    $tokenRefresh = $obj->refreshToken;
}
   if(isset($_POST["zone"])){
        $zone = $_POST["zone"];
    };
    $access_key = "&appid=8bfaec4ae29636a1b7df43d0adef4687";
    $current_obj = getCurrentData($access_key);
    $forcast_obj = getForecast($access_key);
    $current_temp = $current_obj->main->temp -273;
?>
<script>
    var id_weather = <?php echo $current_obj->weather[0]->id;?>;
    var description = <?php echo json_encode($current_obj->weather[0]->description);?>;
    var zone = <?php echo $zone;?>;
    var type = <?php echo json_encode($type);?>;
    var cur_temp = <?php echo json_encode($current_obj->main->temp);?>;
    var cur_humidity = <?php echo json_encode($current_obj->main->humidity);?>;
    var cur_pressure = <?php echo json_encode($current_obj->main->pressure);?>;
    var path_img_weather;
    var date = new Date();
    var hour = date.getHours();
    if (zone==1){
        var locations_map = <?php echo json_encode($locations_zone1); ?>;
    } else if (zone==2){
        var locations_map = <?php echo json_encode($locations_zone2); ?>;
    }  else if (zone==3){
        var locations_map = <?php echo json_encode($locations_zone3); ?>;
    } else if (zone==4){
        var locations_map = <?php echo json_encode($locations_zone4); ?>;
    }
    var location_sensor = <?php echo json_encode($locations_sensor);?>;
    if (zone == 1){
        path_img_weather = "./resources/img/weather icon/";
    } else 
    {
        path_img_weather = "../resources/img/weather icon/";
    }
    function setImageforweatherDiv(id,description){
    if (id_weather<300&&id_weather>199) {
        $('#weather_icon').attr("src", path_img_weather + "thunderstorm.png");
    }
    else if (id_weather<400&&id_weather>299) {
        $('#weather_icon').attr("src",path_img_weather + "shower rain.png");
    }
    else if (id_weather<600&&id_weather>499) {
        if(id_weather<505){
            $('#weather_icon').attr("src",path_img_weather + "raind.png");
        }
        else if(id_weather=511){
            $('#weather_icon').attr("src",path_img_weather + "snow.png");
        }
        else if(id_weather>519){
            $('#weather_icon').attr("src",path_img_weather + "rainn.png");
        }
    }
    else if (id_weather<700&&id_weather>599) {
        $('#weather_icon').attr("src",path_img_weather + "snow.png");
    }
    else if(id_weather<800&id_weather>699){
        $('#weather_icon').attr("src",path_img_weather + "mist.png");
    }
    else if (id_weather == 800) {
        if(hour<19&&hour>6){
            $('#weather_icon').attr("src",path_img_weather + "clearskyd.png");
        }
        else {
            $('#weather_icon').attr("src",path_img_weather + "clearskyn.png");
        }
    }
    else if (id_weather>800) {
        if(description=="few clouds"){
            if(hour<19&&hour>6){
            $('#weather_icon').attr("src",path_img_weather + "fewcloudsd.png");
        }
    }
            else{
            $('#weather_icon').attr("src",path_img_weather + "fewcloudsn.png");
        }
    }
        else if (description=="scattered clouds"){
            $('#weather_icon').attr("src",path_img_weather + "scattered clouds.png");
        }
        else{
            $('#weather_icon').attr("src",path_img_weather + "broken clouds.png");
        }
    }
    
    window.onload = function(){
        get_location(); 
        select_zone();       
        setImageforweatherDiv(id_weather,description);
        $('#owm_temp').html(Math.round(Number(cur_temp))-273 + "°C");
        $('#owm_hum').html(cur_humidity+"%");
        $('#owm_pressure').html(cur_pressure+"Pa");
        set_background_image();
        warning_scale();
        myMap();
    };

</script>