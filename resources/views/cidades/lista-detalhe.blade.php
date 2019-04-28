@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <h2 class="mb-3 mt-3">Detalhes</h2>

        <h3 class="mb-3">{{ $dados['city']['name'] }}, {{ $dados['city']['country'] }}</h3>

        <div class="card-group">
            @foreach ($dados['list'] as $clima)
                <div class="card border-dark">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ date('d/m/Y', $clima['dt']) }}</h5>

                        <p class="card-text">
                            <ul class="list-unstyled">
                                <li>
                                    <h4>
                                        <img src="{{ $dados['imagem_url'] . $clima['weather'][0]['icon'] }}.png" alt="">
                                        {{ floor($clima['temp']['day']) }}º C
                                    </h4>
                                </li>
                                <li>Mínima: {{ floor($clima['temp']['min']) }}º C</li>
                                <li>Máxima: {{ floor($clima['temp']['max']) }}º C</li>
                            </ul>
                        </p>

                        <p class="card-text">
                            <small class="text-muted">
                                <ul class="list-unstyled">
                                    <li>Previsão: {{ $clima['weather'][0]['description'] }}</li>
                                    <li>Nuvens: {{ $clima['clouds'] }}%</li>

                                    @if (isset($clima['rain']))
                                        <li>Precipitação: {{ $clima['rain'] }}mm</li>
                                    @endif
                                </ul>
                            </small>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="/" class="btn btn-outline-primary mt-3">Voltar</a>
    </div>
@endsection