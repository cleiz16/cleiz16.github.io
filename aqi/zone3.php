<?php
	require_once("../src/generateToken/get_token.php");
?>
<!DOCTYPE HTML>
<html>  
<head>
	<?php
		$zone = 3;
		$type = "air";
		require_once("../src/controller/controller.php");
        require_once("../src/air-quality/get_weather_info.php");     
    ?>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TRANG CHỦ</title>
		
	<!-- jquery -->
	<script type="text/javascript" src = "../vendors/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../vendors/js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="../vendors/js/jquery-ui/jquery-ui.css">

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.min.css">

	<!-- javascript -->
	<script type="text/javascript" src="../resources/js/air-quality/googleMap.js"></script>
	<script type="text/javascript" src="../resources/js/air-quality/aqi_icon.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script type="text/javascript" src="../resources/js/air-quality/location.js"></script>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../resources/css/mycss.css">
	<!-- icon font-awesome-->
	<link rel="stylesheet" type="text/css" href="../vendors/font-awesome/css/all.min.css">

</head>
<body>
	<!-- Nav Menu Section -->
	<?php 
		require_once('./view/navigation_bar.php');
	?>
	<!-- Content -->
<section id="content">

    <div class="container-fluid text-center">
  		<div class="container-fluid" >
			<div class="row">
				<!-- Cột trái -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
					<!-- div nhúng google map -->
					<div class="row shadow_box" style="margin-right: 5px;background-color: white">
       					<div id="googleMap" style="width:100%;height:554px"></div>
       				</div>
				</div>

				<!-- Cột phải -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	   				<div id="aqi_display" class="row shadow_box">
	   					<!-- Hiển thị chỉ số AQI -->
	   					<div class="col-lg-5 col-sm-5 col-md-5">
	   						<div class="text-center">
	   							<p style="text-align:center ;margin-top: 10px;font-weight:bold;">Chỉ số chất lượng không khí</p>		
	   						</div>
	   						<div id="divNumber" class="row" style="padding: 1px">
	   							<div class="col-lg-6 col-md-6 col-sm-6 text-right">
	   									<img id="pinIcon" src="">
	   							</div>
	   							
	   							<div class="col-lg-6 col-md-6 col-sm-6 text-left" style="padding: 1px">
	   							<span id="aqis" style="font-family: 'OpenSansBold';font-size: 65px; line-height: 100%;">-1</span>
	   							</div>
	   						</div>
	   					</div>

	   					<!-- Hiển thị cảnh báo về chỉ số AQI -->
	   					<div class="col-lg-7 col-sm-7 col-md-7" >
	   						<div class="warning_text">
								<p id="warning" style="font-weight: bold;font-size: 18px"><br /></p>
								<p id="description" style="font-weight: bold;font-size: 15px"></p>
							</div>	
	   					</div>
	   				</div>

	   				<!-- Hiển thị chi tiết các thông số -->
	   				<div id="aqi_detail" class="row text-center shadow_box" style="background-color: white;background-size: 100% 100%;"> 
	   					<div class="container text-left">
	   						<div class="row text-left" style="margin-left: 5px; margin-top: 15px;margin-bottom: 15px">
	   							<div class="col-lg-2 col-sm-3 col-md-2 aqi_index" data-toggle="tooltip" data-placement="top" title="Nồng độ CO2 trong không khí (ppm)">CO2:</div>

	   							<div id="CO2_index" class="col-lg-1 col-sm-1 col-md-1 aqi_index" ></div>

	   							<div class="col-lg-3 col-sm-5 col-md-3 aqi_index" data-toggle="tooltip" data-placement="top" title="Nồng độ bụi mịn PM 2.5 trong không khí (ppm)">PM 2.5:</div>	

	   							<div id="PM25_index" class="col-lg-1 col-sm-1 col-md-1 aqi_index"  ></div>

	   							<div class="col-lg-3 col-sm-5 col-md-3 aqi_index" data-placement="top" title="Nhiệt độ (tại khu công nghiệp)">Nhiệt độ: </div>	

	   							<div id="temp_index" class="col-lg-2 col-sm-2 col-md-2 aqi_index"></div>
	   						</div>
	   						<div class="row text-left"  style="margin-left: 5px; margin-bottom: 15px">

	   							<div class="col-lg-2 col-sm-3 col-md-2 aqi_index" data-toggle="tooltip" data-placement="top" title="Nồng độ các chất hữu cơ Carbon dễ bay hơi">TVOC:</div>

	   							<div id="TVOC_index" class="col-lg-1 col-sm-1 col-md-1 aqi_index" ></div>

	   							<div class="col-lg-3 col-sm-5 col-md-3 aqi_index" data-placement="top" title="Cường độ ánh sáng (lux)">Ánh sáng:</div>

	   							<div id="cdas_index" class="col-lg-1 col-sm-1 col-md-1 aqi_index" >
	   							</div>

	   							<div class="col-lg-3 col-sm-5 col-md-3 aqi_index" data-placement="top" title="Độ ẩm (tại khu công nghiệp)">Độ ẩm:</div>

	   							<div id="hum_index" class="col-lg-1 col-sm-1 col-md-1 aqi_index" ></div>	   							
	   						</div>
	   						<div class="row" >
	   							<div id="some_id" style="visibility: hidden"></div>
	   							<div id="send" style="visibility: hidden"></div>
	   						</div>
	   					</div>
	   				</div>

	   				<!-- Hiển thị vị trí trạm quan trắc và ngày giờ -->
	   				<div id="aqi_measure_place" class="row shadow_box" style="background-color: white;background-size: 100% 100%;">
	   					<div class="container-fluid">
	   						<div class="row text-left">
	   							<p style="margin-left: 50px; margin-top: 10px;"><i class="fa fa-map-marker"></i> Đo tại trạm quan trắc: </p>
	   							<p id="location_sensor"style="margin-left: 5px; margin-top: 10px;">_</p>
	   						</div>
	   					<div class="row">
	   					<div class="col-lg-6 col-sm-6 col-md-12">
	   						<div class="row text-left"	>
	   						<p id="date" style="margin-left: 35px;margin-top: 10px;">###</p>
	   						</div>
	   					</div>
					<div class="col-lg-6 col-sm-6 col-md-12 ">
						<?php
						require_once("../view/dropdown.php");
						?>
					</div>
					</div>	
				</div>
	   				</div>
	   				
	   				<!-- Thông tin thời tiết -->
	   				<div id="weather" class="row text-center shadow_box" style="background-color: white;background-size: 100% 100%;">
	   					<!-- Nhiệt độ -->
	   					<div class="container-fluid">
	   					<div class="row" style="margin-top: 10px">

	   					</div>
	   					<div class="row text-center">
	   					<div class="col-lg-4 col-sm-4 col-md-4">
	   						<img id="weather_icon" class=" text-center" style="margin-bottom: 5px; margin-top: 10px; width:40px;height:40px;">
	   						</img>
	   						<div id="owm_temp" class="text-center" style="margin-bottom: 10px";>
	   						</div>
	   					</div>
	   					<!-- Độ ẩm -->
	   					<div class="col-lg-4 col-sm-4 col-md-4">
	   						<div class="text-center">
	   							<img src="../resources/img/weather icon/humidity.png" style="margin-bottom: 5px;margin-top: 10px; width:40px;height:40px;">
	   						</div>
	   						<div id="owm_hum" class="text-center" style="margin-bottom: 10px;">
	   						</div>
	   					</div>
	   					<!-- Áp suất -->
	   					<div class="col-lg-4 col-sm-4 col-md-4">
	   						<div class="text-center">
	   							<img src="../resources/img/weather icon/atmospheric pressure.png" style="margin-bottom: 5px;margin-top: 10px; width:40px;height:40px;">
	   						</div>
	   						<div id="owm_pressure" class="text-center" style="margin-bottom: 10px;" >
	   						</div>
	   					</div>
	   					</div>
	   					</div>
	   				</div>

	   				<!-- Thông tin về chỉ số AQI -->
	   				<div id="divInfo" class="row text-center shadow_box" style="margin-bottom: 5px;padding-top: 15px;background-color: white">
	   					<?php
	   						require_once("../view/warning_scale.php");
	   					?>
	   				</div>
    			</div>
  			</div>
		</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="row text-center shadow_box" style="margin-right: 5px; margin-bottom: 10px;background-color: white;background-size: 100% 100%;">
						<canvas id ="CO2_Chart" style= "height:300px; width: 100%;"></canvas>
						</div>	
					</div>
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="row shadow_box" style="margin-bottom: 10px;background-color: white">
						<canvas id ="PM_Chart" style= "height:300px; width: 100%;"></canvas>
					</div>
					</div>
				</div>
			</div>
	</div>
<!-- </div> -->
</section>
<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW_JZqWqOevGvr8zcpV7j0yEC8DhIuBis&callback=myMap"></script>
	<script type="text/javascript" src="../resources/js/air-quality/realtime.js">
	</script>
	<?php 
		require_once("../src/air-quality/get_history_data.php");
		require_once("../src/air-quality/get_aqi.php");
		require_once("../src/air-quality/change_aqi.php");
	?>
	<script type="text/javascript" src="../resources/js/air-quality/chartjs.js"></script>
<!-- Refresh AQI Realtime -->
<script>
	function fetchdata(){
		var d = new Date();	
		var data = 	{
         				zone: 3,
         				type: 'air',
     				};
		var rftime = 3600000- d.getSeconds()*1000 - d.getMinutes()*60*1000;
	 $.ajax({
	  url: '../src/air-quality/change_aqi.php',
	  type: 'post',
	  data: data,
	  success: function(data){
	   // Perform operation on return value
	   $("#some_id").html(data);
	  },
	  complete:function(data){
	   setTimeout(fetchdata,rftime);
  }
 });
}
//refresh every 1 hour
$(document).ready(function(){
 setTimeout(fetchdata,3600000);
});
</script>

<!-- Refresh DIV#2 and Chart Realtime -->
<script>
	var updateInterval = 2000;
	var data = {
         zone: 3,
         type: 'air',
     };
  setInterval(function(){
    $.ajax({url: "../src/air-quality/get_aqi.php",
    type: 'POST',
    data: data,
    success: function(result){
      $("#some_id").html(result);
    }});
  },updateInterval);
</script>

<!-- Dropdown js external -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="../vendors/bootstrap/js/bootstrap.min.js"></script>



</body>
<footer>
	<section id="contact" style="background-color:#28A745">
      	<?php
    	require_once("../view/footer.php");
		?>
  	</section>
</footer>

</html>