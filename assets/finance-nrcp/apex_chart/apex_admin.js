
Highcharts.chart('admin-dashboard-Overall-User-Active', {
    chart: {
        type: 'pie',
        height: 200,
       //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    //    marginTop:-10
    },
    title: {
        useHTML: true,
        text: '80%',
        floating: true,
        verticalAlign: 'middle',
        y: -12,
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
        y: 0, // Adjusted position
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
        y: -15,
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
        y: 0, // Adjusted position
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
        y: -15,
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
        y: 0, // Adjusted position
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
        text: '<div style="text-align:center;">NRCP User </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
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
        text: '<div style="text-align:center;">PPCL User</div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
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
        y: -15,
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
        text: '<div style="text-align:center;">PM-ABHIM User </div>',
        align: 'center',
        verticalAlign: 'bottom',
        y: 0, // Adjusted position
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
        height: '200',
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
    y: 0, // Adjusted position
    style: {
        fontSize: '13px',
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
            distance: 20,
            style: {
                fontSize: '14px'
            }
        },
        lineWidth: 0,
        plotBands: [{
            from: 0,
            to: 30,
            color: '#DF5353', // red
            thickness: 20
        }, {
            from: 30,
            to: 600,
            color: '#DDDF0D', // yellow
            thickness: 20
        }, {
            from: 60,
            to: 100,
            color: '#55BF3B', // green
            thickness: 20
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
 