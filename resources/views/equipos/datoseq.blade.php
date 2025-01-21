<div class="row invoice-info">
    <div class="row" style="padding:0 10px ">
        <h1><i class="fa fa-print"></i><?php echo ' '.$lista[0]->di_ip ?></h1>
    </div>
    <div class="col-sm-6 invoice-col">
        <b>PERSONAL:</b><?php echo' '.$lista[0]->pe_nombre.' '.$lista[0]->pe_paterno.' '.$lista[0]->pe_materno.' '?><br>
        <b>NOMBRE:</b>  <?php echo' '.$lista[0]->di_nombre?><br>
        <b>CARACTERISTICAS:</b><?php echo' '.$lista[0]->di_caracteristicas?><br>
        <a href="" class="btn btn-primary">imprimir</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
    </div>
</div> 