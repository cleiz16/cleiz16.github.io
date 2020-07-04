function setDivColor(){
var v_temp= parseFloat($("#tempw_index").text());
var v_pH= $("#pH_index").text();
var v_EC= $("#EC_index").text();

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

if(v_pH <0){
	$("#pH_display").css({backgroundColor:"black"});
}else if(v_pH >=0 && v_pH < 1){
	$("#pH_display").css({backgroundColor:"red"});
} else if (v_pH >=1 && v_pH < 2){
	$("#pH_display").css({backgroundColor:"#F26724"});
} else if (v_pH >=2 && v_pH < 3){
	$("#pH_display").css({backgroundColor:"#F8C60F"});
} else if (v_pH >=3 && v_pH < 4){
	$("#pH_display").css({backgroundColor:"yellow"});
} else if (v_pH >=4 && v_pH < 5){
	$("#pH_display").css({backgroundColor:"#B5D333"});
} else if (v_pH >=5 && v_pH < 6){
	$("#pH_display").css({backgroundColor:"#4DB749"});
} else if (v_pH >=6 && v_pH < 7){
	$("#pH_display").css({backgroundColor:"#33AB49"});
} else if (v_pH >=7 && v_pH < 8){
	$("#pH_display").css({backgroundColor:"#23B36E"});
} else if (v_pH >=8 && v_pH < 9){
	$("#pH_display").css({backgroundColor:"#0BB9B7"});
} else if (v_pH >=9 && v_pH < 10){
	$("#pH_display").css({backgroundColor:"#488FCD"});
} else if (v_pH >=10 && v_pH < 11){
	$("#pH_display").css({backgroundColor:"#3853A4"});
} else if (v_pH >=11 && v_pH < 12){
	$("#pH_display").css({backgroundColor:"#6648A0"});
} else if (v_pH >=12 && v_pH < 13){
	$("#pH_display").css({backgroundColor:"#462C83"});
} else if (v_pH >=13){
	$("#pH_display").css({backgroundColor:"#462CAA"});
}

if(v_EC <50){
	$("#EC_display").css({backgroundColor:"#379ad5"});
} else if(v_EC >= 50 && v_EC < 100){
	$("#EC_display").css({backgroundColor:"#225ea7"});
} else if(v_EC >= 100 && v_EC < 200){
	$("#EC_display").css({backgroundColor:"#1a2a75"});
} else if(v_EC >= 200 && v_EC < 300){
	$("#EC_display").css({backgroundColor:"#6d2275"});
} else if(v_EC >= 300 && v_EC < 40){
	$("#EC_display").css({backgroundColor:"#e2e340"});
} else if(v_EC >= 400 && v_EC < 500){
	$("#EC_display").css({backgroundColor:"#d8a765"});
}else if(v_EC >= 500){
	$("#EC_display").css({backgroundColor:"#d12028"});
}
}