<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarroController extends Controller
{
    public function listarTodos()
    {
        $carros = Carro::all();
        return response()->json([
            'status' => true,
            'message' => 'Busca dos carros realizada com sucesso',
            'data' => $carros
        ], 200);
    }

    public function listarPeloId($id)
    {
        $carros = Carro::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Carro encontrado com sucesso',
            'data' => $carros
        ], 200);
    }

    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'placa' => 'required|string|max:10',
            'quilometragem' => 'required|numeric',
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $carros = Carro::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Carro criado com sucesso',
            'data' => $carros
        ], 201);
    }

    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'placa' => 'required|string|max:10',
            'quilometragem' => 'required|numeric',
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $carros = Carro::findOrFail($id);
        $carros->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Epecificacoes do carro alteradas',
            'data' => $carros
        ], 200);
    }

    public function remover($id)
    {
        $carros = Carro::findOrFail($id);
        $carros->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Carro deletado com sucesso'
        ], 204);
    }
}
