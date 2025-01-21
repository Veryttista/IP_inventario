@extends('plantilla')
@section('contenido')
<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Equipos en general</h2> <br><br>
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
        @foreach ($compu as $item2)
          <tr>
            <td>{{ $item2->co_nombre}}<br><small>{{ $item2->pe_cargo}}</small> </td>
            <td>{{ $item2->co_ip}}
            <td>
              <button type="button" class="btn btn-primary" onclick="getpceye(<?php echo $item2->id ?>)"><i class="fa fa-eye"></i> </button>
              <button type="button" class="btn btn-warning" onclick="getpcs(<?php echo $item2->id ?>)"><i class="fa fa-pencil-square-o"></i></button>
              <button type="button" class="btn btn-danger" onclick="delpc(<?php echo $item2->id ?>)"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
        @endforeach
        @foreach ($dispo as $item)
          <tr>
            <td>{{ $item->di_nombre}}<br><small>{{ $item2->pe_cargo}}</small> </td>
            <td>{{ $item->di_ip}}</td>
            <td>
              <button type="button" class="btn btn-primary" onclick="geteqeye(<?php echo $item->id ?>)"><i class="fa fa-eye"></i> </button>
              <button type="button" class="btn btn-warning" onclick="geteqs(<?php echo $item->id ?>)"><i class="fa fa-pencil-square-o"></i> </button>
              <button type="button" class="btn btn-danger" onclick="deleq(<?php echo $item->id ?>)"><i class="fa fa-trash"></i> </button>
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
            <form id="nuevacompus" method="post">
              @csrf
              <div class="row">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">DUEÑO:</label><br>
                  <div class="col-md-9 col-sm-9 col-xs-12"style="width: 100%;">
                    <select class="select2_single form-control"name='duenopc' tabindex="-1" style="width: 100%;" required>
                      <option value="" selected ></option>
                      @foreach ($dueno as $item3)
                      <option value="{{$item3->id}}">{{$item3->pe_nombre}} {{$item3->pe_paterno}} {{$item3->pe_materno}}</option>  
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              
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
            <form id="nuevodispos" method="post">
              @csrf
              <div class="row">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">DUEÑO:</label><br>
                  <div class="col-md-9 col-sm-9 col-xs-12"style="width: 100%;">
                    <select name="duenod" class="select2_single form-control" tabindex="-1" style="width: 100%;">
                      <option value="" selected ></option>
                      @foreach ($dueno as $item3)
                      <option value="{{$item3->id}}">{{$item3->pe_nombre}} {{$item3->pe_paterno}} {{$item3->pe_materno}}</option>  
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label >NOMBRE:</label>
                  <input type="text" id="nombre" name="nombred" class="form-control" required placeholder="Ingresar..">
                </div>
                <div class="col-md-12">
                  <label >IP:</label>
                  <input type="text" id="ip" name="ipd" class="form-control" required placeholder="Ingresar..">
                </div>
                <div class="col-md-12">
                  <label >CARACTERISTICAS:</label>
                  <textarea name="caracteristicasd" class="form-control" cols="30" rows="10"placeholder="Ingresar.."></textarea>
                  
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
        <div class="modal-body " id="ver_formpcs">
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
        <div class="modal-body " id="ver_formeqs">
        </div>
    </div>
  </div>
</div>

<div id="eyeModalpc" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">VER COMPUTADORA</h4>
        </div>
        <div class="modal-body " id="ver_pc">
        </div>
    </div>
  </div>
</div>

<div id="eyeModaleq" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">VER DISPOSITIVO</h4>
        </div>
        <div class="modal-body " id="ver_eq">
        </div>
    </div>
  </div>
</div>

<div id="confirm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">VER COMPUTADORA</h4>
        </div>
        <div class="modal-body " id="del">
          <form id="elimi" method="post">
              @csrf
              <input type="hidden" name="id" id='idman'>
              <div class="modal-footer">
                <button type="submit" id="boton2" class="btn btn-primary" >GUARDAR DATOS</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
<script>
$("#nuevacompus").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton').disabled=true;
    $.ajax({
    url: '/nuevacompus',
    type: 'POST',
    data: $("form").serialize(),
    success:function(){
        window.location="";
    }
    })
}); 
function getpcs(id){
    $("#editarModalpc").modal('show')
    $.post('/getpcs',{id}, function(data) {
      $("#ver_formpcs").html(data)
    });
  }
</script>
<script>
  $("#nuevodispos").submit(function(event) {
      event.preventDefault();
      document.getElementById('boton').disabled=true;
      $.ajax({
      url: '/nuevodispos',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
          window.location="";
      }
      })
  }); 
  function geteqs(id){
    $("#editarModaleq").modal('show')
    $.post('/geteqs', {id}, function(data) {
      $("#ver_formeqs").html(data)
    });
  }
  </script>
  <script>
  function getpceye(id){
    $("#eyeModalpc").modal('show')
    $.post('/getpceye', {id}, function(data) {
      $("#ver_pc").html(data)
    });
  } 
  function geteqeye(id){
    $("#eyeModaleq").modal('show')
    $.post('/geteqeye', {id}, function(data) {
      $("#ver_eq").html(data)
    });
  } 
  </script>
<script>
  function delpc(id){
    $("#confirm").modal('show')
    $("#idman").val(id)
  }

  $("#elimi").submit(function(event) {
    event.preventDefault();
    document.getElementById('boton2').disabled=true;
    $.ajax({
      url: '/bajapc',
      type: 'POST',
      data: $("form").serialize(),
      success:function(){
        window.location="";
      }
    })
  });
    function deleq(id){
       $("#confirm").modal('show')
       $("#idman").val(id)
     }

     $("#elimi").submit(function(event) {
      event.preventDefault();
      document.getElementById('boton2').disabled=true;
      $.ajax({
        url: '/bajaeq',
        type: 'POST',
        data: $("form").serialize(),
        success:function(){
          window.location="";
        }
      })
    });
</script>



@endsection