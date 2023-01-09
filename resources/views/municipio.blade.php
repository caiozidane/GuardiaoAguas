<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipio</title>
</head>

<body>
    <div>

        @foreach ($municipios as $municipio)
            <ol>
                <li>Entidade: {{ $municipio->Entidade }}</li>

                <li>Nascentes Preservadas: {{ $municipio->nascentes_preservada }}</li>
                <li>Percentual de Preservacao: {{ $municipio->perc_nascentes_preservada_municipio }}</li>
                <li>Total Nascentes {{ $municipio->nascentes_municipio }}</li>
                <li>{{ $municipio->perc_nascentes_preservada_estado }}</li>
                <li>{{ $municipio->nascentes_estado }}</li>
                <li>{{ $municipio->area_preservada }}</li>

            </ol>
            <br>
        @endforeach
    </div>
</body>

</html>
