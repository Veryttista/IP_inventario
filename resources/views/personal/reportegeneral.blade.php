<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Unidades y Computadoras</title>
</head>
<style>.unidad {
    page-break-inside: avoid; /* Evitar cortes dentro de una unidad */
}</style>
<body style="font-family: Arial, Helvetica, sans-serif;">
    <h2 style="text-align: center">Reporte de IP's General</h2>

    @foreach ($unidades as $unidad)
    <div class="unidad">
    <table style="border-collapse: collapse; width:100%">
        <tr style="border:1px solid #88a2b9;background:#2a3f54;color:white;font-size:14px;">
            <th colspan='3' style="padding:5px 0px;"><b>{{ $unidad->un_nombre }}</b></th>
        </tr>
        <tr style="background:#2a3f54;color:white;font-size:14px;">
            <th style="border:1px solid #88a2b9;text-align: center; width:40%;padding:5px 0px;">Cargo</th>
            <th style="padding:5px 0px;border:1px solid #88a2b9;text-align: center; width:30%">Nombre</th>
            <th style="padding:5px 0px;border:1px solid #88a2b9;text-align: center; width:30%">IP</th>
        </tr>    
            @php
                $computadorasU = $computadoras->filter(function ($computadora) use ($unidad) {
                    return $computadora->unidad_id == $unidad->id;
                });
            @endphp
            @if ($computadorasU->isEmpty())
                <p></p>
                <tr style="background:#ffffff;color:rgb(0, 0, 0);">
                    <th style="border:1px solid #88a2b9;padding:5px 0px;font-size:12px;" colspan='3'>No hay computadoras registradas para esta unidad.</th>
                </tr>
            @else        
                @foreach ($computadorasU as $computadora)
                <tr style="background:#ffffff;color:rgb(0, 0, 0);font-weight:100;font-size:12px;">
                    <th style="padding:5px 10px;border:1px solid #88a2b9;text-align: left; width:40%">{{ $computadora->pe_cargo }}</th>
                    <th style="padding:5px 10px;border:1px solid #88a2b9;text-align: left; width:30%">{{ $computadora->co_nombre }}</th>
                    <th style="padding:5px 10px;border:1px solid #88a2b9;text-align: left; width:30%">{{ $computadora->co_ip }}</th>
                </tr>      
                @endforeach   
            @endif
    </table>  <br><br> 
</div>
    @endforeach
</body>
</html>