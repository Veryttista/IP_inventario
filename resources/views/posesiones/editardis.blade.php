<form id="editdis" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <label >NOMBRE:</label>
        <input type="text" value="<?php echo $lista[0]->di_nombre  ?>" name="nombre" class="form-control" required placeholder="Ingresar..">
      </div>
      <div class="col-md-12">
        <label >IP:</label>
        <input type="text" value="<?php echo $lista[0]->di_ip  ?>" name="ip" class="form-control" required placeholder="Ingresar..">
      </div>
      <div class="col-md-12">
        <label >CARACTERISTICAS:</label>
        <textarea name="caracteristicas" class="form-control" cols="30" rows="10"placeholder="Ingresar.."><?php echo $lista[0]->di_caracteristicas ?></textarea>
        <input type="hidden"value="<?php echo $lista[0]->id ?>" name="id" >
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
    </div>
  </form>
  <script>
    $("#editdis").submit(function(event) {
      event.preventDefault();
      document.getElementById('boton').disabled=true;
      $.ajax({
        url: '/editdis',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
          window.location="";
        }
      })
    });     
  </script>