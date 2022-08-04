<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function store(Request $request)
    {       
        $ano = $request->ano;
        $name = $request->name;
        $email = $request->email;
        $telefone = $request->telefone;
        $nome_da_empresa = $request->nome_da_empresa;
        $localidade = $request->localidade;
        $funcao = $request->funcao;
        $descricao_funcao = $request->descricao_funcao;
        $inicio_mes = $request->inicio_mes;
        $inicio_ano = $request->inicio_ano;
        $termino_mes = $request->termino_mes;
        $termino_ano = $request->termino_ano;
        $usuario = $request->usuario;
        $senha = $request->senha;

        DB::table('candidatos')
            ->insert([
                'ano' => $ano,
                'name' => $name,
                'email' => $email,
                'telefone' => $telefone,
                'nome_da_empresa' => $nome_da_empresa,
                'localidade' => $localidade,
                'funcao' => $funcao,
                'descricao_funcao' => $descricao_funcao,
                'inicio_mes' => $inicio_mes,
                'inicio_ano' => $inicio_ano,
                'termino_mes' => $termino_mes,
                'termino_ano' => $termino_ano,
                'usuario' => $usuario,
                'senha' => $senha
            ]);
        
        return view('teste-index');
            
    }

    public function show(Request $request)
    {
        $registro = $request->query('registro');

        $candidatos = DB::table('candidatos')
            ->select('*')
            ->where('ano', $registro)
            ->get();

        return response()->json(['candidatos' => $candidatos]);
    } 
    
    public function modalEditar(Request $request)
    {
        $id = $request->query('id');

        $edicao = DB::table('candidatos')
            ->select('*')
            ->where('id', $id)
            ->get();

        return response()->json(['edicao' => $edicao]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $nome = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;

        DB::table('candidatos')            
            ->where('id', $id)
            ->update([
                'name' => $nome,
                'email' => $email,
                'telefone' => $telefone
            ]);

        $edicao = DB::table('candidatos')
            ->select('*')
            ->get();

        return response()->json(['edicao' => $edicao]);
    }
    
    public function destroy(Request $request)    
    {
        $id = $request->query('id');    

        
        DB::table('candidatos')
            ->select('*')
            ->where('id', $id)
            ->delete();
        
        $consultaBd = DB::table('candidatos')
        ->select('*')
        ->get();

        return response()->json(['consultaBd' => $consultaBd]);
    }
}
