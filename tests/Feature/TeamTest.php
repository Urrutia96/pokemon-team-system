<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_own_teams()
    {
        $own_teams = Team::factory()
            ->count(2)
            ->for(User::factory())
            ->create();

        $response = $this->getJson('/api/teams');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'user_id'
                    ]
                ]
            ])
            ->assertExactJson([
                'data' => [
                    ['id'=>$own_teams[0]->id,'user_id'=>$own_teams[0]->user_id],
                    ['id'=>$own_teams[1]->id,'user_id'=>$own_teams[1]->user_id],
                ]
            ]);
    }
}
