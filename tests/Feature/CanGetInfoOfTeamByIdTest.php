<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CanGetInfoOfTeamByIdTest extends TestCase
{
    use RefreshDatabase;
    /**
     * This test allows you to test whether information can be obtained from a team by ID.
     */
    public function testCanGetInfoOfTeamByIdTest(): void
    {
        // Create stage

        // Create a Team in the application (DB)
        Team::factory()->create([
            'id' => 1,
            'name' => 'Real Madrid F.C.',
            'slug_name' => 'RMFC',
        ]);


        // Call the API to get team information
        $response = $this->get('/api/teams/1');

        // Check that the API returns the Team information correctly

        $reposnse->assertJsonFragment([
            'id' => 1,
            'name' => 'Real Madrid F.C.',
            'slug_name' => 'RMFC',
        ]);

    }
}
