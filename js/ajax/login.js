$("#loginForm").submit(function(e){
    e.preventDefault()
    $("#message").empty()
    var url = $(this).attr("action")
    var type = $(this).attr("method")
     $.ajax({
         url: url,
         type: type,
         data: $(this).serialize(),
         dataType: 'JSON',
         success: function(data){
            if(data.status=="false"){
                $("#message").append("<div class='alert alert-danger'><p><strong>"+data.message+"</strong></p></div>")
            }else{
                window.location.href ="http://localhost/booking/"+data.message
            }
         }
     })
})