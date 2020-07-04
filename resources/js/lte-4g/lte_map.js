    var markers=[];
    if (zone==1){
        var href= ["../index.php","./index.php","../wqi/index.php","../index.php","#"];
    }else if(zone==2){
        var href= ["../aqi/zone2.php","./zone2.php","../wqi/zone2.php","../aqi/zone2.php","#"];
    }else if(zone==3){
        var href= ["../aqi/zone3.php","./zone3.php","../wqi/zone3.php","../aqi/zone3.php","#"];
    }else if(zone==4){
        var href= ["../aqi/zone4.php","./zone4.php","../wqi/zone4.php","../aqi/zone4.php","#"];
    }
    var icon=['pimarker.png','loramarker.png','zigbeemarker.png','blemarker.png','zwmarker.png','wifi.png','4g.png'];

        function newPosition(){
            position = new google.maps.LatLng(lat,long);    
            marker4G.setPosition(position);
        //  marker4G.setIcon({url: "../resources/img/marker/dot.png",scaledSize: new google.maps.Size(10, 10)});
        //  // console.log(marker4G);

        //  marker4G = new google.maps.Marker({
        //     position : position,
        //     map : map,
        //     // zoom : 15,
        //     icon: {url: "../resources/img/marker/4G.png",scaledSize: new google.maps.Size(35, 54)}
        // });
        //     console.log(marker4G);
        }

    function myMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            center: {lat: locations_map[0][1], lng: locations_map[0][2]},
            zoom: 16
        });
        for (var i=0;i<locations_map.length-1;i++){
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations_map[i][1], locations_map[i][2]),
                map: map,
                title: locations_map[i][0],
                icon:{url: "../resources/img/marker/"+icon[i],scaledSize: new google.maps.Size(35, 54)},
                url: href[i]
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                    window.location.href =  href[i];
              }
            })(marker, i));
        }
            marker4G = new google.maps.Marker({
                position : new google.maps.LatLng(locations_map[6][1], locations_map[6][2]),
                map : map,
                title: 'Thiết bị 4G lưu động',
                icon: {url: "../resources/img/marker/4G.png",scaledSize: new google.maps.Size(35, 54)}
            });


    setInterval(function () {
        newPosition();
    }, 10000);         
  }

  $(document).ready(function(){
    myMap();
  })
