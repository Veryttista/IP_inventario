<form id="editcompu" method="post">
    @csrf

    <div class="row">
      <div class="col-md-12">
        <label >NOMBRE:</label>
        <input type="text" value="<?php echo $lista[0]->co_nombre  ?>" name="nombrepc" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >IP:</label>
        <input type="text" value="<?php echo $lista[0]->co_ip  ?>" name="ippc" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PANTALLA:</label>
        <input type="text" value="<?php echo $lista[0]->co_pantalla  ?>" name="pantalla" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PARLANTE:</label>
        <input type="text" value="<?php echo $lista[0]->co_parlante  ?>" name="parlante" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TECLADO:</label>
        <input type="text" value="<?php echo $lista[0]->co_teclado  ?>" name="teclado" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >MAUS:</label>
        <input type="text" value="<?php echo $lista[0]->co_maus  ?>" name="maus" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >PROCESADOR:</label>
        <input type="text" value="<?php echo $lista[0]->co_procesador  ?>" name="procesador" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >RAM:</label>
        <input type="text" value="<?php echo $lista[0]->co_ram  ?>" name="ram" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >ALMACENAMIENTO:</label>
        <input type="text" value="<?php echo $lista[0]->co_almacenamiento  ?>" name="almacenamiento" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >VIDEO:</label>
        <input type="text" value="<?php echo $lista[0]->co_video  ?>" name="video" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TARG.DE RED:</label>
        <input type="text" value="<?php echo $lista[0]->co_nic  ?>" name="red" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TARG.DE SONIDO:</label>
        <input type="text" value="<?php echo $lista[0]->co_sonido  ?>" name="sonido" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >TARG.MADRE:</label>
        <input type="text" value="<?php echo $lista[0]->co_targmadre  ?>" name="madre" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label >FUENTE:</label>
        <input type="text" value="<?php echo $lista[0]->co_fuente  ?>" name="fuente" class="form-control" required placeholder="Ingresar..">
      </div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="id" value="<?php echo $lista[0]->id  ?>">
      <input type="hidden" name="dueno" value="<?php echo $lista[0]->personal_id  ?>">
      <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
    </div>
  </form>
  <script>
    $("#editcompu").submit(function(event) {
      event.preventDefault();
      document.getElementById('boton').disabled=true;
      $.ajax({
        url: '/editcompu',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
          window.location="";
        }
      })
    });     
  </script>