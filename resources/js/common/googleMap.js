    var markers=[];
    if (zone ==1&&type=='air'){
        path_icon_map ="./resources/img/marker/";
        var href= ["#","#","./lqi/index.php","./wqi/index.php","#","#","./lte/index.php"];
    }else if (zone==2) {
        path_icon_map ="../resources/img/marker/";
        var href= ["#","#","../lqi/zone2.php","../wqi/zone2.php","#","#","../lte/index.php"];
    }else if (zone==3) {
        path_icon_map ="../resources/img/marker/";
        var href= ["#","#","../lqi/zone3.php","../wqi/zone3.php","#","#","../lte/index.php"];
    }else if (zone==4) {
        path_icon_map ="../resources/img/marker/";
        var href= ["#","#","../lqi/zone4.php","../wqi/zone4.php","#","#","../lte/index.php"];
    }
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
                icon:{url: path_icon_map + locations_map[i][3],scaledSize: new google.maps.Size(35, 54)},
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
                icon: {url: "./resources/img/marker/4G.png",scaledSize: new google.maps.Size(35, 54)}
            });

            google.maps.event.addListener(marker, 'click', (function(marker4G, i) {
                return function() {
                window.location.href = href[6];
              }
            })(marker, i));

    setInterval(function () {
        newPosition();
    }, 5000);         
  }
