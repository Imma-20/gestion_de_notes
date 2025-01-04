<!-- Exemple de structure pour la liste des UEs -->
@extends('layout.app')
@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Liste des Unités d'Enseignement</h2>
                <div class=" my-6"><a href="{{ route('unites-enseignement.create') }}"
                        class="bg-blue-500 rounded-full border-none px-4 py-2 text-white">AJOUTER</a></div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Code UE
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    ECTS
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Semestre
                                </th>

                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100">
                                    ACTIONS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ues as $ue)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $ue->code }}
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $ue->nom }}
                                    </td>


                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $ue->credits_ects }}

                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                        {{ $ue->semestre }}
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center justify-end space-x-4">
                                            <!-- Bouton Modifier -->
                                            <a href="{{ route('unites-enseignement.edit', $ue->id) }}">
                                                <button type="button" class="text-gray-500 hover:text-gray-700 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen">
                                                        <path
                                                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                    </svg>
                                                </button>
                                            </a>
                                    
                                            <!-- Bouton Supprimer -->
                                            <form action="{{ route('unites-enseignement.destroy', $ue->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-500 hover:text-red-600 transition-colors"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette unité ?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                                        <path d="M3 6h18" />
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                        <line x1="10" x2="10" y1="11" y2="17" />
                                                        <line x1="14" x2="14" y1="11" y2="17" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
                {{ $ues->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
