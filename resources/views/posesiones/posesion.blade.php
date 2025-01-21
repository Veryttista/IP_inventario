@extends('plantilla')
@section('contenido')
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Posesiones de: <br><br>
          <?php echo $lista[0]->pe_nombre?> <br><?php echo $lista[0]->pe_paterno?><br><br>
          <?php echo $lista[0]->pe_cargo?>
        </h2>
        <div class="clearfix"></div>
      </div>
      <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal1">NUEVA COMPUTADORA</button>
      <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal2">NUEVO DISPOSITIVO</button>
      <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <table  id="datatable-responsive"class="table table-striped table-bordered  nowrap" cellspacing="0" width="100%">
          <thead>
            <tr role="row" class="odd"> 
              <th >nombre </th>
              <th >ip</th>
              <th >accion</th>
            </tr>
          </thead>
          <tbody><?php $i=1;?>
          @foreach ($compus as $item2)
            <tr>
              <td>{{ $item2->co_nombre}}</td>
              <td>{{ $item2->co_ip}}</td>
              <td>
                <button type="button" class="btn btn-info" onclick="getpc(<?php echo $item2->id ?>)"><i class="fa fa-pencil"></i> Edit</button>
              </td>
            </tr>
          @endforeach
          @foreach ($disp as $item)
            <tr>
              <td>{{ $item->di_nombre}}</td>
              <td>{{ $item->di_ip}}</td>
              <td>
                <button type="button" class="btn btn-info" onclick="geteq(<?php echo $item->id ?>)"><i class="fa fa-pencil"></i> Edit</button>
              </td>
            </tr>  
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div> 
</div>


<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DATOS DEL EQUIPO</h4>
      </div>
      <div class="modal-body ">
        <form id="nuevacompu" method="post">
          @csrf

          <div class="row">
            <div class="col-md-12">
              <label >NOMBRE:</label>
              <input type="text" id="nombre" name="nombrepc" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >IP:</label>
              <input type="text" id="ip" name="ippc" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >PANTALLA:</label>
              <input type="text" id="pantalla" name="pantalla" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >PARLANTE:</label>
              <input type="text" id="tipo_nombres" name="parlante" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >TECLADO:</label>
              <input type="text" id="tipo_nombres" name="teclado" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >MAUS:</label>
              <input type="text" id="tipo_nombres" name="maus" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >PROCESADOR:</label>
              <input type="text" id="tipo_nombres" name="procesador" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >RAM:</label>
              <input type="text" id="tipo_nombres" name="ram" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >ALMACENAMIENTO:</label>
              <input type="text" id="tipo_nombres" name="almacenamiento" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >VIDEO:</label>
              <input type="text" id="tipo_nombres" name="video" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >TARG.DE RED:</label>
              <input type="text" id="tipo_nombres" name="red" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >TARG.DE SONIDO:</label>
              <input type="text" id="tipo_nombres" name="sonido" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >TARG.MADRE:</label>
              <input type="text" id="tipo_nombres" name="madre" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >FUENTE:</label>
              <input type="text" id="tipo_nombres" name="fuente" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="dueno" value="<?php echo $lista[0]->id  ?>">
            <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">DATOS DEL AMBIENTE</h4>
          </div>
          <div class="modal-body ">
            <form id="nuevodispo" method="post">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <label >NOMBRE:</label>
                  <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Ingresar..">
                </div>
                <div class="col-md-12">
                  <label >IP:</label>
                  <input type="text" id="ip" name="ip" class="form-control" required placeholder="Ingresar..">
                </div>
                <div class="col-md-12">
                  <label >CARACTERISTICAS:</label>
                  <textarea name="caracteristicas" class="form-control" cols="30" rows="10"placeholder="Ingresar.."></textarea>
                  <input type="hidden" name="dueno" value="<?php echo $lista[0]->id  ?>">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
              </div>
            </form>
          </div>
      </div>
    </div>
</div>

<div id="editarModalpc" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">MODIFICAR REGISTRO</h4>
        </div>
        <div class="modal-body " id="ver_formpc">
        </div>
    </div>
  </div>
</div>

<div id="editarModaleq" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">MODIFICAR REGISTRO</h4>
        </div>
        <div class="modal-body " id="ver_formeq">
        </div>
    </div>
  </div>
</div>
<script>
$("#nuevacompu").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton').disabled=true;
    $.ajax({
    url: '/nuevacompu',
    type: 'POST',
    data: $("form").serialize(),
    success:function(){
        window.location="";
    }
    })
}); 
function getpc(id){
    $("#editarModalpc").modal('show')
    $.post('/getpc',{id}, function(data) {
      $("#ver_formpc").html(data)
    });
  }
</script>
<script>
  $("#nuevodispo").submit(function(event) {
      event.preventDefault();
      document.getElementById('boton').disabled=true;
      $.ajax({
      url: '/nuevodispo',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
          window.location="";
      }
      })
  }); 
  function geteq(id){
    $("#editarModaleq").modal('show')
    $.post('/geteq', {id}, function(data) {
      $("#ver_formeq").html(data)
    });
  }
  </script>
@endsection