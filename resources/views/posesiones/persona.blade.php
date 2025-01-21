@extends('plantilla')
@section('contenido')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Posesiones</h2>
        <div class="clearfix"></div>
      </div>
      <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <table  id="datatable-responsive"class="table table-striped table-bordered  nowrap" cellspacing="0" width="100%">
          <thead>
            <tr role="row" class="odd">
              <th >Nombre completo</th>
              <th >Cargo</th>
              <th >Posesiones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lista as $item)
            <tr role="row" class="odd">
              <td >{{$item->pe_nombre}} {{$item->pe_paterno}} {{$item->pe_materno}}</td>
              <td >{{$item->pe_cargo}}</td>
              <td>
                <button type="button" class="btn btn-success" onclick="mantenimiento(<?php echo $item->id ?>)"><i class="fa fa-cogs"></i>soporte</button>  
                <a class="btn btn-info" href="/posession/<?php echo $item->id ?>"><i class="fa fa-eye"></i>-{{$item->posesiones}}</a>  
              </td>
            </tr> 
            @endforeach
          </tbody>
        </table>
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