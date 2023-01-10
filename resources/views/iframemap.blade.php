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
            <p id="detalhes">
            <h1>Dados do munipio</h1>
            <h2 id="idmunipio"></h2>
            </p>
        </div>
    </div>

</body>

@php
    $municipios2 = $municipios;
@endphp

<script>
    var municipios = {{ Js::from($municipios2) }}

    for (i = 0; i < municipios.length; i++) {
        mun = municipios[i].codigo_ibge
        mun = 'MT-' + mun
        if (document.getElementById(mun) != null) {
            document.getElementById(mun).style.fill = '#01a18e'
        }
    }

    const switchModal = () => {
        const modal = document.querySelector('.modal')
        const actualStyle = modal.style.display
        let id = event.target.id

        if (actualStyle == 'block') {
            modal.style.display = 'none'
        } else {
            modal.style.display = 'block'
            modal.style.color = '#00000'
            document.getElementById("idmunipio").innerHTML = mun[i]
        }
    }

    const btn = document.querySelector('#svg2').addEventListener('click', switchModal);

    window.onclick = function(event) {
        const modal = document.querySelector('.modal');
        if (event.target == modal) {
            switchModal()
        }
    }
</script>

</html>
