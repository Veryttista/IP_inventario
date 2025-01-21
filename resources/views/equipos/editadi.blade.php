<form id="editeq" method="post">
    @csrf
    <div class="row">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">DUEÑO:</label><br>
        <div class="col-md-9 col-sm-9 col-xs-12"style="width: 100%;">
          <select name="duenodi" class="select2_single form-control" tabindex="-1" style="width: 100%;">
            
            @foreach ($dueno as $item3)
            <option value="{{$item3->id}}" <?php echo(($lista[0]->di_personal_id ==$item3->id)? 'selected' : '') ?>>{{$item3->pe_nombre}} {{$item3->pe_paterno}} {{$item3->pe_materno}}</option>  
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >NOMBRE:</label>
        <input type="text" value="<?php echo ($lista[0]->di_nombre); ?>" name="nombredi" class="form-control" required placeholder="Ingresar..">
      </div>
      <div class="col-md-12">
        <label >IP:</label>
        <input type="text" value="<?php echo ($lista[0]->di_ip); ?>" name="ipdi" class="form-control" required placeholder="Ingresar..">
      </div>
      <div class="col-md-12">
        <label >CARACTERISTICAS:</label>
        <textarea name="caracteristicasdi"  class="form-control" cols="30" rows="10"placeholder="Ingresar.."><?php echo ($lista[0]->di_caracteristicas); ?></textarea>
      </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="ideq" value="<?php echo ($lista[0]->id); ?>">
      <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
    </div>
  </form>
  <script>
    $("#editeq").submit(function(event) {
      event.preventDefault();
    
      document.getElementById('boton').disabled=true;
      
      $.ajax({
        url: '/editeq',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
          window.location="";
        }
      })
    });     
  </script>