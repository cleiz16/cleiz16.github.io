var zwave_height_gauge_linear = 500;
var zwave_width_gauge_linear = 120;
var zwave_height_gauge_radial =250;
var zwave_width_gauge_radial = 250;
var zWave_temperature_gauge = new LinearGauge({
    renderTo: 'zWave_temperature',
    title: "Nhiệt độ",
    colorTitle:'#000',
    fontTitleSize:35,
    width: zwave_width_gauge_linear,
    height: zwave_height_gauge_linear,
    units: "°C",
    fontUnitsSize:20,
    minValue: 0,
    maxValue: 120,
    majorTicks: ["0",'',"20",'',"40",'',"60",'',"80",'',"100",'',"120"],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        { from: 80, to: 120, color: 'rgba(255,0,0,.8)' },
    ],
    colorPlate: "#fff",
    colorBarProgressEnd:'#11ed18',
    colorBarProgress:"#ed1111",
    borderShadowWidth: 0,
    borders: false,
    needleType: "arrow",
    needleWidth: 2,
    animationDuration: 500,
    animationRule: "linear",
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    barStrokeWidth: 0,
    barWidth:12,
    barBeginCircle: false,
    value: 75,
});
var zWave_humidity_gauge = new LinearGauge({
    renderTo: 'zWave_humidity',
    title: "Độ ẩm",
    colorTitle:'#000',
    fontTitleSize:35,
    width: zwave_width_gauge_linear,
    height: zwave_height_gauge_linear,
    units: "%",
    fontUnitsSize:20,
    minValue: 0,
    maxValue: 100,
    majorTicks: ["0","10","20","30","40","50","60","70","80","90","100"],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        { from: 70, to: 100, color: 'rgba(255,0,0,.8)' },
    ],
    colorPlate: "#fff",
    colorBarProgressEnd:'#11ed18',
    colorBarProgress:"#ed1111",
    borderShadowWidth: 0,
    borders: false,
    needleType: "arrow",
    needleWidth: 2,
    animationDuration: 500,
    animationRule: "linear",
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    barStrokeWidth: 0,
    barWidth:12,
    barBeginCircle: false,
    value: 75,
});

var zWave_brightness_gauge = new LinearGauge({
    renderTo: 'zWave_brightness',
    title:"Ánh sáng",
    units:'lux',
    width: zwave_width_gauge_linear,
    height: zwave_height_gauge_linear,
    minValue: 0,
    maxValue: 100,
    majorTicks: ["0","10","20","30","40","50","60","70","80","90","100"],
    minorTicks: false,
    strokeTicks: true,
    highlights: false,
    colorPlate: "#fff",
    colorBarProgress:'#eee',
    colorBarProgressEnd:"#555",
    colorBar:'#fff9ab',
    borderShadowWidth: 0,
    borders: false,
    needleType: "arrow",
    needleWidth: 5,
    colorNumbers: '#000',
    colorTitle: '#000',
    animationDuration: 500,
    animationRule: "linear",
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    barStrokeWidth: 0,
    barWidth:12,
    barBeginCircle: false,
    fontTitleSize:35,
    fontUnitsSize:20,
    value: 75,
});

var zWave_co2_gauge = new RadialGauge({
    renderTo: 'zWave_co2', // identifier of HTML canvas element or element itself
    width: zwave_height_gauge_radial,
    height: zwave_width_gauge_radial,
    units: 'ppm',
    ticksAngle: 270,
    startAngle: 45,
    title: "CO2",
    colorTitle:'#000',
    value: 0,
    minValue: 0,
    maxValue: 5000,
    majorTicks: [
        '0','','1000','','2000','','3000','','4000','','5000'
    ],
    minorTicks: 5,
    strokeTicks: false,
    highlights: false,
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#000',
    colorMinorTicks: '#111',

    borderShadowWidth: 0,
    borders: false,

    barWidth:2,
    colorBarProgress:"rgba(50,50,200,.75)",
    colorBar:"#aae",

    colorUnits: '#000',
    colorNumbers: '#000',

    colorNeedle: 'rgba(50,50,200,.75)',
    colorNeedleEnd: '#aae',
    needleType:"line",
    needleWidth:"2",
    needleCircleSize:"5",
    needleCircleInner:"false",
    colorNeedleCircleOuter:"rgba(50,50,200,.75)",
    colorNeedleCircleOuterEnd:"#aae",
    valueBox: true,
    fontValueSize:30,
    animationRule: 'linear',
    animationDuration:'500',
});

var zWave_tvoc_gauge = new RadialGauge({
    renderTo: 'zWave_tvoc', // identifier of HTML canvas element or element itself
    width: zwave_height_gauge_radial,
    height: zwave_width_gauge_radial,
    units: 'ppb',
    ticksAngle: 270,
    startAngle: 45,
    title: "TVOC",
    colorTitle:'#000',
    value: 0,
    minValue: 0,
    maxValue: 50,
    majorTicks: [
        '0','','10','','20','','30','','40','','50'
    ],
    minorTicks: 5,
    strokeTicks: false,
    highlights: false,
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#000',
    colorMinorTicks: '#111',

    borderShadowWidth: 0,
    borders: false,

    barWidth:2,
    colorBarProgress:"rgba(50,50,200,.75)",
    colorBar:"#aae",

    colorUnits: '#000',
    colorNumbers: '#000',

    colorNeedle: 'rgba(50,50,200,.75)',
    colorNeedleEnd: '#aae',
    needleType:"line",
    needleWidth:"2",
    needleCircleSize:"5",
    needleCircleInner:"false",
    colorNeedleCircleOuter:"rgba(50,50,200,.75)",
    colorNeedleCircleOuterEnd:"#aae",
    valueBox: true,
    fontValueSize:30,
    animationRule: 'linear',
    animationDuration:'500',
});

zWave_temperature_gauge.draw();
zWave_humidity_gauge.draw();
zWave_tvoc_gauge.draw();
zWave_co2_gauge.draw();
zWave_brightness_gauge.draw();