<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Elements_Constitutifs;
use App\Models\UnitesEnseignement;

class ElementsConstitutifsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecs = Elements_Constitutifs::paginate(10);
        return view('elementsconstitutifs.index', compact('ecs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ues = UnitesEnseignement::all();
        return view('elementsconstitutifs.create', compact('ues'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:elements_constitutifs,code|max:10',
            'nom' => 'required|max:255',
            'coefficient' => 'required|integer',
            'ue_id' => 'required',
        ], [
            'code.required' => 'Le code de l\'élément constitutif (EC) est obligatoire.',
            'code.unique' => 'Ce code d\'élément constitutif (EC) existe déjà.',
            'code.max' => 'Le code de l\'élément constitutif (EC) ne peut pas dépasser 10 caractères.',
            'nom.required' => 'Le nom de l\'élément constitutif (EC) est obligatoire.',
            'nom.max' => 'Le nom de l\'élément constitutif (EC) ne peut pas dépasser 255 caractères.',
            'coefficient.required' => 'Le coefficient de l\'élément constitutif (EC) est requis.',
            'coefficient.integer' => 'Le coefficient de l\'élément constitutif (EC) doit être un entier.',
            'ue_id.required' => 'L\'unité d\'enseignement (UE) est requise pour cet élément constitutif (EC).',
        ]);

        $ue = Elements_Constitutifs::create([
            'code' => $validated['code'],
            'nom' => $validated['nom'],
            'coefficient' => $validated['coefficient'],
            'ue_id' => $validated['ue_id'],
        ]);
        return redirect()->route('elements-constitutifs.index');
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
        $ec = Elements_Constitutifs::findOrFail($id);
        $ues = UnitesEnseignement::all();
        return view('elementsconstitutifs.edit', compact('ec', 'ues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:4|unique:elements_constitutifs,code,' . $id,
            'nom' => 'required|max:255',
            'coefficient' => 'required|integer|min:1',
            'ue_id' => 'required',
        ], [
            'code.required' => 'Le code de l\'élément constitutif (EC) est obligatoire.',
            'code.string' => 'Le code de l\'élément constitutif (EC) doit être une chaîne de caractères.',
            'code.max' => 'Le code de l\'élément constitutif (EC) ne peut pas dépasser 4 caractères.',
            'code.unique' => 'Ce code d\'élément constitutif (EC) existe déjà.',
            'nom.required' => 'Le nom de l\'élément constitutif (EC) est obligatoire.',
            'nom.max' => 'Le nom de l\'élément constitutif (EC) ne peut pas dépasser 255 caractères.',
            'coefficient.required' => 'Le coefficient de l\'élément constitutif (EC) est requis.',
            'coefficient.integer' => 'Le coefficient de l\'élément constitutif (EC) doit être un nombre entier.',
            'coefficient.min' => 'Le coefficient de l\'élément constitutif (EC) doit être supérieur ou égal à 1.',
            'ue_id.required' => 'L\'unité d\'enseignement (UE) est requise pour cet élément constitutif (EC).',
        ]);
        $ue = Elements_Constitutifs::findOrFail($id);
        $ue->update([
            'code' => $validated['code'],
            'nom' => $validated['nom'],
            'coefficient' => $validated['coefficient'],
            'ue_id' => $validated['ue_id'],
        ]);

        return redirect()->route('elements-constitutifs.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ue = Elements_Constitutifs::findOrFail($id);
        $ue->delete();
        return redirect()->route('elements-constitutifs.index');
    }
}
