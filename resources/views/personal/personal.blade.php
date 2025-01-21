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
            <a href="/ipunidad"class="btn btn-danger"target="_blank"><i class="fa fa-file-pdf-o"></i>LISTA GENERAL</a>  
        </div>
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <table  id="datatable-responsive"class="table table-striped table-bordered  nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th style="width: 40%">Unidad</th>
                    <th>Miembros</th>
                    <th style="width: 20%">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($lista as $item)
                    <tr>
                        <td><a>{{$item->un_nombre}}</a><br /><small>{{$item->updated_at}}</small></td>
                        <td><a>{{$item->miembros}}</a></td>
                        <td>
                        <a class="btn btn-info" href="/personal/<?php echo $item->id ?>"><i class="fa fa-eye"></i>VER</a>
                        <a href="/ipunidad/<?php echo $item->id ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o"></i>Pdf</a>
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
@endsection