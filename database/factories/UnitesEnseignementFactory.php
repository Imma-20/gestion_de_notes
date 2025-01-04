<?php

namespace Database\Factories;

use App\Models\UnitesEnseignement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitesEnseignement>
 */
class UnitesEnseignementFactory extends Factory
{
    protected $model = UnitesEnseignement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('UE[0-9]{3}'),
            'nom' => $this->faker->sentence(3),
            'credits_ects' => $this->faker->numberBetween(1, 30),
            'semestre' => $this->faker->numberBetween(1, 2),
        ];
    }
}
