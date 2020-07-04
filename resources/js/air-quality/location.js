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
function warning_scale(){
	if(zone ==1){
		var path_icon ="./resources/img/icon/";
	}else if(zone!=1){
		var path_icon ="../resources/img/icon/";
	}
	$('#icon_happy').attr('src',path_icon+"happy.png");
	$('#icon_normal').attr('src',path_icon+"normal.png");
	$('#icon_sad').attr('src',path_icon+"sad.png");
	$('#icon_danger').attr('src',path_icon+"danger.png");
	$('#icon_extdanger').attr('src',path_icon+"extdanger.png");
	$('#icon_toxic').attr('src',path_icon+"toxic.png");
}
function select_zone(){
	if (zone ==1){
		$('#dropdown_1').attr('href',".");
		$('#dropdown_2').attr('href',"./aqi/zone2.php");
		$('#dropdown_3').attr('href',"./aqi/zone3.php");
		$('#dropdown_4').attr('href',"./aqi/zone4.php");
	}else {
		$('#dropdown_1').attr('href',"../index.php");
		$('#dropdown_2').attr('href',"./zone2.php");
		$('#dropdown_3').attr('href',"./zone3.php");
		$('#dropdown_4').attr('href',"./zone4.php");
	}
}
function set_background_image(){
	if (zone ==1){
		$('#aqi_detail').css("backgroundImage",'url(\'./resources/img/background/lightpattern.jpg\')');
		$('#aqi_measure_place').css("backgroundImage",'url(\'./resources/img/background/stations.jpg\')');
		$('#weather').css("backgroundImage",'url(\'./resources/img/background/WeatherBackground.png\')');
		$('#divInfo').css("backgroundImage",'url(\'./resources/img/background/freshair.jpg\')');
	}else{
		$('#aqi_detail').css("backgroundImage",'url(\'../resources/img/background/lightpattern.jpg\')');
		$('#aqi_measure_place').css("backgroundImage",'url(\'../resources/img/background/stations.jpg\')');
		$('#weather').css("backgroundImage",'url(\'../resources/img/background/WeatherBackground.png\')');
		$('#divInfo').css("backgroundImage",'url(\'../resources/img/background/freshair.jpg\')');		
	}
}