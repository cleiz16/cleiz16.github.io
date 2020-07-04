var wifi_height_gauge = 250;
var wifi_width_gauge = 250;
var wifi_temperature_gauge = new RadialGauge({
    renderTo: 'wifi_temperature', // identifier of HTML canvas element or element itself
    width: wifi_height_gauge,
    height: wifi_width_gauge,
    units: '°C',
    ticksAngle: 220,
    startAngle: 70,
    title: "Temperature",
    valueBox:true,
    colorValueBoxRect:'#fff',
    colorValueBoxRectEnd:'#fff',
    colorValueBoxBackground:'#fff',
    colorValueBoxShadow:'fff',
    colorValueText:'#00f',
    value: 0,
    minValue: 0,
    maxValue: 60,
    needleCircleSize: 10,
    needleCircleInner: false,
    needleCircleOuter: true,
    majorTicks: [
        '0','10','20','30','40','50','60'
    ],
    minorTicks: 5,
    // strokeTicks: true,
    highlights: [
        { from: 0, to: 10, color: 'rgba(54, 91, 224,1)' },
        { from: 10, to: 20, color: 'rgba(0, 255, 106,1)' },
        { from: 20, to: 30, color: 'rgba(72, 212, 25,1)' },
        { from: 30, to: 40, color: 'rgba(252, 154, 15,1)' },
        { from: 40, to: 50, color: 'rgba(242, 72, 10,1)' },
        { from: 50, to: 60, color: 'rgba(255,0,0,1)' }
    ],
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#fff',
    colorMinorTicks: '#fff',

    borderShadowWidth: 0,
    borders: false,

    colorNumbers: ['#365be0','#00ff6a','#48d419','#fc9a0f','#f2480a','#f00','#8a2804'],
    colorUnits: '#00f',
    colorTitle: '#00f',
    colorNeedle: "#3CA7DB",
    colorNeedleEnd: "#2698CE",
    colorNeedleCircleOuter: "#3CA7DB",
    colorNeedleCircleOuterEnd: "#3CA7DB",

    highlightsWidth: 25,
    numbersMargin: 12, 

    fontNumbersSize:25,
    fontValueSize:40,
    animationRule: 'quint',

});

var wifi_humidity_gauge = new RadialGauge({
    renderTo: 'wifi_humidity', // identifier of HTML canvas element or element itself
    width: wifi_height_gauge,
    height: wifi_width_gauge,
    units: '%',
    ticksAngle: 220,
    startAngle: 70,
    title: "Humidity",
    value: 0,
    valueBox:true,
    colorValueBoxRect:'#fff',
    colorValueBoxRectEnd:'#fff',
    colorValueBoxBackground:'#fff',
    colorValueBoxShadow:'fff',
    colorValueText:'#00f',
    minValue: 0,
    maxValue: 100,
    needleCircleSize: 10,
    needleCircleInner: false,
    needleCircleOuter: true,
    majorTicks: [
        '0','10','20','30','40','50','60','70','80','90','100'
    ],
    minorTicks: 5,
    // strokeTicks: true,
    highlights: [
        { from: 0, to: 100, color: 'rgba(0,0,255,1)' }
    ],
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#fff',
    colorMinorTicks: '#fff',

    borderShadowWidth: 0,
    borders: false,

    colorNumbers: '#00f',
    colorUnits: '#00f',
    colorTitle: '#00f',
    colorNeedle: "#3CA7DB",
    colorNeedleEnd: "#2698CE",
    colorNeedleCircleOuter: "#3CA7DB",
    colorNeedleCircleOuterEnd: "#3CA7DB",

    highlightsWidth: 25,
    numbersMargin: 12, 

    fontNumbersSize:25,
    fontValueSize:40,
    animationRule: 'quint',

});

wifi_humidity_gauge.draw();
wifi_temperature_gauge.draw();
// setInterval(function(){
//     wifi_humidity_gauge.value = Math.random()*-100+100;
//     wifi_temperature_gauge.value = Math.random()*-50+50;
// },5000);