@extends('layout')

@section('content')
    <h1 class="page-header">Excluir Pessoa</h1>

    <form method="post">
        {{ csrf_field() }}
        <input name="id" type="hidden" value="{{ $pessoa->id }}">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="{{ $pessoa->nome }}" readonly>
        </div>
        <div class="form-group">
            <label for="endereco_completo">Endereço Completo</label>
            <input type="text" class="form-control" id="endereco_completo" placeholder="Endereço Completo" name="endereco_completo" value="{{ $pessoa->endereco_completo }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="endereco_completo" placeholder="email" name="email" value="{{ $pessoa->email }}" readonly>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger pull-left">Cancelar</button>
            <button type="submit" class="btn btn-info pull-right">Excluir</button>
        </div>
    </form>

@endsection