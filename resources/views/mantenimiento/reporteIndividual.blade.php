
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja Técnica de Mantenimiento</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <div class="container">
        <header style="text-align: center;">
            <span style="color:#000000;font-size:20px"><b>Informe de Soporte</b> </span>
            <p style="color:#353333;font-size:11px;font-style: italic;">Unidad de Tecnologías de la Información y Comunicaciones</p>
        </header><br><br>
        <section>   
            <table style="border-collapse:collapse;width:100%;">
                <tr style="border:1px solid black;background:#2a3f54;font-size:15px;color:aliceblue; ">
                    <th colspan="2" style="padding: 5px;text-align: left"><b>Datos del Responsable</b></th>
                </tr>
                <tr style="border:1px solid black;font-size:12px">
                    <th style="padding: 5px;border:1px solid black;width:30%;text-align:left;background:#e2e2e2">Unidad</th>
                    <td style="padding: 5px;padding-left:10px">{{$mantenimiento[0]->un_nombre}}</td>
                </tr>
                <tr style="border:1px solid black;font-size:12px">
                    <th style="padding: 5px;border:1px solid black;width:30%;text-align:left;background:#e2e2e2">Personal</th>
                    <td style="padding: 5px;padding-left:10px">{{$mantenimiento[0]->pe_nombre}} {{$mantenimiento[0]->pe_paterno}}  {{$mantenimiento[0]->pe_materno}}</td>
                </tr>
                <tr style="border:1px solid black;font-size:12px">
                    <th style="padding: 5px;border:1px solid black;width:30%;text-align:left;background:#e2e2e2">Cargo</th>
                    <td style="padding: 5px;padding-left:10px">{{$mantenimiento[0]->pe_cargo}}</td>
                </tr>
                <tr style="border:1px solid black;font-size:12px">
                    <th style="padding: 5px;border:1px solid black;width:30%;text-align:left;background:#e2e2e2">Fecha de Mantenimiento</th>
                    <td style="padding: 5px;padding-left:10px">{{$mantenimiento[0]->fecha_hora}}</td>
                </tr>
                <tr style="border:1px solid black;background:#2a3f54;font-size:15px;color:aliceblue; font-size:12px">
                    <th class="horizontal" colspan="2" style="padding: 5px;padding: 5px;text-align: left">Descripción del Mantenimiento</th>  
                </tr>
                <tr style="border:1px solid black;background:#e2e2e2;font-size:12px">
                    <th style="padding: 5px;" class="horizontal" colspan="2">Problema</th>                  
                </tr>
                <tr style="padding: 5px;border:1px solid black;height:30%;font-size:12px">
                    <td style="padding: 5px;word-break: break-word; white-space: normal;" colspan="2">{{$mantenimiento[0]->problema}}</td>
                </tr>
                <tr style="border:1px solid black;background:#e2e2e2;font-size:12px">
                    <th style="padding: 5px;" class="horizontal" colspan="2">Solucion</th>
                </tr>
                <tr style="border:1px solid black;font-size:12px">
                    <td style="padding: 5px;word-break: break-word; white-space: normal;" colspan="2">{{$mantenimiento[0]->solucion}}</td>
                </tr>
            </table><br><br><br>
        </section>
        <footer style="margin-top: 40px; text-align: center;">
            <div style="height: 100px;margin-bottom: 10px;">
                <div style="width: 300px;height: 2px;background-color: #333; margin: auto;"></div>
                <p style="height: 100px;margin-bottom: 10px;font-size:12px">Responsable de Soporte</p>
            </div>
        </footer>
    </div>
</body>
</html>
