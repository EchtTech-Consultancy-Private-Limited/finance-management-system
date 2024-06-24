// let th = $("table thead tr th");

// console.log(th);
// th.each((index, e)=>{
//     let value = $(e).text();
//     if (value == 'Status'){
//         let status1 =  $("table tbody tr");
//         console.log(status1)
//         status1.each((function(){
//             let status = $(this);
//            status.each((function(){
//             let statusValue = $(this);
//             console.log(statusValue);
//            }))
//         }))
//         let status =  $("table tbody tr td")[index -1].innerText;
//         let currentTd = $("table tbody tr td")[index -1];
//         // let status = $(td).text().trim();
//     switch (status) {
//         case 'Approved':
//             $(currentTd).addClass('approved');
//             break;
//         case 'Pending':
//             $(currentTd).addClass('pending');
//             break;
//         case 'Not-Approved':
//             $(currentTd).addClass('not-approved');
//             break;
//         default:
//             break;
//     }
//     }
// })

let open_miniSide = $(".line_icon.open_miniSide");
open_miniSide.on('click', ()=>{
    $(".header_iner").toggleClass("long_sidebar");
})

let QA_table_width = $('.QA_table').innerWidth();
let datatableWidth = $('table thead').innerWidth();
let theadWidth = $('.datatable thead').innerWidth();

// Optional: Check if the width measurements are as expected
console.log("QA_table width:", QA_table_width);
console.log("table thead width:", datatableWidth);
console.log("datatable thead width:", theadWidth);

let resTable = $('table');

// Compare widths and apply display property accordingly
if (datatableWidth <= QA_table_width) {
    resTable.css("display", "table");
} else {
    resTable.css("display", "block");
}
// alert("all is well")


let selectBox = $('select');
selectBox.each(function () {
    let valueArr = $(this).find(':selected').text().trim().split(' ');
    if (valueArr.includes('select') || valueArr.includes('Select')) {
        $(this).css('color', 'grey');
    } else {
        $(this).css('color', '#000');
    }
    
});

let selectBoxes = $("select");

selectBoxes.each((index, element) => {
    let select = $(element);
    let selectedText = select.find(':selected').text();
    let selectWords = selectedText.split(' ');

    select.on('change', function () {
        let selectedValue = $(this).find(':selected').text();
        let selectedWords = selectedValue.split(' ');
        if (selectedWords.includes('select') || selectedWords.includes('Select')) {
            $(this).css('color', 'grey');
        } else {
            $(this).css('color', '#000');
        }
    });
});