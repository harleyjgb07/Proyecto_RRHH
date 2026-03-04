<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function index()
    {
        return Collaborator::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|max:10',
            'document_number' => 'required|string|max:20|unique:collaborators',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:collaborators',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        Collaborator::create($validatedData);

        return redirect()->route('dashboard')
            ->with('success', 'Collaborator created successfully.');
    }

    public function update(Request $request, Collaborator $collaborator)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|max:10',
            'document_number' => 'required|string|max:20|unique:collaborators,document_number,' . $collaborator->id,
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:collaborators,email,' . $collaborator->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $collaborator->update($validatedData);

        return redirect()->route('dashboard')
            ->with('success', 'Collaborator updated successfully.');
    }
    

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}