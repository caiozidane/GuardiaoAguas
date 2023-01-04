<?php

namespace App\Http\Controllers;

use App\Providers\HttpGuardiaoAguas;

class Municipio extends Controller
{

    public function show()
    {
        $httpGuardiao = new HttpGuardiaoAguas(env('ALPHA_GUARDIAO_AGUAS_EMAIL'), env('ALPHA_GUARDIAO_AGUAS_SENHA'));

        $municipios = $httpGuardiao->buscarMunicipios(null);

        return view('municipio', ['municipios' => $municipios]);
    }
}
