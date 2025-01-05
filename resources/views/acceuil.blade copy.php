{{-- @extends('layout.app')

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
@endsection--}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.3);
            border: 2px solid #fff;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: #000;
            transform: translateY(-5px);
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.4);
        }

        footer {
            margin-top: 50px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur notre site</h1>
    <p>Plongez dans une expérience immersive avec nos fonctionnalités modernes.</p>
    <a href="{{ route('elements-constitutifs.welcome') }}" class="btn">Explorer</a>
    <footer>
        © 2025 Votre Site - Tous droits réservés
    </footer>
</body>
</html>































