<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domains\CidadesDomain;

class CidadesTest extends TestCase
{
    public function test_parse_json_file()
    {
        $regra = new CidadesDomain;

        // CIDADE LOCALIZADA
        $cidadeValidada = $regra->validaCidade('São Paulo', env('APP_URL') . 'city.list.json');
        $this->assertNotNull($cidadeValidada);

        // CIDADE NAO LOCALIZADA
        $cidadeValidada = $regra->validaCidade('isadhi3ushf5iushfdsi7uh', env('APP_URL') . 'city.list.json');
        $this->expectException(InvalidArgumentException::class);
        $this->expectedExceptionMessage('Cidade nao localizada na API');
    }

    public function test_call_weather_api()
    {
        $regra = new CidadesDomain;
        $dadosApi = $regra->buscaApi(3448439, 5);

        $this->assertNotNull($dadosApi);
        $this->assertArrayHasKey('city', json_decode($dadosApi, true));
    }
}
