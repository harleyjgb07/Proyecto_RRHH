<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractExtension;
use App\Models\Contract;

class ContractExtensionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'extension_type' => 'required|in:Tiempo,Valor,Ambos',
            'new_end_date' => 'nullable|date',
            'additional_value' => 'nullable|numeric',
            'description' => 'nullable|string'
        ]);

        $contract = Contract::findOrFail($data['contract_id']);

        // Validar que el contrato no esté finalizado
        if ($contract->status === 'Finalizado' || $contract->status === 'Terminado') {
            return response()->json([
                'message' => 'No se puede agregar una prórroga a un contrato finalizado'
            ], 422);
        }

        // Crear la prórroga
        $extension = ContractExtension::create($data);

        // Si la prórroga es de tiempo o ambos actualizar la fecha
        if ($data['extension_type'] === 'Tiempo' || $data['extension_type'] === 'Ambos') {
            if (!empty($data['new_end_date'])) {
                $contract->end_date = $data['new_end_date'];
                $contract->save();
            }
        }

        return response()->json($extension, 201);
    }
}