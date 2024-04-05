<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COTIZACION</title>
</head>
<body>
<div style="text-align: center; background-color: #FDBD01; border-radius: 10px; border: 1px solid #000; margin: -1px 60px;">
    <h1 style="color: #1F365C;">PUERTAS ELECTRÓNICAS</h1>
    <h3 style="color: #1F365C;">Fabricamos - Automatizamos - Instalamos</h3>
</div>

    <div class="container">

        <p>itagüí, {{ \Carbon\Carbon::now()->format('d \d\e F \d\e Y') }}</p>
        <p>Señor: {{ $cotizacion->user->name }}</p>

        <h3>ASUNTO: COTIZACIÓN</h3>

        <p>Cordial saludo,</p>
        <p>Me permito enviar cotización de:</p>
        <p>{{ $cotizacion->producto->nombre }} de medidas: {{ $cotizacion->ancho }} metros de ancho x {{ $cotizacion->alto }} metros de alto. {{ $cotizacion->producto->descripcion }}</p>

        <h3>VALOR TOTAL COTIZACIÓN: ${{ number_format($cotizacion->total, 0) }}</h3>
        <br>

        <h3>CONDICIONES COMERCIALES</h3>
        <ul>
            <li>· Esta cotización tiene una validez de: 8 Días</li>
            <li>· Tiempo de entrega a convenir.</li>
            <li>· Forma de pago: 60 % en el momento de aprobar cotización, 40 % al entregarlas debidamente instaladas y a plena satisfacción.</li>
        </ul>

        <p>Favor consignar en cuenta de ahorros Bancolombia N° 91959714725. Cualquier Información adicional, estaremos gustosos de atenderle.</p>
        <br><br>
        <p>Atentamente,</p>
        <div class="firma">
            <p>Luis Aníbal Zuleta G. <br> <span>Gerente General</span></p>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .firma {
            font-style: italic;
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
        }

        .firma span {
            font-weight: bold;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3, p {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</body>
</html>
