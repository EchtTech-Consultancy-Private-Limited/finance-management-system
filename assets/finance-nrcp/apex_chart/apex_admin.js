
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
        categories: ['21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '01', '02']
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: '2021/11',
        data: [1, 18, 23, 15, 5, 25, 29, 28, 21, 10, 15, 17]
    }]
 });


 var options = {
    series: [40, 30, 20, 10],
    chart: {
       height: 300,
       type: 'donut',
       offsetY: 0
    },
    plotOptions: {
 
       radialBar: {
          startAngle: -90,
          endAngle: 90,
          hollow: {
             margin: 0,
             size: "50%"
          },
          dataLabels: {
             showOn: "never",
             
             name: {
                show: false,
                fontSize: "13px",
                fontWeight: "700",
                offsetY: -5,
                color: ["#000000", "#E5ECFF"],
             },
             value: {
                color: ["#000000", "#E5ECFF"],
                fontSize: "30px",
                fontWeight: "700",
                offsetY: 0,
                show: false
             }
          },
          track: {
             background: ["#f79646", "#00b050"],
             strokeWidth: '100%'
          }
       }
    },
    colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb"],
    stroke: {
       lineCap: "round",
    },
 
 
    labels: ["NOHPPCZ-RCs", "NOHPPCZ-SSS", "NRCP", "PPCL"],
    legend: {
       show: true,
       position: 'bottom',
       fontSize: '12px',
    //    height: '100px',
       align:'center',
       gap:'20px', 
       offsetY: 0,
       labels: {
          colors: ["#000000", "#E5ECFF"],
       },
       markers: {
          width: 12,
          height: 12,
          radius: 6,
       }
    }
 };
 var in_dashboard7 = new ApexCharts(document.querySelector("#admin-dashboard-calls-qtr"), options);
 in_dashboard7.render();

 function show1(){
    $("#admin-dashboard-Months-bar").toggleClass("d-none");
    $("#admin-dashboard-Months-pie").toggleClass("d-none");  

  }
  function show2(){   
        $("#admin-dashboard-Months-bar").toggleClass("d-none");
        $("#admin-dashboard-Months-pie").toggleClass("d-none");   
  }


  Highcharts.chart('admin-dashboard-Months-pie', {
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
            text: ''
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: '2021/11',
        data: [1, 18, 23, 15, 5, 25, 29, 28, 21, 10, 15, 17]
    }]
 });

 
 Highcharts.chart('admin-dashboard-Months-bar', {
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
   
    // xAxis: {
    //     categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    // },
    // yAxis: {
    //     title: {
    //         text: ''
    //     }
    // },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    xAxis: {
        categories: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
            'Oct', 'Nov', 'Dec'
        ]
    },
    series: [{
        type: 'column',
        name: 'Unemployed',
        borderRadius: 5,
        colorByPoint: true,
        data: [
            5412, 4977, 4730, 4437, 3947, 3707, 4143, 3609,
            3311, 3072, 2899, 2887
        ],
        showInLegend: false
    }]
 });