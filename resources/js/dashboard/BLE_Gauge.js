var height_gauge = 200;
var width_gauge = 200;

var ble_temp_gauge = new RadialGauge({
    renderTo: 'radialGauge', // identifier of HTML canvas element or element itself
    width: height_gauge,
    height: width_gauge,
    units: '°C',
    ticksAngle: 270,
    startAngle: 45,
    title: "Temperature",
    colorTitle:'#000',
    value: 0,
    minValue: 0,
    maxValue: 50,
    majorTicks: [
        '0','5','10','15','20','25','30','35','40','45','50'
    ],
    minorTicks: 5,
    strokeTicks: true,
    highlights: [
        { from: 20, to: 30, color: 'rgba(238,238,238,.8)' },
        { from: 30, to: 40, color: 'rgba(204,204,204,.8)' },
        { from: 40, to: 50, color: 'rgba(153,153,153,.8)' }
    ],
    barWidth:5,
    colorBarProgress:"rgba(50,200,50,.75)",
    colorBar:"#bbb",
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#000',
    colorMinorTicks: '#111',

    borderShadowWidth: 0,
    borders: false,

    colorUnits: '#999999',
    colorNumbers: '#000',
    colorNeedleStart: 'rgba(240, 128, 128, 1)',
    colorNeedleEnd: 'rgba(255, 160, 122, .9)',
    valueBox: true,
    fontValue:"Led", 
    fontValueSize:40,

    animationRule: 'linear',

});

var ble_pH_gauge = new RadialGauge({
    renderTo: 'radialGauge2', // identifier of HTML canvas element or element itself
    width: height_gauge,
    height: width_gauge,
    // units: 'Km/h',
    ticksAngle: 270,
    startAngle: 45,
    title: "pH",
    colorTitle:'#000',
    value: 0,
    minValue: 0,
    maxValue: 18,
    majorTicks: [
        '0','2','4','6','8','10','12','14','16','18'
    ],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        { from: 6, to: 10, color: 'rgba(238,238,238,.8)' },
        { from: 10, to: 14, color: 'rgba(204,204,204,.8)' },
        { from: 14, to: 18, color: 'rgba(153,153,153,.8)' }
    ],
    barWidth:5,
    colorBarProgress:"rgba(50,200,50,.75)",
    colorBar:"#bbb",
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#000',
    colorMinorTicks: '#111',

    borderShadowWidth: 0,
    borders: false,

    colorUnits: '#999999',
    colorNumbers: '#000',
    colorNeedleStart: 'rgba(240, 128, 128, 1)',
    colorNeedleEnd: 'rgba(255, 160, 122, .9)',
    valueBox: true,
    fontValue:"Led", 
    fontValueSize:40,

    animationRule: 'linear',

});

var ble_EC_gauge = new RadialGauge({
    renderTo: 'radialGauge3', // identifier of HTML canvas element or element itself
    width: height_gauge,
    height: width_gauge,
    units: 'mS/cm',
    ticksAngle: 270,
    startAngle: 45,
    title: "EC",
    colorTitle:'#000',
    value: 0,
    minValue: 0,
    maxValue: 14,
    majorTicks: ['0','2','4','6','8','10','12','14'],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        { from: 8, to: 10, color: 'rgba(238,238,238,.8)' },
        { from: 10, to: 12, color: 'rgba(204,204,204,.8)' },
        { from: 12, to: 14, color: 'rgba(153,153,153,.8)' }
    ],
    barWidth:5,
    colorBarProgress:"rgba(50,200,50,.75)",
    colorBar:"#bbb",
    colorPlate: '#fff',   //backgroundColor
    colorMajorTicks: '#000',
    colorMinorTicks: '#111',

    borderShadowWidth: 0,
    borders: false,

    colorUnits: '#999999',
    colorNumbers: '#000',
    colorNeedleStart: 'rgba(240, 128, 128, 1)',
    colorNeedleEnd: 'rgba(255, 160, 122, .9)',
    valueBox: true,
    fontValue:"Led", 
    fontValueSize:40,
    animationRule: 'linear',

});

ble_pH_gauge.draw();
ble_temp_gauge.draw();
ble_EC_gauge.draw();
