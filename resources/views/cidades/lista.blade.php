@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <h2 class="mb-3 mt-3">Listagem</h2>

        @if(isset($erro) && !empty($erro))
            <div class="alert alert-danger" role="alert">
                @php
                    print_r($erro);
                    $erro = null;
                @endphp
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Id API</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade['nome'] }}</td>
                        <td>{{ $cidade['id_api'] }}</td>
                        <td><a href="/detalhes/{{ $cidade['id'] }}">Detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
            Cadastrar cidade
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="formCidade" method="POST" action="/salvar">
                        @csrf

                        <div class="form-group">
                            <label for="cidade">Nome da cidade:</label>
                            <input type="text" name="cidade" id="cidade" class="form-control"/>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary btn-sm salvar-cidade">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $('.salvar-cidade').click(function(event) {
                if(document.getElementById('cidade').value == ''){
                    alert('Nome da cidade deve ser preenchido.');
                    return false;
                }

                event.preventDefault();
                $('#formCidade').submit();
            });
        });
    </script>
@endsection