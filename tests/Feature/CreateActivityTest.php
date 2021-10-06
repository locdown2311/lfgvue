<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateActivityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_create_activity_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/activity/create');

        $response->assertStatus(200);
    }
}
