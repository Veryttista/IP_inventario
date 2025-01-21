@extends('plantilla')
@section('contenido')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Lista de mantenimientos</h2> <br><br>
        <div class="clearfix"></div>
      </div>
      <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal1"><i class="fa fa-cogs"></i> NUEVO MANTENIMIENTO</button>
      <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <table  id="datatable-responsive"class="table table-striped table-bordered  nowrap" cellspacing="0" width="100%">
          <thead>
            <tr role="row" class="odd"> 
              <th >#</th>
              <th >personal</th>
              <th >fecha</th>
              <th >accion</th>
            </tr>
          </thead>
          <tbody><?php $i=1;?>
            @foreach ($mantenimientos as $item)
              <tr>
                <td>{{$item->id }}</td>
                <td>{{$item->pe_nombre}} {{$item->pe_paterno}} {{$item->pe_materno}} <br> <small style="color:rgb(38, 49, 109)">{{$item->pe_cargo}} </small></td>
                <td>{{$item->fecha_hora}}</td>
                <td>
                  <button type="button" class="btn btn-primary" onclick="getmanteni(<?php echo $item->id ?>)"><i class="fa fa-eye"></i> </button>
                  <button type="button" class="btn btn-info" onclick="getman(<?php echo $item->id ?>)"><i class="fa fa-pencil"></i> </button>
                  <button type="button" class="btn btn-danger" onclick="delet(<?php echo $item->id ?>)"><i class="fa fa-trash"></i> </button>
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
        <h4 class="modal-title">DATOS DEL MANTENIMIENTO</h4>
      </div>
      <div class="modal-body ">
        <form id="mancom" method="post">
          @csrf
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">PERSON:</label><br>
              <div class="col-md-9 col-sm-9 col-xs-12"style="width: 100%;">
                <select class="select2_single form-control"name='id_mante' tabindex="-1" style="width: 100%;" required>
                    <option value="" selected ></option>
                    @foreach ($personal as $item2)
                    <option  value="{{$item2->id}}">{{$item2->pe_cargo}} </option>  
                    @endforeach
                </select>
              </div>
            </div>
          </div>
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
            </div>
          </div><br>
          <button type="submit" id="boton3" class="btn btn-primary" >GUARDAR DATOS</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>  
        </form>
      </div>
    </div>
  </div>
</div>
<div id="editarman" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">MODIFICAR REGISTRO</h4>
        </div>
        <div class="modal-body " id="ver_man">
        </div>
    </div>
  </div>
</div>
   
<div id="eyeModalman" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">VER MANTENIMIENTO</h4>
        </div>
        <div class="modal-body " id="ver_mantenimiento">
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
          <form id="elimi" method="post">
              @csrf
              <input type="hidden" name="id" id='idman'>
              <div class="modal-footer">
                <button type="submit" id="boton" class="btn btn-primary" >ELIMINAR DATOS</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
<script>
$("#mancom").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton').disabled=true;
    $.ajax({
    url: '/nueman',
    type: 'POST',
    data: $("form").serialize(),
    success:function(){
        window.location="";
    }
    })
}); 
function getman(id){
    $("#editarman").modal('show')
    $.post('/getman',{id}, function(data) {
      $("#ver_man").html(data)
    });
  }
function getmanteni(id){
  $("#eyeModalman").modal('show')
  $.post('/getmanteni',{id}, function(data) {
    $("#ver_mantenimiento").html(data)
  });
}
</script>
<script>
  function delet(id){
    $("#confirm").modal('show')
    $("#idman").val(id)
  }
  $("#elimi").submit(function(event) {
  event.preventDefault();
  document.getElementById('boton').disabled=true;
  $.ajax({
    url: '/delete',
    type: 'POST',
    data: $("form").serialize(),
    success:function(){
      window.location="";
    }
  })
});   
</script>

@endsection