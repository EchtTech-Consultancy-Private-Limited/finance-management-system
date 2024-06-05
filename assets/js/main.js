// on focus only number
function validateInput(input) {
    input.value = input.value.replace(/\D/g, '');
}
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
    // Attach event listeners for input fields
    $('input[type="text"]').on('input', function() {
        calculateFields($(this));
        calculateGrandTotal();
    });

    // Function to calculate individual fields
    function calculateFields(input) {
        var row = input.closest('tr');
        var B = parseFloat(row.find('.manpower-B').val()) || 0;
        var C = parseFloat(row.find('.manpower-C').val()) || 0;
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

        // Loop through each row to accumulate values
        $('tbody tr').each(function() {
            var row = $(this);

            // Get values from input fields
            var A = parseFloat(row.find('#manpower-A').val()) || 0;
            var B = parseFloat(row.find('.manpower-B').val()) || 0;
            var C = parseFloat(row.find('.manpower-C').val()) || 0;
            var D = B + C;
            var E = parseFloat(row.find('.manpower-E').val()) || 0;
            var F = D - E;
            var G = parseFloat(row.find('.manpower-G').val()) || 0;
            var H = F - G;

            // Update grand total values
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