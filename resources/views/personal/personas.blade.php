@extends('plantilla')
@section('contenido')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_content">
          <div class="row">
            <div class="title_left">
              <h2>Personal de  <?php echo $unidad[0]->un_nombre  ?> </h2>
              <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal">NUEVO PERSONAL</button>
            <br><br></div> 
            <div class="clearfix"></div>
            @foreach ($lista as $item)
              <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>{{$item->pe_cargo}}</i></h4>
                  <div class="left col-xs-7">
                      <h2>{{$item->pe_nombre }} {{$item->pe_paterno}} {{$item->pe_materno}}</h2>
                      <ul class="list-unstyled"><br></ul>
                  </div>
                  <div class="right col-xs-5 text-center">
                      <img src="<?php echo asset('admin') ?>/images/user.png" alt="" class="img-circle img-responsive">
                  </div>
                </div>
                  <div class="col-xs-12 bottom text-center">
                    <a class="btn btn-primary btn-xs" href="/posession/<?php echo $item->id ?>"><i class="fa fa-desktop"></i> ACTIVOS {{$item->posesiones}} </a>
                    <button type="button" class="btn btn-warning btn-xs" onclick="getpersonal(<?php echo $item->id ?>)"><i class="fa fa-edit"></i> EDITAR</button>  
                    <button type="button" class="btn btn-success btn-xs" onclick="mantenimiento(<?php echo $item->id ?>)"><i class="fa fa-cogs"></i> MANTENIMIENTO</button>  
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>   

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DATOS DEL PERSONAL</h4>
      </div>
      <div class="modal-body ">
        <form id="nuevoPersonal" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label >NOMBRE:</label>
              <input type="text" name="nombre" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >PATERNO:</label>
              <input type="text" name="paterno" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >MATERNO:</label>
              <input type="text" name="materno" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label >CARGO:</label>
              <input type="text" name="cargo" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <input type="hidden" name="unidad_id" value='<?php echo $unidad[0]->id?>'>
          <div class="modal-footer">
            <button type="submit" id="boton" class="btn btn-primary" >GUARDAR DATOS</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="editarModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">MODIFICAR REGISTRO</h4>
        </div>
        <div class="modal-body " id="ver_form">
        </div>
    </div>
  </div>
</div>

<div id="mantenimientoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DATOS DEL MANTENIMIENTO</h4>
        </div>
        <div class="modal-body " id="ver_form_mantenimiento">
          <form id="mantenimiento" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <label >PROBLEMA:</label>
                <textarea class="form-control"name="problema"required placeholder="Ingresar.."rows="3"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label >SOLUCION:</label>
                <textarea class="form-control"name="solucion"required placeholder="Ingresar.."rows="3"></textarea>
                <input type="hidden" name="id_mante" id="id_mante">
              </div>
            </div><br>
            <button type="submit" id="boton3" class="btn btn-primary" >GUARDAR DATOS</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>  
          </form>
        </div>
    </div>
  </div>
</div>

<script>
  $("#nuevoPersonal").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton').disabled=true;
    $.ajax({
      url: '/nuevoPersonal',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
          window.location="";
      }
    })
  }); 
  function getpersonal(id){
    $("#editarModal").modal('show')
    $.post('/getpersonal', {id}, function(data) {
        $("#ver_form").html(data)
    });
  }
  function mantenimiento(id){
    $("#mantenimientoModal").modal('show')
    $("#id_mante").val(id);
  }
  $("#mantenimiento").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton3').disabled=true;
    $.ajax({
      url: '/nueman',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="/mante";
      }
    })
  });   
</script>
@endsection