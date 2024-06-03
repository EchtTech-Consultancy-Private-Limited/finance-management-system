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
            var programDetails = data.programDetails[0];
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails);         
        }
    });
});

$(document).on('change', '.national_user_card', function() {
    let financialYear = $('#national-user-fy').find(":selected").val();
    const programWise = $('#national-program-wise').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/filter-dashboard",
        data: {
            'financial_year': financialYear,
            'program_wise' : programWise
        },
        success: function(data) {     
            $("#national-giaReceivedTotal").text(data.totalArray.giaReceivedTotal);
            $("#national-committedLiabilitiesTotal").text(data.totalArray.committedLiabilitiesTotal);
            $("#national-totalBalanceTotal").text(data.totalArray.totalBalanceTotal);
            $("#national-actualExpenditureTotal").text(data.totalArray.actualExpenditureTotal);
            $("#national-unspentBalance31stTotal").text(data.totalArray.unspentBalance31stTotal);
            var programDetails = data.programDetails[0];
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails);         
        }
    });
});

function nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails)
{
    // Total Expenditure in Cr.
    Highcharts.chart('national-total-expenditure-cr', {
        chart: {
            plotBackgroundColor: null,
            // plotBorderWidth: 0,
            // plotShadow: false,
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
            text: percentageExpenditure + '<br> Expenditure',
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
            }
        },
        series: [{
            type: 'pie',
            name: '',
            innerSize: '60%',
            data: [
                ['', totalExpenditure],
                ['', totalUnspentBalance]
            ]
        }]
    });
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
            text: percentageUnspentBalance + '<br> Unspent',
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
                ['', totalUnspentBalance],
                ['', totalExpenditure],
                
               
            ]
        }]
     });

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
            text: percentageExpenditure + '% <br> Expenditure',
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
                ['', totalExpenditure],
                ['', totalUnspentBalance],
                
               
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
            text: percentageUnspentBalance + '% <br> Unspent',
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
                ['', totalUnspentBalance],
                ['', totalExpenditure],
                
               
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

    // Overall Program Expenditure Amount
    var options = {
        series: programDetails.program_percentages,
        chart: {
           height: 212,
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
                    offsetY: -40,
                    show: false
                 }
              },
              track: {
                 background: ["#f79646", "#00b050"],
                 strokeWidth: '100%'
              }
           }
        },
        colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb", "#f5ad45"],   
        stroke: {
           lineCap: "round",
        },
     
     
        labels: programDetails.program_names,
        legend: {
           show: true,
           position: 'right',
           fontSize: '13px',
           height: '100px',
           gap:'20px', 
           offsetY: 10,
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
     var in_dashboard7 = new ApexCharts(document.querySelector("#overall-Program-expenditure-amount"), options);
     in_dashboard7.render();
}
// end national dashboard