@extends('layout.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Modification des Unités d'Enseignement</h2>
                <div class=" my-6"><a href="{{ route('unites-enseignement.index') }}"
                        class="bg-blue-500 rounded-full border-none px-4 py-2 text-white">LISTE UEs</a></div>
            </div>
            <div class="w-full">
                <div class="bg-white p-10 rounded-lg">
                    <form action="{{ route('unites-enseignement.update', $ue->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                            <!-- Code -->
                            <div class="mb-5">
                                <label for="code" class="block mb-2 font-bold text-gray-600">Code</label>
                                <input type="text" id="code" name="code" value="{{ old('code', $ue->code) }}"
                                    placeholder="Mettez votre code"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                @error('code')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nom -->
                            <div class="mb-5">
                                <label for="nom" class="block mb-2 font-bold text-gray-600">Nom</label>
                                <input type="text" id="nom" name="nom" value="{{ old('nom', $ue->nom) }}"
                                    placeholder="Mettez votre nom"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                @error('nom')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Crédit -->
                            <div class="mb-5">
                                <label for="credit" class="block mb-2 font-bold text-gray-600">Crédit</label>
                                <input type="number" id="credit" name="credit"
                                    value="{{ old('credit', $ue->credits_ects) }}" placeholder="Mettez vos credits"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                @error('credit')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Semestre -->
                            <div class="mb-5">
                                <label for="semestre" class="block mb-2 font-bold text-gray-600">Semestre</label>
                                <select id="semestre" name="semestre"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-2">
                                    <option value="" disabled>Choisissez un semestre</option>
                                    <option value="1" {{ old('semestre', $ue->semestre) == 1 ? 'selected' : '' }}>
                                        Semestre 1</option>
                                    <option value="2" {{ old('semestre', $ue->semestre) == 2 ? 'selected' : '' }}>
                                        Semestre 2</option>
                                    <option value="3" {{ old('semestre', $ue->semestre) == 3 ? 'selected' : '' }}>
                                        Semestre 3</option>
                                    <option value="4" {{ old('semestre', $ue->semestre) == 4 ? 'selected' : '' }}>
                                        Semestre 4</option>
                                    <option value="5" {{ old('semestre', $ue->semestre) == 5 ? 'selected' : '' }}>
                                        Semestre 5</option>
                                    <option value="6" {{ old('semestre', $ue->semestre) == 6 ? 'selected' : '' }}>
                                        Semestre 6</option>
                                </select>
                                @error('semestre')
                                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>

                        <button type="submit"
                            class="block w-full bg-blue-500 text-white font-bold p-3 rounded-lg mt-2">METTRE À JOUR</button>
                    </form>
                </div>
            </div>

        </div>
    @endsection
