<?php
	require_once("../src/generateToken/get_token.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Tổng hợp</title>
	<!-- JQuery -->
	<script type="text/javascript" src = "../vendors/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../vendors/js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="../vendors/js/jquery-ui/jquery-ui.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.min.css">

	<!-- Script Library -->
	<!-- Analog Gauge -->
	<script src="../vendors/mikhus-gauge/gauge.min.js"></script>
	<!-- Chartjs -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<!-- CSS Style -->
	<link rel="stylesheet" type="text/css" href="../resources/css/dashboard.css">
	<link rel="stylesheet" href="../resources/fonts/fonts.css">
	<!-- font-awesome -->
	<link rel="stylesheet" type="text/css" href="../vendors/font-awesome/css/all.min.css">
	<?php
		$zone = 1;
		$type = "dashboard";
		require_once("../src/controller/controller.php");
		require_once("../src/dashboard/get_chart_data.php");
	?>
</head>
<body>
	<?php 
		require_once('../view/navigation_bar.php');
	?>
	<section>
	<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
			<div id="loRa_area" class="shadow_box">
				<div style="width: 100%">
					<p class="text-center header_title">BLE</p>
				</div>
				<div class="container-fluid">
					<div class="row text-center">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" >
							<canvas id="radialGauge"></canvas>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<canvas id="radialGauge2"></canvas>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<canvas id="radialGauge3"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div id="zigBee_area" class="shadow_box">
				<div>
					<p class="text-center" style="font-family: Repetition;font-size: 20px">ZigBee Device</p>
				</div>
					<canvas id="ZigBee_temperature" data-font-numbers="Repetition"></canvas>

				<div class="row text-center">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-md-4 offset-lg-4" >
					<div class="text-center value-box" data-toggle="tooltip" data-placement="top" title="Nhiệt độ">
					<div id="zigBee_temperature_value" class="value-box-inner">_</div>
					</div>
				</div>
				</div>
			
					<canvas id="ZigBee_humidity" data-font-numbers="Repetition"></canvas>
				<div class="row text-center">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-md-4 offset-lg-4" >
					<div  class="text-center value-box" data-toggle="tooltip" data-placement="top" title="Độ ẩm" style="">
						<div id="zigBee_humidity_value" class="value-box-inner">_</div>
					</div>
				</div>
				</div>
				<div></div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
			<div class="shadow_box" style="height: 697px">
				<div style="width: 100%">
					<p class="text-center header_title">Thiết bị LoRa</p>
				</div>
				<div class="row" style="margin-left: 5px; margin-right: 5px;">
					<canvas id="plotChart_pm" style="width: 100%;height: 300px"></canvas>
				</div>

				<div class="row " style="margin-left: 5px; margin-right: 5px">
					<canvas id="plotChart_CO2" style="width: 100%;height: 300px"></canvas>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="container-fluid" style="margin-bottom: 10px">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="container shadow_box" style="height: 826px">
					<div style="width: 100%">
						<p class="text-center header_title">Thiết bị Z-Wave</p>
					</div>
					<div class="row text-center">

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" >
							<canvas id="zWave_temperature"></canvas>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<canvas id="zWave_humidity"></canvas>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<canvas id="zWave_brightness" style="margin-bottom: 10px"></canvas>
						</div>
					</div>
					<div class="row text-center">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<canvas id="zWave_co2"></canvas>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<canvas id="zWave_tvoc"></canvas>
						</div>
					</div>
				</div>
			</div>	

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="container shadow_box">
					<div style="width: 100%">
						<p class="text-center header_title">Thiết bị 4G</p>
						<canvas id="_4G_temperature" class=""></canvas>
						<canvas id="_4G_humidity" class=""></canvas>
						<canvas id="_4G_brightness" class=""></canvas>
					</div>

				</div>
				<div class="container shadow_box">
					<div style="width: 100%">
						<p class="text-center header_title" >Thiết bị Wifi</p>
					</div>

					<div class="row text-center">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
							<canvas id="wifi_temperature"></canvas>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<canvas id="wifi_humidity"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="some_id" style="visibility: false"></div>
	</section>
	<script type="text/javascript" src="../resources/js/dashboard/BLE_Gauge.js"></script>
	<script type="text/javascript" src="../resources/js/dashboard/ZigBee_Gauge.js"></script>
	<script type="text/javascript" src="../resources/js/dashboard/zWave_Gauge.js"></script>
	<script type="text/javascript" src="../resources/js/dashboard/lora_chart.js"></script>
	<script type="text/javascript" src="../resources/js/dashboard/wifi_Gauge.js"></script>
	<script type="text/javascript" src="../resources/js/dashboard/4G_Gauge.js"></script>
	<script type="text/javascript" src="../resources/js/dashboard/addDataChart.js"></script>
	<?php 
	require_once("../src/dashboard/get_lastest_value_BLE.php");
	?>
	<script>
	var updateInterval = 2000;
	var data = 	{
         			zone: 1,
     			};
  		setInterval(function(){
    		$.ajax(
    		{url: "../src/dashboard/get_lastest_value_BLE.php",
    		type: 'POST',
    		data: data,
    		success: function(result){
      			$("#some_id").html(result);
    		}});
    		$.ajax(
    		{url: "../src/dashboard/get_lastest_value_ZigBee.php",
    		type: 'POST',
    		data: data,
    		success: function(result){
      			$("#some_id").html(result);
    		}});
    		$.ajax(
    		{url: "../src/dashboard/get_lastest_value_lora.php",
    		type: 'POST',
    		data: data,
    		success: function(result){
      			$("#some_id").html(result);
    		}});
    		$.ajax(
    		{url: "../src/dashboard/get_lastest_value_Zwave.php",
    		type: 'POST',
    		data: data,
    		success: function(result){
      			$("#some_id").html(result);
    		}});
       		$.ajax(
    		{url: "../src/dashboard/get_lastest_value_4G.php",
    		type: 'POST',
    		data: data,
    		success: function(result){
      			$("#some_id").html(result);
    		}});
       		$.ajax(
    		{url: "../src/dashboard/get_lastest_value_wifi.php",
    		type: 'POST',
    		data: data,
    		success: function(result){
      			$("#some_id").html(result);
    		}});
  		},updateInterval);
</script>
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