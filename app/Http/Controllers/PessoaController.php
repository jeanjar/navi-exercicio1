<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;

use Exception;

class PessoaController extends Controller
{
    public function listar(Request $request)
    {
        return view('pessoa.listar', ['pessoas' => Pessoa::all()]);
    }

    public function cadastrar(Request $request)
    {
        return view('pessoa.cadastrar');
    }

    public function processarCadastro(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|max:100',
            'endereco_completo' => 'required',
            'email' => 'required|email|unique:pessoa'
        ]);

        try
        {

            $pessoa = new Pessoa;
            $pessoa->nome = $request->get('nome');
            $pessoa->endereco_completo = $request->get('endereco_completo');
            $pessoa->email = $request->get('email');
            $pessoa->save();

            return redirect('pessoas/listar')->with('success', 'Cadastro realizado com sucesso');
        }
        catch(Exception $ex)
        {
            return redirect('pessoas/cadastrar')->withInput($request->all());
        }
    }

    public function editar(Request $request, $id)
    {
        try
        {
            return view('pessoa.editar', ['pessoa' => Pessoa::findOrFail($id)]);
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect('pessoas/listar')->withErrors(['Pessoa não encontrada']);
        }
    }

    public function processarEdicao(Request $request, $id)
    {

        $this->validate($request, [
            'nome' => 'required|max:100',
            'endereco_completo' => 'required',
            'email' => 'required|email'
        ]);

        try
        {
            $pessoa = Pessoa::findorFail($id);
            $pessoa->nome = $request->get('nome');
            $pessoa->endereco_completo = $request->get('endereco_completo');
            $pessoa->email = $request->get('email');
            $pessoa->save();
            return redirect('pessoas/listar')->with('success', 'Pessoa editada com sucesso');
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect('pessoas/listar')->withErrors(['Pessoa não encontrada']);
        }
        catch(QueryException $ex)
        {
            $erro = 'Dados inválidos';
            if(preg_match('/unique/', $ex->getMessage()))
            {
                $erro = 'Este email já está em uso';
            }

            return redirect('pessoas/listar')->withErrors([$erro]);
        }
    }

    public function excluir(Request $request, $id)
    {
        try
        {
            return view('pessoa.excluir', ['pessoa' => Pessoa::findOrFail($id)])->withErrors(['Esta operação é definitiva']);
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect('pessoas/listar')->withErrors(['Pessoa não encontrada']);
        }
    }

    public function processarExclusao(Request $request, $id)
    {
        try
        {
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->delete();
            return redirect('pessoas/listar')->with('success', 'Pessoa excluída com sucesso');
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect('pessoas/listar')->withErrors(['Pessoa não encontrada']);
        }
    }
}
