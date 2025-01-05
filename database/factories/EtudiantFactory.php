<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    protected $model = \App\Models\Etudiant::class;

    public function definition()
    {
        return [
            'numero_etudiant' => $this->faker->unique()->numerify('ETU###'), // Exemple : ETU123
            'nom' => $this->faker->lastName(), // Nom aléatoire
            'prenom' => $this->faker->firstName(), // Prénom aléatoire
        ];
    }
}
