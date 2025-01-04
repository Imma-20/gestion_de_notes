<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UnitesEnseignement;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ElementsConstitutifsControllerTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Test la création d'un élément constitutif (EC) avec un code.
     *
     * @return void
     */
    public function test_creation_ec_avec_code()
    {
        $ue = UnitesEnseignement::factory()->create();
        $ecData = [
            'code' => 'EC01',
            'nom' => 'Élément 1',
            'coefficient' => 3,
            'ue_id' => $ue->id,
        ];
        $response = $this->post(route('elements-constitutifs.store'), $ecData);
        $this->assertDatabaseHas('elements_constitutifs', [
            'code' => 'EC01',
            'nom' => 'Élément 1',
            'coefficient' => 3,
            'ue_id' => $ue->id,
        ]);
        $response->assertRedirect(route('elements-constitutifs.index'));
    }


    /**
     * Test la création d'un élément constitutif (EC) avec un coefficient dans l'UE.
     *
     * @return void
     */
    public function test_creation_ec_avec_coefficient_dans_ue()
    {
        $ue = UnitesEnseignement::factory()->create();

        $ecData = [
            'code' => 'EC02',
            'nom' => 'Élément 2',
            'coefficient' => 5,
            'ue_id' => $ue->id,
        ];

        $response = $this->post(route('elements-constitutifs.store'), $ecData);
        $this->assertDatabaseHas('elements_constitutifs', [
            'code' => 'EC02',
            'nom' => 'Élément 2',
            'coefficient' => 5,
            'ue_id' => $ue->id,
        ]);
        $response->assertRedirect(route('elements-constitutifs.index'));
    }

    /**
     * Test l'association d'un EC à une UE lors de sa création.
     *
     * @return void
     */
    public function test_association_ec_a_une_ue()
    {
        $ue = UnitesEnseignement::factory()->create();

        $ecData = [
            'code' => 'EC03',
            'nom' => 'Élément 3',
            'coefficient' => 4,
            'ue_id' => $ue->id,
        ];

        $response = $this->post(route('elements-constitutifs.store'), $ecData);

        $this->assertDatabaseHas('elements_constitutifs', [
            'code' => 'EC03',
            'nom' => 'Élément 3',
            'coefficient' => 4,
            'ue_id' => $ue->id,
        ]);
        $response->assertRedirect(route('elements-constitutifs.index'));
    }
}
