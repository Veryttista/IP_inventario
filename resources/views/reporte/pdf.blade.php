<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            background: #6e1a1a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #8f4d4d;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #1f206e;
        }
    </style>
</head>
<body>
    <h1> <center>{{ $titulo }}</center> </h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mantenimientos as $mantenimiento)
                <tr>
                    <td>{{ $mantenimiento['id'] }}</td>
                    <td>{{ $mantenimiento['descripcion'] }}</td>
                    <td>{{ $mantenimiento['fecha'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
