
// reusable function for highchart 



// ****************************************************
  
// **********************expenditure

Highcharts.chart("national-total-expenditure-lac-sss", {
chart: {
    plotBackgroundColor: null,
    height: expenditureHeight,
    margin: [0, 0, 0, 0],
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
},
credits: {
    enabled: false,
},
exporting: {
    enabled: false,
},
tooltip:{
    enabled: false
},
title: {
    text: ` <div class="graph-title" style="color:#00b050; ">
   85L
</div>`,
    align: "center",
    verticalAlign: "middle",
    y: 30,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},
subtitle: {
    text: `
        <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">
            
            <span>Expenditure</span>
        </div>`,
    align: "center",
    verticalAlign: "middle",
    y: 60,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},

accessibility: {
    point: {
        valueSuffix: "%",
    },
},
plotOptions: {
    pie: {
        colors: ["#00b050", "#f79646"],
        dataLabels: {
            enabled: false,
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
        innerSize: "60%",
        data: [
            ["Expenditure", 85],
            ["Unspent", 15],
        ],
    },
],
});

Highcharts.chart("national-total-unspent-lac-sss", {
chart: {
    plotBackgroundColor: null,
    height: expenditureHeight,
    margin: [0, 0, 0, 0],
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
},
credits: {
    enabled: false,
},
exporting: {
    enabled: false,
},

title: {
    text: ` <div class="graph-title" style="color:#3a7ed3; ">
    15L
    </div>`,
    align: "center",
    verticalAlign: "middle",
    y: 30,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},
tooltip:{
    enabled: false
},
subtitle: {
    text: `
    <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px">
        
        <span>Unspent</span>
    </div>`,
    align: "center",
    verticalAlign: "middle",
    y: 60,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},
// tooltip: {
//     pointFormat: 'name: <b>highchart</b>'
// },
accessibility: {
    point: {
        valueSuffix: "%",
    },
},
plotOptions: {
    pie: {
        colors: ["#558ed5", "#c6d9f1"],
        dataLabels: {
            enabled: false,
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
        innerSize: "60%",
        data: [
            ["Unspent", 15],
            ["Expenditure", 85],
        ],
    },
],
});


// **********************

let overallChart_sss = Highcharts.chart('integrated-dashboard-chart-overall-program-expenditure-amount-sss', {
    chart: {
        type: 'pie',
        height: window.innerWidth<1300 ? 190: 250,
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    title: null,
    subtitle: null,
    legend: {
        enabled: false,
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        itemStyle: {
            color: '#000000',
            fontSize: '13px'
        },
        itemMarginBottom: 10,
        labelFormatter: function () {
            return this.name;
        },
        // symbolRadius: 0,
        // symbolHeight: 12,
        // symbolWidth: 12,
        // symbolPadding: 10,
        // itemDistance: 20
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            startAngle: 0,
            endAngle: 360,
            colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb", "#f5ad45"],
            dataLabels: {
                enabled: false
            },
            showInLegend: true,
            center: ['40%', '50%'],
            size: '80%',
            borderWidth: 0,
            shadow: false
        }
    },
    series: [{
        type: 'pie',
        name: 'Expenditure',
        innerSize: '80%',
        data: [
            { name: "NOHPPCZ-RCs-35", y: 40, color: "#add73d" },
            { name: "NOHPPCZ-SSS-65 L", y: 40, color: "#35a8df" },
            { name: "NRCP-Lab-30 L", y: 5, color: "#d962bf" },
            { name: "PPCL-28 L", y: 5, color: "#91d2fb" },
            { name: "PM-ABHIM- SSS- 12 L", y: 10, color: "#f5ad45" }
        ]
    }]
});


//Set No data text
var textX = overallChart_sss.plotLeft + (overallChart_sss.plotWidth * 0.4);
var textY = overallChart_sss.plotTop + (overallChart_sss.plotHeight * 0.35);
var textWidth = 500;
textX = textX - (textWidth / 2);

overallChart_sss.renderer.label('<div style="width: ' + textWidth + 'px; text-align: center; z-index: -1; position:relative;"><span style="font-size:22px; font-weight: 600; margin-bottom:20px;">35,295</span><br><span style="font-size:14px;">All Head <br> Exp.</span></div>', textX, textY, null, null, null, true)
        .css({
            fontSize: '16px',
        }).add();

Highcharts.chart("national_expenditure_percentage_nohppcz_sss", {
chart: {
    plotBackgroundColor: null,
    height: expenditurPercentageeHeight,
    margin: [0, 0, 0, 0],
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
    marginTop: totalExpenitureMargin,
},
credits: {
    enabled: false,
},
exporting: {
    enabled: false,
},
title: {
    text: ` <div class="graph-title" style="color:#00b050; ">
    85%
    </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureTitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},

subtitle: {
    text: `
    <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">  <span>Expenditure</span>    </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureSubtitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
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
        colors: ["#00b050", "#f79646"],
        dataLabels: {
            enabled: false,
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
        innerSize: "60%",
        data: [
            ["", 85],
            ["", 15],
        ],
    },
],
});

Highcharts.chart("national_fund_unspent_percentage_nohppcz_sss", {
chart: {
    plotBackgroundColor: null,
    height: expenditurPercentageeHeight,
    margin: [0, 0, 0, 0],
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
    marginTop: totalExpenitureMargin,
},
credits: {
    enabled: false,
},
exporting: {
    enabled: false,
},
title: {
    text: ` <div class="graph-title" style="color:#3a7ed3; ">
    15%
    </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureTitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},

subtitle: {
    text: `
    <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px">
        <span>Unspent</span>
    </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureSubtitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
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
        colors: ["#558ed5", "#c6d9f1"],
        dataLabels: {
            enabled: false,
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
        innerSize: "60%",
        data: [
            ["", 15],
            ["", 85],
        ],
    },
],
});
Highcharts.chart("national_interest_earned_cy_percentage_nohppcz_sss", {
chart: {
    plotBackgroundColor: null,
    plotBackgroundColor: null,
    height: expenditurPercentageeHeight,
    margin: [0, 0, 0, 0],
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
    marginTop: totalExpenitureMargin,
},
credits: {
    enabled: false,
},
exporting: {
    enabled: false,
},
title: {
    text: ` <div class="graph-title" style="color:#00b050; "> 10% </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureTitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},
subtitle: {
    text: `
            <div class="graph-title" style="color:#00b050; "> <span>Interest Earned</span> </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureSubtitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
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
        colors: ["#00b050", "#f79646"],
        dataLabels: {
            enabled: false,
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
        innerSize: "60%",
        data: [
            ["", 10],
            ["", 90],
        ],
    },
],
});

Highcharts.chart("national_dd_percentage_nohppcz_sss", {
chart: {
    plotBackgroundColor: null,
    height: expenditurPercentageeHeight,
    margin: [0, 0, 0, 0],
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
    marginTop: totalExpenitureMargin,
},
credits: {
    enabled: false,
},
exporting: {
    enabled: false,
},
title: {
    text: ` <div class="graph-title" style="color:#3a7ed3; ">10%</div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureTitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
    },
},
subtitle: {
    text: `
    <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px"> <span>Interest DD Returned</span> </div>`,
    align: "center",
    verticalAlign: "middle",
    y: expenditureSubtitleY,
    style: {
        fontSize: "16px",
        color: "#000000",
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
        colors: ["#558ed5", "#c6d9f1"],
        dataLabels: {
            enabled: false,
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
        innerSize: "60%",
        data: [
            ["", 10],
            ["", 90],
        ],
    },
],
});
//   percentage of uc recevied

Highcharts.chart('nohppz_rc_chart_currently_UC_Received_sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '50%',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC Received </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        enabled:false
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 50],
                ['', 50],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_UC_not_Received_sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '20%',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC not Received</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        enabled:false
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_Nos_UC_Received_sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '80 Nos.',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC Received</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        enabled:false
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_Nos_UC_not_Received_sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '20 Nos.',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC not Received</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        enabled:false
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });

// ***********************************************************************


  Highcharts.chart('national_expnediture_nohppcz_sss', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    exporting: {
       enabled: false
   },
   credits: {
    enabled: false
 },
    yAxis: {
        min: 0,
        title: {
            text: 'Values'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: '',
        colors: [
            '#399def', '#3ebbf0', '#35c3e8', '#2bc9dc', '#20cfe1', '#16d4e6',
            '#0dd9db', '#03dfd0'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            ['2024-25', 4500],
            ['2023-24', 5000],
            ['2022-23', 800],
            ['2021-22', 700],
            ['2020-21', 600],
            ['2019-20', 3600],
            ['2018-19', 4100],
            ['2017-18', 3800],
            
        ],
        dataLabels: {
            enabled: false,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
          //   format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 
 
 Highcharts.chart('national_instiute_wise_yearly_nohppcz_sss', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    exporting: {
       enabled: false
   },
   credits: {
    enabled: false
 },
    yAxis: {
        min: 0,
        title: {
            text: 'Values'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: '',
        colors: [
         '#399def', '#3ebbf0', '#35c3e8', '#2bc9dc', '#20cfe1', '#16d4e6',
         '#0dd9db', '#03dfd0'
     ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            ['2024-25', 4500],
            ['2023-24', 5000],
            ['2022-23', 800],
            ['2021-22', 700],
            ['2020-21', 600],
            ['2019-20', 3600],
            ['2018-19', 4100],
            ['2017-18', 3800],
            
        ],
        dataLabels: {
            enabled: false,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
          //   format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 

 Highcharts.chart('integrated-dashboard-chart-currently-UC-Received-sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '50%',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC Received </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        valueDecimals: 2,
        valueSuffix: ''
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 50],
                ['', 50],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-UC-not-Received-sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '20%',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC not Received</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        valueDecimals: 2,
        valueSuffix: ''
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-Nos-UC-Received-sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '80 Nos.',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC Received</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        valueDecimals: 2,
        valueSuffix: ''
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-Nos-UC-not-Received-sss', {
    chart: {
        type: 'pie',
        height: 210,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: '20 Nos.',
        floating: true,
        verticalAlign: 'middle',
        y: 4,
        style: {
            fontSize: '16px'
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC not Received</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
        style: {
            fontSize: '13px',
            color: '#000'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        valueDecimals: 2,
        valueSuffix: ''
    },
    plotOptions: {
        pie: {
            size: '100%',
            innerSize: '70%', // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: 'bold',
                    fontSize: '16px'
                },
                connectorWidth: 0
            }
        }
    },
    colors: ['#b64926', '#eeece1'],
    series: [
        {
            type: 'pie',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });

 