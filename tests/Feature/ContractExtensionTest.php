<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractExtensionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_contract_extension_with_time_and_value()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $contract = Contract::factory()->create([
            'contract_type' => 'Fijo'
        ]);

        $data = [
            'extension_type' => 'Ambos',
            'new_end_date' => '2027-03-31',
            'additional_value' => 500000,
            'description' => 'Prórroga por ampliación de proyecto',
            'contract_id' => $contract->id
        ];

        $response = $this->actingAs($user)
            ->postJson('/contract-extensions', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contract_extensions', [
            'contract_id' => $contract->id,
            'extension_type' => 'Ambos',
            'new_end_date' => '2027-03-31',
            'additional_value' => 500000
        ]);
    }


    public function test_contract_end_date_updates_when_time_extension_is_created()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $contract = Contract::factory()->create([
            'contract_type' => 'Fijo',
            'end_date' => '2026-06-30'
        ]);

        $data = [
            'extension_type' => 'Tiempo',
            'new_end_date' => '2026-12-31',
            'description' => 'Prórroga por extensión del proyecto',
            'contract_id' => $contract->id
        ];

        $response = $this->actingAs($user)
            ->postJson('/contract-extensions', $data);

        $response->assertStatus(201);


        $this->assertDatabaseHas('contract_extensions', [
            'contract_id' => $contract->id,
            'extension_type' => 'Tiempo',
            'new_end_date' => '2026-12-31'
        ]);

        $contract->refresh();

        $this->assertEquals('2026-12-31', $contract->end_date);
    }

    public function test_cannot_create_extension_for_finished_contract()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();

        $contract = Contract::factory()->create([
            'contract_type' => 'Fijo',
            'status' => 'Finalizado'
        ]);

        $data = [
            'extension_type' => 'Tiempo',
            'new_end_date' => '2026-12-31',
            'contract_id' => $contract->id
        ];

        $response = $this->actingAs($user)
            ->postJson('/contract-extensions', $data);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'No se puede agregar una prórroga a un contrato finalizado'
            ]);

        $this->assertDatabaseMissing('contract_extensions', [
            'contract_id' => $contract->id
        ]);
    }
}