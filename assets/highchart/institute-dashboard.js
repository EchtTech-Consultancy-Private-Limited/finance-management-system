const BASE_URL = $("meta[name='baseURL']").attr('content');
// institute filter dashboard
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "institute-users/filter-dashboard",
        data: {
            'financial_year': new Date().getFullYear()
        },
        success: function(data) {
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            instituteDashboardChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance);         
        }
    });
});

$(document).on('change', '#institute-user-fy', function() {
    let financialYear = $(this).val();
    // alert(financialYear);    
    $.ajax({
        type: "GET",
        url: BASE_URL + "institute-users/filter-dashboard",
        data: {
            'financial_year': financialYear
        },
        success: function(data) {
            console.log(data);       
            $("#giaReceivedTotal").text(data.totalArray.giaReceivedTotal);
            $("#committedLiabilitiesTotal").text(data.totalArray.committedLiabilitiesTotal);
            $("#totalBalanceTotal").text(data.totalArray.totalBalanceTotal);
            $("#actualExpenditureTotal").text(data.totalArray.actualExpenditureTotal);
            $("#unspentBalance31stTotal").text(data.totalArray.unspentBalance31stTotal);
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            instituteDashboardChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance);         
        }
    });
});

function instituteDashboardChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance)
{
    // expenditure chart
    Highcharts.chart('chart-currently', {
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
    Highcharts.chart('chart-currently-again', {
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
// end institute dashboard