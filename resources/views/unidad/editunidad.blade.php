<form id="editarUnidad" method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <label >NOMBRE:</label>
      <input type="text" value='{{$unidad->un_nombre}}' name="nombre_unidad1" class="form-control" required placeholder="Ingresar..">
      <input type="hidden" name="id" value='{{$unidad->id}}'>
    </div>
    <div class="form-group">
      <label >UNIDAD:</label><br>
      <div >
      <select name='ambiente1' class="form-control" @required(true) >
      @foreach ($ambiente as $item2)
        <option value='{{$item2->id}}' <?php echo(($item2->id == $unidad->piso_id)? 'selected' : '')?>>{{$item2->am_nombre}}</option>
      @endforeach 
      </select>
    </div>
  </div>
  </div>
  
  <div class="modal-footer">
    <button type="submit" id="boton2" class="btn btn-primary" >GUARDAR DATOS</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
  </div>
</form>
<script>
  $("#editarUnidad").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton2').disabled=true;
    $.ajax({
      url: '/editarUnidad',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="";
      }
    })
  }); 
</script>