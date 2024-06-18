
 var options = {
    series: [40, 30, 20, 10],
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
                offsetY: 0,
                show: false
             }
          },
          track: {
             background: ["#f79646", "#00b050"],
             strokeWidth: '100%'
          }
       }
    },
    colors: ["#add73d", "#35a8df", "#d962bf", "#91d2fb"],
    stroke: {
       lineCap: "round",
    },
 
 
    labels: ["NOHPPCZ-RCs", "NOHPPCZ-SSS", "NRCP", "PPCL"],
    legend: {
       show: true,
       position: 'bottom',
       fontSize: '12px',
    //    height: '100px',
       align:'center',
       gap:'20px', 
       offsetY: 0,
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