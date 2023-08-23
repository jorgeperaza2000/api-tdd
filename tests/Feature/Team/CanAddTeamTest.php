<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class CanAddTeamTest extends TestCase
{
    use RefreshDatabase;

    public function testCanGetInfoOfTeamById(): void
    {

        $team = Team::factory()->create();

        $response = $this->get(
            sprintf(
                '/api/teams/%s',
                $team->id
            )
        );
        $response->assertStatus(200);
        $response->assertJsonFragment($team->toArray());

    }

    public function testCanAddTeam(): void
    {
        $team = [
            'name' => "Team One",
            'slug_name' => 'TO',
        ];

        $response = $response = $this->postJson('/api/teams', $team);
        $response->assertStatus(201);
        $response->assertJsonFragment($team);
    }

    public function testCanSeeErrorMsgWhenDuplicateTeamNameIsAdded(): void
    {
        $team = [
            'name' => "Team One",
            'slug_name' => 'TO',
        ];
        $response = $response = $this->postJson('/api/teams', $team);

        $response = $response = $this->postJson('/api/teams', $team);
        $response->assertStatus(422);
        $response->assertJsonStructure(["message", "errors" => ["name"]]);
    }
}
