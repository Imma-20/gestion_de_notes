@extends('layout.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <form action="{{ route('notes.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label for="etudiant_id" class="block text-sm font-semibold text-gray-700">Sélectionner un Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="w-full p-2 border border-gray-300 rounded-md">
                @foreach($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}">{{ $etudiant->numero_etudiant }} - {{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="ec_id" class="block text-sm font-semibold text-gray-700">Sélectionner un EC</label>
            <select name="ec_id" id="ec_id" class="w-full p-2 border border-gray-300 rounded-md">
                @foreach($ecs as $ec)
                    <option value="{{ $ec->id }}">{{ $ec->code }} - {{ $ec->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="note" class="block text-sm font-semibold text-gray-700">Note</label>
            <input type="number" name="note" id="note" min="0" max="20" step="0.25" class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div>
            <label for="session" class="block text-sm font-semibold text-gray-700">Session</label>
            <select name="session" id="session" class="w-full p-2 border border-gray-300 rounded-md">
                <option value="normale">Session Normale</option>
                <option value="rattrapage">Rattrapage</option>
            </select>
        </div>

        <button type="submit" class="w-full mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Enregistrer</button>
    </form>
</div>
@endsection