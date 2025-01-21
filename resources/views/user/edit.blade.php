<form id="edituser" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <label >NOMBRE:</label>
        <input type="text" value="{{$usuario[0]->name}}" id="tipo_nombres" name="nombre" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >EMAIL:</label>
        <input type="text"value="{{$usuario[0]->email}}" id="tipo_nombres" name="email" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >CONTRASEÑA:</label>
        <input type="text" id="tipo_nombres" name="clave" class="form-control" required placeholder="Ingresar..">
      </div>
    </div><br>
    <input type="hidden" name="id" value="{{$usuario[0]->id}}">
    <button type="submit" id="boton4" class="btn btn-primary" >GUARDAR DATOS</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>  
</form>
<script>
$("#edituser").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton4').disabled=true; 
    $.ajax({
      url: '/edituser',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="";
      }
    })
  }); 
</script>