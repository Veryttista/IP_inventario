@extends('plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Lista de USUARIOS</h2> <br><br>
            <div class="clearfix"></div>
        </div>
        <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal1"><i class="fa fa-user"></i> NUEVO USUARIO</button>
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <table  id="datatable-responsive"class="table table-striped table-bordered  nowrap" cellspacing="0" width="100%">
            <thead>
                <tr role="row" class="odd"> 
                  <th >Nombre</th>
                  <th >Gmail</th>
                  <th >accion</th>
                </tr>
            </thead>
            <tbody><?php $i=1;?>
                @foreach ($usuarios as $item)
                <tr>
                    <td>{{$item->name}}<br><small>{{$item->created_at}} </small></td>
                    <td>{{$item->email}}</td>
                    <td>
                        <button type="button" class="btn btn-info" onclick="getuser(<?php echo $item->id ?>)"><i class="fa fa-pencil"></i> </button>
                        <button type="button" class="btn btn-danger" onclick="deluser(<?php echo $item->id ?>)"><i class="fa fa-trash"></i> </button>
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
          <h4 class="modal-title">DATOS DEL USUARIO</h4>
        </div>
        <div class="modal-body ">
          <form id="nueuse" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <label >NOMBRE:</label>
                <input type="text" id="tipo_nombres" name="nombre" class="form-control" required placeholder="Ingresar..">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label >EMAIL:</label>
                <input type="text" id="tipo_nombres" name="email" class="form-control" required placeholder="Ingresar..">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label >CONTRASEÑA:</label>
                <input type="text" id="tipo_nombres" name="clave" class="form-control" required placeholder="Ingresar..">
              </div>
            </div><br>
            <button type="submit" id="boton3" class="btn btn-primary" >GUARDAR DATOS</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>  
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="edituser" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">MODIFICAR REGISTRO</h4>
          </div>
          <div class="modal-body " id="ver_user">
          </div>
      </div>
    </div>
  </div>
  <div id="confirm" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ELIMINAR MANTENIMIENTO</h4>
          </div>
          <div class="modal-body " id="del">
            <form id="elimuser" method="post">
                @csrf
                <input type="hidden" name="iddeluser" id='iddeluser'>
                <div class="modal-footer">
                  <button type="submit" id="boton5" class="btn btn-primary" >ELIMINAR DATOS</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
              </form>
          </div>
      </div>
    </div>
  </div>
<script>
    $("#nueuse").submit(function(event) {
        event.preventDefault();
        document.getElementById('boton3').disabled=true;
        $.ajax({
        url: '/nueuse',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
            window.location="";
        }
        })
    }); 
    function getuser(id){
        $("#edituser").modal('show')
        $.post('/getuser',{id}, function(data) {
          $("#ver_user").html(data)
        });
      }
</script>
<script>
function deluser(id){
  $("#confirm").modal('show')
  $("#iddeluser").val(id)
}
$("#elimuser").submit(function(event) {
  event.preventDefault();
  document.getElementById('boton5').disabled=true;
  $.ajax({
    url: '/elimuser',
    type: 'POST',
    data: $("form").serialize(),
    success:function(){
      window.location="";
    }
  })
});   
</script>
@endsection
