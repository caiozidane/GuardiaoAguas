<?php

namespace App\Http\Controllers;

use App\Providers\HttpGuardiaoAguas;

class Municipio extends Controller
{

    public function show()
    {
        $httpGuardiao = new HttpGuardiaoAguas(env('ALPHA_GUARDIAO_AGUAS_EMAIL'), env('ALPHA_GUARDIAO_AGUAS_SENHA'));

        $municipios = $httpGuardiao->buscarMunicipios(null);

        $codigosIBGE = $httpGuardiao->codigosIbgeNascentes(null);

        // dd($municipios[0]->codigo_ibge);
        return view('iframemap', ['municipios' => $municipios, 'codigosIBGE' => $codigosIBGE]);
    }
}
