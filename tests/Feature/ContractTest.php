<?php




namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Collaborator;
use App\Models\Contract;

class ContractTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_contract()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $collaborator = Collaborator::factory()->create();

        $response = $this->actingAs($user)->post(
            route('collaborators.contracts.store', $collaborator),
            [
                'contract_type' => 'Indefinido',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'salary' => 3000000,
                'status' => 'Activo',
            ]
        );

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'contract_type' => 'Indefinido',
            'salary' => 3000000,
            'collaborator_id' => $collaborator->id
        ]);
    }

    public function test_cannot_create_contract_for_nonexistent_collaborator()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $nonExistentCollaboratorId = 999;

        $response = $this->actingAs($user)->post(
            "/collaborators/{$nonExistentCollaboratorId}/contracts",
            [
                'contract_type' => 'Indefinido',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'salary' => 3000000,
                'status' => 'Activo',
            ]
        );

        $response->assertStatus(404);

        $this->assertDatabaseCount('contracts', 0);
    }

    public function test_cannot_create_contract_with_invalid_dates_and_salary()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $collaborator = Collaborator::factory()->create();

        $response = $this->actingAs($user)->post(
            "/collaborators/{$collaborator->id}/contracts",
            [
                'contract_type' => 'Indefinido',
                'start_date' => '01-01-2024', // formato incorrecto
                'end_date' => null,
                'salary' => -500000, // salario negativo
                'status' => 'Activo',
            ]
        );

        $response->assertSessionHasErrors(['start_date', 'salary']);

        $this->assertDatabaseCount('contracts', 0);
    }

    public function test_can_update_existing_contract()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $collaborator = Collaborator::factory()->create();

        $contract = Contract::factory()->create([
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Indefinido',
            'start_date' => '2024-01-01',
            'end_date' => null,
            'salary' => 3000000,
            'status' => 'Activo',
        ]);

        $response = $this->actingAs($user)->put(
            "/collaborators/{$collaborator->id}/contracts/{$contract->id}",
            [
                'contract_type' => 'Fijo',
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'salary' => 3500000,
                'status' => 'Activo',
            ]
        );

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'contract_type' => 'Fijo',
            'end_date' => '2024-12-31',
            'salary' => 3500000,
        ]);
    }

    
}