@extends('plantilla')
@section('contenido')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>UNIDADES <small>Lista general</small></h3>
    </div> 
    </div><div class="clearfix"></div>
    <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>UNIDADES</h2><div class="clearfix"></div>
        </div>
        <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal"><i class="fa fa-th-large"></i>NUEVA UNIDAD</button>
        <div class="x_content">
          <p>lista de las unidades en el gamv</p><br>
          <table class="table table-striped projects">
            <thead>
                <tr>
                
                <th style="width: 40%">Unidad</th>
                <th style="width: 20%">Ambiente</th>
                <th style="width: 20%">Accion</th>
                </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
                @foreach ($lista as $item)
                <tr>
                  
                  <td><a>{{$item->un_nombre}}</a><br /><small>{{$item->updated_at}}</small></td>
                  <td><a>{{$item->am_nombre}}</a></td>
                  <td>
                    <button type="button" class="btn btn-primary" onclick="getunidad(<?php echo $item->id ?>)"><i class="fa fa-pencil"></i> Edit</button>
                  </td>
                </tr>
                @endforeach   
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal contenido-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DATOS DE LA UNIDAD</h4>
      </div>
      <div class="modal-body ">
        <form id="nuevaUnidad" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label >NOMBRE:</label>
              <input type="text" name="nombre_unidad" class="form-control" required placeholder="Ingresar..">
            </div>
          </div>
          <div class="form-group">
            <label >UNIDAD:</label><br>
            <div >
            <select name='ambiente' class="form-control" @required(true) >
              <option value="" disabled selected><em>Seleccionar un ítem</em> </option>
            @foreach ($ambiente as $item2)
              <option value='{{$item2->id}}'>{{$item2->am_nombre}}</option>
            @endforeach 
            </select>
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

<script>
    $("#nuevaUnidad").submit(function(event) {
      event.preventDefault();
      document.getElementById('boton').disabled=true;
      $.ajax({
        url: '/nuevaUnidad',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
            window.location="";
        }
      })
    }); 
  function getunidad(id){
  $("#editarModal").modal('show')
  $.post('/getunidad', {id}, function(data) {
    $("#ver_form").html(data)
  });
}
</script>
@endsection