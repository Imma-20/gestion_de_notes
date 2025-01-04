<?php

namespace Database\Factories;

use App\Models\UnitesEnseignement;
use App\Models\Elements_Constitutifs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Elements_Constitutifs>
 */
class ElementsConstitutifsFactory extends Factory
{
    protected $model = Elements_Constitutifs::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word(),
            'nom' => $this->faker->word(),
            'coefficient' => $this->faker->numberBetween(1, 10),
            'ue_id' => UnitesEnseignement::factory(),
        ];
    }
}
