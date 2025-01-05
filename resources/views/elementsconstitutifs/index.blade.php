@extends('layout.app')
@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-3xl font-bold leading-tight text-gray-800">Liste des Éléments Constitutifs</h2>
                <div class="my-6">
                    <a href="{{ route('elements-constitutifs.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg shadow-md transition duration-200">
                        Ajouter un élément
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Code</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Nom</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Coefficient</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">UE</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ecs as $ec)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $ec->code }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $ec->nom }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $ec->coefficient }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $ec->uniteEnseignement->nom }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-4">
                                        <!-- Modifier -->
                                        <a href="{{ route('elements-constitutifs.edit', $ec->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232a1.5 1.5 0 112.121 2.121L7.121 17.586a1 1 0 01-.707.293H4v-2.414a1 1 0 01.293-.707l10.939-10.94z" />
                                            </svg>
                                        </a>
                                        <!-- Supprimer -->
                                        <form action="{{ route('elements-constitutifs.destroy', $ec->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="bg-gray-100 px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $ecs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
