// const BASE_URL = $("meta[name='baseURL']").attr('content');
// Admin filter dashboard
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "admin/filter-dashboard",
        data: {
            'financial_year': new Date().getFullYear()+ ' - ' + (new Date().getFullYear()+1)
        },
        success: function(data) {
            var programUserDetails = data.programUserDetails;  
            adminDashboardChart(data,programUserDetails);         
        }
    });
});

$(document).on('click', '.performance', function() {
    let performance = $(this).attr('data-val');
    $.ajax({
        type: "GET",
        url: BASE_URL + "admin/filter-dashboard",
        data: {
            'performance': performance
        },
        success: function(data) {
            var programUserDetails = data.programUserDetails;  
            adminDashboardChart(data,programUserDetails);         
        }
    });
});
$(document).on('change', '#user_program', function() {
    let programName = $(this).val();
    // alert(programName);  
    $.ajax({
        type: "GET",
        url: BASE_URL + "admin/filter-dashboard",
        data: {
            'programName': programName
        },
        success: function(data) {
            var programUserDetails = data.programUserDetails;  
            adminDashboardChart(data,programUserDetails);         
        }
    });
});
// **************************************************
// reusable function for highchart 


// **************************************************
function adminDashboardChart(data,programUserDetailsArray) {
    const colors = [
        ['#2bb930', '#fafafa'],
        ['#ff5733', '#fafafa'],
        ['#3498db', '#fafafa'],
        ['#f1c40f', '#fafafa'],
        ['#9b59b6', '#fafafa'],
    ];

    programUserDetailsArray.forEach((programUserDetails, index) => {
        const chartContainerId = `admin-dashboard-${index}`;
        Highcharts.chart(chartContainerId, {
            chart: {
                type: 'pie',
                height: 200,
                // margin: [0, 0, 0, 0] // Set margins to remove extra space
                // marginTop:-10
            },
            title: {
                useHTML: true,
                text: programUserDetails.user_count.toString(),
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
                text: `<div style="text-align:center; z-index:-1;">${programUserDetails.program_name} User</div>`,
                align: 'center',
                verticalAlign: 'bottom',
                y: -10,
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
            colors: colors[index % colors.length], // Use a different color for each chart
            series: [
                {
                    type: 'pie',
                    name: programUserDetails.program_name,
                    data: [
                        ['', programUserDetails.totalUser],
                        ['', programUserDetails.user_count],
                    ]
                }
            ]
        });
    });

    // Average-Login-Hours

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
        text: '<div style="text-align:center; z-index:-1;">Average Login Hours </div>',
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
            name: 'Average Login Hours',
            data: [data.loginCountHour],
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

    // Overall-User-Active
    Highcharts.chart('admin-dashboard-Overall-User-Active', {
        chart: {
            type: 'pie',
            height: 200,
           //  margin: [0, 0, 0, 0] // Set margins to remove extra space
           marginTop:-5
        },
        title: {
            useHTML: true,
            text: `${data.overallActiveUser} %`,
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
            text: '<div style="text-align:center; z-index:-2;">Overall User Active </div>',
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
                name: 'Overall User Active ',
                data: [
                    ['', data.overallActiveUser],
                    // ['', 100],
                ]
            }
        ]
    });

    // Map User

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
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: false,
                        format: '{point.value}' // Customize the format as needed
                    }
                }
            },
            series: [{
                data: data.stateUserDetails,
                name: '',
                allowPointSelect: true,
                cursor: 'pointer',
                color: '#fff',
                states: {
                    select: {
                        color: '#fcad95'
                    }
                }
            }],
            exporting: {
                enabled: true,
                buttons: {
                    contextButton: {
                        menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                    }
                }
            },
            credits:{
                enabled:false
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
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
        
            data: [1, 18, 23, 15, 5, 25, 29, 28, 21, 10, 15, 17]
        }],
        
    
    });

    // **********************************************admin-dashboard-calls-qtr    
    const seriesData = programUserDetailsArray.map(detail => {
        return {
            name: detail.program_name,
            y: detail.user_count
        };
    });
    Highcharts.chart(
        "admin-dashboard-calls-qtr",
        {
            chart: {
                type: "pie",
                height: window.innerWidth < 1300 ? 300 : 350,
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
                // layout: "vertical",
                align: "center",
                verticalAlign: "bottom",
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
                enabled: true,
            },
            plotOptions: {
                pie: {
                    startAngle: 0,
                    endAngle: 360,
                    // colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb", "#f5ad45"],
                    dataLabels: {
                        enabled: true,
                    },
                    showInLegend: true,
                    center: ["50%", "50%"],
                    size: "90%",
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
                    name: "User",
                    innerSize: "0%",
                    data: seriesData,
                },
            ],
        }
    );

    // Months-pie
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
            name: 'User',
            data: data.adminMonthPie.month_data
        }]
    });

    // Months-bar
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
            name: 'User',
            borderRadius: 5,
            colorByPoint: true,
            data: data.adminMonthPie.month_data,
            showInLegend: false
        }]
    });
}
// end Admin dashboard

function show1(){
    $("#admin-dashboard-Months-bar").toggleClass("d-none");
    $("#admin-dashboard-Months-pie").toggleClass("d-none");  

}
function show2(){   
    $("#admin-dashboard-Months-bar").toggleClass("d-none");
    $("#admin-dashboard-Months-pie").toggleClass("d-none");   
}