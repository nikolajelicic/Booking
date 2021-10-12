$("#reservationForm").submit(function(e){
    $("#reservationMessage").empty()
    e.preventDefault()
    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status==false){
                $("#reservationMessage").append("<p class='alert alert-danger'>"+data.message+"</p>")
            }else{
                $("#reservationMessage").append("<p class='alert alert-success'>"+data.message+"</p>")
            }
        }
    })
})