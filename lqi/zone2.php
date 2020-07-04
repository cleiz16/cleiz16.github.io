<?php 
    require_once("../src/generateToken/get_token.php");
?> 
<!DOCTYPE HTML>
<html>  
<head>
	<?php
		$zone = 2 ;
		$type = "land";
		require_once("../src/controller/controller.php");
		require_once("../src/water-quality/convert_js.php");
	?>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chỉ số đất</title>
		
	<!-- jquery -->
	<script type="text/javascript" src = "../vendors/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../vendors/js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="../vendors/js/jquery-ui/jquery-ui.css">

	<!-- chartjs library -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script type="text/javascript" src="../resources/js/land-quality/location.js"></script>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/bootstrap.min.css">

	<!-- gg maps js-->
	<script type="text/javascript" src="../resources/js/land-quality/lqi_map.js"></script>

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../resources/css/mycss.css">

	<!-- icon -->
	<link rel="stylesheet" type="text/css" href="../vendors/font-awesome/css/all.min.css">
</head>
<body>
	<!-- Nav Menu Section -->
	<?php 
		require_once('../view/navigation_bar.php');
	?>
	<!-- Content Water AQI -->
<section id="content">
    <div class="container-fluid text-center">
  		<div class="container-fluid" >
			<div class="row">
				<!-- Cột trái -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 5px">
       				<div class="row" style="margin-right: 5px">
       					<div id="googleMap" class=" shadow_box" style="width:100%;height:560px"></div>
       				</div>
				</div>

				<!-- Cột phải -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	   				<!-- Hiển thị chi tiết các thông số -->
	   					<div id="aqi_detail" class="row" style="margin-bottom: 20px "> 
	   					<div id="panel_display" class="container-fluid">
	   					<div class="row text-center">
	   					<div  class="col-lg-4 col-sm-4 col-md-4 text-center" style="max-width:33.3%;height: 150px;padding:0px; ">
	   						<div id="temp_display" class="shadow_box" style="margin-right: 5px;height: 100%">
	   						<div class="row">
	   							<div class="col-lg-12 col-sm-12 col-md-12 text-center aqi_label_water">Nhiệt độ</div>
	   						</div>
	   						<div class="row">
	   						<div class="aqi_index_water text-center" id="tempw_index" style="width: 100%"></div>
	   						</div>
	   						</div>
	   					</div>
	   					<div  class="col-lg-4 col-sm-4 col-md-4" style="max-width:33.3%;height: 150px;padding:0px;">
	   						<div id = "hum_display" class="shadow_box"style="margin-right: 5px;margin-left: 5px;height: 100%">
	   						<div class="row">
	   							<div class="col-lg-12 col-sm-12 col-md-12 text-center aqi_label_water">Độ ẩm</div>
	   						</div>
	   						<div class="row">
	   						<div class="aqi_index_water" id="humidity_index" style="width: 100%"></div>	
	   						</div>
	   						</div>
	   					</div>
	   					<div class="col-lg-4 col-sm-4 col-md-4 " style="max-width:33.3%;height: 150px;padding:0px;">
	   						<div id = "EC_display" class="shadow_box" style="margin-left:5px;height: 100% ">
	   						<div class="row">
	   							<div class="col-lg-12 col-sm-12 col-md-12 text-center aqi_label_water">Độ dẫn điện EC</div>
	   						</div>
	   						<div class="row">
	   						<div class="col-lg-12 col-sm-12 col-md-12 aqi_index_water" id="EC_index"></div>
	   						</div>
	   						<div class="row">
	   							<div class="col-lg-12 col-sm-12 col-md-12 aqi_label_water">mS/cm</div>
	   						</div>	
	   						</div>
	   					</div>
	   					<div id="some_id">
	   						
	   					</div>
	   					</div>
	   				</div>
	   				</div>

	   				<!-- Hiển thị vị trí trạm quan trắc và ngày giờ -->
	   				<div id="aqi_measure_place" class="row shadow_box">
	   					<div class="container-fluid">
	   						<div class="row text-left">
	   							<p style="margin-left: 50px; margin-top: 10px;"><i class="fa fa-map-marker"></i> Đo tại trạm quan trắc: </p>
	   							<p id="location_sensor"style="margin-left: 5px; margin-top: 10px;">_</p>
	   						</div>
	   						<div class="row">
	   							<div class="col-lg-6 col-sm-6 col-md-12">
	   								<div class="row text-left"	>
	   									<p id="date" style="margin-left: 50px;margin-top: 10px;">###</p>
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

	   				<!-- Thông tin về chỉ số AQI -->
	   				<div class="row shadow_box" style="margin-bottom: 10px;">
						<canvas id ="Temp_l1_Chart" style= "height:300px; width: 100%;"></canvas>		
	   				</div>

    			</div>
  			</div>
		</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="row text-center shadow_box" style="margin-right: 5px; margin-bottom: 10px;">
						<canvas id ="humidity_l1_Chart" style= "height:300px; width: 100%;"></canvas>
						</div>	
					</div>
					<div class="col-md-6 col-lg-6 col-sm-6">
						<div class="row shadow_box" style="margin-bottom: 10px;">
						<canvas id ="EC_l1_Chart" style= "height:300px; width: 100%;"></canvas>
					</div>
					</div>
				</div>
			</div>
	</div>
</section>

<!-- Dropdown js external -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- google maps api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW_JZqWqOevGvr8zcpV7j0yEC8DhIuBis&callback=myMap" async defer></script>
		<?php 
		require_once("../src/land-quality/get_history_land.php");
		?>
	<script type="text/javascript" src="../resources/js/land-quality/chart_land.js"></script>
	<script type="text/javascript" src="../resources/js/land-quality/display_land.js"></script>
	<?php 
    require_once("../src/land-quality/get_data_realtime_land.php");
	?> 
<script>
	var updateInterval = 5000;
	var data = 	{
         			zone: 2,
         			type: 'land',
     			};
  	setInterval(function(){
    	$.ajax({url: "../src/land-quality/get_data_realtime_land.php",
    			type: 'POST',
    			data: data,
    		 	success: function(result){
      				$("#some_id").html(result);
    			}});
  				},updateInterval);
</script>	  
</body>
<footer>
	<section id="contact" style="background-color:#28A745">
      	<?php
    	require_once("../view/footer.php");
		?>
  </section>
</footer>

</html>