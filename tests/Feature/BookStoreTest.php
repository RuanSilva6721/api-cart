<?php

namespace Tests\Feature;

use App\Models\BookStore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BookStoreTest extends TestCase
{
    protected string $endpoint = '/api/BookStore';

    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
    
        $this->user = User::factory()->create();
    }
    public function test_create_product()
    {
        $this->actingAs($this->user);

        $payload = [
            'name' => 'Ruan Teste',
            'ISBN' => '532723732',
            'Value' => 10.99,
        ];

        $response = $this->postJson($this->endpoint.'Create', $payload);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_find()
    {
        
        $this->actingAs($this->user);
        $bookStore = BookStore::factory()->create();

        $response = $this->getJson("{$this->endpoint}/{$bookStore->id}");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
    
                'id',
                'name',
                'ISBN',
                'Value',
                'created_at',
                'updated_at'
            
        ]);
    }

    public function test_update()
    {
        $this->actingAs($this->user);

        DB::beginTransaction();

        try {
            $bookStore = BookStore::factory()->create();

            $payload = [
                'name' => 'Updated Product',
                'ISBN' => '000000',
                'Value' => 11.99,
            ];

            $response = $this->putJson("{$this->endpoint}/{$bookStore->id}", $payload);

            $response->assertStatus(Response::HTTP_OK);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function test_update_not_found()
    {
        $this->actingAs($this->user);
        $response = $this->putJson("{$this->endpoint}/fake_id", [
            'name' => 'Updated Product'
        ]);

        $response->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function test_delete_not_found()
    {
        $this->actingAs($this->user);
        $response = $this->deleteJson("{$this->endpoint}/fake_id");

        $response->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function test_delete()
    {
        $this->actingAs($this->user);
        $bookStore = BookStore::factory()->create();

        $response = $this->deleteJson("{$this->endpoint}/{$bookStore->id}");

        $response->assertNoContent();
    }
}
