// const BASE_URL = $("meta[name='baseURL']").attr('content');
// national filter dashboard
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/filter-dashboard",
        data: {
            'financial_year': new Date().getFullYear()+ ' - ' + (new Date().getFullYear()+1)
        },
        success: function(data) {
            var balanceProgramLineChart = data.balanceProgramLineChart.programs;
            var programDetails = data.programDetails[0];
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails,balanceProgramLineChart);                 
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
            var balanceProgramLineChart = data.balanceProgramLineChart.programs;
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc(((totalExpenditure + totalUnspentBalance) / totalExpenditure) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails,balanceProgramLineChart);         
        }
    });
});

function nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails,balanceProgramLineChart)
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
            text: ` <div class="graph-title" style="color:#00b050; ">
            ${percentageExpenditure}
        </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 30,
            style: {
                fontSize: '16px',
                color: '#000000'
            }   
        },
        subtitle: {
            text: `
                <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">
                    
                    <span>Expenditure</span>
                </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        tooltip:{
            enabled: true
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
    Highcharts.chart('national-total-unspent-cr', {
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
            text: ` <div class="graph-title" style="color:#00b050; ">
            ${percentageUnspentBalance}
        </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 30,
            style: {
                fontSize: '16px',
                color: '#000000'
            }   
        },
        subtitle: {
            text: `
                <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">
                    
                    <span>Unspent</span>
                </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 60,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        tooltip:{
            enabled: true
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
    // Total Fund unspent in Cr.
   

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
            text: ` <div class="graph-title" style="color:#00b050; ">
            ${percentageExpenditure}%
            </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 35,
            style: {
                fontSize: '16px',
                color: '#000000'
            }  
        },
      
        subtitle: {
            text: `
            <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">
                
                <span>Expenditure</span>
            </div>`,
        align: 'center',
        verticalAlign: 'middle',
        y: 60,
        style: {
            fontSize: '16px',
            color: '#000000'
        }
        },
        tooltip: {
            enabled: true,
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
            text: ` <div class="graph-title" style="color:#3a7ed3; ">
            ${percentageUnspentBalance}%
            </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 35,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
      
        subtitle: {
            text: `
            <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px">
                <span>Unspent</span>
            </div>`,
        align: 'center',
        verticalAlign: 'middle',
        y: 60,
        style: {
            fontSize: '16px',
            color: '#000000'
        }
        },
        tooltip: {
            enabled: true,
        },
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
            text: ` <div class="graph-title" style="color:#00b050; "> 10% </div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 30,
            style: {
                fontSize: '16px',
                color: '#000000'
            }   
        },
            subtitle: {
                text: `
                <div class="graph-title" style="color:#00b050; "> <span>Interest Earned</span> </div>`,
                align: 'center',
                verticalAlign: 'middle',
                y: 70,
                style: {
                    fontSize: '16px',
                    color: '#000000'
                }
        },
        tooltip: {
            enabled: true,
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
            text: ` <div class="graph-title" style="color:#3a7ed3; ">90%</div>`,
            align: 'center',
            verticalAlign: 'middle',
            y: 30,
            style: {
                fontSize: '16px',
                color: '#000000'
            }
        },
        subtitle: {
            text: `
            <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px"> <span>Interest DD Returned</span> </div>`,
        align: 'center',
        verticalAlign: 'middle',
        y: 70,
        style: {
            fontSize: '16px',
            color: '#000000'
        }

          
        },
        tooltip: {
            enabled: true,
        },
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
    let seriesData = programDetails.program_names.map((name, index) => ({
        name: name,
        y: programDetails.program_percentages[index]
    }));
    let overallChart = Highcharts.chart(
        "national-dashboard-overall-Program-expenditure-amount",
        {
            chart: {
                type: "pie",
                height: window.innerWidth < 1300 ? 218 : 215,
                events: {
                    load: function() {
                        addTextLabel(this);
                    },
                    redraw: function() {
                        updateTextLabel(this);
                    }
                }
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
                layout: "vertical",
                align: "right",
                verticalAlign: "middle",
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
                        enabled: false,
                    },
                    showInLegend: true,
                    center: ["40%", "50%"],
                    size: "80%",
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
                    name: "Expenditure",
                    innerSize: "80%",
                    data: seriesData,
                },
            ],
        }
    );
    function addTextLabel(chart) {
        var textWidth = 500;
        var textX = chart.plotLeft + chart.plotWidth * 0.4 - textWidth / 2;
        var textY = chart.plotTop + chart.plotHeight * 0.35;
    
        chart.customLabel = chart.renderer
            .label(
                '<div style="width: ' + textWidth + 'px; text-align: center; position:relative;"><span style="font-size:22px; font-weight: 600; margin-bottom:20px;">'+programDetails.allProgramTotalExpenditure+'</span><br><span style="font-size:14px;">All Program <br> Exp</span></div>',
                textX,
                textY,
                null,
                null,
                null,
                true
            )
            .css({
                fontSize: "16px",
            })
            .add();
    }
    
    // Function to update the text label position
    function updateTextLabel(chart) {
        var textWidth = 500;
        var textX = chart.plotLeft + chart.plotWidth * 0.4 - textWidth / 2;
        var textY = chart.plotTop + chart.plotHeight * 0.35;

        if (chart.customLabel) {
            chart.customLabel.attr({
                x: textX,
                y: textY
            });
        }
    }

    // Highcharts chart creation

    // Function to handle zoom detection and update
    function handleZoomDetection() {
        var px_ratio = window.devicePixelRatio || window.screen.availWidth / document.documentElement.clientWidth;

        $(window).resize(function() {
            var newPx_ratio = window.devicePixelRatio || window.screen.availWidth / document.documentElement.clientWidth;
            if (newPx_ratio != px_ratio) {
                px_ratio = newPx_ratio;
                updateTextLabel(overallChart);
                console.log("zooming");
            } else {
                console.log("just resizing");
            }
        });
    }

    // Run the zoom detection function
    handleZoomDetection();

    // Program wise Unspent Balance Line Chart
    Highcharts.chart("integrated-dashboard-unspent-balance-line-chart", {
        chart: {
            type: "line",
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        tooltip: {
            enabled: true,
        },
        xAxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
        },
        yAxis: {
            title: {
                text: "Institute-wise Patient / Sample Received",
            },
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true,
                },

                enableMouseTracking: false,
            },
        },
        series: balanceProgramLineChart,
    });
}
// end national dashboard

// Custom action Js
$(document).ready(function() {
    $(".editmode").dblclick(function() {
        $(this).removeAttr("readonly").focus();
    });

    $(".editmode").change(function() {
        var $this = $(this);
        var updatedValue = $this.val();
        var fieldName = $this.attr('name');
        var confirmation = confirm("Are you sure you want to change the value?");
        
        if (confirmation) {
            $.ajax({
                url: BASE_URL + "national-users/total-card",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: { value: updatedValue, fieldName: fieldName },
                success: function(response) {
                    $this.prop('readonly', true);
                },
                error: function(xhr, status, error) {
                    $this.prop('readonly', true);
                }
            });
        } else {
            $this.val($this.prop('defaultValue')).prop('readonly', true);
        }
    });

    // List change on form type select
    $(document).on('change', '#form_type', function() {
        var value = $(this).val();
        if (value === '1') {
            $(".form_type_uc_list").hide();
            $("#form_type_export_button").show();
        } else if (value === '2') {
            $(".form_type_uc_list").show();
            $("#form_type_export_button").hide();
        } else {
            $(".form_type_uc_list").show();
            $("#form_type_export_button").show();
        }
    });    
    // End List change on form type select
});

// End Custom action Js


// ***************************apex js file code ***************************
// highchart
let guageHeight = window.innerWidth>1450 && ( window.innerWidth<1600 ) ? 210 : 175;
let gaugeSubtitleY = window.innerWidth>1600 ? -10 : -20
Highcharts.chart("integrated-dashboard-gauge1", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height:  guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center; ">Net Profit Margin - 50%</div>',
        align: "center",
        verticalAlign: "bottom",
        y: gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Net Profit Margin",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-gauge2", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height: guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Gross Profit margin - 55%</div>',
        align: "center",
        verticalAlign: "bottom",
        y:  gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Gross Profit margin",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-gauge3", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height:  guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Burn Rate - 80%</div>',
        align: "center",
        verticalAlign: "bottom",
        y:  gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Burn Rate",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-gauge4", {
    chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        marginTop: window.innerWidth>1450 ? 20 : -20,
        height: guageHeight
    },

    title: {
        text: "",
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Sales Growth - 30%</div>',
        align: "center",
        verticalAlign: "bottom",
        y:  gaugeSubtitleY, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            enabled: false,
        },
        lineWidth: 0,
        plotBands: [
            {
                from: 0,
                to: 120,
                color: "#55BF3B", // green
                thickness: 20,
            },
            {
                from: 120,
                to: 160,
                color: "#DDDF0D", // yellow
                thickness: 20,
            },
            {
                from: 160,
                to: 200,
                color: "#DF5353", // red
                thickness: 20,
            },
        ],
    },

    series: [
        {
            name: "Sales Growth",
            data: [80],
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                //   format: '{y} km/h',
                enabled: false,
                borderWidth: 0,
                color:
                    (Highcharts.defaultOptions.title &&
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color) ||
                    "#333333",
                style: {
                    fontSize: "16px",
                },
            },
            dial: {
                radius: "80%",
                backgroundColor: "gray",
                baseWidth: 12,
                baseLength: "0%",
                rearLength: "0%",
            },
            pivot: {
                backgroundColor: "gray",
                radius: 6,
            },
        },
    ],
});

(async () => {
    const topology = await fetch(
        "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
    ).then((response) => response.json());

    Highcharts.mapChart("integrated-dashboard-india-map", {
        chart: {
            map: topology,
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: "",
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: "bottom",
            },
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: "#fcad95",
            maxColor: "#ab4024",
            labels: {
                format: "{value}",
            },
        },

        series: [
            {
                //   data: data,
                name: "",
                allowPointSelect: false,
                cursor: "pointer",
                color: "#fff",
                states: {
                    select: {
                        color: "#fcad95",
                    },
                },
            },
        ],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: [
                        "printChart",
                        "separator",
                        "downloadPNG",
                        "downloadJPEG",
                        "downloadPDF",
                        "downloadSVG",
                    ],
                },
            },
        },
    });
})();

(async () => {
    const topology = await fetch(
        "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
    ).then((response) => response.json());

    Highcharts.mapChart("integrated-dashboard-india-map2", {
        chart: {
            map: topology,
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: "",
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: "bottom",
            },
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: "#fcad95",
            maxColor: "#ab4024",
            labels: {
                format: "{value}",
            },
        },

        series: [
            {
                //   data: data,
                name: "",
                allowPointSelect: false,
                cursor: "pointer",
                color: "#fff",
                states: {
                    select: {
                        color: "#ab4024",
                    },
                },
            },
        ],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: [
                        "printChart",
                        "separator",
                        "downloadPNG",
                        "downloadJPEG",
                        "downloadPDF",
                        "downloadSVG",
                    ],
                },
            },
        },
    });
})();

(async () => {
    const topology = await fetch(
        "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
    ).then((response) => response.json());

    Highcharts.mapChart("integrated-dashboard-india-map3", {
        chart: {
            map: topology,
        },
        title: {
            text: "",
        },
        credits: {
            enabled: false,
        },
        subtitle: {
            text: "",
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: "bottom",
            },
        },
        colorAxis: {
            min: 0,
            max: 100,
            minColor: "#fcad95",
            maxColor: "#ab4024",
            labels: {
                format: "{value}",
            },
        },

        series: [
            {
                //   data: data,
                name: "",
                allowPointSelect: false,
                cursor: "pointer",
                color: "#fff",
                states: {
                    select: {
                        color: "#fcad95",
                    },
                },
            },
        ],
        exporting: {
            enabled: false,
            buttons: {
                contextButton: {
                    menuItems: [
                        "printChart",
                        "separator",
                        "downloadPNG",
                        "downloadJPEG",
                        "downloadPDF",
                        "downloadSVG",
                    ],
                },
            },
        },
    });
})();

Highcharts.chart("integrated-dashboard-program-wise-expenditure", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    exporting: {
        enabled: false,
    },
    credits: {
        enabled: false,
    },
    yAxis: {
        min: 0,
        title: {
            text: "Values",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        pointFormat: "",
    },
    series: [
        {
            name: "",
            colors: [
                "#399def",
                "#3ebbf0",
                "#35c3e8",
                "#2bc9dc",
                "#20cfe1",
                "#16d4e6",
                "#0dd9db",
                "#03dfd0",
            ],
            colorByPoint: true,
            groupPadding: 0,
            data: [
                ["2024-25", 4500],
                ["2023-24", 4500],
                ["2022-23", 800],
                ["2021-22", 700],
                ["2020-21", 600],
                ["2019-20", 3600],
                ["2018-19", 4100],
                ["2017-18", 3800],
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                //   format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-institute-wise-expenditure", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    exporting: {
        enabled: false,
    },
    credits: {
        enabled: false,
    },
    yAxis: {
        min: 0,
        title: {
            text: "Values",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        pointFormat: "",
    },
    series: [
        {
            name: "",
            colors: [
                "#399def",
                "#3ebbf0",
                "#35c3e8",
                "#2bc9dc",
                "#20cfe1",
                "#16d4e6",
                "#0dd9db",
                "#03dfd0",
            ],
            colorByPoint: true,
            groupPadding: 0,
            data: [
                ["2024-25", 4500],
                ["2023-24", 4500],
                ["2022-23", 800],
                ["2021-22", 700],
                ["2020-21", 600],
                ["2019-20", 3600],
                ["2018-19", 4100],
                ["2017-18", 3800],
            ],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                //   format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

// program wise expenditure state filter highchart
Highcharts.chart("integrated-dashboard-state1", {
    chart: {
        type: "pie",
        height: 150,
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50,
        //  marginBottom: 0,
    },
    title: {
        useHTML: true,
        text: "57%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">UP</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 57],
                ["", 43],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state2", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: 0,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">MP</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 21],
                ["", 79],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state3", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: 0,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">WB</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state4", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">TN</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state5", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "57%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: "57%",
        floating: true,
        verticalAlign: "middle",
        y: 0,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">UK</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 57],
                ["", 43],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state6", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">MH</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 21],
                ["", 79],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state7", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">BR</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state8", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">OR</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state9", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "47%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">HR</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 47],
                ["", 53],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state10", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "21%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">RJ</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 57],
                ["", 43],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-state11", {
    chart: {
        type: "pie",
        height: 150,
        margin: [0, 0, 0, 0],
        spacingTop: 0,
        spacingBottom: 0,
        spacingLeft: 0,
        spacingRight: 0,
        marginTop: -50, // Adjust the height as needed
    },
    title: {
        useHTML: true,
        text: "17%",
        floating: true,
        verticalAlign: "middle",
        y: -10,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">GJ</div>', // Add the name at the bottom here
        align: "center",
        fontSize: "16px",
        verticalAlign: "bottom", // Align the subtitle to the bottom
        y: -10, // Adjust the vertical position as needed
        style: {
            fontSize: "16px",
            color: "#000", // Increase the font size as needed
        },
    },

    legend: {
        enabled: false,
    },

    tooltip: {
        enabled: false,
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            colorByPoint: true,
            type: "pie",
            size: "100%",
            innerSize: "60%",
            dataLabels: {
                enabled: true,
                crop: false,
                distance: "-10%",
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 17],
                ["", 83],
            ],
        },
    ],
});

// Expenditure Bar Chart (All Programs combined data)

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart1", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },

    subtitle: {
        text: "80%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            colors: ["#eb5034", "#434348"],
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 80],
                ["", 20],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart2", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "50%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 50],
                ["", 50],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart3", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "99%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            colors: ["#d7c706", "#434348"],
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 99],
                ["", 1],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-program-wise-expenditure-bar-chart4", {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "250",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    title: {
        text: "",
    },
    subtitle: {
        text: "75%",
        align: "center",
        verticalAlign: "middle",
        y: 60,
        style: {
            fontSize: "16px",
            color: "#000",
        },
    },
    tooltip: {
        enabled: false,
    },
    accessibility: {
        point: {
            valueSuffix: "%",
        },
    },
    plotOptions: {
        pie: {
            colors: ["#eb5034", "#434348"],
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: "bold",
                    color: "white",
                },
            },
            startAngle: -90,
            endAngle: 90,
            center: ["50%", "75%"],
            size: "110%",
        },
    },
    series: [
        {
            type: "pie",
            name: "",
            innerSize: "50%",
            data: [
                ["", 75],
                ["", 25],
            ],
        },
    ],
});

// state graph
Highcharts.chart("integrated-dashboard-state-graph", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            autoRotation: [-70, -90],
            style: {
                fontSize: "13px",
                fontFamily: "Verdana, sans-serif",
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        useHTML: true,
        // labelFormatter: function() {
        //     let symbol = '<span style="color:' + this.color + ';font-size:12px; color:red">&#9644;</span>';
        //     return '<span style="font-size: 12px;">' + symbol +  ' ' + this.name  +  '</span>';
        // }

        allowPointSelect: false,
    },
    tooltip: {
        enabled: false,
    },
    series: [
        {
            name: "Expenditure",
            type: "column",
            color: "#ffc147",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Uttar Pradesh", 4.3],
                ["Maharashtra", 2.5],
                ["Bihar", 3.5],
                ["West Bengal", 4.5],
                ["Madhya Pradesh", 2],
                ["Tamil Nadu", 1.2],
                ["Rajasthan", 2.4],
                ["Karnataka", 3.1],
                ["Gujarat", 3.4],
                ["Andhra Pradesh", 4],
                ["Odisha", 4.4],
                ["Telangana", 2.8],
                ["Kerala", 4],
                ["Jharkhand", 4],
                ["Assam", 2],
                ["Punjab", 3],
                ["Chhattisgarh", 1],
                ["Haryana", 4],
                ["Uttarakhand", 4],
                ["Himachal Pradesh", 4],
                ["Tripura", 4],
                ["Meghalaya", 4],
                ["Manipur", 4],
                ["Nagaland", 4],
                ["Goa", 4],
                ["Arunachal Pradesh", 4],
                ["Mizoram", 4],
                ["Sikkim", 4],
                ["Delhi", 5], // Considering Delhi as a Union Territory
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "12px",
                    fontFamily: "Verdana, sans-serif",
                    textShadow: "none",
                    color: "red",
                },
                textShadow: "none",
            },
        },
    ],
});

// data driven graph

Highcharts.chart("integrated-dashboard-data-driven-graph1", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "11px",
                fontWeight:400,
                fontFamily: "Verdana, sans-serif",
                color:'#000'
            },
        },
    },

    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7, // Adjust this value to fine-tune the vertical position
        symbolRadius: 0,
        style:{
            fontSize: "13px",
        }
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#f49d00",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },

            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph2", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "11px",
                fontWeight:400,
                fontFamily: "Verdana, sans-serif",
                color:'#000'
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#43cdd9",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Office Expenses  & Travel", 4.3],
                ["Lab Strengthening <br>(Non Recurring)", 2.5],
                ["Other Activities", 3.5],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph3", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "11px",
                fontWeight:400,
                fontFamily: "Verdana, sans-serif",
                color:'#000'
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#dd5f00",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph4", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    
    xAxis: {
        type: "category",
        labels: {
            rotation: -70,
            style: {
                fontSize: "11px",
                fontWeight:400,
                fontFamily: "Verdana, sans-serif",
                color:'#000'
            },
        },
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#00b0f0",
            style: {
                fontSize: "12px",
                fontFamily: "Verdana, sans-serif",
            },
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
                
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "12px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-data-driven-graph5", {
    chart: {
        type: "column",
    },
    title: {
        text: "",
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        text: "",
    },
    xAxis: {
        type: "category",
        labels: {
            rotation: -70, // Rotating labels to prevent overlap
            style: {
                fontSize: "11px",
                fontWeight:400,
                fontFamily: "Verdana, sans-serif",
                color:'#000',
                textOverflow: "ellipsis", // Adding ellipsis for overflow text
            },
        },
        // categories: [
        //     'Current Man Power',
        //     'Meetings, Training & Research',
        //     'Lab Strengthening <br> Kits, Regents &<br> Consumable (Recurring)',
        //     'IEC',
        //     'Office Expenses & Travel',
        //     'Lab Strengthening (Non Recurring)',
        //     'Other Activities'
        // ],
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
        },
    },
    legend: {
        enabled: true,
        layout: "horizontal",
        align: "center",
        verticalAlign: "top",
        y: 7,
        symbolRadius: 0,
    },
    tooltip: {
        enabled: true,
    },
    series: [
        {
            name: "Head",
            type: "column",
            color: "#92d050",
            events: {
                legendItemClick: function (e) {
                    e.preventDefault();
                },
            },
            data: [
                ["Current Man Power", 4.3],
                ["Meetings, Training<br> & Research", 2.5],
                [
                    "Lab Strengthening Kits,<br> Regents  & Consumable<br> (Recurring)",
                    3.5,
                ],
                ["IEC", 2],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: "#FFFFFF",
                inside: true,
                verticalAlign: "top",
                format: "{point.y:.1f}", // One decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: "13px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
    ],
});

Highcharts.chart("integrated-dashboard-chart-currently-UC-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "50%",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC Received </div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 50],
                ["", 50],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-chart-currently-UC-not-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "20%",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },

    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">% of UC not Received</div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 20],
                ["", 80],
            ],
        },
    ],
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
});

Highcharts.chart("integrated-dashboard-chart-currently-Nos-UC-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "80 Nos.",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC Received</div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",

            data: [
                ["", 20],
                ["", 80],
            ],
        },
    ],
});

Highcharts.chart("integrated-dashboard-chart-currently-Nos-UC-not-Received", {
    chart: {
        type: "pie",
        height: 210,
        //  margin: [0, 0, 0, 0] // Set margins to remove extra space
    },
    title: {
        useHTML: true,
        text: "20 Nos.",
        floating: true,
        verticalAlign: "middle",
        y: 4,
        style: {
            fontSize: "16px",
        },
    },
    credits: {
        enabled: false,
    },
    exporting: {
        enabled: false,
    },
    subtitle: {
        useHTML: true,
        text: '<div style="text-align:center;">Nos. of UC not Received</div>',
        align: "center",
        verticalAlign: "bottom",
        y: 0, // Adjusted position
        style: {
            fontSize: "13px",
            color: "#000",
        },
    },
    legend: {
        enabled: false,
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        pie: {
            size: "100%",
            innerSize: "70%", // Adjusted for a larger inner circle
            dataLabels: {
                enabled: true,
                // distance: -30, // Adjusted to move labels closer
                style: {
                    fontWeight: "bold",
                    fontSize: "16px",
                },
                connectorWidth: 0,
            },
        },
    },
    colors: ["#b64926", "#eeece1"],
    series: [
        {
            type: "pie",
            data: [
                ["", 20],
                ["", 80],
            ],
        },
    ],
});
