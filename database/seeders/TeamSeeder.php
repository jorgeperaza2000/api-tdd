<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            'id' => 1,
            'name' => 'Real Madrid F.C.',
            'slug_name' => 'RM FC',
        ]);
        DB::table('teams')->insert([
            'id' => 2,
            'name' => 'Barcelona F.C.',
            'slug_name' => 'BARCA',
        ]);
    }
}
