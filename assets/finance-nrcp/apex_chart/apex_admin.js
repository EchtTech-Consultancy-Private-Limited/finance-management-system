
Highcharts.chart('admin-dashboard-Overall-User-Active', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
       marginTop:-5
    },
    title: {
        useHTML: true,
        text: '80%',
        floating: true,
        verticalAlign: 'middle',
        y: -8,
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
        text: '<div style="text-align:center;">Overall User Active </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: -5, // Adjusted position
        style: {
            fontSize: '12px',
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
    colors: ['#1d62f0', '#fafafa'],
    series: [
        {
            type: 'pie',
            name: 'Temperature',
            data: [
                ['', 80],
                ['', 20],
            ]
        }
    ]
 });
 
 Highcharts.chart('admin-dashboard-NOHPPCZ-RCs-User', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    //    marginTop:-10
    },
    title: {
        useHTML: true,
        text: '50',
        floating: true,
        verticalAlign: 'middle',
        y: -5,
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
        text: '<div style="text-align:center;">NOHPPCZ-RCs User </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y:-10, // Adjusted position
        style: {
            fontSize: '12px',
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
    colors: ['#ff9e27', '#fafafa'],
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

 Highcharts.chart('admin-dashboard-NOHPPCZ-SSS-User', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    //    marginTop:-10
    },
    title: {
        useHTML: true,
        text: '36',
        floating: true,
        verticalAlign: 'middle',
        y: -5,
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
        text: '<div style="text-align:center;">NOHPPCZ-SSS User </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y:-10, // Adjusted position
        style: {
            fontSize: '12px',
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
    colors: ['#2bb930', '#fafafa'],
    series: [
        {
            type: 'pie',
            name: 'Temperature',
            data: [
                ['', 76],
                ['', 24],
            ]
        }
    ]
 });

 Highcharts.chart('admin-dashboard-NRCP-User', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    //    marginTop:-10
    },
    title: {
        useHTML: true,
        text: '50',
        floating: true,
        verticalAlign: 'middle',
        y: -5,
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
        text: '<div style="text-align:center;">NRCP <br class="d-none-lg"> User </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: -10, // Adjusted position
        style: {
            fontSize: '12px',
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
    colors: ['#ff9e27', '#fafafa'],
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

 Highcharts.chart('admin-dashboard-PPCL-User', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    //    marginTop:-10
    },
    title: {
        useHTML: true,
        text: '36',
        floating: true,
        verticalAlign: 'middle',
        y: -5,
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
        text: '<div style="text-align:center;">PPCL <br class="d-none-lg"> User</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: -10, // Adjusted position
        style: {
            fontSize: '12px',
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
    colors: ['#2bb930', '#fafafa'],
    series: [
        {
            type: 'pie',
            name: 'Temperature',
            data: [
                ['', 76],
                ['', 24],
            ]
        }
    ]
 });

 Highcharts.chart('admin-dashboard-PM-ABHIM-User', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    //    marginTop:-10
    },
    title: {
        useHTML: true,
        text: '50',
        floating: true,
        verticalAlign: 'middle',
        y: -10,
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
        text: '<div style="text-align:center;">PM-ABHIM <br class="d-none-lg"> User </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: -10, // Adjusted position
        style: {
            fontSize: '12px',
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
    colors: ['#da9a4c', '#fafafa'],
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
 
Highcharts.chart('admin-dashboard-Average-Login-Hours',  {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: '180',
    },
 
    title: {
        text: ''
    },
    credits: {
       enabled: false
   },
   subtitle: {
    useHTML: true,
    text: '<div style="text-align:center;">Average Login Hours </div>',
    align: 'center',
    verticalAlign: 'bottom',
    y: 10, // Adjusted position
    style: {
        fontSize: '12px',
        color: '#000'
    }
},
   exporting: {
    enabled: false
 },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ['50%', '75%'],
        size: '110%'
    },
 
    // the value axis
    yAxis: {
        min: 0,
        max: 100,
        tickPixelInterval: 72,
        tickPosition: 'inside',
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            distance: 10,
            style: {
                fontSize: '12px'
            }
        },
        lineWidth: 0,
        plotBands: [{
            from: 0,
            to: 30,
            color: '#DF5353', // red
            thickness: 15
        }, {
            from: 30,
            to: 600,
            color: '#DDDF0D', // yellow
            thickness: 15
        }, {
            from: 60,
            to: 100,    
            color: '#55BF3B', // green
            thickness: 15
        }]
    },
 
    series: [{
        name: 'Speed',
        data: [72],
        tooltip: {
          //   valueSuffix: ' km/h'
        },
        dataLabels: {
          //   format: '{y} km/h',
            borderWidth: 0,
            color: (
                Highcharts.defaultOptions.title &&
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color
            ) || '#333333',
            style: {
                fontSize: '16px'
            }
        },
        dial: {
            radius: '80%',
            backgroundColor: 'gray',
            baseWidth: 12,
            baseLength: '0%',
            rearLength: '0%'
        },
        pivot: {
            backgroundColor: 'gray',
            radius: 6
        }
 
    }]
 
 });


 (async () => {
    const topology = await fetch(
        'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
    ).then(response => response.json());
 
 
 
    Highcharts.mapChart('integrated-dashboard-india-map-admin', {
        chart: {
            map: topology,
        },
        title: {
            text: ''
        },
        credits: {
          enabled: false
      },
        subtitle: {
            text: ''
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: '#fcad95',
            maxColor: '#ab4024',
            labels: {
                format: '{value}',
            },
        },
        
        series: [{
          //   data: data,
            name: '',
            allowPointSelect: false,
            cursor: 'pointer',
            color: "#fff",
            states: {
                select: {
                    color: '#fcad95'
                }
            }
        }],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                }
            }
        }
    });
 
 })();
 

 
  Highcharts.chart('integrated-dashboard-program-wise-expenditure', {
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


// Program wise Unspent Balance Line Chart
Highcharts.chart('integrated-dashboard-unspent-Sessions', {
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
 