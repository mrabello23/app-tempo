<?php

namespace App\Http\Controllers;

use App\Models\Cidades;
use App\Domains\CidadesDomain;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidades::all();
        return view('cidades.lista', ['cidades' => $cidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $erro = null;

        try {
            $req = $request->only(['cidade']);

            $regra = new CidadesDomain;
            $cidadeValidada = $regra->validaCidade($req['cidade']);

            Cidades::create([
                'nome' => $cidadeValidada['name'],
                'id_api' => $cidadeValidada['id']
            ]);
        } catch (\Exception $e) {
            $erro = $e->getMessage();
        }

        return view('cidades.lista', ['cidades' => Cidades::all(), 'erro' => $erro]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {
        $erro = null;

        try {
            $cidade = Cidades::findOrFail($id);

            $regra = new CidadesDomain;
            $dadosApi = $regra->buscaApi($cidade->id_api, 5);

            if ($dadosApi) {
                $dadosApi = json_decode($dadosApi, true);
            }

            $dadosApi['imagem_url'] = env('IMAGE_URL');
        } catch (\Exception $e) {
            $erro = $e->getMessage();
        }

        return view('cidades.lista-detalhe', ['dados' => $dadosApi, 'erro' => $erro]);
    }
}
