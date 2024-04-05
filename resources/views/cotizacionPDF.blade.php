<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COTIZACION</title>
</head>
<body>
    <div class="container">
        <h1>Cotización</h1>
        <table>
            <tr>
                <th>Producto</th>
                <td>{{$cotizacion->producto->nombre}}</td>
            </tr>
            <tr>
                <th>Dimensiones</th>
                <td>{{$cotizacion->ancho}}m x {{$cotizacion->alto}}m</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>${{number_format($cotizacion->total, 2)}}</td>
            </tr>
        </table>
        
        <h2>Detalles</h2>
        <table>
            <tr>
                <th>Material</th>
                <th>Formula</th>
                <th>Total</th>
            </tr>
            @foreach ($cotizacion->detalles as $detalle)
            <tr>
                <td>{{$detalle->material}}</td>
                <td>{{$detalle->formula}}</td>
                <td>${{number_format($detalle->total, 2)}}</td>
            </tr>
            @endforeach
        </table>
        
        <h2>Usuario</h2>
        <p>Nombre: {{$cotizacion->user->name}}</p>
        <p>Email: {{$cotizacion->user->email}}</p>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</body>
</html>
