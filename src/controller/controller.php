<?php	
	$id_video = array("8fXsh-xUDF0", "wXsBaFCfXb0", "I16KdDTQGTc","i_hdxA_SSyo");
	$url_tb = "http://104.40.7.210:8080";
	// $url_tb = "http://14.162.38.93:9000";
	$locations_sensor = array("Khu công nghiệp Sài Đồng B","Khu công nghệ cao Hòa Lạc","Khu công nghệ cao Đà Nẵng","Khu công nghệ cao Hồ Chí Minh");
	$locations_zone1 = 	array(
							array("GateWay",21.028871,105.9038063,'pimarker.png'),
							array("LoRa Device",21.0290677,105.9010031,'loramarker.png'),
							array("ZigBee Device",21.029698,105.9044003,'zigbeemarker.png'),
							array("BLE Device",21.026994,105.9045783,'blemarker.png'),
							array("Z_Wave Device",21.0282564,105.9011942,'zwmarker.png'),
							array("Wi-Fi Device",21.0262564,105.9001942,'wifi.png'),
							array("4G Device",21.0292564,105.9019942,'4G.png'),							
						);
	$locations_zone2 = 	array(
							array("LoRa",21.007822,105.5375433,'loramarker.png'),
							array("ZigBee",21.008423,105.5400433,'zigbeemarker.png'),
							array("BLE",21.006991,105.5408483,'blemarker.png'),
							array("Z_Wave",21.00641,105.5388423,'zwmarker.png'),
							array("GateWay",21.007351,105.5396033,'pimarker.png'),
						);
	$locations_zone3 = 	array(
							array("LoRa",20.660116,105.9245103,'loramarker.png'),
							array("ZigBee",20.662967,105.9214633,'zigbeemarker.png'),
							array("BLE",20.659785,105.9217743,'blemarker.png'),
							array("Z_Wave",20.662767,105.9258723,'zwmarker.png'),
							array("GateWay",20.6602413,105.923395,'pimarker.png'),
						);
	$locations_zone4 = 	array(
							array("LoRa",21.007822,105.5375433,'loramarker.png'),
							array("ZigBee",21.008423,105.5400433,'zigbeemarker.png'),
							array("BLE",21.006991,105.5408483,'blemarker.png'),
							array("Z_Wave",21.00641,105.5388423,'zwmarker.png'),
							array("GateWay",21.007351,105.5396033,'pimarker.png'),
						);
	$url_embedded = "https://www.youtube.com/embed/";
	$url_youtube = array($url_embedded.$id_video[0],$url_embedded.$id_video[1],$url_embedded.$id_video[2],$url_embedded.$id_video[3]);
	if(isset($zone)){
if($zone == 1){
	// if ($type == "air"){
		$deviceZwave = "55c35a00-7e54-11ea-a048-f96405607340";  		// Zwave 1 - Trung
		$deviceLoRa = "6911ac60-7e54-11ea-a048-f96405607340";		//LoRa 1 - Trung
	// } else if($type == "water"){
		$deviceBLE = "cae0d8e0-7e53-11ea-a048-f96405607340";			//BLE 1 - Trung
	// } else if ($type == "land"){
		$deviceZigBee = "85926d20-7e54-11ea-a048-f96405607340";			//ZigBee 1 - Trung
	// }
		$device4G = "ab4d0170-b5da-11ea-8b7a-830eebb4dc0b";
		$deviceWifi = "bb3b8700-b5da-11ea-8b7a-830eebb4dc0b";
		$deviceGPS = "683fea80-bc7b-11ea-8b7a-830eebb4dc0b";
} else if($zone == 2){
	// if ($type == "air"){
		$deviceZwave = "ea5fb770-85f3-11ea-a048-f96405607340";			//Zwave 2
		$deviceLoRa = "21c08140-85f4-11ea-a048-f96405607340";			//LoRa 2
	// } else if($type == "water"){
		$deviceBLE = "d2c0d6a0-7e53-11ea-a048-f96405607340";			//BLE 2
	// } else if ($type == "land"){
		$deviceZigBee = "04ddf170-85f4-11ea-a048-f96405607340";
					//ZigBee 2
	// }
		$device4G = "ab4d0170-b5da-11ea-8b7a-830eebb4dc0b";
		$deviceWifi = "bb3b8700-b5da-11ea-8b7a-830eebb4dc0b";
} else if($zone == 3){
	// if ($type == "air"){
		$deviceZwave = "f1eab760-85f3-11ea-a048-f96405607340";			//Zwave 3
		$deviceLoRa = "2a1057d0-85f4-11ea-a048-f96405607340";			//LoRa 3
	// } else if($type == "water"){
		$deviceBLE = "d9059af0-7e53-11ea-a048-f96405607340";			//BLE 3
	// } else if ($type == "land"){
		$deviceZigBee = "0e5223c0-85f4-11ea-a048-f96405607340";			//ZigBee 3
	// }	
		$device4G = "ab4d0170-b5da-11ea-8b7a-830eebb4dc0b";
		$deviceWifi = "bb3b8700-b5da-11ea-8b7a-830eebb4dc0b";
} else if($zone == 4){
	// if ($type == "air"){
		$deviceZwave = "f9957450-85f3-11ea-a048-f96405607340";			//Zwave 4
		$deviceLoRa = "33433b60-85f4-11ea-a048-f96405607340";			//LoRa 4
	// } else if($type == "water"){
		$deviceBLE = "dfce0e30-7e53-11ea-a048-f96405607340";			//BLE 4
	// } else if ($type == "land"){
		$deviceZigBee = "1790ee30-85f4-11ea-a048-f96405607340";			//ZigBee 4
	// }	
		$device4G = "ab4d0170-b5da-11ea-8b7a-830eebb4dc0b";
		$deviceWifi = "bb3b8700-b5da-11ea-8b7a-830eebb4dc0b";
}
}
// 	if(isset($zone)){
// if($zone == 1){
// 		$deviceZwave = "9a90d5b0-9009-11ea-acc3-27104e8e310c";  		// Zwave 1 - Duc
// 		$deviceLoRa = "6db0f340-9009-11ea-acc3-27104e8e310c";			//LoRa 1 - Duc
// 		$deviceBLE = "8a0d6320-9009-11ea-acc3-27104e8e310c";			//BLE 1 - Duc
// 		$deviceZigBee = "462f6cc0-9009-11ea-acc3-27104e8e310c";			//ZigBee 1 - Duc
// 		$device4G = "c2f97db0-a3da-11ea-9536-974e18f4df87";
// 		$deviceWifi = "7b330cb0-9009-11ea-acc3-27104e8e310c";
// 		$deviceGPS ='bb257010-bb42-11ea-9e2e-c77fe5908a7f';
// 	}
// } else if($zone == 2){
// 	if ($type == "air"){
// 		$deviceZwave = "a3eb1760-9009-11ea-acc3-27104e8e310c";			//Zwave 2
// 		$deviceLoRa = "73820e30-9009-11ea-acc3-27104e8e310c";			//LoRa 2
// 	} else if($type == "water"){
// 		$deviceBLE = "8e6d13c0-9009-11ea-acc3-27104e8e310c";			//BLE 2
// 	} else if ($type == "land"){
// 		$deviceZigBee = "63ef8b50-9009-11ea-acc3-27104e8e310c";			//ZigBee 2
// 	}	
// } 
?>