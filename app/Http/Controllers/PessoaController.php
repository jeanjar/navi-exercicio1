<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
