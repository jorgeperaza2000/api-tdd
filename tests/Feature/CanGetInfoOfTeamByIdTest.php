<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class CanGetInfoOfTeamByIdTest extends TestCase
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
}
