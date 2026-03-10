<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\ContractTermination;

class ContractTerminationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'termination_reason' => 'required|string',
            'termination_date' => 'required|date'
        ]);

        $contract = Contract::findOrFail($data['contract_id']);


        if ($contract->status === 'Terminado' || $contract->status === 'Finalizado') {
            return response()->json([
                'message' => 'El contrato no es elegible para terminación anticipada'
            ], 422);
        }

        $termination = ContractTermination::create($data);


        $contract->status = 'Terminado';
        $contract->save();

        return response()->json($termination, 201);
    }

    
}