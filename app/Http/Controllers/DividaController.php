<?php

namespace App\Http\Controllers;

use App\Models\Divida;
use App\Models\Parcela;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DividaController extends Controller
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'value' => 'required|numeric',
            'date_compra' => 'required|date',
            'a_vista' => 'required|boolean',
            'parcelado' => 'required|boolean',
            'qtd_parcelas' => 'required_if:parcelado,true|integer|min:1',
        ]);

        // Crie uma nova compra com base nos dados recebidos
        $divida = Divida::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'value' => $request->value,
            'description' => $request->input('description', ''), // Campo opcional
            'date_compra' => $request->date_compra,
            'a_vista' => $request->a_vista,
            'parcelado' => $request->parcelado,
            'qtd_parcelas' => $request->input('qtd_parcelas', null), // Deixe nulo se não for parcelado
        ]);

        // Se a compra for parcelada, você pode adicionar lógica para criar as parcelas
        if ($request->parcelado && $request->qtd_parcelas > 1) {
            $this->criarParcelas($divida);
        }

        return response()->json([
            'message' => 'Compra criada com sucesso',
            'divida' => $divida,
        ], 201);
    }

    protected function criarParcelas(Divida $divida)
    {
        // Adicione lógica para criar as parcelas com base na quantidade de parcelas
        if ($divida->parcelado && $divida->qtd_parcelas > 1) {
            $valorParcela = $divida->value / $divida->qtd_parcelas;

            $valorParcelaFormatado = number_format($valorParcela, 2, '.', '');
    
            // Definir a data da primeira parcela como a data da divida
            $dataParcela = Carbon::parse($divida->date_compra);
    
            // Criar as parcelas
            for ($i = 1; $i <= $divida->qtd_parcelas; $i++) {
                // Lógica para criar uma parcela, ajuste conforme necessário
                Parcela::create([
                    'divida_id' => $divida->id,
                    'valor' => $valorParcelaFormatado,
                    'data_vencimento' => $dataParcela,
                ]);
    
                // Avance para o próximo mês para a próxima parcela
                $dataParcela->addMonth();
            }
    }
    }

    public function show(Divida $divida)
    {
        //
    }

    public function edit(Divida $divida)
    {
        //
    }

    public function update(Request $request, Divida $divida)
    {
        //
    }

    public function destroy(Divida $divida)
    {
        //
    }
}
