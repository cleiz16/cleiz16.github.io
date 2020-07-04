var _4G_temperature_gauge = new LinearGauge({
    renderTo: '_4G_temperature',
    title:'Nhiệt độ',
    fontTitleSize:40,
    colorTitle:'#000',
    units:'0 °C',
    fontUnitsSize:40,
    colorUnits:'#000',
    // width: 400,
    height: 150,
    minValue: 0,
    maxValue: 100,
    value:0,
    majorTicks: [
        "0",
        "20",
        "40",
        "60",
        "80",
        "100"
    ],
    minorTicks: 10,
    strokeTicks: true,
    colorPlate: "#fff",
    borderShadowWidth: 0,
    borders: false,
    barBeginCircle: false,
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    needleType: "line",
    needleWidth: 3,
    colorNeedle: "#222",
    colorNeedleEnd: "#222",
    animationDuration: 500,
    animationRule: "linear",

    barWidth: 5,
    ticksWidth: 30,
    ticksWidthMinor: 15
}).draw();
var _4G_humidity_gauge = new LinearGauge({
    renderTo: '_4G_humidity',
    title: 'Độ ẩm',
    units: '0 %',
    fontTitleSize:40,
    colorTitle:'#000',
    fontUnitsSize:40,
    colorUnits:'#000',
    // width: 400,
    height: 150,
    minValue: 0,
    maxValue: 100,
    value:0,
    majorTicks: [
        "0",
        "20",
        "40",
        "60",
        "80",
        "100"
    ],
    minorTicks: 10,
    strokeTicks: true,
    colorPlate: "#fff",
    borderShadowWidth: 0,
    borders: false,
    barBeginCircle: false,
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    needleType: "line",
    needleWidth: 3,
    colorNeedle: "#222",
    colorNeedleEnd: "#222",
    animationDuration: 500,
    animationRule: "linear",
    barWidth: 5,
    ticksWidth: 30,
    ticksWidthMinor: 15
}).draw();
var _4G_brightness_gauge = new LinearGauge({
    renderTo: '_4G_brightness',
    title:'Cường độ ánh sáng',
    fontTitleSize:40,
    colorTitle:'#000',
    fontUnitsSize:40,
    colorUnits:'#000',
    units:'0 lux',
    // width: 400,
    height: 150,
    minValue: 0,
    maxValue: 100,
    value:0,
    majorTicks: ["0","20","40","60","80","100"],
    minorTicks: 10,
    strokeTicks: true,
    colorPlate: "#fff",
    borderShadowWidth: 0,
    borders: false,
    barBeginCircle: false,
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    needleType: "line",
    needleWidth: 3,
    colorNeedle: "#222",
    colorNeedleEnd: "#222",
    animationDuration: 500,
    animationRule: "linear",
    barWidth: 5,
    ticksWidth: 30,
    ticksWidthMinor: 15
}).draw();


window.addEventListener('load', function() {
        _4G_temperature_gauge.on('animate', function(percent, value) {
        _4G_temperature_gauge.update({ units: parseInt(value, 10) + ' °C' });
        });
        _4G_humidity_gauge.on('animate', function(percent, value) {
        _4G_humidity_gauge.update({ units: parseInt(value, 10) + ' %' });
        });
        _4G_brightness_gauge.on('animate', function(percent, value) {
        _4G_brightness_gauge.update({ units: parseInt(value, 10) + ' lux' });
        });
});