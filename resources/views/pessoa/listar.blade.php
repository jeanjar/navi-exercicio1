@extends('layout')

@section('content')
    <h1 class="page-header">Lista de Pessoas</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @if($pessoas->count() > 0)
                    @foreach($pessoas as $pessoa)
                        <tr>
                            <td>{{ $pessoa->id }}</td>
                            <td>{{ $pessoa->nome }}</td>
                            <td>{{ $pessoa->endereco_completo }}</td>
                            <td>{{ $pessoa->email }}</td>
                            <td>
                                <a href="{{ url('pessoas/excluir', ['id' => $pessoa->id]) }}"><i class="glyphicon glyphicon-trash"></i></a>
                                <a href="{{ url('pessoas/editar', ['id' => $pessoa->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Nenhum registro encontrado</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection