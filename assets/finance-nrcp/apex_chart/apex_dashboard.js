var options = {
    series: [84],
    chart: {
       height: 300,
       type: 'radialBar',
       offsetY: 0
    },
    plotOptions: {
       radialBar: {
          startAngle: -90,
          endAngle: 90,
          hollow: {
             margin: 0,
             size: "70%"
          },
          dataLabels: {
             showOn: "always",
             name: {
                show: true,
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
                show: true
             }
          },
          track: {
             background: ["#f79646", "#00b050"],
             strokeWidth: '100%'
          }
       }
    },
    colors: ["#00b050", "#E5ECFF"],
    stroke: {
       lineCap: "round",
    },
    labels: ["Expenditure"]
 };
 var chart = new ApexCharts(document.querySelector("#chart-currently"), options);
 chart.render();

 
 var options = {
    series: [15],
    chart: {
       height: 300,
       type: 'radialBar',
       offsetY: 0
    },
    plotOptions: {
       radialBar: {
          startAngle: -90,
          endAngle: 90,
          hollow: {
             margin: 0,
             size: "70%"
          },
          dataLabels: {
             showOn: "always",
             name: {
                show: true,
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
                show: true
             }
          },
          track: {
             background: ["#E5ECFF", "#E5ECFF"],
             strokeWidth: '100%'
          }
       }
    },
    colors: ["#558ed5", "#E5ECFF"],
    stroke: {
       lineCap: "round",
    },
    labels: ["Progress"]
 };
 var chart1 = new ApexCharts(document.querySelector("#chart-currently-again"), options);
 chart1.render();

 var options = {
   series: [60,40],
   chart: {
      height: 300,
      type: 'donut',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#00b050", "#f79646"],
   stroke: {
      lineCap: "round",
   },
   legend: {
      show: false,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
      labels: {
         colors: ["#000000", "#E5ECFF"],
      },
      markers: {
         width: 12,
         height: 12,
         radius: 6,
      }
   },
   labels: ["All Head Exp."]
};
 var chart2 = new ApexCharts(document.querySelector("#chart-currently-overall"), options);
 chart2.render();



 options = {
    chart: {
       height: 339,
       type: "line",
       stacked: !1,
       toolbar: {
          show: !1
       }
    },
    stroke: {
       width: [0, 2, 4],
       curve: "smooth"
    },
    plotOptions: {
       bar: {
          columnWidth: "30%"
       }
    },
    colors: ["#9767FD", "#dfe2e6", "#f1b44c"],
    series: [{
       name: "Desktops",
       type: "column",
       data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
    }, {
       name: "Laptops",
       type: "area",
       data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
    }, {
       name: "Tablets",
       type: "line",
       data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
    }, ],
    fill: {
       opacity: [0.85, 0.25, 1],
       gradient: {
          inverseColors: !1,
          shade: "light",
          type: "vertical",
          opacityFrom: 0.85,
          opacityTo: 0.55,
          stops: [0, 100, 100, 100]
       }
    },
    labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003"],
    markers: {
       size: 0
    },
    xaxis: {
       type: "datetime"
    },
    yaxis: {
       title: {
          text: "Points"
       }
    },
    tooltip: {
       shared: !0,
       intersect: !1,
       y: {
          formatter: function (e) {
             return void 0 !== e ? e.toFixed(0) + " points" : e;
          },
       },
    },
    grid: {
       borderColor: "#f1f1f1"
    },
 };


 var options = {
   series: [84],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#00b050", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Expenditure"]
};
var chart3 = new ApexCharts(document.querySelector("#chart-Expenditure"), options);
chart3.render();


var options = {
   series: [15],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#E5ECFF", "#E5ECFF"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#558ed5", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Progress"]
};
var chart4 = new ApexCharts(document.querySelector("#chart-currently-Fund"), options);
chart4.render();

var options = {
   series: [10],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#00b050", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Progress"]
};
var chart5 = new ApexCharts(document.querySelector("#chart-currently-Interest-Earned"), options);
chart5.render();

var options = {
   series: [90],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#E5ECFF", "#E5ECFF"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#558ed5", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Progress"]
};
var chart6 = new ApexCharts(document.querySelector("#chart-currently-Interest-DD"), options);
chart6.render();

options = {
   chart: {
      height: 339,
      type: "bar",
      stacked: !1,
      toolbar: {
         show: !1
      }
   },
   stroke: {
      width: [0, 2, 4],
      curve: "smooth"
   },
   plotOptions: {
      bar: {
         columnWidth: "30%"
      }
   },
   colors: ["#9767FD", "#dfe2e6", "#f1b44c"],
   series: [{
      name: "Desktops",
      type: "column",
      data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
   }, {
      name: "Laptops",
      type: "area",
      data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
   }, {
      name: "Tablets",
      type: "line",
      data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
   }, ],
   fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
         inverseColors: !1,
         shade: "light",
         type: "vertical",
         opacityFrom: 0.85,
         opacityTo: 0.55,
         stops: [0, 100, 100, 100]
      }
   },
   labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003"],
   markers: {
      size: 0
   },
   xaxis: {
      type: "datetime"
   },
   yaxis: {
      title: {
         text: "Values"
      }
   },
   legend: {
      show: false,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
      labels: {
         colors: ["#000000", "#E5ECFF"],
      },
      markers: {
         width: 12,
         height: 12,
         radius: 6,
      }
   },
   tooltip: {
      shared: !0,
      intersect: !1,
      y: {
         formatter: function (e) {
            return void 0 !== e ? e.toFixed(0) + " points" : e;
         },
      },
   },
   grid: {
      borderColor: "#f1f1f1"
   },
};
 (chart = new ApexCharts(document.querySelector("#management_bar"), options)).render();

options = {
   chart: {
      height: 339,
      type: "bar",
      stacked: !1,
      toolbar: {
         show: !1
      }
   },
   stroke: {
      width: [0, 2, 4],
      curve: "smooth"
   },
   plotOptions: {
      bar: {
         columnWidth: "30%"
      }
   },
   colors: ["#9767FD", "#dfe2e6", "#f1b44c"],
   series: [{
      name: "Desktops",
      type: "column",
      data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
   }, {
      name: "Laptops",
      type: "area",
      data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
   }, {
      name: "Tablets",
      type: "line",
      data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
   }, ],
   fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
         inverseColors: !1,
         shade: "light",
         type: "vertical",
         opacityFrom: 0.85,
         opacityTo: 0.55,
         stops: [0, 100, 100, 100]
      }
   },
   labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003"],
   markers: {
      size: 0
   },
   xaxis: {
      type: "datetime"
   },
   yaxis: {
      title: {
         text: "Values"
      }
   },
   legend: {
      show: false,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
      labels: {
         colors: ["#000000", "#E5ECFF"],
      },
      markers: {
         width: 12,
         height: 12,
         radius: 6,
      }
   },
   tooltip: {
      shared: !0,
      intersect: !1,
      y: {
         formatter: function (e) {
            return void 0 !== e ? e.toFixed(0) + " points" : e;
         },
      },
   },
   grid: {
      borderColor: "#f1f1f1"
   },
};
 (chart = new ApexCharts(document.querySelector("#management_Institute_wise"), options)).render();


 var options = {
    series: [{
       name: 'Net Profit',
       data: [30, 25, 45, 30, 55, 55]
    }],
    chart: {
       type: 'area',
       height: 270,
       offsetY: 0,
       toolbar: {
          show: false
       },
       zoom: {
          enabled: false
       },
       sparkline: {
          enabled: true
       }
    },
    plotOptions: {},
    legend: {
       show: false
    },
    dataLabels: {
       enabled: false
    },
    fill: {
       type: 'solid',
       opacity: .2
    },
    stroke: {
       curve: 'smooth',
       show: true,
       width: 3,
       colors: ["#9767FD", "#E5ECFF"],
    },
    xaxis: {
       categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
       axisBorder: {
          show: false,
       },
       axisTicks: {
          show: false
       },
       labels: {
          show: false,
          style: {
             fontSize: '12px',
          }
       },
       crosshairs: {
          show: false,
          position: 'front',
          stroke: {
             color: ["#9767FD", "#E5ECFF"],
             width: 1,
             dashArray: 3
          }
       },
       tooltip: {
          enabled: true,
          formatter: undefined,
          offsetY: 0,
          style: {
             fontSize: '12px',
          }
       }
    },
    yaxis: {
       min: 0,
       max: 60,
       labels: {
          show: false,
          style: {
             fontSize: '12px',
          }
       }
    },
    states: {
       normal: {
          filter: {
             type: 'none',
             value: 0
          }
       },
       hover: {
          filter: {
             type: 'none',
             value: 0
          }
       },
       active: {
          allowMultipleDataPointsSelection: false,
          filter: {
             type: 'none',
             value: 0
          }
       }
    },
    tooltip: {
       style: {
          fontSize: '12px',
       },
       y: {
          formatter: function (val) {
             return "$" + val + " thousands"
          }
       }
    },
    colors: ["#9767FD", "#E5ECFF"],
    markers: {
       colors: ["#9767FD", "#E5ECFF"],
       strokeColor: ["#9767FD", "#E5ECFF"],
       strokeWidth: 3
    }
 };
 var chart = new ApexCharts(document.querySelector("#chart4"), options);
 chart.render();



 var options = {
   series: [50,50],
   chart: {
      height: 300,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["% of UC Received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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

var chart7 = new ApexCharts(document.querySelector("#chart-currently-UC-Received"), options);
chart7.render();

 var options = {
   series: [80,20],
   chart: {
      height: 300,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["% of UC Received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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
var chart8 = new ApexCharts(document.querySelector("#chart-currently-UC-not-Received"), options);
chart8.render();

 var options = {
   series: [20,80],
   chart: {
      height: 300,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Nos. of UC received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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

var chart9 = new ApexCharts(document.querySelector("#chart-currently-Nos-UC-Received"), options);
chart9.render();

 var options = {
   series: [80,20],
   chart: {
      height: 300,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Nos. of UC not received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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
var chart10 = new ApexCharts(document.querySelector("#chart-currently-Nos-UC-not-Received"), options);
chart10.render();


 
var options = {
   series: [84],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#00b050", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Expenditure"]
};
var in_dashboard1 = new ApexCharts(document.querySelector("#integrated_dashboard_expenditure"), options);
in_dashboard1.render();


var options = {
   series: [15],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#E5ECFF", "#E5ECFF"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#558ed5", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Unspent"]
};
var in_dashboard2 = new ApexCharts(document.querySelector("#integrated_dashboard_unspent"), options);
in_dashboard2.render();



var options = {
   series: [85],
   chart: {
      height: 250,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#00b050", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Expenditure"]
};
var in_dashboard3 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-Expenditure"), options);
in_dashboard3.render();


var options = {
   series: [15],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#E5ECFF", "#E5ECFF"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#558ed5", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Unspent"]
};
var in_dashboard4 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-Fund"), options);
in_dashboard4.render();

var options = {
   series: [10],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#00b050", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Intetest Earned"]
};
var in_dashboard5 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-Interest-Earned"), options);
in_dashboard5.render();

var options = {
   series: [90],
   chart: {
      height: 300,
      type: 'radialBar',
      offsetY: 0
   },
   plotOptions: {
      radialBar: {
         startAngle: -90,
         endAngle: 90,
         hollow: {
            margin: 0,
            size: "70%"
         },
         dataLabels: {
            showOn: "always",
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#E5ECFF", "#E5ECFF"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#558ed5", "#E5ECFF"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Interest DD Returned"]
};
var in_dashboard6 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-Interest-DD"), options);
in_dashboard6.render();



var options = {
   series: [40, 40, 5, 5, 10],
   chart: {
      height: 230,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
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


   labels: ["NOHPPCZ-RCs-35", "NOHPPCZ-SSS-65 L", "NRCP-Lab-30 L", "PPCL-28 L", "PM-ABHIM- SSS- 12 L"],
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
var in_dashboard7 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-overall-program-expenditure-amount"), options);
in_dashboard7.render();


// highchart 

Highcharts.chart('integrated-dashboard-gauge1',  {

   chart: {
       type: 'gauge',
       plotBackgroundColor: null,
       plotBackgroundImage: null,
       plotBorderWidth: 0,
       plotShadow: false,
       height: '70%'
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
       max: 200,
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
           to: 120,
           color: '#55BF3B', // green
           thickness: 20
       }, {
           from: 120,
           to: 160,
           color: '#DDDF0D', // yellow
           thickness: 20
       }, {
           from: 160,
           to: 200,
           color: '#DF5353', // red
           thickness: 20
       }]
   },

   series: [{
       name: 'Speed',
       data: [80],
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

Highcharts.chart('integrated-dashboard-gauge2',  {

   chart: {
       type: 'gauge',
       plotBackgroundColor: null,
       plotBackgroundImage: null,
       plotBorderWidth: 0,
       plotShadow: false,
       height: '70%'
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
       max: 200,
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
           to: 120,
           color: '#55BF3B', // green
           thickness: 20
       }, {
           from: 120,
           to: 160,
           color: '#DDDF0D', // yellow
           thickness: 20
       }, {
           from: 160,
           to: 200,
           color: '#DF5353', // red
           thickness: 20
       }]
   },

   series: [{
       name: 'Speed',
       data: [80],
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

Highcharts.chart('integrated-dashboard-gauge3',  {

   chart: {
       type: 'gauge',
       plotBackgroundColor: null,
       plotBackgroundImage: null,
       plotBorderWidth: 0,
       plotShadow: false,
       height: '70%'
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
       max: 200,
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
           to: 120,
           color: '#55BF3B', // green
           thickness: 20
       }, {
           from: 120,
           to: 160,
           color: '#DDDF0D', // yellow
           thickness: 20
       }, {
           from: 160,
           to: 200,
           color: '#DF5353', // red
           thickness: 20
       }]
   },

   series: [{
       name: 'Speed',
       data: [80],
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

Highcharts.chart('integrated-dashboard-gauge4',  {

   chart: {
       type: 'gauge',
       plotBackgroundColor: null,
       plotBackgroundImage: null,
       plotBorderWidth: 0,
       plotShadow: false,
       height: '70%'
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
       max: 200,
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
           to: 120,
           color: '#55BF3B', // green
           thickness: 20
       }, {
           from: 120,
           to: 160,
           color: '#DDDF0D', // yellow
           thickness: 20
       }, {
           from: 160,
           to: 200,
           color: '#DF5353', // red
           thickness: 20
       }]
   },

   series: [{
       name: 'Speed',
       data: [80],
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



var options = {
   series: [50,50],
   chart: {
      height: 240,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["% of UC Received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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

var in_dashboard8 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-UC-Received"), options);
in_dashboard8.render();

 var options = {
   series: [80,20],
   chart: {
      height: 240,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["% of UC Received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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
var in_dashboard9 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-UC-not-Received"), options);
in_dashboard9.render();

 var options = {
   series: [20,80],
   chart: {
      height: 240,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Nos. of UC received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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

var in_dashboard10 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-Nos-UC-Received"), options);
in_dashboard10.render();

 var options = {
   series: [80,20],
   chart: {
      height: 240,
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
            showOn: "always",
            
            name: {
               show: true,
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
               show: true
            }
         },
         track: {
            background: ["#f79646", "#00b050"],
            strokeWidth: '100%'
         }
      }
   },
   colors: ["#b64926", "#f8905c"],
   stroke: {
      lineCap: "round",
   },
   labels: ["Nos. of UC not received", "Blank"],
   legend: {
      show: true,
      position: 'bottom',
      fontSize: '13px',
      offsetY: 8,
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
var in_dashboard11 = new ApexCharts(document.querySelector("#integrated-dashboard-chart-currently-Nos-UC-not-Received"), options);
in_dashboard11.render();


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
          credits: {
            enabled: false
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
          
          series: [{
            //   data: data,
              name: '',
              allowPointSelect: false,
              cursor: 'pointer',
              color: "#fff",
              states: {
                  select: {
                      color: '#fcad95'
                  }
              }
          }],
          exporting: {
              enabled: false,
              buttons: {
                  contextButton: {
                      menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                  }
              }
          }
      });

  })();

  (async () => {
   const topology = await fetch(
       'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
   ).then(response => response.json());



   Highcharts.mapChart('integrated-dashboard-india-map2', {
       chart: {
           map: topology,
       },
       title: {
           text: ''
       },
       credits: {
         enabled: false
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
       
       series: [{
         //   data: data,
           name: '',
           allowPointSelect: false,
           cursor: 'pointer',
           color: "#fff",
           states: {
               select: {
                   color: '#fcad95'
               }
           }
       }],
       exporting: {
           enabled: false,
           buttons: {
               contextButton: {
                   menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
               }
           }
       }
   });

})();
  (async () => {
   const topology = await fetch(
       'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
   ).then(response => response.json());



   Highcharts.mapChart('integrated-dashboard-india-map3', {
       chart: {
           map: topology,
       },
       title: {
           text: ''
       },
       credits: {
         enabled: false
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
       
       series: [{
         //   data: data,
           name: '',
           allowPointSelect: false,
           cursor: 'pointer',
           color: "#fff",
           states: {
               select: {
                   color: '#fcad95'
               }
           }
       }],
       exporting: {
           enabled: false,
           buttons: {
               contextButton: {
                   menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
               }
           }
       }
   });

})();


  Highcharts.chart('integrated-dashboard-program-wise-expenditure', {
   chart: {
       type: 'column'
   },
   title: {
       text: ''
   },
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -45],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   exporting: {
      enabled: false
  },
  credits: {
   enabled: false
},
   yAxis: {
       min: 0,
       title: {
           text: 'Values'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: '',
       colors: [
           '#399def', '#3ebbf0', '#35c3e8', '#2bc9dc', '#20cfe1', '#16d4e6',
           '#0dd9db', '#03dfd0'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
           ['2024-25', 4500],
           ['2022-23', 800],
           ['2021-22', 700],
           ['2020-21', 600],
           ['2019-20', 3600],
           ['2018-19', 4100],
           ['2017-18', 3800],
           
       ],
       dataLabels: {
           enabled: false,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
         //   format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});



Highcharts.chart('integrated-dashboard-institute-wise-expenditure', {
   chart: {
       type: 'column'
   },
   title: {
       text: ''
   },
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -45],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   exporting: {
      enabled: false
  },
  credits: {
   enabled: false
},
   yAxis: {
       min: 0,
       title: {
           text: 'Values'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: '',
       colors: [
           '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
           '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
           '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
           '#03c69b',  '#00f194'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
           ['2024-25', 4500],
           ['2022-23', 800],
           ['2021-22', 700],
           ['2020-21', 600],
           ['2019-20', 3600],
           ['2018-19', 4100],
           ['2017-18', 3800],
           
       ],
       dataLabels: {
           enabled: false,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
         //   format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});


// program wise expenditure state filter highchart
Highcharts.chart('integrated-dashboard-state1', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">UP</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state2', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '21%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '21%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">MP</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 21],
      ['', 79],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state3', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '17%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '17%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">WB</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 17],
      ['', 83],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state4', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state5', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state6', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state7', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state8', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state9', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state10', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});

Highcharts.chart('integrated-dashboard-state11', {
   chart: {
      type: 'pie',
      height: 300 // Adjust the height as needed
  },
   title: {
      useHTML: true,
      text: '57%',
      floating: true,
      verticalAlign: 'middle',
      y: 0,
      style: {
         fontSize:'18px'
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
       text: '57%',
       floating: true,
       verticalAlign: 'middle',
       y: 0
   },
   subtitle: {
      useHTML: true,
      text: '<div style="text-align:center;">Name at the Bottom</div>', // Add the name at the bottom here
      align: 'center',
      fontSize:'20px',
      verticalAlign: 'bottom', // Align the subtitle to the bottom
      y: 0, // Adjust the vertical position as needed
      style: {
         fontSize: '17px',
         color:'#000' // Increase the font size as needed
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
       series: {
           borderWidth: 0,
           colorByPoint: true,
           type: 'pie',
           size: '100%',
           innerSize: '60%',
           dataLabels: {
               enabled: true,
               crop: false,
               distance: '-10%',
               style: {
                   fontWeight: 'bold',
                   fontSize: '16px'
               },
               connectorWidth: 0
           }
       }
   },
   colors: ['#b64926', '#F8C4B4',],
   series: [
       {
           type: 'pie',
           name: 'Temperature',
  data: [
      
      ['', 57],
      ['', 43],
      
  ]
       }
   ]
});




// Expenditure Bar Chart (All Programs combined data)

Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart1', {
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
       text: '80%',
       align: 'center',
       verticalAlign: 'middle',
       y: 60,
       style: {
           fontSize: '1.1em'
       }
   },
   tooltip: {
       pointFormat: 'name: <b>highchart</b>'
   },
   accessibility: {
       point: {
           valueSuffix: '%'
       }
   },
   plotOptions: {
       pie: {
         colors: ['#eb5034', '#434348'],
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
       innerSize: '50%',
       data: [
           ['', 80],
           ['', 20],
           
          
       ]
   }]
});

Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart2', {
   chart: {
      plotBackgroundColor: null,
      plotBorderWidth: 0,
      plotShadow: false,  height:'250'
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
      text: '50%',
      align: 'center',
      verticalAlign: 'middle',
      y: 60,
      style: {
          fontSize: '1.1em'
      }
  },
  tooltip: {
      pointFormat: 'name: <b>highchart</b>'
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
          size: '110%'
      }
  },
  series: [{
      type: 'pie',
      name: '',
      innerSize: '50%',
      data: [
          ['', 50],
          ['', 50],
          
         
      ]
  }]
});

Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart3', {
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
      text: '99%',
      align: 'center',
      verticalAlign: 'middle',
      y: 60,
      style: {
          fontSize: '1.1em'
      }
  },
  tooltip: {
      pointFormat: 'name: <b>highchart</b>'
  },
  accessibility: {
      point: {
          valueSuffix: '%'
      }
  },
  plotOptions: {
      pie: {
        colors: ['#d7c706', '#434348'],
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
      innerSize: '50%',
      data: [
          ['', 99],
          ['', 1],
          
         
      ]
  }]
});

Highcharts.chart('integrated-dashboard-program-wise-expenditure-bar-chart4', {
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
      text: '72%',
      align: 'center',
      verticalAlign: 'middle',
      y: 60,
      style: {
          fontSize: '1.1em'
      }
  },
  tooltip: {
      pointFormat: 'name: <b>highchart</b>'
  },
  accessibility: {
      point: {
          valueSuffix: '%'
      }
  },
  plotOptions: {
      pie: {
        colors: ['#eb5034', '#434348'],
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
      innerSize: '50%',
      data: [
          ['', 72],
          ['', 28],
          
      ]
  }]
});

// Program wise Unspent Balance Line Chart
Highcharts.chart('integrated-dashboard-unspent-balance-line-chart', {
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
           text: 'Temperature (°C)'
       }
   },
   plotOptions: {
       line: {
           dataLabels: {
               enabled: true
           },
           enableMouseTracking: false
       }
   },
   series: [{
       name: 'Reggane',
       data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
           22.0, 17.8]
   }, {
       name: 'Tallinn',
       data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
           2.0, -0.9]
   }]
});


// state graph

Highcharts.chart('integrated-dashboard-state-graph', {
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
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -90],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Population (millions)'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: 'State',
       colors: [
           '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
           '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
           '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
           '#03c69b',  '#00f194'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
         ['Uttar Pradesh', 4.3],
         ['Maharashtra', 2.5],
         ['Bihar', 3.5],
         ['West Bengal', 4.5],
         ['Madhya Pradesh', 2],
         ['Tamil Nadu', 1.2],
         ['Rajasthan', 2.4],
         ['Karnataka', 3.1],
         ['Gujarat', 3.4],
         ['Andhra Pradesh', 4],
         ['Odisha', 4.4],
         ['Telangana', 2.8],
         ['Kerala', 4],
         ['Jharkhand', 4],
         ['Assam', 2],
         ['Punjab', 3],
         ['Chhattisgarh', 1],
         ['Haryana', 4],
         ['Uttarakhand', 4],
         ['Himachal Pradesh', 4],
         ['Tripura', 4],
         ['Meghalaya', 4],
         ['Manipur', 4],
         ['Nagaland', 4],
         ['Goa', 4],
         ['Arunachal Pradesh', 4],
         ['Mizoram', 4],
         ['Sikkim', 4],
         ['Delhi', 5] // Considering Delhi as a Union Territory
       ],
       dataLabels: {
           enabled: true,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
           format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});



// data driven graph


Highcharts.chart('integrated-dashboard-data-driven-graph1', {
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
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -90],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Population (millions)'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: 'State',
       colors: [
          '#f49d00'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
         [' Current Man Power', 4.3],
         ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
         ['Lab Strengthening Kits', 3.5],
         ['IEC', 2],
        
       ],
       dataLabels: {
           enabled: true,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
           format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});

Highcharts.chart('integrated-dashboard-data-driven-graph2', {
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
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -90],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Population (millions)'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: 'State',
       colors: [
           '#43cdd9'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
         [' Current Man Power', 4.3],
         ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
         ['Lab Strengthening Kits', 3.5],
         ['IEC', 2],
        
       ],
       dataLabels: {
           enabled: true,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
           format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});

Highcharts.chart('integrated-dashboard-data-driven-graph3', {
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
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -90],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Population (millions)'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: 'State',
       colors: [
           '#dd5f00'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
         [' Current Man Power', 4.3],
         ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
         ['Lab Strengthening Kits', 3.5],
         ['IEC', 2],
        
       ],
       dataLabels: {
           enabled: true,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
           format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});

Highcharts.chart('integrated-dashboard-data-driven-graph4', {
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
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -90],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Population (millions)'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: 'State',
       colors: [
           '#00b0f0'
       ],
       colorByPoint: true,
       groupPadding: 0,
       data: [
         [' Current Man Power', 4.3],
         ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
         ['Lab Strengthening Kits', 3.5],
         ['IEC', 2],
        
       ],
       dataLabels: {
           enabled: true,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
           format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});

Highcharts.chart('integrated-dashboard-data-driven-graph5', {
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
   subtitle: {
       text: ''
   },
   xAxis: {
       type: 'category',
       labels: {
           autoRotation: [-45, -90],
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Population (millions)'
       }
   },
   legend: {
       enabled: false
   },
   tooltip: {
       pointFormat: ''
   },
   series: [{
       name: 'State',
       colors: [
           '#92d050'
       ],
      
       data: [
         [' Current Man Power', 4.3],
         ['Meetings, Training & Research Regents and consumable (Recuring)', 2.5],
         ['Lab Strengthening Kits', 3.5],
         ['IEC', 2],
        
       ],
       dataLabels: {
           enabled: true,
           rotation: -90,
           color: '#FFFFFF',
           inside: true,
           verticalAlign: 'top',
           format: '{point.y:.1f}', // one decimal
           y: 10, // 10 pixels down from the top
           style: {
               fontSize: '13px',
               fontFamily: 'Verdana, sans-serif'
           }
       }
   }]
});

