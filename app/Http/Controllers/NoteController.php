<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Elements_Constitutifs;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function create()
  {
      $ecs = Elements_Constitutifs::all();
      $etudiants = Etudiant::all();
      return view('notes.create', compact('ecs', 'etudiants'));
  }

  public function store(Request $request)
  {
      $request->validate([
          'etudiant_id' => 'required|exists:etudiants,id',
          'ec_id' => 'required|exists:elements_constitutifs,id',
          'note' => 'required|numeric|min:0|max:20',
          'session' => 'required|in:normale,rattrapage',
          'date_evaluation' => 'required|date',
      ]);
      Note::create([
        'etudiant_id' => $request->etudiant_id,
        'ec_id' => $request->ec_id,
        'note' => $request->note,
        'session' => $request->session,
      ]);
      return redirect()->route('notes.create')->with('success', 'Note bien enregistrée');
  }

  public function calculerMoyenne($etudiant_id, $ec_id)
  {
    $notes = Note::where('etudiant_id', $etudiant_id)
                  ->where('ec_id', $ec_id)
                  ->get();
    $moyenne = $notes->avg('note');
    return view('notes.moyenne', compact('moyenne', 'notes'));
  }
}