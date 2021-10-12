<!-- Modal -->
<div class="modal fade" id="registration" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registracija korisnika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <div id="formMessage" class="text-center">
      
      </div>
        <form id="registrationForm" action="register" method="POST">
            <input type="text" class="form-control text-center mt-3" name="name" placeholder="Ime">
            <input type="text" class="form-control text-center mt-3" name="surname" placeholder="Prezime">
            <input type="text" class="form-control text-center mt-3" name="email" placeholder="Email">
            <input type="password" class="form-control text-center mt-3" name="password" placeholder="Lozika">
            <input type="password" class="form-control text-center mt-3" name="replacePassword" placeholder="Ponovi loziknu">
            <button type="success" class="btn btn-success mt-3">Registruj se</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Izadji</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
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
  })
</script>