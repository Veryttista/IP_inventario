<form id="nuevonAmbiente" method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <label >NOMBRE:</label>
      <input type="text" id="tipo_nombres"value='<?php echo $ambiente->am_nombre ?>' name="nombre_ambiente1" class="form-control" required placeholder="Ingresar..">
    </div>
  </div>
  <div class="modal-footer">
    <input type="hidden" name="id" value='<?php echo $ambiente->id ?>'>
    <button type="submit" id="boton1" class="btn btn-primary" >GUARDAR DATOS</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
  </div>
</form>
<script>
$("#nuevonAmbiente").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton1').disabled=true;
    $.ajax({
      url: '/nuevonAmbiente',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="";
      }
    })
  }); 
</script>