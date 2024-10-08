let totalExpenitureMarginsss =
    window.innerWidth > 768 && window.innerWidth < 1299 ? -150 : 0;
let expenditureHeightsss = window.innerWidth > 768 && window.innerWidth < 1360 ? 200 : 250;
let expenditurPercentageeHeightsss = window.innerWidth > 768 && window.innerWidth < 1360 ? 250 : 200;

let expenditureTitleYsss =
    // window.innerWidth > 768 && window.innerWidth < 1360 ? 45 : 40;
    window.innerWidth > 768 && window.innerWidth < 1300 ? 10 : (window.innerWidth > 1299  ? 45 : 45);
let expenditureSubtitleYsss =
    // window.innerWidth > 768 && window.innerWidth < 1360 ? 75 : 70;
    window.innerWidth > 768 && window.innerWidth < 1300 ? 40 : (window.innerWidth > 1299  ? 68 : 68);

 // overall filter cards and charts
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/nohppczrsss-filter-dashboard",
        success: function(data) {     
            $("#national-nohppcz-sss-giaReceivedTotal").text(data.totalArray.giaReceivedTotal);
            $("#national-nohppcz-sss-committedLiabilitiesTotal").text(data.totalArray.committedLiabilitiesTotal);
            $("#national-nohppcz-sss-totalBalanceTotal").text(data.totalArray.totalBalanceTotal);
            $("#national-nohppcz-sss-actualExpenditureTotal").text(data.totalArray.actualExpenditureTotal);
            $("#national-nohppcz-sss-unspentBalance31stTotal").text(data.totalArray.unspentBalance31stTotal);
            var programHeadDetails = data.programHeadDetails;
            var totalcommittedLiabilities = data.totalArray.committedLiabilitiesTotal;
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? ((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100).toFixed(2) : 0;    
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? ((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100).toFixed(2) : 0;
            // ucupload form
            var UcUploadDetails = data.UcUploadDetails;
            nationalNohppczsssTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,totalcommittedLiabilities,programHeadDetails);         
            nationalNohppczsssUcFormTotalChart(UcUploadDetails);
        }
    });
});
// Yearly SOE Expenditure under NOHPPCZ RC’s
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/nohppczrsss-soe-expenditure-filter",
        success: function(data) {
            var programWiseExpenditure = data.yearlySoeDetails;
            nohppczsssSoeExpenditure(programWiseExpenditure);         
        }
    });
});
 $(document).on('change', '.nohppcz_sss_card', function() {
    let financialYear = $('#nohppcz-sss-year').find(":selected").val();
    const month = $('#nohppcz-sss-month').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/nohppczrsss-filter-dashboard",
        data: {
            'financial_year': financialYear,
            'month' : month
        },
        success: function(data) {
            $("#national-nohppcz-sss-unspentBalance1stTotal").text(data.totalArray.unspentBalance1stTotal);     
            $("#national-nohppcz-sss-giaReceivedTotal").text(data.totalArray.giaReceivedTotal);
            $("#national-nohppcz-sss-committedLiabilitiesTotal").text(data.totalArray.committedLiabilitiesTotal);
            $("#national-nohppcz-sss-totalBalanceTotal").text(data.totalArray.totalBalanceTotal);
            $("#national-nohppcz-sss-actualExpenditureTotal").text(data.totalArray.actualExpenditureTotal);
            $("#national-nohppcz-sss-unspentBalance31stTotal").text(data.totalArray.unspentBalance31stTotal);
            var programHeadDetails = data.programHeadDetails;
            var totalcommittedLiabilities = data.totalArray.committedLiabilitiesTotal;
            var totalExpenditure = data.totalArray.actualExpenditureTotal;
            var totalUnspentBalance = data.totalArray.unspentBalance31stTotal;
            var percentageExpenditure =  (totalExpenditure !== 0) ? ((totalExpenditure / (totalExpenditure + totalUnspentBalance)) * 100).toFixed(2) : 0;
            var percentageUnspentBalance =  (totalUnspentBalance !== 0) ? ((totalUnspentBalance / (totalExpenditure + totalUnspentBalance)) * 100).toFixed(2) : 0;
            nationalNohppczsssTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,totalcommittedLiabilities,programHeadDetails);         
        }
    });
});
// filter for only SOEUCUpload form data
$(document).on('change', '.nohppczsss_national_ucForm_filter', function() {
    var nohppczrcsnationalUcformFy = $('#nohppcasss-national-ucform-fy').find(":selected").val();
    const nohppczrcsnationalProgramUcForm = $('#nohppczsss-national-institute-ucform').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/nohppczrsss-filter-uc-form-dashboard",
        data: {
            'nohppczrcsssNationalUcformFy': nohppczrcsnationalUcformFy,
            'nohppczrcsssNationalInstituteUcForm' : nohppczrcsnationalProgramUcForm
        },
        success: function(data) {           
            var UcUploadDetails = data.UcUploadDetails;          
            nationalNohppczsssUcFormTotalChart(UcUploadDetails);      
        }
    });
});
// Yearly SOE Expenditure under NOHPPCZ RC’s
$(document).on('change', '.nohppcz_sssyearly_soe_expenditure', function() {
    const programWiseMonth = $('#nohppcz-sss-month-soe-expenditure').find(":selected").val();
    const nohppczsssInstitute = $('#nohppcz-sss-institute-soe-expenditure').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "national-users/nohppczrsss-soe-expenditure-filter",
        data: {
            'program_wise_month' : programWiseMonth,
            'institute_wise_nohppczrcs' :nohppczsssInstitute
        },
        success: function(data) {
            var programWiseExpenditure = data.yearlySoeDetails;
            nohppczsssSoeExpenditure(programWiseExpenditure);         
        }
    });
});
// End overall filter cards and charts

function nationalNohppczsssTotalChart(percentageExpenditure,percentageUnspentBalance,totalExpenditure,totalUnspentBalance,totalcommittedLiabilities,programHeadDetails){
    Highcharts.chart("national-nohppczsss-total-expenditure-lac", {
        chart: {
            plotBackgroundColor: null,
            height: expenditureHeightsss,
            margin: [0, 0, 0, 0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        title: {
            text: ` <div class="graph-title" style="color:#00b050; ">
           ${totalExpenditure}L
        </div>`,
            align: "center",
            verticalAlign: "middle",
            y: window.innerWidth >1350 ? 55 : 40,
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
            y:  window.innerWidth >1350 ? 85 : 65,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
    
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        tooltip:{
            enabled: true
        },
        plotOptions: {
            pie: {
                colors: ["#00b050", "#f79646"],
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: "bold",
                        color: "white",
                    },
                },
                startAngle: -90,
                endAngle: 90,
                center: ["50%", "75%"],
                size: "100%",
            },
        },
        series: [
            {
                type: "pie",
                name: "",
                innerSize: "60%",
                data: [
                    ["Expenditure", totalExpenditure],
                    ["Unspent", totalUnspentBalance],
                ],
            },
        ],
    });
    Highcharts.chart("national-nohppczsss-total-unspent-lac", {
        chart: {
            plotBackgroundColor: null,
            height: expenditureHeightsss,
            margin: [0, 0, 0, 0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
        },
        tooltip:{
            enabled: true
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
    
        title: {
            text: ` <div class="graph-title" style="color:#3a7ed3; ">
            ${totalUnspentBalance}L
            </div>`,
            align: "center",
            verticalAlign: "middle",
            y: window.innerWidth >1350 ? 55 : 40 ,
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
            y: window.innerWidth >1350 ? 85 : 65 ,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
        // tooltip: {
        //     pointFormat: 'name: <b>highchart</b>'
        // },
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                colors: ["#558ed5", "#c6d9f1"],
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: "bold",
                        color: "white",
                    },
                },
                startAngle: -90,
                endAngle: 90,
                center: ["50%", "75%"],
                size: "100%",
            },
        },
        series: [
            {
                type: "pie",
                name: "",
                innerSize: "60%",
                data: [
                    ["Unspent", totalUnspentBalance],
                    ["Expenditure", totalExpenditure],
                ],
            },
        ],
    });
    // Overall Program Expenditure Amount
    let seriesData = programHeadDetails.totalHeads.map(head => ({
        name: head.name,
        y: head.y
    }));

    let overallChart = Highcharts.chart(
        "integrated-dashboard-chart-overall-program-expenditure-amount-sss",
        {
            chart: {
                type: "pie",
                height: window.innerWidth < 1599 ? 180 : 215,
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
                width:window.innerWidth < 1599 ? 150 : 270,
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
        var textY = chart.plotTop + chart.plotHeight * 0.32;    
        chart.customLabel = chart.renderer
            .label(
                '<div  class="expenditure-count" style="width: ' + textWidth + 'px; text-align: center; position:relative;"><span style="font-size:22px; font-weight: 600; margin-bottom:20px;">'+programHeadDetails.total_program_expenditure+'</span><br><span style="font-size:14px;">All Program <br> Exp</span></div>',
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
    function updateTextLabel(chart) {
        var textWidth = 500;
        var textX = chart.plotLeft + chart.plotWidth * 0.4 - textWidth / 2;
        var textY = chart.plotTop + chart.plotHeight * 0.32;

        if (chart.customLabel) {
            chart.customLabel.attr({
                x: textX,
                y: textY
            });
        }
    }
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
    handleZoomDetection();
    // End Overall Program Expenditure Amount

    Highcharts.chart("national_expenditure_percentage_nohppcz_sss", {
        chart: {
            plotBackgroundColor: null,
            height: expenditurPercentageeHeightsss,
            margin: [0, 0, 0, 0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            marginTop: totalExpenitureMarginsss,
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        title: {
            text: ` <div class="graph-title" style="color:#00b050; ">
            ${percentageExpenditure}%
            </div>`,
            align: "center",
            verticalAlign: "middle",
            y: expenditureTitleYsss,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
    
        subtitle: {
            text: `
            <div class="graph-title" style="color:#00b050; font-size:16px !important; height:100px">  <span>Expenditure</span>    </div>`,
            align: "center",
            verticalAlign: "middle",
            y: expenditureSubtitleY,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
        tooltip: {
            enabled: true,
        },
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                colors: ["#00b050", "#f79646"],
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: "bold",
                        color: "white",
                    },
                },
                startAngle: -90,
                endAngle: 90,
                center: ["50%", "75%"],
                size: "100%",
            },
        },
        series: [
            {
                type: "pie",
                name: "",
                innerSize: "60%",
                data: [
                    ["Expenditure", totalExpenditure],
                    ["Unspent", totalUnspentBalance],
                ],
            },
        ],
    });

    Highcharts.chart("national_fund_unspent_percentage_nohppcz_sss", {
        chart: {
            plotBackgroundColor: null,
            height: expenditurPercentageeHeightsss,
            margin: [0, 0, 0, 0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            marginTop: totalExpenitureMarginsss,
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        title: {
            text: ` <div class="graph-title" style="color:#3a7ed3; ">
            ${percentageUnspentBalance}%
            </div>`,
            align: "center",
            verticalAlign: "middle",
            y: expenditureTitleYsss,
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
            y: expenditureSubtitleY,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
        tooltip: {
            enabled: true,
        },
        accessibility: {
            point: {
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                colors: ["#558ed5", "#c6d9f1"],
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: "bold",
                        color: "white",
                    },
                },
                startAngle: -90,
                endAngle: 90,
                center: ["50%", "75%"],
                size: "100%",
            },
        },
        series: [
            {
                type: "pie",
                name: "",
                innerSize: "60%",
                data: [
                    ["Unspent", totalUnspentBalance],
                    ["Expenditure", totalExpenditure],                    
                ],
            },
        ],
    });

    Highcharts.chart("national_interest_earned_cy_percentage_nohppcz_sss", {
        chart: {
            plotBackgroundColor: null,
            plotBackgroundColor: null,
            height: expenditurPercentageeHeightsss,
            margin: [0, 0, 0, 0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0,
            marginTop: totalExpenitureMarginsss,
        },
        credits: {
            enabled: false,
        },
        exporting: {
            enabled: false,
        },
        title: {
            text: ` <div class="graph-title" style="color:#00b050; "> ${totalcommittedLiabilities} </div>`,
            align: "center",
            verticalAlign: "middle",
            y: expenditureTitleYsss,
            style: {
                fontSize: "16px",
                color: "#000000",
            },
        },
        subtitle: {
            text: `<div class="graph-title" style="color:#00b050; white-space: nowrap; "><span>Committed Liabilities</span></div>`,
            align: "center",
            verticalAlign: "middle",
            y: expenditureSubtitleY,
            style: {
                fontSize: "16px",
                color: "#000000",
                "text-align": "center",
                "border-bottom": "2px solid green",
                "width": '100%',
                "display": 'block',
                "left": 0
            },
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
                valueSuffix: "%",
            },
        },
        plotOptions: {
            pie: {
                colors: ["#00b050", "#f79646"],
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: "bold",
                        color: "white",
                    },
                },
                startAngle: -90,
                endAngle: 90,
                center: ["50%", "75%"],
                size: "100%",
            },
        },
        series: [
            {
                type: "pie",
                name: "",
                innerSize: "60%",
                data: [
                    ["", totalcommittedLiabilities],
                ],
            },
        ],
    });
}

function nationalNohppczsssUcFormTotalChart(UcUploadDetails){
    var categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var data = categories.map(function(_, index) {
        var month = index + 1;
        var details = UcUploadDetails[month] || { total: 0, approved: 0, not_approved: 0 };
        return {
            y: details.total,
            total: details.total,
            approved: details.approved,
            not_approved: details.not_approved
        };
    });
    // Create the Highcharts chart
    Highcharts.chart('national-nohppz-sss-nohppczrcs-uc-upload-dashboard-Months-bar', {
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
            column: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        xAxis: {
            categories: categories
        },
        tooltip: {
            formatter: function() {
                var point = this.points[0].point; // Access the first point's data
                return `<b>${this.x}</b><br/>Total: ${point.total}<br/>Approved: ${point.approved}<br/>Not Approved: ${point.not_approved}`;
            },
            shared: true
        },
        series: [{
            type: 'column',
            name: 'User',
            borderRadius: 5,
            colorByPoint: true,
            data: data,
            showInLegend: false
        }]
    });
}

function nohppczsssSoeExpenditure(programWiseExpenditure){
    Highcharts.chart("national_expnediture_nohppcz_sss", {
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
                pointWidth: 50,
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
                data: programWiseExpenditure.month,
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

    Highcharts.chart("national_instiute_wise_yearly_nohppcz_sss", {
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
                pointWidth: 50,
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

// Dashboard report filter export and show list
$(document).ready(function() {
    // Initialize DataTable on page load
    var nationalDataTable = $('.nohppcz_sss_national_uc_filter_datatable').DataTable({
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
            url: BASE_URL + 'national-users/nohppczrsss-dashboard-report',
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
    $(document).on('click', '#nohppcz_sss_form_type_uc_list', function(event) {
        event.preventDefault();
        fetchData();
    });
});