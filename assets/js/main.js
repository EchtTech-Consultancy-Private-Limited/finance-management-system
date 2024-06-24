$(document).ready(function() {
    $('.datatable').dataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i>',
                // title: 'Custom Table Title',
                // messageTop: 'This is a custom message at the top of the print view',
                // messageBottom: 'This is a custom message at the bottom of the print view',
                // customize: function (win) {
                //     $(win.document.body)
                //         .css('font-size', '10pt')
                //         .prepend(
                //             '<img src="https://example.com/logo.png" style="position:absolute; top:0; left:0;" />'
                //         );
 
                //     $(win.document.body).find('table')
                //         .addClass('compact')
                //         .css('font-size', 'inherit');
                // }
            }
        ]
    });    
     $("[data-toggle=tooltip]").tooltip();    
} );

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

        row.find('.manpower-D').val(D);
        row.find('.manpower-F').val(F);
        row.find('.manpower-H').val(H);
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
            H: 0
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

            grandTotal.A += A;
            grandTotal.B += B;
            grandTotal.C += C;
            grandTotal.D += D;
            grandTotal.E += E;
            grandTotal.F += F;
            grandTotal.G += G;
            grandTotal.H += H;
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
            var result = evaluateExpression($(this).val());
            if(result !== undefined){
                $(this).val($(this).val() + '=' + result);
            }
        } catch (error) {
            console.error(error.message);
        }
    });
});


// End- of calculation of SOEU Form

// datatable
$(document).ready(function() {
    $('#datatable').dataTable();
} );

$(".btn-tab-admin").click(function(){
    $(".btn-tab-admin.active").removeClass('active');
    $(this).addClass('active');
})

// get institute program wise

$(document).on('change', '#program_id', function() {    
    let program_id = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + 'filter-program',
        data: {
            'program_id': program_id
        },
        success: function(data) {
            $("#institute_name").html(data);
        }
    });
});

// on focus only number arthmetic operator allow
function validateArthmeticInput(input) {
    input.value = input.value.replace(/[^0-9+\-*/]/g, '');
}

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