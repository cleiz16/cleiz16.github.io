if (zone ==1){
    var path_icon_aqi = "./resources/img/icon/";
}else {
    var path_icon_aqi = "../resources/img/icon/";
}
function add_Warning(AQI){
    var aqi_display = document.getElementById('aqi_display');
    $('#aqi_display').attr('class','');
        aqi_display.classList.add('row','shadow_box');

    if(AQI <=0){
        aqi_display.classList.add("blue-div");
        document.getElementById('warning').innerHTML = "N/A";
        document.getElementById('description').innerHTML = "Không đủ thông tin để tính toán";
        document.getElementById('pinIcon').src= path_icon_aqi+"nodata.png"

    }
    else if(AQI <=50){
        aqi_display.classList.add("green-div");
        document.getElementById('warning').innerHTML = "Tốt";
        document.getElementById('description').innerHTML = "Chất lượng không khí tốt";
        document.getElementById('pinIcon').src=path_icon_aqi+"happy.png"

    } else if((AQI<=100)&&(AQI>50)){
        aqi_display.classList.add("yellow-div");
        document.getElementById('warning').innerHTML = "Trung bình";
        document.getElementById('description').innerHTML = "Nhóm nhạy cảm nên hạn chế thời gian ở bên ngoài";
        document.getElementById('pinIcon').src=path_icon_aqi+"normal.png"

    } else if((AQI<=150)&&(AQI>100)){
        aqi_display.classList.add("orange-div");
        document.getElementById('warning').innerHTML = "Kém";
        document.getElementById('description').innerHTML = "Nhóm nhạy cảm cần hạn chế thời gian ở bên ngoài";
        document.getElementById('pinIcon').src=path_icon_aqi+"sad.png"

    } else if((AQI<=200)&&(AQI>150)){
        aqi_display.classList.add("red-div");
        document.getElementById('warning').innerHTML = "Xấu";
        document.getElementById('description').innerHTML = "Nhóm nhạy cảm tránh ra ngoài. Những người khác hạn chế ở bên ngoài";
        document.getElementById('pinIcon').src=path_icon_aqi+"danger.png"

    }else if((AQI<=300)&&(AQI>200)){
        aqi_display.classList.add("purple-div");
        document.getElementById('warning').innerHTML = "Rất Xấu";
        document.getElementById('description').innerHTML = "Nhóm nhạy cảm tránh ra ngoài. Những người khác hạn chế ở bên ngoài";
        document.getElementById('pinIcon').src=path_icon_aqi+"extdanger.png"

    } else if(AQI>300){
        aqi_display.classList.add("brown-div");
        document.getElementById('warning').innerHTML = "Nguy hiểm";
        document.getElementById('description').innerHTML = "Mọi người nên ở trong nhà";
        document.getElementById('pinIcon').src=path_icon_aqi+"toxic.png";

    }
}