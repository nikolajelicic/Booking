$("#confirmPasswordForm").submit(function(e){
    e.preventDefault()
    $(".message").empty()
    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status==false){
                $(".message").append("<p class='alert alert-info'>"+data.message+"</p>")
            }else{
                $(".message").append("<p class='alert alert-info'>"+data.message+"</p>")
            }
        }
    })
})