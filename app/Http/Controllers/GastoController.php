<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        // Cria um novo gasto com base nos dados recebidos
        $gasto = Gasto::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value,
            'date_gasto' => $request->date_gasto,
        ]);

        // Retorna a resposta adequada (pode ser ajustado conforme necessário)
        return response()->json([
            'message' => 'Gasto criado com sucesso',
            'gasto' => $gasto,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        //
    }
}
