<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ExampleTest extends TestCase
{
public function afficher_liste_des_notes()
{
    $notes = \App\Models\Note::factory()->count(5)->create();

    $response = $this->get(route('notes.index'));

    $response->assertStatus(200);
    $response->assertSee($notes->first()->note);
}

public function ajouter_une_note()
{
    $etudiant = \App\Models\Etudiant::factory()->create();
    $ec = \App\Models\Elements_Constitutifs::factory()->create();

    $response = $this->post(route('notes.store'), [
        'etudiant_id' => $etudiant->id,
        'ec_id' => $ec->id,
        'note' => 15.5,
        'session' => 'normale',
    ]);

    $response->assertRedirect(route('notes.index'));
    $this->assertDatabaseHas('notes', [
        'etudiant_id' => $etudiant->id,
        'ec_id' => $ec->id,
        'note' => 15.5,
        'session' => 'normale',
    ]);
}

public function champs_obligatoires_ajouter_une_note()
{
    $response = $this->post(route('notes.store'), [
        'etudiant_id' => null,
        'ec_id' => null,
        'note' => null,
        'session' => null,
    ]);

    $response->assertSessionHasErrors(['etudiant_id', 'ec_id', 'note', 'session']);
}

public function modifier_note()
{
    $note = \App\Models\Note::factory()->create();

    $response = $this->put(route('notes.update', $note->id), [
        'note' => 18.0,
        'session' => 'rattrapage',
    ]);

    $response->assertRedirect(route('notes.index'));
    $this->assertDatabaseHas('notes', [
        'id' => $note->id,
        'note' => 18.0,
        'session' => 'rattrapage',
    ]);
}

public function supprimer_note()
{
    $note = \App\Models\Note::factory()->create();

    $response = $this->delete(route('notes.destroy', $note->id));

    $response->assertRedirect(route('notes.index'));
    $this->assertDatabaseMissing('notes', [
        'id' => $note->id,
    ]);
}
}