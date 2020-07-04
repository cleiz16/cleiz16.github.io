<script type="text/javascript">
	var zone = <?php echo $zone;?>;
    var type = <?php echo json_encode($type);?>;
    var date = new Date();
    var hour = date.getHours();
    if (zone ==1){
    	var locations_map = <?php echo json_encode($locations_zone1); ?>;
	} else if(zone ==2){
		var locations_map = <?php echo json_encode($locations_zone2); ?>;
	} else if(zone ==3){
		var locations_map = <?php echo json_encode($locations_zone3); ?>;
	} else if(zone ==4){
		var locations_map = <?php echo json_encode($locations_zone4); ?>;
	}
    var location_sensor = <?php echo json_encode($locations_sensor);?>;
    window.onload = function(){
    	get_location();
    	select_zone();
    };
</script>