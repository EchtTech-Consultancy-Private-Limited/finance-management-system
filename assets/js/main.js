$(document).ready(function() {
    $('.datatable').dataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i>',
            }
        ]
    });    
     $("[data-toggle=tooltip]").tooltip();    
});

$(document).ready(function() {
    $('.national_uc_datatable').dataTable({
        pageLength: 5,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i>',
            }
        ]
    });    
     $("[data-toggle=tooltip]").tooltip();    
});

// calculation of SOEU Form
$(document).ready(function() {    
    $('input[type="text"]').on('input', function() {
        calculateFields($(this));
        calculateGrandTotal();
    });
    // Function to calculate individual fields
    function calculateFields(input) {
        var row = input.closest('tr');
        var B = parseFloat(row.find('.manpower-B').val()) || 0;
        var C = evaluateExpression(row.find('.manpower-C').val()) || 0;
        var D = B + C;
        var E = parseFloat(row.find('.manpower-E').val()) || 0;
        var F = D - E;
        var G = parseFloat(row.find('.manpower-G').val()) || 0;
        var H = F - G;
        var J = parseFloat(row.find('.manpower-J').val()) || 0; //Expenditure Till Last Month
        var I = E + J;

        row.find('.manpower-D').val(D);
        row.find('.manpower-F').val(F);
        row.find('.manpower-H').val(H);
        row.find('.manpower-I').val(I); // Total Expenditure Till Date
    }
    // Function to calculate Grand Total
    function calculateGrandTotal() {
        var grandTotal = {
            A: 0,
            B: 0,
            C: 0,
            D: 0,
            E: 0,
            F: 0,
            G: 0,
            H: 0,
            I: 0,
        };
        $('tbody tr').each(function() {
            var row = $(this);

            var A = parseFloat(row.find('#manpower-A').val()) || 0;
            var B = parseFloat(row.find('.manpower-B').val()) || 0;
            var C = evaluateExpression(row.find('.manpower-C').val()) || 0; // Evaluate the expression in C
            var D = B + C;
            var E = parseFloat(row.find('.manpower-E').val()) || 0;
            var F = D - E;
            var G = parseFloat(row.find('.manpower-G').val()) || 0;
            var H = F - G;
            var J = parseFloat(row.find('.manpower-J').val()) || 0; //Expenditure Till Last Month
            var I = parseFloat(row.find('.manpower-I').val()) || 0;

            grandTotal.A += A;
            grandTotal.B += B;
            grandTotal.C += C;
            grandTotal.D += D;
            grandTotal.E += E;
            grandTotal.F += F;
            grandTotal.G += G;
            grandTotal.H += H;
            grandTotal.I += I;
            
        });
        // Update grand total in footer
        $('.grandTotal-A').val(grandTotal.A);
        $('.grandTotal-B').val(grandTotal.B);
        $('.grandTotal-C').val(grandTotal.C);
        $('.grandTotal-D').val(grandTotal.D);
        $('.grandTotal-E').val(grandTotal.E);
        $('.grandTotal-F').val(grandTotal.F);
        $('.grandTotal-G').val(grandTotal.G);
        $('.grandTotal-H').val(grandTotal.H);
        $('.grandTotal-I').val(grandTotal.I);
    }

    // Function to evaluate arithmetic expressions
    function evaluateExpression(expression) {
        try {
            var index = expression.indexOf('=');
            if (index !== -1) {
                var result = expression.substring(0, index);
                var evaluatedResult = eval(result);
                if (isNaN(evaluatedResult)) {
                    throw new Error('Invalid expression');
                }
                return evaluatedResult;
            } else {
                return new Function('return ' + expression)();
            }
        } catch (e) {
            return 0;
        }
    }

    $('.manpower-C').on('blur', function() {
        try {
            var value = $(this).val();
            if (value.includes("=")) {
                value = value.split('=')[0];
            }
            var result = evaluateExpression(value);
            if(result !== undefined && value.includes("+")){
                $(this).val(value + '=' + result);
            }
        } catch (error) {
            console.error(error.message);
        }
    });
    
});


// End- of calculation of SOEU Form

$(".btn-tab-admin").click(function(){
    $(".btn-tab-admin.active").removeClass('active');
    $(this).addClass('active');
})

// get institute program wise for admin 
$(document).ready(function() {
    $('#program_multiselect_id').select2();
    $('#institute_name').select2();
    $('#program_multiselect_id').on('change', function() {
        let program_id = $(this).val().toString();
        // alert(program_id);  // This is for debugging purposes, you can remove it later
        $.ajax({
            type: "GET",
            url: BASE_URL + 'filter-program',
            data: {
                'program_id': program_id
            },
            success: function(data) {
                $("#institute_name").html(data);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', error);
            }
        });
    });
});



// validate integer length and remove validation error after fill the field
function validateInput(input) {
    input.value = input.value.replace(/\D/g, '');
}
// error msg hide
jQuery( document ).ready(function() {
    $('form input[type=text]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
    
    $('form input[type=number]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });

    $('form input[type=date]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });

    $('form input[type=file]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });

    $('form input[type=email]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });

    $('select').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
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

// notification code
$(document).ready(function() {
    function fetchNotifications() {
        $.ajax({
            url: BASE_URL + 'notifications',
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $("#bell_notification_clicker").text(data.totalNew);
                $('.notification-total').text(data.totalNew);
                $('.total-resolved h2').text(data.totalReported);
                $('.status span').eq(0).text(data.confirmed);
                $('.status span').eq(1).text(data.returned);
            }
        });
    }
    setInterval(fetchNotifications, 30000);
    fetchNotifications();
});

// Get current month on SOE Form Unspent text
var monthName = $('#soe_form_month').val();
var lastDate = getLastDateOfMonth(monthName)+'st '+monthName;
$(".current_month_selected_text").text(lastDate);
$(document).on('change', '#soe_form_month', function() {
    var monthName = $(this).val();
    var lastDate = getLastDateOfMonth(monthName)+'st '+monthName;
    $(".current_month_selected_text").text(lastDate);
});
function getLastDateOfMonth(monthName) {
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var monthIndex = monthNames.indexOf(monthName);
    if (monthIndex === -1) {
        return "Invalid month name";
    }
    var year = new Date().getFullYear();
    var date = new Date(year, monthIndex + 1, 0);
    return date.getDate();
}
// End Get current month on SOE Form Unspent text

// Print View
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
}