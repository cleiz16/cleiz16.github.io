function setDivColor(){
var v_temp= parseFloat($("#tempw_index").text());
var v_humidity= parseFloat($("#humidity_index").text());
var v_EC= parseFloat($("#EC_index").text());

if(v_temp <5){
	$("#temp_display").css({backgroundColor:"blue"});
} else if (v_temp>=5 && v_temp <10){
	$("#temp_display").css({backgroundColor:"#2E65FF"});
} else if (v_temp>=10 && v_temp <15){
	$("#temp_display").css({backgroundColor:"#99CDFF"});
} else if (v_temp>=15 && v_temp <20){
	$("#temp_display").css({backgroundColor:"#2DD1CA"});
} else if (v_temp>=20 && v_temp <25){
	$("#temp_display").css({backgroundColor:"#008000"});
} else if (v_temp>=25 && v_temp <30){
	$("#temp_display").css({backgroundColor:"#9AD000"});
} else if (v_temp>=30 && v_temp <35){
	$("#temp_display").css({backgroundColor:"#FFD000"});
} else if (v_temp>=35 && v_temp <40){
	$("#temp_display").css({backgroundColor:"#FF6700"});
} else if (v_temp>=40){
	$("#temp_display").css({backgroundColor:"red"});
}

if(v_humidity <0){
	$("#hum_display").css({backgroundColor:"black"});
} else if (v_humidity <= 50){
	$("#hum_display").css({backgroundColor:"#80FFFF"});
} else if (v_humidity >50 && v_humidity <= 55){
	$("#hum_display").css({backgroundColor:"#5BF078"});
} else if (v_humidity >55 && v_humidity <= 60){
	$("#hum_display").css({backgroundColor:"#FFFF81"});
} else if (v_humidity >60 && v_humidity <= 65){
	$("#hum_display").css({backgroundColor:"#FFFF01"});
} else if (v_humidity >65 && v_humidity <= 70){
	$("#hum_display").css({backgroundColor:"#FF8001"});
} else if (v_humidity >70 && v_humidity <= 75){
	$("#hum_display").css({backgroundColor:"#FF0000"});
} else if (v_humidity >75){
	$("#hum_display").css({backgroundColor:"#800000"});
}

if(v_EC <0.001){
	$("#EC_display").css({backgroundColor:"#12099A"});
} else if(v_EC >= 0.001 && v_EC < 0.01){
	$("#EC_display").css({backgroundColor:"#53C74C"});
} else if(v_EC >= 0.01 && v_EC < 0.1){
	$("#EC_display").css({backgroundColor:"#68FF34"});
} else if(v_EC >= 0.1 && v_EC < 1){
	$("#EC_display").css({backgroundColor:"#ACFF1B"});
} else if(v_EC >= 1 && v_EC < 10){
	$("#EC_display").css({backgroundColor:"#FFFF00"});
} else if(v_EC >= 10 && v_EC < 100){
	$("#EC_display").css({backgroundColor:"#FFC300"});
}else if(v_EC >= 100){
	$("#EC_display").css({backgroundColor:"#FF2300"});
}
}