<div class="row invoice-info">
    <div class="row" style="padding:0 10px ">
        <h1><i class="fa fa-cogs"></i>{{$mantenimiento[0]->un_nombre}} </h1>
    </div>
    <div class="col-sm-6 invoice-col">
        <b>NOMBRE:</b> {{$mantenimiento[0]->pe_nombre}} {{$mantenimiento[0]->pe_paterno}}  {{$mantenimiento[0]->pe_materno}} <br>
        <b>CARGO: </b> {{$mantenimiento[0]->pe_cargo}} <br>
        <b>FECHA: </b> {{$mantenimiento[0]->fecha_hora}} <br>
         
    </div>
    <div class="col-sm-6 invoice-col">
        <b>PROBLEMA:</b><br>{{$mantenimiento[0]->problema}}<br>
        <b>SOLUCION:</b><br>{{$mantenimiento[0]->solucion}}<br>  
    </div>
</div> 
<a href="/mantenimientoImdividualPDF/{{$mantenimiento[0]->id}}" target="_blank" class="btn btn-primary">imprimir</a>
<button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>