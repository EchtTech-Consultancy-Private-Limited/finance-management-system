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
            var totalcommittedLiabilities = data.totalArray.committedLiabilitiesTotal;
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var UcUploadDetails = data.UcUploadDetails;
            var UcFormstateDetails = data.UcFormstateDetails;            
            var programWiseExpenditure = data.yearlySoeDetails;
            var instituteColumnDetails = data.instituteColumnDetails;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails,balanceProgramLineChart,instituteColumnDetails,totalcommittedLiabilities);                 
            nationalUcFormTotalChart(UcUploadDetails,UcFormstateDetails);
            yearlySoeExpenditure(programWiseExpenditure);
        }
    });
});
// Expenditure Bar Chart (All Programs combined data) on load
$(document).ready(function(){
    const programWiseYearly = $('#national-program-barchart').find(":selected").val();
    const financial_year = $('#national-user-fy-barchart').find(":selected").val();
    const expenditure_unspent = $('#expenditure_unspent').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/expenditure-bar-chart-pie-filter",
        data: {
            'program_wise_yearly' : programWiseYearly,
            'financial_year' :financial_year,
            'expenditure_unspent' : expenditure_unspent
        },
        success: function(data) {
            var programUserDetails = data.programUserDetails;            
            expenditureBarChart(programUserDetails);
            expenditureBarChartHead(programUserDetails);   
        }
    });
});
// collect all data of all form module with map
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/all-form-map-filter",
        success: function(data) {
            var totalData = data.totalArray;
            var mapDetails = data.UcFormstateDetails;
            allFormMapFilter(totalData,mapDetails);         
        }
    });
});

// overAll filter 
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
            var totalcommittedLiabilities = data.totalArray.committedLiabilitiesTotal;
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var instituteColumnDetails = data.instituteColumnDetails;
            var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
            nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails,balanceProgramLineChart,instituteColumnDetails,totalcommittedLiabilities);         
        }
    });
});
// program wise and institute wise filter only
$(document).on('change', '.yearly_soe_expenditure', function() {
    const programWiseYearly = $('#program_wise_yearly').find(":selected").val();
    const instituteWiseYearly = $('#institute_wise').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/yearly-soe-expenditure-filter",
        data: {
            'program_wise_yearly' : programWiseYearly,
            'institute_wise_yearly' :instituteWiseYearly
        },
        success: function(data) {
            var programWiseExpenditure = data.yearlySoeDetails;
            yearlySoeExpenditure(programWiseExpenditure);         
        }
    });
});
// Expenditure Bar Chart (All Programs combined data)
$(document).on('change', '.national_program_barchart', function() {
    const programWiseYearly = $('#national-program-barchart').find(":selected").val();
    const financial_year = $("#national-user-fy-barchart").find(":selected").val();
    const expenditure_unspent = $('#expenditure_unspent').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/expenditure-bar-chart-pie-filter",
        data: {
            'program_wise_yearly' : programWiseYearly,
            'financial_year' :financial_year,
            'expenditure_unspent' : expenditure_unspent
        },
        success: function(data) {
            var programUserDetails = data.programUserDetails;
            expenditureBarChart(programUserDetails);         
        }
    });
});

$(document).on('change', '#national-user-fy-barchart-head', function() {
    const financial_year = $("#national-user-fy-barchart-head").find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/expenditure-bar-chart-pie-filter",
        data: {
            'financial_year' :financial_year,
        },
        success: function(data) {
            var programUserDetails = data.programUserDetails;
            expenditureBarChartHead(programUserDetails);         
        }
    });
});
// End Expenditure Bar Chart (All Programs combined data)
// filter for only SOEUCUpload form data
$(document).on('change', '.national_ucForm_filter', function() {
    var nationalUcformFy = $('#national-ucform-fy').find(":selected").val();
    const nationalProgramUcForm = $('#national-program-ucform').find(":selected").val();
    const nationalInstituteName = $('#national_institute_name').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/filter-uc-form-dashboard",
        data: {
            'nationalUcformFy': nationalUcformFy,
            'nationalProgramUcForm' : nationalProgramUcForm,
            'nationalInstituteName' :nationalInstituteName
        },
        success: function(data) {           
            var UcUploadDetails = data.UcUploadDetails;
            var UcFormstateDetails = data.UcFormstateDetails;           
            nationalUcFormTotalChart(UcUploadDetails,UcFormstateDetails);         
        }
    });
});

// collect all data of all form module with map
$(document).on('change', '.national_all_form_map', function() {
    const program_wise =  $('#program_wise_all_form').find(":selected").val();
    const institute_wise =  $('#institute_wise_all_form').find(":selected").val();
    const month =  $('#month_wise_all_form').find(":selected").val();
    const financial_year =  $('#financial_wise_all_form').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/all-form-map-filter",
        data: {
            'program_wise' : program_wise,
            'institute_wise' :institute_wise,
            'month' : month,
            'financial_year' : financial_year,
        },
        success: function(data) {
            var totalData = data.totalArray;
            var mapDetails = data.UcFormstateDetails;
            allFormMapFilter(totalData,mapDetails);         
        }
    });
});
// End collect all data of all form module with map


// national dashboard chart function
function nationalTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,programDetails,balanceProgramLineChart,instituteColumnDetails,totalcommittedLiabilities)
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
            ${totalExpenditure} L
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
            ${totalUnspentBalance} L
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
            text: ` <div class="graph-title" style="color:#00b050; "> ${totalcommittedLiabilities} </div>`,
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
                <div class="graph-title" style="color:#00b050; "> <span>Committed Liabilities</span> </div>`,
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
            formatter: function() {
                if (this.point.name === '') {
                    if (this.point.y === totalcommittedLiabilities) {
                        return `Committed Liabilities: ${this.y}`;
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
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            name: '',
            innerSize: '60%',
            data: [
                ['', totalcommittedLiabilities]
                
               
            ]
        }]
     });

    //  Highcharts.chart('integrated-dashboard-total-interest-dd', {
    //     chart: {
    //         plotBackgroundColor: null,
    //         plotBorderWidth: 0,
    //         plotShadow: false,
    //         height:'200',
    //         // marginTop: ,
    //     },
    //     credits: {
    //        enabled: false
    //     },
    //     exporting: {
    //        enabled: false
    //     },
    //     title: {
    //         text: ` <div class="graph-title" style="color:#3a7ed3; ">90%</div>`,
    //         align: 'center',
    //         verticalAlign: 'middle',
    //         y: 30,
    //         style: {
    //             fontSize: '16px',
    //             color: '#000000'
    //         }
    //     },
    //     subtitle: {
    //         text: `
    //         <div class="graph-title" style="color:#3a7ed3; font-size:16px !important; height:100px"> <span>Interest DD Returned</span> </div>`,
    //     align: 'center',
    //     verticalAlign: 'middle',
    //     y: 70,
    //     style: {
    //         fontSize: '16px',
    //         color: '#000000'
    //     }

          
    //     },
    //     tooltip: {
    //         enabled: true,
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     plotOptions: {
    //         pie: {
    //           colors: ['#558ed5', '#c6d9f1'],
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
    //             size: '110%'
    //         }
    //     },
    //     series: [{
    //         type: 'pie',
    //         name: '',
    //         innerSize: '60%',
    //         data: [
    //             ['', 10],
    //             ['', 90],
                
               
    //         ]
    //     }]
    //  });

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

                enableMouseTracking: true,
            },
        },
        series: balanceProgramLineChart,
    });

    // program wise expenditure column institute wise
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
                autoRotation: [-80, -90],
                style: {
                    fontSize: "11px",
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
            enabled: true,
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
                data: instituteColumnDetails.data,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: "#000",
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
}

function yearlySoeExpenditure(programWiseExpenditure){
    // yearly program wise
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
            enabled: true,
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
                data: programWiseExpenditure.program,
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
    // yearly institute wise
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
            enabled: true,
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
                data: programWiseExpenditure.institute,
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
}

function expenditureBarChart(programUserDetailsArray){
    const colors = ["#f49d00", "#43cdd9", "#dd5f00", "#00b0f0", "#92d050"];
    var percentageExpenditureAll = 0;
    var percentageUnspentBalanceAll = 0;
    programUserDetailsArray.forEach((programUserDetails, index) => {
        var totalExpenditure = programUserDetails.totalArray.actualExpenditureTotal;
        var totalUnspentBalance = programUserDetails.totalArray.unspentBalance31stTotal;
        var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100) : 0;    
        var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? Math.trunc((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100) : 0;
        percentageExpenditureAll += parseInt(percentageExpenditure);
        percentageUnspentBalanceAll += parseInt(percentageUnspentBalance);
        $("#overall_expenditure_chart").text(percentageExpenditureAll + '%');
        $("#overall_unspent_chart").text(percentageUnspentBalanceAll + '%');
        const chartContainerId = `integrated-dashboard-program-wise-expenditure-bar-chart${index+1}`;        
        Highcharts.chart(chartContainerId, {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false,
                height: window.innerWidth > 1600 ? "250" : "200",
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
                text: `${percentageExpenditure}%`,
                align: "center",
                verticalAlign: "middle",
                y: 60,
                style: {
                    fontSize: "16px",
                    color: "#000",
                },
            },
            tooltip: {
                enabled: true,
                formatter: function() {
                    if (this.point.name === '') {
                        if (this.point.y === programUserDetails.totalArray.actualExpenditureTotal) {
                            return `Expenditure: ${this.y}`;
                        } else if (this.point.y === programUserDetails.totalArray.unspentBalance31stTotal) {
                            return `Unspent Balance: ${this.y}`;
                        }
                    }
                    return `${this.point.name}: ${this.y}`;
                },
            },
            accessibility: {
                point: {
                    valueSuffix: "%",
                },
            },
            plotOptions: {
                pie: {
                    colors: ["#f49e04", "#00b050"],
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
                        ["", programUserDetails.totalArray.actualExpenditureTotal],
                        ["", programUserDetails.totalArray.unspentBalance31stTotal],
                    ],
                },
            ],
        });
    });
}
function expenditureBarChartHead(programUserDetailsArray){
    const colors = ["#f49d00", "#43cdd9", "#dd5f00", "#00b0f0", "#92d050"];
    var percentageExpenditureAll = 0;
    var percentageUnspentBalanceAll = 0;
    programUserDetailsArray.forEach((programUserDetails, index) => {
        var totalExpenditure = programUserDetails.totalArray.actualExpenditureTotal;
        var totalUnspentBalance = programUserDetails.totalArray.unspentBalance31stTotal;
        var percentageExpenditure =  (totalExpenditure !== 0) ? Math.trunc((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100) : 0;    
        // data driven graph
        $(`#program_percentagedriven_graph${index+1}`).text(parseInt(percentageExpenditure) + '%');
        const chartDrivenGraphId = `integrated-dashboard-data-driven-graph${index+1}`;        
        Highcharts.chart(chartDrivenGraphId, {
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
                    name: programUserDetails.program_name,
                    type: "column",
                    color: colors[index % colors.length],
                    events: {
                        legendItemClick: function (e) {
                            e.preventDefault();
                        },
                    },

                    data: programUserDetails.totalHeads,
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
    });
}
// end national dashboard

function nationalUcFormTotalChart(UcUploadDetails,UcFormstateDetails){
    // UC Received and not received graph
    Highcharts.chart("integrated-dashboard-chart-currently-UC-Received", {
        chart: {
            type: "pie",
            height: 210,
        },        
        title: {
            useHTML: true,
            text: `${UcUploadDetails.UcApprovedPercentage.toFixed(1)}%`,
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
            enabled: true,
            formatter: function() {
                return `${this.point.name}: ${this.y}%`;
            }
        },
        plotOptions: {
            pie: {
                size: "100%",
                innerSize: "70%", // Adjusted for a larger inner circle
                dataLabels: {
                    enabled: false,
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
                    ["Approved", parseFloat(UcUploadDetails.UcApprovedPercentage.toFixed(1))],
                    ["Returned", parseFloat(UcUploadDetails.UcNotApprovedPercentage.toFixed(1))],
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
            text: `${UcUploadDetails.UcNotApprovedPercentage.toFixed(1)}%`,
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
            enabled: true,
            formatter: function() {
                return `${this.point.name}: ${this.y}%`;
            }
        },
        plotOptions: {
            pie: {
                size: "100%",
                innerSize: "70%", // Adjusted for a larger inner circle
                dataLabels: {
                    enabled: false,
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
                        ["Returned", parseFloat(UcUploadDetails.UcNotApprovedPercentage.toFixed(1))],
                        ["Approved", parseFloat(UcUploadDetails.UcApprovedPercentage.toFixed(1))],                        
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
            text: `${UcUploadDetails.UcApprovedNumber} Nos`,
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
            enabled: true,
            formatter: function() {
                return `${this.point.name}: ${this.y}`;
            }
        },
        plotOptions: {
            pie: {
                size: "100%",
                innerSize: "70%", // Adjusted for a larger inner circle
                dataLabels: {
                    enabled: false,
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
                    ["Approved", UcUploadDetails.UcApprovedNumber],
                    ["Returned", UcUploadDetails.UcNotApprovedNumber],
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
            text: `${UcUploadDetails.UcNotApprovedNumber} Nos`,
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
            enabled: true,
            formatter: function(){
                return `${this.point.name}: ${this.y}`;
            }
        },
        plotOptions: {
            pie: {
                size: "100%",
                innerSize: "70%", // Adjusted for a larger inner circle
                dataLabels: {
                    enabled: false,
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
                    ["Returned", UcUploadDetails.UcNotApprovedNumber],
                    ["Approved", UcUploadDetails.UcApprovedNumber],
                ],
            },
        ],
    });
    // End UC Received and not received graph

    // UCUploadForm map
    (async () => {
        const topology = await fetch(
            'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
        ).then(response => response.json());
    
        Highcharts.mapChart('integrated-dashboard-india-map', {
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
                // max: 100,
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
                data: UcFormstateDetails,
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
    // End UCUploadForm map    
}

// allFormMapFilter
function allFormMapFilter(totalData,mapDetails){
    $("#gia_received_total").text(totalData.giaReceivedTotal);
    $("#total_balance_excluding_total").text(totalData.totalBalanceTotal);
    $("#actual_expenditure_incurred_total").text(totalData.actualExpenditureTotal);
    $("#committed_liabilities_total").text(totalData.committedLiabilitiesTotal);
    $("#unspent_balance_1st_total").text(totalData.unspentBalance1stTotal);
    $("#unspent_balance_d_e_total").text(totalData.unspentBalanceLastTotal);
    $("#unspent_balance_31st_march_total").text(totalData.unspentBalance31stTotal);
    $("#uc_uploads_total").text(totalData.soeucUploadForms);

    // map chart
    (async () => {
        const topology = await fetch(
            "https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json"
        ).then((response) => response.json());
    
        Highcharts.mapChart("integrated-dashboard-india-map3", {
            chart: {
                map: topology,
                height:376
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
                // max: 100,
                minColor: "#fcad95",
                maxColor: "#ab4024",
                labels: {
                    format: "{value}",
                },
            },
            series: [
                {
                    data: mapDetails,
                    name: "",
                    allowPointSelect: false,
                    cursor: "pointer",
                    color: "#fff",
                    states: {
                        select: {
                            color: "#fcad95",
                        },
                    },
                    tooltip: {
                        pointFormatter: function() {
                            return '' +
                                this.name + '<br/>' +
                                'UC Form Count: ' + this.value + '<br/>' +
                                'GIA Received Total: ' + this.gia_received_total + '<br/>' +
                                'Committed Liabilities Total: ' + this.committed_liabilities_total + '<br/>' +
                                'Total Balance Total: ' + this.total_balance_total + '<br/>' +
                                'Actual Expenditure Total: ' + this.actual_expenditure_total + '<br/>' +
                                'Unspent Balance 1st Total: ' + this.unspent_balance_1st_total + '<br/>' +
                                'Unspent Balance Last Total: ' + this.unspent_balance_last_total + '<br/>' +
                                'Unspent Balance 31st Total: ' + this.unspent_balance_31st_total;
                        }
                    }
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
            credits:{
                enabled:false
            }
        });        
    })();
}



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
});

// get institute program wise for national dashboard
$(document).on('change', '.filter_program_id', function() {    
    let program_id = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + 'filter-program',
        data: {
            'program_id': program_id
        },
        success: function(data) {
            $(".national_institute_name").html(data);
        }
    });
});

// Dashboard report filter export and show list
$(document).ready(function() {
    // Initialize DataTable on page load
    var nationalDataTable = $('.national_uc_filter_datatable').DataTable({
        pageLength: 5,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i>',
            }
        ]
    });

    function fetchData() {       
        let program_id = $("#national_program_id").val();
        let financial_year = $("#financial_year").val();
        let form_type = $("#form_type").val() || '2';
        let national_institute_name = $("#national_institute_name").val();
        let month = $("#national_month").val();
        
        $.ajax({
            type: "GET",
            url: BASE_URL + 'national-users/dashboard-report',
            data: {
                'program_id': program_id,
                'financial_year': financial_year,
                'modulename': form_type,
                'national_institute_name': national_institute_name,
                'month': month,
            },
            success: function(data) {                    
                // Clear existing rows and add new data
                nationalDataTable.clear().rows.add($(data)).draw();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', status, error);
            }
        });
    }    

    // Initial data fetch
    fetchData();

    // Handle click event to fetch new data
    $(document).on('click', '#form_type_uc_list', function(event) {
        event.preventDefault();
        fetchData();
    });
});

// End Custom action Js




