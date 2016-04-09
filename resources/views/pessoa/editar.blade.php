@extends('layout')

@section('content')
    <h1 class="page-header">Editar Pessoa</h1>

    <form method="post">
        {{ csrf_field() }}
        <input name="id" type="hidden" value="{{ $pessoa->id }}">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="{{ $pessoa->nome }}">
        </div>
        <div class="form-group">
            <label for="endereco_completo">Endereço Completo</label>
            <input type="text" class="form-control" id="endereco_completo" placeholder="Endereço Completo" name="endereco_completo" value="{{ $pessoa->endereco_completo }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="endereco_completo" placeholder="email" name="email" value="{{ $pessoa->email }}">
        </div>
        <div class="form-group">
            <a href="{{ url('pessoas/listar') }}" class="btn btn-danger pull-left">Cancelar</a>
            <button type="submit" class="btn btn-info pull-right">Editar</button>
        </div>
    </form>

@endsection