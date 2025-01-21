<form id="editPersonal" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <label >NOMBRE:</label>
        <input type="text"value='{{$personal[0]->pe_nombre}}' name="nombre1" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PATERNO:</label>
        <input type="text"value='{{$personal[0]->pe_paterno}}' name="paterno1" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >MATERNO:</label>
        <input type="text"value='{{$personal[0]->pe_materno}}' name="materno1" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >CARGO:</label>
        <input type="text"value='{{$personal[0]->pe_cargo}}' name="cargo1" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <input type="hidden" name="unidad_id1" value='{{$personal[0]->unidad_id}}'>
    <input type="hidden" name="id1" value='{{$personal[0]->id}}'>
    <div class="modal-footer">
      <button type="submit" id="boton1" class="btn btn-primary" >GUARDAR DATOS</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
    </div>
  </form>
<script>
  $("#editPersonal").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton1').disabled=true;
    $.ajax({
      url: '/editPersonal',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="";
      }
    })
  });     
</script>

