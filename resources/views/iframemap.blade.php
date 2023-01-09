<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa SGV</title>
</head>
<style>
    .container {
        width: 600px;
        height: 400;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal .content {
        background-color: #D3D3D3;
        margin: 15% auto;
        padding: 15px;
        border-radius: 3px;
        width: 70%;

        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<body>
    <div class="container">
        <div class="map">
            @include('mapa-svg')
        </div>
    </div>

    <div class="modal">
        <div class="content">
            <h1>clicou aqui</h1>
        </div>
    </div>


    <h2>todos municipios com nascentes cadastradas</h2>
    <div>
        @if ($municipios)
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
        @endif

    </div>
</body>


@php
    $municipios2 = json_encode($municipios);
@endphp


<script type="text/javascript">
    (function(win, doc) {
        'use strict';

        var municipios;
        municipios = <?php echo $municipios2; ?>;

        for (i = 0, i < municipios.length; i++) {
            mun = municipios[i].codigo_ibge;
            console.log(mun);
            cdibge[i] = '#MT-' + mun;
            console.log(cdibge[i]);

        }

    })(window, document);
</script>



</html>
