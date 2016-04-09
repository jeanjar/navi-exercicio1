@extends('layout')

@section('content')
    <h1 class="page-header">Cadastro de Pessoas</h1>

    <form method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="{{ old('nome') }}">
        </div>
        <div class="form-group">
            <label for="endereco_completo">Endereço Completo</label>
            <input type="text" class="form-control" id="endereco_completo" placeholder="Endereço Completo" name="endereco_completo" value="{{ old('endereco_completo') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="endereco_completo" placeholder="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
        </div>
    </form>

@endsection