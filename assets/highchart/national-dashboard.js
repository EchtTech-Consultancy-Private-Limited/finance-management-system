// const BASE_URL = $("meta[name='baseURL']").attr('content');
// national filter dashboard
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/filter-dashboard",
        data: {
            'financial_year': new Date().getFullYear()
        },
        success: function(data) {
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance);         
        }
    });
});

$(document).on('change', '#national-user-fy', function() {
    let financialYear = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-user/filter-dashboard",
        data: {
            'financial_year': financialYear
        },
        success: function(data) {     
            $("#national-giaReceivedTotal").text(data.totalArray.giaReceivedTotal);
            $("#national-committedLiabilitiesTotal").text(data.totalArray.committedLiabilitiesTotal);
            $("#national-totalBalanceTotal").text(data.totalArray.totalBalanceTotal);
            $("#national-actualExpenditureTotal").text(data.totalArray.actualExpenditureTotal);
            $("#national-unspentBalance31stTotal").text(data.totalArray.unspentBalance31stTotal);
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance);         
        }
    });
});

function nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance)
{
    // Total Expenditure in Cr.
    Highcharts.chart('national-total-expenditure-cr', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: 250,
            margin: [0, 0, 0, 0], // Adjusted margins to remove extra space
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0
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
            text: '85% <br> Expenditure',
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
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
                colors: ['#00b050', '#f79646'],
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
            data: [
                ['', 85],
                ['', 15]
            ]
        }]
    });
    
    // Highcharts.chart('national-total-expenditure-cr', {
    //     chart: {
    //         height: 200,
    //         plotBackgroundColor: null,
    //         plotBorderWidth: 0,
    //         plotShadow: false
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     exporting: {
    //      enabled: false
    //   },
      
    //     title: {
    //         text: percentageExpenditure + '% <br>Expenditure ',
    //         align: 'center',
    //         verticalAlign: 'middle',
    //         y: 60,
    //         style: {
    //             fontSize: '1.1em'
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     plotOptions: {
    //         series: {
    //             borderWidth: 0,
    //             colorByPoint: true,
    //             type: 'pie',
    //             size: '100%',
    //             innerSize: '60%',
    //             dataLabels: {
    //                 enabled: true,
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
    //     colors: ['#b64926', '#F8C4B4',],
    //     data: [
      
    //         ['', 17],
    //         ['', 83],
            
    //     ],
    //     series: [{
    //         type: 'pie',
    //         // name: 'Expenditure',
    //         innerSize: '60%',
    //         // data: [
    //         //     ['E', totalExpenditure],
    //         //     ['U', totalUnspentBalance]
    //         // ]
    //     }]
    // });
    // Total Fund unspent in Cr.
    Highcharts.chart('national-total-unspent-cr', {
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
            text: '15% <br> Unspent',
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        // tooltip: {
        //     pointFormat: 'name: <b>highchart</b>'
        // },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
              colors: ['#558ed5', '#c6d9f1'],
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
            innerSize: '60%',
            data: [
                ['', 15],
                ['', 85],
                
               
            ]
        }]
     });

    // Highcharts.chart('national-total-unspent-cr', {
    //     chart: {
    //         height: 200,
    //         plotBackgroundColor: null,
    //         plotBorderWidth: 0,
    //         plotShadow: false
    //     },
    //     title: {
    //         text: percentageUnspentBalance + '% <br>Unspent ',
    //         align: 'center',
    //         verticalAlign: 'middle',
    //         y: 60,
    //         style: {
    //             fontSize: '1.1em'
    //         }
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     exporting: {
    //      enabled: false
    //   },
      
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     plotOptions: {
    //         pie: {
    //             dataLabels: {
    //                 enabled: true,
    //                 distance: -50,
    //                 style: {
    //                     fontWeight: 'bold',
    //                     color: 'white'
    //                 }
    //             },
    //             startAngle: -90,
    //             endAngle: 90,
    //             center: ['50%', '75%'],
    //             size: '170%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         // name: 'Expenditure',
    //         innerSize: '50%',
    //         data: [
    //             ['E', totalUnspentBalance],
    //             ['U', totalExpenditure]
    //         ]
    //     }]
    // });

    // expenditure chart
    Highcharts.chart('national-total-expenditure', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height:'200',
            // marginTop: -40,
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: null,
        },
      
        subtitle: {
            text: '15% <br> Unspent',
            align: 'center',
            verticalAlign: 'middle',
            y: 50,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        // tooltip: {
        //     pointFormat: 'name: <b>highchart</b>'
        // },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
              colors: ['#00b050', '#f79646'],
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
            innerSize: '60%',
            data: [
                ['', 85],
                ['', 15],
                
               
            ]
        }]
    });
    Highcharts.chart('national-total-fund-unspent', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height:'200',
            // marginTop: -40,
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: null,
        },
      
        subtitle: {
            text: '15% <br> Unspent',
            align: 'center',
            verticalAlign: 'middle',
            y: 50,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        // tooltip: {
        //     pointFormat: 'name: <b>highchart</b>'
        // },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
              colors: ['#558ed5', '#c6d9f1'],
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
            innerSize: '60%',
            data: [
                ['', 15],
                ['', 85],
                
               
            ]
        }]
     })     ;
    Highcharts.chart('integrated-dashboard-chart-currently-Interest-Earned', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height:'200',
            // marginTop: -40,
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: null,
        },
      
        subtitle: {
            text: '10% <br> Interest Earned',
            align: 'center',
            verticalAlign: 'middle',
            y: 50,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        // tooltip: {
        //     pointFormat: 'name: <b>highchart</b>'
        // },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
              colors: ['#00b050', '#f79646'],
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
            innerSize: '60%',
            data: [
                ['', 10],
                ['', 90],
                
               
            ]
        }]
     });

     Highcharts.chart('integrated-dashboard-total-interest-dd', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height:'200',
            // marginTop: ,
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: null,
        },
      
        subtitle: {
            text: '90% <br> Interest DD Returned',
            align: 'center',
            verticalAlign: 'middle',
            y: 50,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        // tooltip: {
        //     pointFormat: 'name: <b>highchart</b>'
        // },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
              colors: ['#558ed5', '#c6d9f1'],
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
            innerSize: '60%',
            data: [
                ['', 10],
                ['', 90],
                
               
            ]
        }]
     });

    // Highcharts.chart('national-total-expenditure', {
    //     chart: {
    //         height: 180,
    //         plotBackgroundColor: null,
    //         plotBorderWidth: 0,
    //         plotShadow: false
    //     },
    //     title: {
    //         text: percentageExpenditure + '% <br>Expenditure ',
    //         align: 'center',
    //         verticalAlign: 'middle',
    //         y: 60,
    //         style: {
    //             fontSize: '1.1em'
    //         }
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     exporting: {
    //      enabled: false
    //   },
      
    //     // tooltip: {
    //     //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    //     // },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     plotOptions: {
    //         pie: {
    //             dataLabels: {
    //                 enabled: true,
    //                 distance: -50,
    //                 style: {
    //                     fontWeight: 'bold',
    //                     color: 'white'
    //                 }
    //             },
    //             startAngle: -90,
    //             endAngle: 90,
    //             center: ['50%', '75%'],
    //             size: '170%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         // name: 'Expenditure',
    //         innerSize: '50%',
    //         data: [
    //             ['E', totalExpenditure],
    //             ['U', totalUnspentBalance]
    //         ]
    //     }]
    // });

    // unspects balance chart
    // Highcharts.chart('national-total-fund-unspent', {
    //     chart: {
    //         height: 200,
    //         plotBackgroundColor: null,
    //         plotBorderWidth: 0,
    //         plotShadow: false
    //     },
    //     title: {
    //         text: percentageUnspentBalance + '% <br>Unspent ',
    //         align: 'center',
    //         verticalAlign: 'middle',
    //         y: 60,
    //         style: {
    //             fontSize: '1.1em'
    //         }
    //     },
    //     // tooltip: {
    //     //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    //     // },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     plotOptions: {
    //         pie: {
    //             dataLabels: {
    //                 enabled: true,
    //                 distance: -50,
    //                 style: {
    //                     fontWeight: 'bold',
    //                     color: 'white'
    //                 }
    //             },
    //             startAngle: -90,
    //             endAngle: 90,
    //             center: ['50%', '75%'],
    //             size: '170%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         // name: 'Expenditure',
    //         innerSize: '50%',
    //         data: [
    //             ['U', totalUnspentBalance],
    //             ['E', totalExpenditure]
    //         ]
    //     }]
    // });
}
// end national dashboard