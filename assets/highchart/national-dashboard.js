// const BASE_URL = $("meta[name='baseURL']").attr('content');
// national filter dashboard
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-user/filter-dashboard",
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
            height: 200,
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: percentageExpenditure + '% <br>Expenditure ',
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '1.1em'
            }
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
                size: '170%'
            }
        },
        series: [{
            type: 'pie',
            // name: 'Expenditure',
            innerSize: '50%',
            data: [
                ['E', totalExpenditure],
                ['U', totalUnspentBalance]
            ]
        }]
    });
    // Total Fund unspent in Cr.
    Highcharts.chart('national-total-unspent-cr', {
        chart: {
            height: 200,
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: percentageUnspentBalance + '% <br>Unspent ',
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '1.1em'
            }
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
                size: '170%'
            }
        },
        series: [{
            type: 'pie',
            // name: 'Expenditure',
            innerSize: '50%',
            data: [
                ['E', totalUnspentBalance],
                ['U', totalExpenditure]
            ]
        }]
    });

    // expenditure chart
    Highcharts.chart('national-total-expenditure', {
        chart: {
            height: 200,
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: percentageExpenditure + '% <br>Expenditure ',
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '1.1em'
            }
        },
        // tooltip: {
        //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        // },
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
                size: '170%'
            }
        },
        series: [{
            type: 'pie',
            // name: 'Expenditure',
            innerSize: '50%',
            data: [
                ['E', totalExpenditure],
                ['U', totalUnspentBalance]
            ]
        }]
    });

    // unspects balance chart
    Highcharts.chart('national-total-fund-unspent', {
        chart: {
            height: 200,
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: percentageUnspentBalance + '% <br>Unspent ',
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '1.1em'
            }
        },
        // tooltip: {
        //     pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        // },
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
                size: '170%'
            }
        },
        series: [{
            type: 'pie',
            // name: 'Expenditure',
            innerSize: '50%',
            data: [
                ['U', totalUnspentBalance],
                ['E', totalExpenditure]
            ]
        }]
    });
}
// end national dashboard