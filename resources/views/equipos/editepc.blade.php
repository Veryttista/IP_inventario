<form id="edtcompus" method="post">
    @csrf
    <div class="row">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">DUEÑO:</label><br>
        <div class="col-md-9 col-sm-9 col-xs-12"style="width: 100%;">
          <select class="select2_single form-control"name='duenopcs' tabindex="-1" style="width: 100%;" required>
            @foreach ($dueno as $item3)
            <option value="{{$item3->id}}" <?php echo(($lista[0]->personal_id ==$item3->id)? 'selected' : '') ?>>{{$item3->pe_nombre}} {{$item3->pe_paterno}} {{$item3->pe_materno}}</option>  
            @endforeach
          </select>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <label >NOMBRE:</label>
        <input type="text" value="<?php echo ($lista[0]->co_nombre); ?>" name="nombrepcs" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >IP:</label>
        <input type="text" value="<?php echo ($lista[0]->co_ip); ?>"  name="ippcs" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PANTALLA:</label>
        <input type="text" value="<?php echo ($lista[0]->co_pantalla); ?>"  name="pantallas" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PARLANTE:</label>
        <input type="text" value="<?php echo ($lista[0]->co_parlante); ?>"  name="parlantes" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TECLADO:</label>
        <input type="text" value="<?php echo ($lista[0]->co_teclado); ?>" name="teclados" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >MAUS:</label>
        <input type="text" value="<?php echo ($lista[0]->co_maus); ?>"  name="mauss" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PROCESADOR:</label>
        <input type="text" value="<?php echo ($lista[0]->co_procesador); ?>"  name="procesadors" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >RAM:</label>
        <input type="text" value="<?php echo ($lista[0]->co_ram); ?>"  name="rams" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >ALMACENAMIENTO:</label>
        <input type="text" value="<?php echo ($lista[0]->co_almacenamiento); ?>" name="almacenamientos" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >VIDEO:</label>
        <input type="text" value="<?php echo ($lista[0]->co_video); ?>" name="videos" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TARG.DE RED:</label>
        <input type="text" value="<?php echo ($lista[0]->co_nic); ?>" name="reds" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TARG.DE SONIDO:</label>
        <input type="text" value="<?php echo ($lista[0]->co_sonido); ?>"  name="sonidos" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TARG.MADRE:</label>
        <input type="text" value="<?php echo ($lista[0]->co_targmadre); ?>"  name="madres" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >FUENTE:</label>
        <input type="text" value="<?php echo ($lista[0]->co_fuente); ?>"  name="fuentes" class="form-control" required placeholder="Ingresar..">
        <input type="hidden" name="idpc" value="<?php echo ($lista[0]->id); ?>">
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
    </div>
  </form>
  <script>
    $("#edtcompus").submit(function(event) {
      event.preventDefault();
    
      document.getElementById('boton').disabled=true;
      
      $.ajax({
        url: '/edtcompus',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
          window.location="";
        }
      })
    });     
  </script>