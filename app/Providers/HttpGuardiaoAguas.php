<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isNull;

class HttpGuardiaoAguas extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public string $email;
    public string $senha;

    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    private function autenticar()
    {
        $baseUrl = env('ALPHA_GUARDIAO_AGUAS_BASE_URL');
        $uri = env('ALPHA_GUARDIAO_AGUAS_URI_ATHE');
        $endereco = $baseUrl . $uri;

        $response_token = Http::accept('application/json')->post($endereco, [
            "email" => $this->email,
            "senha" => $this->senha
        ]);

        $dados = json_decode($response_token->body());
        $token = $dados->token;
        return $token;
    }

    public function buscarMunicipios(?string $cdIBGEouNomeMunicipio)
    {
        // $uri = '';
        if (isNull($cdIBGEouNomeMunicipio)) {
            $uri = env('ALPHA_GUARDIAO_AGUAS_URI_MUNICIPIO') . "?Id=" . $cdIBGEouNomeMunicipio;
        } else {
            $uri = env('ALPHA_GUARDIAO_AGUAS_URI_MUNICIPIO');
        }

        $baseUrl = env('ALPHA_GUARDIAO_AGUAS_BASE_URL');
        $endereco = $baseUrl . $uri;

        $token =  $this->autenticar();
        $response_municipios = Http::withToken($token)->get($endereco);
        $municipios = json_decode($response_municipios->body());


        return $municipios;
    }


    public function codigosIbgeNascentes(?string $cdIBGEouNomeMunicipio)
    {
        // $uri = '';
        if (isNull($cdIBGEouNomeMunicipio)) {
            $uri = env('ALPHA_GUARDIAO_AGUAS_URI_MUNICIPIO') . "?Id=" . $cdIBGEouNomeMunicipio;
        } else {
            $uri = env('ALPHA_GUARDIAO_AGUAS_URI_MUNICIPIO');
        }

        $baseUrl = env('ALPHA_GUARDIAO_AGUAS_BASE_URL');
        $endereco = $baseUrl . $uri;

        $token =  $this->autenticar();
        $response_municipios = Http::withToken($token)->get($endereco);
        $municipios = json_decode($response_municipios->body());


        foreach ($municipios as $municipio) {
            $cdIbge =  $municipio->codigo_ibge;
            // var_dump($cdIbge);
        }


        return $cdIbge;
    }
}
