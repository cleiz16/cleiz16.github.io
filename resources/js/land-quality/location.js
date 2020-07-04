console.log(zone);
function get_location(){
if(zone == 1){
	$('#location_sensor').html(location_sensor[0]);
} else if(zone == 2){
	$('#location_sensor').html(location_sensor[1]);
} else if(zone == 3){
	$('#location_sensor').html(location_sensor[2]);
} else if(zone == 4){
	$('#location_sensor').html(location_sensor[3]);
};
};
function select_zone(){
		$('#dropdown_1').attr('href',"./index.php");
		$('#dropdown_2').attr('href',"./zone2.php");
		$('#dropdown_3').attr('href',"./zone3.php");
		$('#dropdown_4').attr('href',"./zone4.php");
};