var zigbee_humidity_gauge = new LinearGauge({
    renderTo: 'ZigBee_humidity',
    title:"Do am",
    // width: 500,
    height: 120,
    minValue: 0,
    maxValue: 100,
    majorTicks: ["0","10","20","30","40","50","60","70","80","90","100"],
    minorTicks: 5,
    strokeTicks: true,
    highlights: [
        {
            "from": 60,
            "to": 100,
            "color": "rgba(200, 50, 50, .75)"
        }
    ],
    colorPlate: "#fff",
    colorBarProgress:'#16f08e',
    colorBarProgressEnd:"#f00",
    colorBarEnd:'#f89cdc',
    colorBar:'#9cf8cf',
    borderShadowWidth: 0,
    borders: false,
    needleType: "arrow",
    needleWidth: 5,
    colorNumbers: '#000',
    colorTitle:'#000',
    animationDuration: 500,
    animationRule: "linear",
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    barStrokeWidth: 0,
    barWidth:12,
    barBeginCircle: false,
    fontTitle: 'Repetition',
    fontNumbers: 'Repetition',
    fontTitleSize:40,
    fontNumbersSize:40,
    value: 75
});
// draw initially
var zigbee_temperature_gauge = new LinearGauge({
    renderTo: 'ZigBee_temperature',
    title: 'Nhiet do',
    // width: 500,
    height: 120,
    minValue: 0,
    startAngle: 90,
    ticksAngle: 180,
    maxValue: 120,
    majorTicks: ["0",'',"20",'',"40",'',"60",'',"80",'',"100",'',"120"],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        {
            "from": 80,
            "to": 120,
            "color": "rgba(255, 54, 50, .75)"
        }
    ],
    colorPlate: "#fff",
    colorBarProgress:"#57ff03",
    colorBarProgressEnd:"#f00",
    barShadow:2,
    colorBar:"#96ffe7",
    colorBarEnd:"#a06ffc",
    colorNumbers:'#000',
    colorTitle:'#000',
    borderShadowWidth: 0,
    borders: false,
    needleType: "arrow",
    needleWidth: 2,
    needleCircleSize: 7,
    needleCircleOuter: true,
    // needleCircleInner: true,
    animationDuration: 500,
    animationRule: "linear",
    barWidth: 10,
    fontTitle: 'Repetition',
    fontNumbers: 'Repetition',
    fontTitleSize:40,
    fontNumbersSize:40,
    value: 35
});

    // console.log(gauge_temperature);
zigbee_temperature_gauge.draw();
zigbee_humidity_gauge.draw();

document.fonts && document.fonts.forEach(function(font) {
    font.loaded.then(function() {
        if (font.family.match(/Led/)) {
            document.gauges.forEach(function(gauge) {
                gauge.update();
            });
        }
    });
});

