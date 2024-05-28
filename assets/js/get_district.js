$(document).on('change', '#state_name', function() {
    let state_id = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + 'filter',
        data: {
            'state_id': state_id
        },
        success: function(data) {
            $("#filter-city").html(data);
        }
    });
});