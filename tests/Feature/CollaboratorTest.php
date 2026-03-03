<?php

namespace Tests\Feature;

use App\Models\Collaborator;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\PermissionRegistrar;


class CollaboratorTest extends TestCase
{
        use RefreshDatabase;

    public function test_authenticated_user_can_create_collaborator()
    {
        Role::create(['name' => 'collaborator']);
        

        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $user->assignRole('collaborator');

        $data = [
            'first_name' => 'Harley',
            'last_name' => 'Guerra',
            'document_type' => 'CC',
            'document_number' => '1122397884',
            'birth_date' => '2004-12-09',
            'email' => 'guerraharley90@gmail.com',
            'phone_number' => '3202536746',
            'address' => 'cll 10sur#24-34',
        ];

        $response = $this->actingAs($user)->post('/collaborators', $data);

        $response->assertRedirect(); // primero verificamos respuesta

        $this->assertDatabaseHas('collaborators', [
            'document_number' => '1122397884',
            'email' => 'guerraharley90@gmail.com',
        ]);
    }
    
    public function test_unauthenticated_user_cannot_create_collaborator()
    {
        $data = [
            'first_name' => 'Harley',
            'last_name' => 'Guerra',
            'document_type' => 'CC',
            'document_number' => '1122397884',
            'birth_date' => '2004-12-09',
            'email' => 'guerraharley90@gmail.com',
            'phone_number' => '3202536746',
            'address' => 'cll 10sur#24-34',
        ];
        
        $response = $this->post('/collaborators', $data);
        $response->assertRedirect('/login'); 
        
        $this->assertDatabaseMissing('collaborators', [
            'document_number' => '1122397884',
            'email' => 'guerraharley90@gmail.com',
        ]);
    }

    public function test_can_update_collaborator()
    {
        Role::create(['name' => 'collaborator']);
        

        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $user->assignRole('collaborator');

        $collaborator = \App\Models\Collaborator::factory()->create();

        $data = [
            'first_name' => 'John',
            'last_name' => 'Guerrero',
            'document_type' => 'CC',
            'document_number' => '1122456789',
            'birth_date' => '2004-11-09',
            'email' => 'john.guerrero@gmail.com',
            'phone_number' => '3202536746',
            'address' => 'cll 10sur#24-34',
        ];

        $response = $this->actingAs($user)->put("/collaborators/{$collaborator->id}", $data);

        $response->assertRedirect(); // primero verificamos respuesta

        $this->assertDatabaseHas('collaborators', [
            'id' => $collaborator->id,
            'document_number' => '1122456789',
            'email' => 'john.guerrero@gmail.com',
        ]);
    }

    public function test_authenticated_user_can_view_collaborators_list()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create([
            'name' => 'collaborator',
            'guard_name' => 'web'
        ]);

        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $user->assignRole('collaborator');

        $this->actingAs($user);

        Collaborator::factory()->count(3)->create();

        $response = $this->get('/collaborators');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_delete_collaborator()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate([
            'name' => 'collaborator',
            'guard_name' => 'web'
        ]);

        $user = User::factory()->create();
        $user->assignRole('collaborator');
        

        /** @var \App\Models\User $user */
        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $response = $this->delete("/collaborators/{$collaborator->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('collaborators', [
            'id' => $collaborator->id
        ]);
    }

}