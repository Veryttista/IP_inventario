@extends('plantilla')
@section('contenido')
<div class="">
    <div class="page-title">
    <div class="title_left">
        <h3>AMBIENTES <small>Lista general</small></h3>
    </div> 
    </div><div class="clearfix"></div>
    <div class="row">
    <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ambientes</h2><div class="clearfix">
          </div>
        </div>
        <button type="button"class="btn btn-primary"data-toggle="modal"data-target="#myModal"><i class="fa fa-institution"></i>NUEVO AMBIENTE</button>
        <div class="x_content">
          <p>Lista de los pisos en el GAMV</p><br>
          <table class="table table-striped projects">
            <thead>
              <tr>
              <th style="width: 50%">nombre</th>
              <th style="width: 20%">Edit</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($lista as $item)
                <tr>
                  <td><a>{{$item->am_nombre}}</a><br /><small>{{$item->updated_at}}</small></td>
                  <td>
                    <button type="button" class="btn btn-primary" onclick="editarambiente(<?php echo $item->id ?>)"><i class="fa fa-pencil"></i> Edit</button>
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
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DATOS DEL AMBIENTE</h4>
      </div>
      <div class="modal-body ">
        <form id="nuevoAmbiente" method="post">
          @csrf
          <div class="row">
            <div class="col-12">
              <label >NOMBRE:</label>
              <input type="text" id="tipo_nombres" name="nombre_ambiente" class="form-control"  placeholder="Ingresar..">
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
$("#nuevoAmbiente").submit(function(event) {
  event.preventDefault();
  document.getElementById('boton').disabled=true;
  var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }
      if (submit)
        $.ajax({
        url: '/nuevoAmbiente',
        type: 'POST',
        data: $("form").serialize(),
        success:function(data){
            window.location="";
        }
      })
      return false; 
}); 
function editarambiente(id){
  $("#editarModal").modal('show')
  $.post('/editarambiente', {id}, function(data) {
    $("#ver_form").html(data)
  });
}
</script>
@endsection