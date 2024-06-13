// **********************

let overallChart = Highcharts.chart(
    "national-dashboard-overall-Program-expenditure-amount",
    {
        chart: {
            type: "pie",
            height: window.innerWidth < 1300 ? 218 : 215,
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        title: null,
        subtitle: null,
        legend: {
            enabled: true,
            layout: "vertical",
            align: "right",
            verticalAlign: "middle",
            itemStyle: {
                color: "#000000",
                fontSize: "13px",
            },
            itemMarginBottom: 10,
            labelFormatter: function () {
                return this.name;
            },
            className: "custom-legend",
        },
        tooltip: {
            enabled: false,
        },
        plotOptions: {
            pie: {
                startAngle: 0,
                endAngle: 360,
                // colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb", "#f5ad45"],
                dataLabels: {
                    enabled: false,
                },
                showInLegend: true,
                center: ["40%", "50%"],
                size: "80%",
                borderWidth: 0,
                shadow: false,
                point: {
                    events: {
                        legendItemClick: function () {
                            if (this.visible) {
                                this.setVisible(false);
                            } else {
                                this.setVisible(true);
                            }
                            return false;
                        },
                    },
                },
            },
        },
        series: [
            {
                type: "pie",
                name: "Expenditure",
                innerSize: "80%",
                data: [
                    { name: "NOHPPCZ-RCs", y: 40, color: "#add73d" },
                    { name: "NOHPPCZ-SSS", y: 40, color: "#35a8df" },
                    {
                        name: "<span style='position:relative; z-index:9;'>NRCP-Lab</span>",
                        y: 5,
                        color: "#d962bf",
                    },
                    {
                        name: "<span style='position:relative; z-index:9;'>PPCL</span>",
                        y: 5,
                        color: "#91d2fb",
                    },
                    { name: "PM-ABHIM- SSS", y: 10, color: "#f5ad45" },
                ],
            },
        ],
    }
);

//Set No data text
var textX = overallChart.plotLeft + overallChart.plotWidth * 0.4;
var textY = overallChart.plotTop + overallChart.plotHeight * 0.35;
var textWidth = 500;
textX = textX - textWidth / 2;

overallChart.renderer
    .label(
        '<div style="width: ' +
            textWidth +
            'px; text-align: center;  position:relative;"><span style="font-size:22px; font-weight: 600; margin-bottom:20px;">35,295</span><br><span style="font-size:14px;">All Program <br> Exp</span></div>',
        textX,
        textY,
        null,
        null,
        null,
        true
    )
    .css({
        fontSize: "16px",
    })
    .add();

$(".line_icon.open_miniSide").on("click", function () {
    setTimeout(function(){

        let overallChart = Highcharts.chart(
            "national-dashboard-overall-Program-expenditure-amount",
            {
                chart: {
                    type: "pie",
                    height: window.innerWidth < 1300 ? 218 : 215,
                },
                credits: {
                    enabled: false,
                },
                exporting: {
                    enabled: false,
                },
                title: null,
                subtitle: null,
                legend: {
                    enabled: true,
                    layout: "vertical",
                    align: "right",
                    verticalAlign: "middle",
                    itemStyle: {
                        color: "#000000",
                        fontSize: "13px",
                    },
                    itemMarginBottom: 10,
                    labelFormatter: function () {
                        return this.name;
                    },
                    className: "custom-legend",
                },
                tooltip: {
                    enabled: false,
                },
                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        // colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb", "#f5ad45"],
                        dataLabels: {
                            enabled: false,
                        },
                        showInLegend: true,
                        center: ["40%", "50%"],
                        size: "80%",
                        borderWidth: 0,
                        shadow: false,
                        point: {
                            events: {
                                legendItemClick: function () {
                                    if (this.visible) {
                                        this.setVisible(false);
                                    } else {
                                        this.setVisible(true);
                                    }
                                    return false;
                                },
                            },
                        },
                    },
                },
                series: [
                    {
                        type: "pie",
                        name: "Expenditure",
                        innerSize: "80%",
                        data: [
                            { name: "NOHPPCZ-RCs", y: 40, color: "#add73d" },
                            { name: "NOHPPCZ-SSS", y: 40, color: "#35a8df" },
                            {
                                name: "<span style='position:relative; z-index:9;'>NRCP-Lab</span>",
                                y: 5,
                                color: "#d962bf",
                            },
                            {
                                name: "<span style='position:relative; z-index:9;'>PPCL</span>",
                                y: 5,
                                color: "#91d2fb",
                            },
                            { name: "PM-ABHIM- SSS", y: 10, color: "#f5ad45" },
                        ],
                    },
                ],
            }
        );
            var textX = overallChart.plotLeft + overallChart.plotWidth * 0.4;
            var textY = overallChart.plotTop + overallChart.plotHeight * 0.35;
            var textWidth = 500;
            textX = textX - textWidth / 2;
        
            overallChart.renderer
                .label(
                    '<div style="width: ' +
                        textWidth +
                        'px; text-align: center;  position:relative;"><span style="font-size:22px; font-weight: 600; margin-bottom:20px;">35,295</span><br><span style="font-size:14px;">All Program <br> Exp</span></div>',
                    textX,
                    textY,
                    null,
                    null,
                    null,
                    true
                )
                .css({
                    fontSize: "16px",
                })
                .add();
    }, 1000)
    
});
// **********************
// Highcharts.chart('integrated-dashboard-chart-overall-program-expenditure-amount', {
//     chart: {
//         type: 'pie',
//         height: 280,
//         marginRight: 100 // Add margin to the right to make space for the legend
//     },
//     title: {
//         text: '<div>35295<br>All Program Exp</div>',
//         align: 'center',
//         floating: true,
//         verticalAlign: 'middle',
//         y: 30
//     },
//     legend: {
//         enabled: true,
//         layout: 'vertical',
//         align: 'right',
//         verticalAlign: 'middle',
//         x: 0, // Adjust horizontal alignment if needed
//         y: 0 // Adjust vertical alignment if needed
//     },
//     tooltip: {
//         valueDecimals: 2,
//         valueSuffix: ' TWh'
//     },
//     plotOptions: {
//         pie: {
//             size: '70%', // Adjust size to fit the chart with the legend
//             innerSize: '60%',
//             dataLabels: {
//                 enabled: false,
//                 crop: false,
//                 distance: '-10%',
//                 style: {
//                     fontWeight: 'bold',
//                     fontSize: '16px'
//                 },
//                 connectorWidth: 0
//             }
//         }
//     },
//     colors: ['#FCE700', '#F8C4B4', '#f6e1ea', '#B8E8FC', '#BCE29E'],
//     series: [
//         {
//             type: 'pie',
//             name: 'Nuclear energy production',
//             data: [
//                 { name: 'US', y: 30 },
//                 { name: 'UK', y: 20 },
//                 { name: 'France', y: 25 },
//                 { name: 'Germany', y: 15 },
//                 { name: 'Japan', y: 10 }
//             ]
//         }
//     ],
//     credits: {
//         enabled: false
//     },
//     exporting: {
//         enabled: false
//     }
// });

// highchart
let guageHeight = window.innerWidth>1450 && ( window.innerWidth<1600 ) ? 210 : 175;
let gaugeSubtitleY = window.innerWidth>1600 ? -10 : -20
Highcharts.chart("integrated-dashboard-gauge1", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height:  guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center; ">Net Profit Margin - 50%</div>',
        align: "center",
        verticalAlign: "bottom",
        y: gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Net Profit Margin",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-gauge2", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height: guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Gross Profit margin - 55%</div>',
        align: "center",
        verticalAlign: "bottom",
        y:  gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Gross Profit margin",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-gauge3", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height:  guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Burn Rate - 80%</div>',
        align: "center",
        verticalAlign: "bottom",
        y:  gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Burn Rate",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-gauge4", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height: guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Sales Growth - 30%</div>',
        align: "center",
        verticalAlign: "bottom",
        y:  gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Sales Growth",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

(async () => {
    const topology = await fetch(
        "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
    ).then((response) => response.json());

    Highcharts.mapChart("integrated-dashboard-india-map", {
        chart: {
            map: topology,
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: "",
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: "bottom",
            },
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: "#fcad95",
            maxColor: "#ab4024",
            labels: {
                format: "{value}",
            },
        },

        series: [
            {
                //   data: data,
                name: "",
                allowPointSelect: false,
                cursor: "pointer",
                color: "#fff",
                states: {
                    select: {
                        color: "#fcad95",
                    },
                },
            },
        ],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: [
                        "printChart",
                        "separator",
                        "downloadPNG",
                        "downloadJPEG",
                        "downloadPDF",
                        "downloadSVG",
                    ],
                },
            },
        },
    });
})();

(async () => {
    const topology = await fetch(
        "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
    ).then((response) => response.json());

    Highcharts.mapChart("integrated-dashboard-india-map2", {
        chart: {
            map: topology,
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: "",
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: "bottom",
            },
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: "#fcad95",
            maxColor: "#ab4024",
            labels: {
                format: "{value}",
            },
        },

        series: [
            {
                //   data: data,
                name: "",
                allowPointSelect: false,
                cursor: "pointer",
                color: "#fff",
                states: {
                    select: {
                        color: "#ab4024",
                    },
                },
            },
        ],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: [
                        "printChart",
                        "separator",
                        "downloadPNG",
                        "downloadJPEG",
                        "downloadPDF",
                        "downloadSVG",
                    ],
                },
            },
        },
    });
})();

(async () => {
    const topology = await fetch(
        "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
    ).then((response) => response.json());

    Highcharts.mapChart("integrated-dashboard-india-map3", {
        chart: {
            map: topology,
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: "",
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: "bottom",
            },
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: "#fcad95",
            maxColor: "#ab4024",
            labels: {
                format: "{value}",
            },
        },

        series: [
            {
                //   data: data,
                name: "",
                allowPointSelect: false,
                cursor: "pointer",
                color: "#fff",
                states: {
                    select: {
                        color: "#fcad95",
                    },
                },
            },
        ],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: [
                        "printChart",
                        "separator",
                        "downloadPNG",
                        "downloadJPEG",
                        "downloadPDF",
                        "downloadSVG",
                    ],
                },
            },
        },
    });
})();

Highcharts.chart("integrated-dashboard-program-wise-expenditure", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    exporting: {
        enabled: false,
    },
    credits: {
        enabled: false,
    },
    yAxis: {
        min: 0,
        title: {
            text: "Values",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        pointFormat: "",
    },
    series: [
        {
            name: "",
            colors: [
                "#399def",
                "#3ebbf0",
                "#35c3e8",
                "#2bc9dc",
                "#20cfe1",
                "#16d4e6",
                "#0dd9db",
                "#03dfd0",
            ],
            colorByPoint: true,
            groupPadding: 0,
            data: [
                ["2024-25", 4500],
                ["2023-24", 4500],
                ["2022-23", 800],
                ["2021-22", 700],
                ["2020-21", 600],
                ["2019-20", 3600],
                ["2018-19", 4100],
                ["2017-18", 3800],
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                //   format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-institute-wise-expenditure", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    exporting: {
        enabled: false,
    },
    credits: {
        enabled: false,
    },
    yAxis: {
        min: 0,
        title: {
            text: "Values",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        pointFormat: "",
    },
    series: [
        {
            name: "",
            colors: [
                "#399def",
                "#3ebbf0",
                "#35c3e8",
                "#2bc9dc",
                "#20cfe1",
                "#16d4e6",
                "#0dd9db",
                "#03dfd0",
            ],
            colorByPoint: true,
            groupPadding: 0,
            data: [
                ["2024-25", 4500],
                ["2023-24", 4500],
                ["2022-23", 800],
                ["2021-22", 700],
                ["2020-21", 600],
                ["2019-20", 3600],
                ["2018-19", 4100],
                ["2017-18", 3800],
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                //   format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

// program wise expenditure state filter highchart
Highcharts.chart("integrated-dashboard-state1", {
    chart: {
        type: "pie",
        height: 150,
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50,
        //  marginBottom: 0,
    },
    title: {
        useHTML: true,
        text: "57%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">UP</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 57],
                ["", 43],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state2", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: 0,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">MP</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 21],
                ["", 79],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state3", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: 0,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">WB</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state4", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">TN</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state5", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "57%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: "57%",
        floating: true,
        verticalAlign: "middle",
        y: 0,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">UK</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 57],
                ["", 43],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state6", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">MH</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 21],
                ["", 79],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state7", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">BR</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state8", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">OR</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state9", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "47%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">HR</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 47],
                ["", 53],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state10", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">RJ</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 57],
                ["", 43],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state11", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">GJ</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

// Expenditure Bar Chart (All Programs combined data)

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart1", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },

    subtitle: {
        text: "80%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            colors: ["#eb5034", "#434348"],
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 80],
                ["", 20],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart2", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "50%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 50],
                ["", 50],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart3", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "99%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            colors: ["#d7c706", "#434348"],
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 99],
                ["", 1],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart4", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "75%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            colors: ["#eb5034", "#434348"],
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 75],
                ["", 25],
            ],
        },
    ],
});

// Program wise Unspent Balance Line Chart
Highcharts.chart("integrated-dashboard-unspent-balance-line-chart", {
    chart: {
        type: "line",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    xAxis: {
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
    },
    yAxis: {
        title: {
            text: "Institute-wise Patient / Sample Received",
        },
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true,
            },

            enableMouseTracking: false,
        },
    },
    series: [
        {
            name: "Reggane",
            data: [
                16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
                22.0, 17.8,
            ],
        },
        {
            name: "Tallinn",
            data: [
                -2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5, 2.0,
                -0.9,
            ],
        },
    ],
});

// state graph
Highcharts.chart("integrated-dashboard-state-graph", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            autoRotation: [-70, -90],
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        useHTML: true,
        // labelFormatter: function() {
        //     let symbol = '<span style="color:' + this.color + ';font-size:12px; color:red">&#9644;</span>';
        //     return '<span style="font-size: 12px;">' + symbol +  ' ' + this.name  +  '</span>';
        // }

        allowPointSelect: false,
    },
    tooltip: {
        enabled: false,
    },
    series: [
        {
            name: "Expenditure",
            type: "column",
            color: "#ffc147",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Uttar Pradesh", 4.3],
                ["Maharashtra", 2.5],
                ["Bihar", 3.5],
                ["West Bengal", 4.5],
                ["Madhya Pradesh", 2],
                ["Tamil Nadu", 1.2],
                ["Rajasthan", 2.4],
                ["Karnataka", 3.1],
                ["Gujarat", 3.4],
                ["Andhra Pradesh", 4],
                ["Odisha", 4.4],
                ["Telangana", 2.8],
                ["Kerala", 4],
                ["Jharkhand", 4],
                ["Assam", 2],
                ["Punjab", 3],
                ["Chhattisgarh", 1],
                ["Haryana", 4],
                ["Uttarakhand", 4],
                ["Himachal Pradesh", 4],
                ["Tripura", 4],
                ["Meghalaya", 4],
                ["Manipur", 4],
                ["Nagaland", 4],
                ["Goa", 4],
                ["Arunachal Pradesh", 4],
                ["Mizoram", 4],
                ["Sikkim", 4],
                ["Delhi", 5], // Considering Delhi as a Union Territory
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "12px",
                    fontFamily: "Verdana, sans-serif",
                    textShadow: "none",
                    color: "red",
                },
                textShadow: "none",
            },
        },
    ],
});

// data driven graph

Highcharts.chart("integrated-dashboard-data-driven-graph1", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },

    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7, // Adjust this value to fine-tune the vertical position
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#f49d00",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },

            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph2", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#43cdd9",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Office Expenses  & Travel", 4.3],
                ["Lab Strengthening <br>(Non Recurring)", 2.5],
                ["Other Activities", 3.5],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph3", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#dd5f00",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph4", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#00b0f0",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph5", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70, // Rotating labels to prevent overlap
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
                whiteSpace: "nowrap", // Preventing text wrap
                textOverflow: "ellipsis", // Adding ellipsis for overflow text
            },
        },
        // categories: [
        //     'Current Man Power',
        //     'Meetings, Training & Research',
        //     'Lab Strengthening <br> Kits, Regents &<br> Consumable (Recurring)',
        //     'IEC',
        //     'Office Expenses & Travel',
        //     'Lab Strengthening (Non Recurring)',
        //     'Other Activities'
        // ],
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#92d050",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-chart-currently-UC-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "50%",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC Received </div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 50],
                ["", 50],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-chart-currently-UC-not-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "20%",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC not Received</div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 20],
                ["", 80],
            ],
        },
    ],
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
});

Highcharts.chart("integrated-dashboard-chart-currently-Nos-UC-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "80 Nos.",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC Received</div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 20],
                ["", 80],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-chart-currently-Nos-UC-not-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "20 Nos.",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC not Received</div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 20],
                ["", 80],
            ],
        },
    ],
});
