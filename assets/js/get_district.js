$('#state_name').change(function(){
    alert();
    var sid = $(this).val();
    if(sid){
        $.ajax({
        type:"get",
        url:"{{url('/admin.get_district')}}/"+sid,
            success:function(res)
            {       
                if(res)
                {
                    $("#district").empty();
                    $("#district").append('<option>Select district</option>');
                    $.each(res,function(key,value){
                        $("#district").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            }
        });
    }
 }); 