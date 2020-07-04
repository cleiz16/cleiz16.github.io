<!DOCTYPE html>
<html lang='en'>
<head>
</head>
<body>
	<div class="row dropdown">   
  		<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lựa chọn điểm đo
  		</button>

  		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  			<a id="dropdown_1" class="dropdown-item" ><?php echo $locations_sensor[0]; ?></a>
	    	<a id="dropdown_2" class="dropdown-item" ><?php echo $locations_sensor[1]; ?></a>
	    	<a id="dropdown_3" class="dropdown-item" ><?php echo $locations_sensor[2]; ?></a>
	    	<a id="dropdown_4" class="dropdown-item" ><?php echo $locations_sensor[3]; ?></a>
 		</div>
	</div>
</body>
</html>