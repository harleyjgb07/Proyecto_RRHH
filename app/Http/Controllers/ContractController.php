<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Collaborator;

class ContractController extends Controller
{
    public function store(Request $request, Collaborator $collaborator)
    {
        $validated = $request->validate([
            'contract_type' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d|after_or_equal:start_date',
            'salary' => 'required|numeric|min:0',
            'status'        => 'required|string',
        ]);

        $collaborator->contracts()->create($validated);

        return redirect()->route('collaborators.contracts.index', $collaborator);
    }

    public function update(Request $request, Collaborator $collaborator, Contract $contract)
    {
        // Seguridad: verificar que el contrato pertenece al colaborador
        if ($contract->collaborator_id !== $collaborator->id) {
            abort(404);
        }

        $validatedData = $request->validate([
            'contract_type' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d|after_or_equal:start_date',
            'salary' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
        ]);

        $contract->update($validatedData);

        return redirect()->route('dashboard')
            ->with('success', 'Contract updated successfully.');
    }
}