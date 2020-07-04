<!DOCTYPE HTML>
<html>  
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Camera</title>
		
	<!-- jquery -->
	<script type="text/javascript" src = "../vendors/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../vendors/js/jquery-ui/jquery-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="../vendors/js/jquery-ui/jquery-ui.css">

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.min.css">

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../resources/css/mycss.css">

	<!-- icon -->
	<link rel="stylesheet" type="text/css" href="../vendors/font-awesome/css/all.min.css">

	<?php
		require_once("../src/camera/camera.php");
	?>
</head>
<body>
	<!-- Nav Menu Section -->
	<?php 
		require_once('../view/navigation_bar.php');
	?>
<body>
	<!-- <div style="font-size: 40px ;width:100%" class="text-center">CHỨC NĂNG CHƯA ĐƯỢC HOÀN THIỆN</div> -->
	<div style="background-color: black;height: 20px; width:100%"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2" style="background-color: black">
				<div class="row" style="margin-top:100px">
					<div class="text-center" style="width: 100%">
						<button id="btn1" style="height: 50px;width: 150px;background-color: gray">Camera #1</button>
					</div>
				</div>
				<div class="row" style="margin-top:30px">
					<div class="text-center" style="width: 100%">
						<button id="btn2" style="height: 50px;width: 150px;">Camera #2</button>
					</div>
				</div>
				<div class="row" style="margin-top:30px">
					<div class="text-center" style="width: 100%">
						<button id="btn3" style="height: 50px;width: 150px;">Camera #3</button>
					</div>
				</div>
				<div class="row" style="margin-top:30px">
					<div class="text-center" style="width: 100%">
						<button id="btn4" style="height: 50px;width: 150px;">Camera #4</button>
					</div>
				</div>
			</div>

			<div class="col-lg-10" style="background-color: black">
				<div class="shadow_box text-center" style="width: 100%">
					<iframe id = "player" width="855" height="481" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			
		</div>	
	</div>
	<div style="background-color: black;height: 20px; width:100%"></div>

<!-- Dropdown js Lib -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
<footer>
	<section id="contact" style="background-color: gray">
      	<?php
      	$color = "dark";
    	require_once("../view/footer.php");
		?>
  </section>
</footer>

</html>

