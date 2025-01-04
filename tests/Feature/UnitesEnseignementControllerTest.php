<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UnitesEnseignement;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitesEnseignementControllerTest extends TestCase
{
    
    use RefreshDatabase;

    /**
     * Test de la création d'une unité d'enseignement valide.
     *
     * @return void
     */
    public function test_creation_ue_valide()
    {
        $donneesUE = UnitesEnseignement::factory()->make();
        $reponse = $this->post(route('unites-enseignement.store'), [
            'code' => $donneesUE->code,
            'nom' => $donneesUE->nom,
            'credit' => $donneesUE->credits_ects,
            'semestre' => $donneesUE->semestre,
        ]);
        $this->assertDatabaseHas('unites_enseignement', [
            'code' => $donneesUE->code,
            'nom' => $donneesUE->nom,
            'credits_ects' => $donneesUE->credits_ects,
            'semestre' => $donneesUE->semestre,
        ]);
        $reponse->assertRedirect(route('unites-enseignement.index'));
    }

    /**
     * Test de la vérification des crédits ECTS (entre 1 et 30).
     *
     * @return void
     */
    public function test_verification_credits_ects()
    {
        $donneesUE = UnitesEnseignement::factory()->make([
            'credits_ects' => 35,
        ]);

        $reponse = $this->post(route('unites-enseignement.store'), [
            'code' => $donneesUE->code,
            'nom' => $donneesUE->nom,
            'credit' => $donneesUE->credits_ects,
            'semestre' => $donneesUE->semestre,
        ]);

        $this->assertDatabaseMissing('unites_enseignement', [
            'code' => $donneesUE->code,
            'credits_ects' => $donneesUE->credits_ects,
        ]);

        $reponse->assertSessionHasErrors(['credit']);

        $donneesUEValide = UnitesEnseignement::factory()->make([
            'credits_ects' => 20,
        ]);

        $reponseValide = $this->post(route('unites-enseignement.store'), [
            'code' => $donneesUEValide->code,
            'nom' => $donneesUEValide->nom,
            'credit' => $donneesUEValide->credits_ects,
            'semestre' => $donneesUEValide->semestre,
        ]);

        $this->assertDatabaseHas('unites_enseignement', [
            'code' => $donneesUEValide->code,
            'credits_ects' => $donneesUEValide->credits_ects,
        ]);

        $reponseValide->assertRedirect(route('unites-enseignement.index'));
    }


    /**
     * Test de la vérification du semestre (entre 1 et 6).
     *
     * @return void
     */
    public function test_verification_semestre()
    {
        $donneesUE = UnitesEnseignement::factory()->make([
            'semestre' => 7, 
        ]);

        $response = $this->post(route('unites-enseignement.store'), [
            'code' => $donneesUE->code,
            'nom' => $donneesUE->nom,
            'credit' => $donneesUE->credits_ects,
            'semestre' => $donneesUE->semestre,
        ]);

        $response->assertSessionHasErrors(['semestre' => 'Le semestre doit être entre 1 et 6.']);
    }
}
