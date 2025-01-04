<!-- Exemple de structure pour la liste des ECs -->
@extends('layout.app')
@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Création des Elements Constitutifs</h2>
                <div class=" my-6"><a href="{{ route('elements-constitutifs.index') }}"
                        class="bg-blue-500 rounded-full border-none px-4 py-2 text-white">LISTE ECs </a></div>
            </div>
            <div class="w-full">
                <div class="bg-white p-10 rounded-lg">
                    <form action="{{ route('elements-constitutifs.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                            <!-- Code -->
                            <div class="mb-5">
                                <label for="code" class="block mb-2 font-bold text-gray-600">Code</label>
                                <input type="text" id="code" name="code" placeholder="Mettez le code"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                @error('code')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nom -->
                            <div class="mb-5">
                                <label for="nom" class="block mb-2 font-bold text-gray-600">Nom</label>
                                <input type="text" id="nom" name="nom" placeholder="Mettez votre nom"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                @error('nom')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Coefficient -->
                            <div class="mb-5">
                                <label for="coefficient" class="block mb-2 font-bold text-gray-600">Coefficient</label>
                                <input type="number" id="coefficient" name="coefficient" placeholder="Mettez votre coefficient"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                @error('coefficient')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- ue_id-->
                            <div class="mb-5">
                                <label for="ue_id" class="block mb-2 font-bold text-gray-600">Unité d'Enseignement (UE)</label>
                                <select id="ue_id" name="ue_id" class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                    <option value="" disabled selected>Sélectionnez une UE</option>
                                    @foreach ($ues as $ue)
                                        <option value="{{ $ue->id }}" {{ old('ue_id') == $ue->id ? 'selected' : '' }}>
                                            {{ $ue->nom }} ({{ $ue->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('ue_id')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            

                        </div>

                        <button type="submit"
                            class="block w-full bg-blue-500 text-white font-bold p-3 rounded-lg mt-2">ENREGISTRER</button>
                    </form>
                </div>
            </div>

        </div>
    @endsection
