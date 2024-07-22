const BASE_URL = $("meta[name='baseURL']").attr('content');
// institute filter dashboard
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "institute-users/filter-dashboard",
        data: {
            'financial_year': new Date().getFullYear()+ ' - ' + (new Date().getFullYear()+1)
        },
        success: function(data) {
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100) : 0;    
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
            $("#giaReceivedTotal").text(data.totalArray.giaReceivedTotal);
            $("#committedLiabilitiesTotal").text(data.totalArray.committedLiabilitiesTotal);
            $("#totalBalanceTotal").text(data.totalArray.totalBalanceTotal);
            $("#actualExpenditureTotal").text(data.totalArray.actualExpenditureTotal);
            $("#unspentBalance31stTotal").text(data.totalArray.unspentBalance31stTotal);
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            instituteDashboardChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance);         
        }
    });
});
// **************************************************
// reusable function for highchart 


// **************************************************
function instituteDashboardChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance)
{
    let totalExpenitureMargin = window.innerWidth > 768 && window.innerWidth < 1299 ? -80 : -20;
    // expenditure chart
    Highcharts.chart('chart-currently', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: 250,
            // margin: [0, 0, 0, 0], // Adjusted margins to remove extra space
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            // marginTop: totalExpenitureMargin,
            
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: ` <div class="graph-title" style="color:#00b050; ">
           ${percentageExpenditure} %
        </div>`,
            align: "center",
            verticalAlign: "middle",
            y: 40,
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
            y: 70,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
        tooltip: {
            enabled: true,
            formatter: function() {
                if (this.point.name === '') {
                    if (this.point.y === totalExpenditure) {
                        return `Expenditure: ${this.y}`;
                    } else if (this.point.y === totalUnspentBalance) {
                        return `Unspent Balance: ${this.y}`;
                    }
                }
                return `${this.point.name}: ${this.y}`;
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
                size: '100%',
                shadow: false // Disable shadow to remove extra space
            }
        },
        series: [{
            type: 'pie',
            name: '',
            innerSize: '60%',
            data:  [
                ['', totalExpenditure],
                ['', totalUnspentBalance]
            ]
        }]
    });

    
    // unspects balance chart
    Highcharts.chart('chart-currently-again', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: 250,
            // margin: [0, 0, 0, 0], // Adjusted margins to remove extra space
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            // marginTop: totalExpenitureMargin,
            
        },
        credits: {
           enabled: false
        },
        exporting: {
           enabled: false
        },
        title: {
            text: ` <div class="graph-title" style="color:#3a7ed3; ">
            ${percentageUnspentBalance} %
            </div>`,
            align: "center",
            verticalAlign: "middle",
            y: 40,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
    
        subtitle: {
            text: `
            <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px">
                
                <span>Unspent</span>
            </div>`,
            align: "center",
            verticalAlign: "middle",
            y: 70,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
        tooltip: {
            enabled: true,
            formatter: function() {
                if (this.point.name === '') {
                    if (this.point.y === totalExpenditure) {
                        return `Expenditure: ${this.y}`;
                    } else if (this.point.y === totalUnspentBalance) {
                        return `Unspent Balance: ${this.y}`;
                    }
                }
                return `${this.point.name}: ${this.y}`;
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
                size: '100%',
                shadow: false // Disable shadow to remove extra space
            }
        },
        series: [{
            type: 'pie',
            name: '',
            innerSize: '60%',
            data:  [
                ['', totalUnspentBalance],
                ['', totalExpenditure]
            ]
        }]
    });

    
}
// end institute dashboard
