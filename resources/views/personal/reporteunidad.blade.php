<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Tres Columnas con Tabla</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    table {
      width: 100%;
      border-collapse: collapse; 
    }
    th, td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
    }
    th {
      background-color: #2a3f54;
      color: #ccc;
    }
    td input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <header style="text-align: center;">
        <span style="color:#000000;font-size:20px"><b>LISTA DE IP's DE {{$unidad[0]->un_nombre}}</b> </span>
        <p style="color:#353333;font-size:11px;font-style: italic;">Unidad de Tecnologías de la Información y Comunicaciones</p>
    </header><br><br>
    <table>
      <thead>
        <tr>
          <th>Cargo</th>
          <th>Nombre</th>
          <th>Ip</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($computadoras as $item)
        <tr>
            <td>{{$item->co_nombre}}</td>
            <td>{{$item->co_ip}}</td>
            <td>{{$item->pe_cargo}}</td>
        </tr>   
        @endforeach
        @foreach ($dispositivos as $item2)
        <tr>
            <td>{{$item2->di_nombre}}</td>
            <td>{{$item2->di_ip}}</td>
            <td>{{$item2->pe_cargo}}</td>
        </tr>  
        @endforeach
        
      </tbody>
    </table>
  </div>
</body>
</html>
