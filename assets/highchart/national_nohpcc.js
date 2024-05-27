
// reusable function for highchart 

function initializePieChart(containerId, subtitleText, data, colors, chart_height) {
    let totalExpenitureMargin = window.innerWidth > 768 && window.innerWidth < 1299 ? -150 : 0;
    Highcharts.chart(containerId, {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: chart_height,
            // margin: [0, 0, 0, 0], // Adjusted margins to remove extra space
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            marginTop: totalExpenitureMargin,
            
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: null
        },
        subtitle: {
            text: subtitleText,
            align: 'center',
            verticalAlign: 'middle',
            y: 20,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                colors: colors,
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
                size: '110%',
                borderWidth: 0, // Remove border width to minimize space
                shadow: false // Disable shadow to remove extra space
            }
        },
        series: [{
            type: 'pie',
            name: '',
            innerSize: '60%',
            data: data
        }]
    });
}
// call the function for highchart
document.addEventListener('DOMContentLoaded', function() {
    let data1 = [
        ['', 85],
        ['', 15]
    ];
    let chart_height = 250;
    let color1 = ['#00b050', '#f79646'];
    let color2 = ['#558ed5', '#c6d9f1'];
    let subtitle1 = '85% <br> Expenditure';
// Total Fund unspent in Lakhs
    initializePieChart('national-total-expenditure-lac', subtitle1, data1, color1, chart_height);
    let unspent_data1 = [
        ['', 15],
        ['', 85]
    ];
    
    let expenditure_percentage1 = '15% <br> Expenditure';

    initializePieChart('national-total-unspent-lac', expenditure_percentage1, unspent_data1, color2, chart_height);

    // total expenditure in percente
    let expenditure_percentage_data1 = [
        ['', 85],
        ['', 15]
    ];
    
    let expenditure_percentage1_subtitle1 = '85% <br> Expenditure';

    initializePieChart('national_expenditure_percentage_nohppcz_rc', expenditure_percentage1_subtitle1, expenditure_percentage_data1, color1);
    // total fund in percente
    let fund_unspent_nohppczRC_percentage_data1 = [
        ['', 15],
        ['', 85]
    ];
    let fund_unspent_nohppczRC_percentage_subtitle1 = '15% <br> Unspent';

    initializePieChart('national_fund_unspent_percentage_nohppcz_rc', fund_unspent_nohppczRC_percentage_subtitle1, fund_unspent_nohppczRC_percentage_data1, color2);
    // total interest in percente
    let interest_earned_cy_nohppczRC = [
        ['', 15],
        ['', 85]
    ];
    
    let interest_earned_cy_nohppczRC_subtitle1 = '15% <br> Expenditure';

    initializePieChart('national_interest_earned_cy_percentage_nohppcz_rc', interest_earned_cy_nohppczRC_subtitle1, interest_earned_cy_nohppczRC, color1);
    // interest returned dd in percente
    let interest_dd_nohppczRC = [
        ['', 10],
        ['', 90]
    ];
    
    let interest_dd_nohppczRC_subtitle1 = '10% <br> Expenditure';

    initializePieChart('national_dd_percentage_nohppcz_rc', interest_dd_nohppczRC_subtitle1, interest_dd_nohppczRC, color2);
});

// ****************************************************
  
//   percentage of uc recevied

Highcharts.chart('nohppz_rc_chart_currently_UC_Received', {
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
            name: 'Temperature',
            data: [
                ['', 50],
                ['', 50],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_UC_not_Received', {
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_Nos_UC_Received', {
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('nohppz_rc_chart_currently_Nos_UC_not_Received', {
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
        text: '<div style="text-align:center;">Nos. of UC not received</div>',
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

// ***********************************************************************


  Highcharts.chart('national_expnediture_nohppcz_rc', {
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
 
 
 
 Highcharts.chart('national_instiute_wise_yearly_nohppcz_rc', {
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
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart1', {
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
            ['', 80],
            ['', 20],
            
           
        ]
    }]
 });
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart2', {
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
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart3', {
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
 
 Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart4', {
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
 Highcharts.chart('integrated-dashboard-unspent-balance-line-chart', {
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
 
 Highcharts.chart('integrated-dashboard-state-graph', {
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
 
 
 Highcharts.chart('integrated-dashboard-data-driven-graph1', {
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
 
 Highcharts.chart('integrated-dashboard-data-driven-graph2', {
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
 
 Highcharts.chart('integrated-dashboard-data-driven-graph3', {
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
 
 Highcharts.chart('integrated-dashboard-data-driven-graph4', {
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
 
 Highcharts.chart('integrated-dashboard-data-driven-graph5', {
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
 
 
 Highcharts.chart('integrated-dashboard-chart-currently-UC-Received', {
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
            name: 'Temperature',
            data: [
                ['', 50],
                ['', 50],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-UC-not-Received', {
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-Nos-UC-Received', {
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
            name: 'Temperature',
            data: [
                ['', 20],
                ['', 80],
            ]
        }
    ]
 });
 
 Highcharts.chart('integrated-dashboard-chart-currently-Nos-UC-not-Received', {
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
        text: '<div style="text-align:center;">Nos. of UC not received</div>',
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
