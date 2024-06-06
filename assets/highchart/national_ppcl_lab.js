
// reusable function for highchart 

// ****************************************************
  
// **********************expenditure

Highcharts.chart("national-total-expenditure-lac-ppcl-lab", {
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
                ["Unspent", 85],
                ["Expenditure", 15],
            ],
        },
    ],
    });
    
    Highcharts.chart("national-total-unspent-lac-ppcl-lab", {
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
    
    subtitle: {
        text: `
        <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">
            
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

let overallChart_ppcl_lab = Highcharts.chart('integrated-dashboard-chart-overall-program-expenditure-amount-ppcl-lab', {
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
var textX = overallChart_ppcl_lab.plotLeft + (overallChart_ppcl_lab.plotWidth * 0.4);
var textY = overallChart_ppcl_lab.plotTop + (overallChart_ppcl_lab.plotHeight * 0.35);
var textWidth = 500;
textX = textX - (textWidth / 2);

overallChart_ppcl_lab.renderer.label('<div style="width: ' + textWidth + 'px; text-align: center; z-index: -1; position:relative;"><span style="font-size:22px; font-weight: 600; margin-bottom:20px;">35,295</span><br><span style="font-size:14px;">All Head <br> Exp.</span></div>', textX, textY, null, null, null, true)
        .css({
            fontSize: '16px',
        }).add();

    Highcharts.chart("national_expenditure_percentage_nohppcz_ppcl_lab", {
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
    
    Highcharts.chart("national_fund_unspent_percentage_nohppcz_ppcl_lab", {
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
        <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">
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
    Highcharts.chart("national_interest_earned_cy_percentage_nohppcz_ppcl_lab", {
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
    
    Highcharts.chart("national_dd_percentage_nohppcz_ppcl_lab", {
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
        <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px"> <span>Interest DD Returned</span> </div>`,
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

Highcharts.chart('nohppz_rc_chart_currently_UC_Received_ppcl_lab', {
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
                enabled: false,
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
            name: 'Temperature',
            data: [
                ['', 50],
                ['', 50],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_UC_not_Received_ppcl_lab', {
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
                enabled: false,
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_Nos_UC_Received_ppcl_lab', {
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
                enabled: false,
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_Nos_UC_not_Received_ppcl_lab', {
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
                enabled: false,
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


  Highcharts.chart('national_expnediture_nohppcz_ppcl_lab', {
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
 
 
 
 Highcharts.chart('national_instiute_wise_yearly_nohppcz_ppcl_lab', {
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
 
 
 // program wise expenditure state filter highchart

 
 
 // Expenditure Bar Chart (All Programs combined data)
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart1-ppcl-lab', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height:'250'
    },
    credits: {
       enabled: false
    },
    exporting: {
       enabled: false
    },
    title: {
        text: '',
    },
  
    subtitle: {
        text: '80%',
        align: 'center',
        verticalAlign: 'middle',
        y: 60,
        style: {
            fontSize: '16px',
            color:"#000"
        }
    },
    tooltip: {
        pointFormat: 'name: <b>highchart</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
          colors: ['#eb5034', '#434348'],
            dataLabels: {
                enabled: false,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: '',
        innerSize: '50%',
        data: [
            ['', 80],
            ['', 20],
            
           
        ]
    }]
 });
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart2-ppcl-lab', {
    chart: {
       plotBackgroundColor: null,
       plotBorderWidth: 0,
       plotShadow: false,  height:'250'
    },
    credits: {
       enabled: false
    },
    exporting: {
       enabled: false
    },
    title: {
       text: '',
   },
   subtitle: {
       text: '50%',
       align: 'center',
       verticalAlign: 'middle',
       y: 60,
       style: {
           fontSize: '16px',
           color:'#000'
       }
   },
   tooltip: {
       pointFormat: 'name: <b>highchart</b>'
   },
   accessibility: {
       point: {
           valueSuffix: '%'
       }
   },
   plotOptions: {
       pie: {
           dataLabels: {
               enabled: true,
               distance: -50,
               style: {
                   fontWeight: 'bold',
                   color: 'white'
               }
           },
           startAngle: -90,
           endAngle: 90,
           center: ['50%', '75%'],
           size: '110%'
       }
   },
   series: [{
       type: 'pie',
       name: '',
       innerSize: '50%',
       data: [
           ['', 50],
           ['', 50],
           
          
       ]
   }]
 });
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart3-ppcl-lab', {
    chart: {
       plotBackgroundColor: null,
       plotBorderWidth: 0,
       plotShadow: false,
       height:'250'
    },
    credits: {
       enabled: false
    },
    exporting: {
       enabled: false
    },
    title: {
       text: '',
   },
   subtitle: {
       text: '99%',
       align: 'center',
       verticalAlign: 'middle',
       y: 60,
       style: {
         fontSize: '16px',
         color:'#000'
       }
   },
   tooltip: {
       pointFormat: 'name: <b>highchart</b>'
   },
   accessibility: {
       point: {
           valueSuffix: '%'
       }
   },
   plotOptions: {
       pie: {
         colors: ['#d7c706', '#434348'],
           dataLabels: {
               enabled: true,
               distance: -50,
               style: {
                   fontWeight: 'bold',
                   color: 'white'
               }
           },
           startAngle: -90,
           endAngle: 90,
           center: ['50%', '75%'],
           size: '110%'
       }
   },
   series: [{
       type: 'pie',
       name: '',
       innerSize: '50%',
       data: [
           ['', 99],
           ['', 1],
           
          
       ]
   }]
 });
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart4-ppcl-lab', {
    chart: {
       plotBackgroundColor: null,
       plotBorderWidth: 0,
       plotShadow: false,
       height:'250'
    },
    credits: {
       enabled: false
    },
    exporting: {
       enabled: false
    },
    title: {
       text: '',
   },
   subtitle: {
       text: '72%',
       align: 'center',
       verticalAlign: 'middle',
       y: 60,
       style: {
         fontSize: '16px',
         color:'#000'
       }
       
   },
   tooltip: {
       pointFormat: 'name: <b>highchart</b>'
   },
   accessibility: {
       point: {
           valueSuffix: '%'
       }
   },
   plotOptions: {
       pie: {
         colors: ['#eb5034', '#434348'],
           dataLabels: {
               enabled: true,
               distance: -50,
               style: {
                   fontWeight: 'bold',
                   color: 'white'
               }
           },
           startAngle: -90,
           endAngle: 90,
           center: ['50%', '75%'],
           size: '110%'
       }
   },
   series: [{
       type: 'pie',
       name: '',
       innerSize: '50%',
       data: [
           ['', 72],
           ['', 28],
           
       ]
   }]
 });
 
 // Program wise Unspent Balance Line Chart
 Highcharts.chart('integrated-dashboard-unspent-balance-line-chart-ppcl-lab', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
     enabled: false
    },
   
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Temperature (°C)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Reggane',
        data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
            22.0, 17.8]
    }, {
        name: 'Tallinn',
        data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
            2.0, -0.9]
    }]
 });
 
 
 // state graph
 
 Highcharts.chart('integrated-dashboard-state-graph-ppcl-lab', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
       enabled: false
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'State',
        colors: [
            '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
            '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
            '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
            '#03c69b',  '#00f194'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
          ['Uttar Pradesh', 4.3],
          ['Maharashtra', 2.5],
          ['Bihar', 3.5],
          ['West Bengal', 4.5],
          ['Madhya Pradesh', 2],
          ['Tamil Nadu', 1.2],
          ['Rajasthan', 2.4],
          ['Karnataka', 3.1],
          ['Gujarat', 3.4],
          ['Andhra Pradesh', 4],
          ['Odisha', 4.4],
          ['Telangana', 2.8],
          ['Kerala', 4],
          ['Jharkhand', 4],
          ['Assam', 2],
          ['Punjab', 3],
          ['Chhattisgarh', 1],
          ['Haryana', 4],
          ['Uttarakhand', 4],
          ['Himachal Pradesh', 4],
          ['Tripura', 4],
          ['Meghalaya', 4],
          ['Manipur', 4],
          ['Nagaland', 4],
          ['Goa', 4],
          ['Arunachal Pradesh', 4],
          ['Mizoram', 4],
          ['Sikkim', 4],
          ['Delhi', 5] // Considering Delhi as a Union Territory
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 
 
 // data driven graph
 
 
 Highcharts.chart('integrated-dashboard-data-driven-graph1-ppcl-lab', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
       enabled: false
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'State',
        colors: [
           '#f49d00'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
          [' Current Man Power', 4.3],
          ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
          ['Lab Strengthening Kits', 3.5],
          ['IEC', 2],
         
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 Highcharts.chart('integrated-dashboard-data-driven-graph2-ppcl-lab', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
       enabled: false
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'State',
        colors: [
            '#43cdd9'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
          [' Current Man Power', 4.3],
          ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
          ['Lab Strengthening Kits', 3.5],
          ['IEC', 2],
         
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 Highcharts.chart('integrated-dashboard-data-driven-graph3-ppcl-lab', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
       enabled: false
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'State',
        colors: [
            '#dd5f00'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
          [' Current Man Power', 4.3],
          ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
          ['Lab Strengthening Kits', 3.5],
          ['IEC', 2],
         
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 Highcharts.chart('integrated-dashboard-data-driven-graph4-ppcl-lab', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
       enabled: false
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'State',
        colors: [
            '#00b0f0'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
          [' Current Man Power', 4.3],
          ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
          ['Lab Strengthening Kits', 3.5],
          ['IEC', 2],
         
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 Highcharts.chart('integrated-dashboard-data-driven-graph5-ppcl-lab', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
    exporting: {
       enabled: false
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: ''
    },
    series: [{
        name: 'State',
        colors: [
            '#92d050'
        ],
       
        data: [
          [' Current Man Power', 4.3],
          ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
          ['Lab Strengthening Kits', 3.5],
          ['IEC', 2],
         
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });
 
 
 Highcharts.chart('integrated-dashboard-chart-currently-UC-Received-ppcl-lab', {
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
                enabled: false,
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
            name: 'Temperature',
            data: [
                ['', 50],
                ['', 50],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-UC-not-Received-ppcl-lab', {
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
                enabled: false,
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-Nos-UC-Received-ppcl-lab', {
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
                enabled: false,
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-Nos-UC-not-Received-ppcl-lab', {
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
                enabled: false,
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

 