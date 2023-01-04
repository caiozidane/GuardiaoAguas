<?php

namespace App\Http\Controllers;

use App\Models\ValidarCPF;

class Teste extends Controller
{
    public function testShow()
    {
        $cpf = new ValidarCPF();
        var_dump($cpf->validate('06160071165'));
    }
}
