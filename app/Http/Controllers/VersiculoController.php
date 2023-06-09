<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Versiculo::create($request->all())){
            return response()->json([
                'message' => 'Versiculo Cadastrado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao Cadastrar Versiculo'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $versiculo)
    {
        $Versiculo = Versiculo::find($versiculo);
        if ($versiculo){
            return $versiculo;
        }
        return response()->json([
            'message' => 'Erro ao Pesquisar o Versiculo'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $versiculo)
    {
        $Versiculo = Versiculo::find($versiculo);

        if ($versiculo){

        $Versiculo->update($request->all());

        return $versiculo;
        }
        return response()->json([
            'message' => 'Erro ao atualizar o Versiculo'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $versiculo)
    {
        if (Versiculo::destroy($versiculo)){
            return response()->json([
                'message' => 'Versiculo Deletado com sucesso'
            ], 201);
        };
        return response()->json([
            'message' => 'Erro ao deletar o Versiculo'
        ], 404);
    }
}
