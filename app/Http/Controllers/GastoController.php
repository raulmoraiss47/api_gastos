<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::all();

        return response()->json([
            'message' => 'Gastos',
            'gastos' => $gastos,
        ], 201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|numeric',
            'date_gasto' => 'required|date',
        ]);

        $gasto = Gasto::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value,
            'date_gasto' => $request->date_gasto,
        ]);

        return response()->json([
            'message' => 'Gasto criado com sucesso',
            'gasto' => $gasto,
        ], 201);
    }

    public function show(Gasto $gasto)
    {
        //
    }

    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    public function destroy(Gasto $gasto)
    {
        //
    }
}
