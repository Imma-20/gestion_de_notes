@extends('layout.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
        
        <!-- Card for UE -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800">Unité d'Enseignement (UE)</h3>
                <p class="text-gray-600 mt-2">Gérez vos unités d'enseignement avec efficacité. Créez et administrez les UEs selon vos besoins.</p>
                <a href="{{ route('unites-enseignement.index') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">Voir les UE</a>
            </div>
        </div>

        <!-- Card for EC -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800">Élément Constitutif (EC)</h3>
                <p class="text-gray-600 mt-2">Organisez et gérez vos éléments constitutifs pour chaque unité d'enseignement de manière fluide.</p>
                <a href="{{ route('elements-constitutifs.index') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">Voir les EC</a>
            </div>
        </div>

    </div>
</div>
@endsection