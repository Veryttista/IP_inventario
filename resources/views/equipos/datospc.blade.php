
<div class="row invoice-info">
    <div class="row" style="padding:0 10px ">
        <h1><i class="fa fa-desktop"></i><?php echo ' '.$lista[0]->co_ip ?></h1>
    </div>
    <div class="col-sm-6 invoice-col">
        <b>PERSONAL:</b><?php echo' '.$lista[0]->pe_nombre.' '.$lista[0]->pe_paterno.' '.$lista[0]->pe_materno.' '?><br>
        <b>NOMBRE:</b>  <?php echo' '.$lista[0]->co_nombre?><br>
        <b>PANTALLA:</b><?php echo' '.$lista[0]->co_pantalla?><br>
        <b>PARLANTE:</b><?php echo' '.$lista[0]->co_parlante?><br>
        <b>TECLADO:</b> <?php echo' '.$lista[0]->co_teclado?><br>
        <b>RATON:</b>   <?php echo' '.$lista[0]->co_maus?><br>
        <b>FUENTE:</b>  <?php echo' '.$lista[0]->co_fuente?><br>
    </div>
    <div class="col-sm-6 invoice-col">
        <b>PROCESADOR:</b>     <?php echo' '.$lista[0]->co_procesador?><br>
        <b>RAM:</b>            <?php echo' '.$lista[0]->co_ram?><br>
        <b>ALMACENAMIENTO:</b> <?php echo' '.$lista[0]->co_almacenamiento?><br>
        <b>TAG. VIDEO:</b>     <?php echo' '.$lista[0]->co_video?><br>
        <b>TAG. RED:</b>       <?php echo' '.$lista[0]->co_nic?><br>
        <b>TAG. SONIDO:</b>    <?php echo' '.$lista[0]->co_sonido?><br>
        <b>TAG. MADRE:</b>     <?php echo' '.$lista[0]->co_targmadre?><br>
    </div>
</div> 
<a href="" class="btn btn-primary">imprimir</a>
<button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>