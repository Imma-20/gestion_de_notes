<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UnitesEnseignement;

class UnitesEnseignementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ues = UnitesEnseignement::paginate(10);
        return view('unitesenseignement.index', compact('ues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unitesenseignement.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {


        $validated = $request->validate([
            'code' => 'required|unique:unites_enseignement,code|max:10',
            'nom' => 'required|max:255',
            'credit' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6'
        ], [
            'code.required' => 'Le code de l\'UE est obligatoire.',
            'code.unique' => 'Ce code d\'UE existe déjà.',
            'nom.required' => 'Le nom de l\'UE est obligatoire.',
            'credit.required' => 'Le nombre de crédits est requis.',
            'credit.integer' => 'Le nombre de crédits doit être un entier.',
            'semestre.required' => 'Le semestre est requis.',
            'semestre.min' => 'Le semestre doit être entre 1 et 6.',
            'semestre.max' => 'Le semestre doit être entre 1 et 6.',

        ]);

        $ue = UnitesEnseignement::create([
            'code' => $validated['code'],
            'nom' => $validated['nom'],
            'credits_ects' => $validated['credit'],
            'semestre' => $validated['semestre'],
        ]);
        return redirect()->route('unites-enseignement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ue = UnitesEnseignement::findOrFail($id);
        return view('unitesenseignement.edit', compact('ue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:4|unique:unites_enseignement,code,' . $id,
            'nom' => 'required|max:255',
            'credit' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6'
        ], [
            'code.required' => 'Le code de l\'UE est obligatoire.',
            'code.unique' => 'Ce code d\'UE existe déjà.',
            'nom.required' => 'Le nom de l\'UE est obligatoire.',
            'credit.required' => 'Le nombre de crédits est requis.',
            'credit.integer' => 'Le nombre de crédits doit être un entier.',
            'semestre.required' => 'Le semestre est requis.',
            'semestre.min' => 'Le semestre doit être entre 1 et 6.',
            'semestre.max' => 'Le semestre doit être entre 1 et 6.',
        ]);

        $ue = UnitesEnseignement::findOrFail($id);

        $ue->update([
            'code' => $validated['code'],
            'nom' => $validated['nom'],
            'credits_ects' => $validated['credit'],
            'semestre' => $validated['semestre'],
        ]);

        return redirect()->route('unites-enseignement.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ue = UnitesEnseignement::findOrFail($id);
        $ue->delete();
        return redirect()->route('unites-enseignement.index');
    }
}
