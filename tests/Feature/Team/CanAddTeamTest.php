<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class CanAddTeamTest extends TestCase
{
    use RefreshDatabase;
    /**
     * This test allows you to test whether information can be obtained from a team by ID.
     */
    public function testCanGetInfoOfTeamById(): void
    {
        // Create stage

        // Create a Team in the application (DB)
        $team = Team::factory()->create();

        // Call the API to get team information
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
        // Create stage
        $team = [
            'name' => "Team One",
            'slug_name' => 'TO',
        ];

        // Call the API to send the team information to be created
        $response = $response = $this->postJson('/api/teams', $team);
        $response->assertStatus(201);
        $response->assertJsonFragment($team);
    }

    public function testCanSeeErrorMsgWhenDuplicateTeamNameIsAdded(): void
    {
        // Create stage
        $team = [
            'name' => "Team One",
            'slug_name' => 'TO',
        ];
        $response = $response = $this->postJson('/api/teams', $team);

        // Call the API to send the team information to be created with information duplicate
        $response = $response = $this->postJson('/api/teams', $team);
        $response->assertStatus(422);
        $response->assertJsonStructure(["message", "errors" => ["name"]]);
    }
}
