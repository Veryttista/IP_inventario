<form id="editmant" method="post">
  @csrf
  <div class="row">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">PERSON:</label><br>
      <div class="col-md-9 col-sm-9 col-xs-12"style="width: 100%;">
        <select class="select2_single form-control"name='id_mante' tabindex="-1" style="width: 100%;" required>
            <option value="" selected ></option>
            @foreach ($personal as $item2)
            <option  value="{{$item2->id}}" {{ ($item2->id==$mantenimiento->ma_personal)? 'selected':'' }} >{{$item2->pe_nombre}} {{$item2->pe_paterno}} {{$item2->pe_materno}} </option>  
            @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <label >PROBLEMA:</label>
      <textarea class="form-control"name="problema"required placeholder="Ingresar.."rows="3">{{$mantenimiento->problema}}</textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <label >SOLUCION:</label>
      <input type="hidden" name="idman" value='{{$mantenimiento->id}}'>
      <textarea class="form-control"name="solucion"required placeholder="Ingresar.."rows="3">{{$mantenimiento->solucion}}</textarea>
    </div>
  </div><br>
  <button type="submit" id="botonman" class="btn btn-primary" >GUARDAR DATOS</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>  
</form>
<script>
$("#editmant").submit(function(event) {
    event.preventDefault();
    document.getElementById('botonman').disabled=true;
    
    $.ajax({
      url: '/editmant',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="";
      }
    })
  }); 
</script>