<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ContractTerminationTest extends TestCase
{
    use RefreshDatabase;

    public function test_contract_can_be_terminated_successfully()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $this->actingAs($user);

        $contract = Contract::factory()->create([
            'status' => 'Activo'
        ]);

        $data = [
            'contract_id' => $contract->id,
            'termination_reason' => 'Mutuo Acuerdo',
            'termination_date' => '2024-06-30'
        ];

        $response = $this->postJson('/contract-terminations', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contract_terminations', [
            'contract_id' => $contract->id,
            'termination_reason' => 'Mutuo Acuerdo'
        ]);

        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'status' => 'Terminado'
        ]);
    }

    public function test_termination_reason_and_date_are_saved_correctly()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $this->actingAs($user);

        $contract = Contract::factory()->create([
            'status' => 'Activo'
        ]);

        $data = [
            'termination_reason' => 'Renuncia Voluntaria',
            'termination_date' => '2024-07-15',
            'contract_id' => $contract->id
        ];

        $response = $this->postJson('/contract-terminations', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contract_terminations', [
            'contract_id' => $contract->id,
            'termination_reason' => 'Renuncia Voluntaria',
            'termination_date' => '2024-07-15'
        ]);
    }

    public function test_cannot_terminate_finished_or_finalized_contract()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $this->actingAs($user);

        $contract = Contract::factory()->create([
            'status' => 'Terminado'
        ]);

        $data = [
            'termination_reason' => 'Despido Justificado',
            'termination_date' => '2024-08-01',
            'contract_id' => $contract->id
        ];

        $response = $this->postJson('/contract-terminations', $data);

        $response->assertStatus(422);

        $response->assertJson([
            'message' => 'El contrato no es elegible para terminación anticipada'
        ]);
    }
}