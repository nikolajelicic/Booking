$("#registrationForm").submit(function(e){
    e.preventDefault()
    $("#formMessage").empty()
    var url = $(this).attr("action")
    var type = $(this).attr("method")
     $.ajax({
         url: url,
         type: type,
         data: $(this).serialize(),
         dataType: 'JSON',
         success: function(data){
            if(data.status=="false"){
                $("#formMessage").append("<div class='alert alert-danger'><p><strong>"+data.message+"</strong></p></div>")
            }else{
                $("#formMessage").append("<div class='alert alert-success'><p><strong>"+data.message+"</strong></p></div>")
            }
         }
     })
})