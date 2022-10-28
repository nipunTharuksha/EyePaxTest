<?php

namespace Database\Seeders;

use App\Models\WorkingRoute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkingRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkingRoute::factory()->count(50)->create();
    }
}
