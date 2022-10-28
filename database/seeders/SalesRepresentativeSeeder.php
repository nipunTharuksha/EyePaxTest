<?php

namespace Database\Seeders;

use App\Models\SalesRepresentative;
use App\Models\User;
use App\Models\WorkingRoute;
use Illuminate\Database\Seeder;

class SalesRepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "**** Seeding 50 sales representatives for each sales manager **** \n ";
        echo "\n";

        $salesManagers = User::all();
        $workingRoutes = WorkingRoute::all();
        foreach ($salesManagers as $salesManager) {
            //Create 50 sales representatives for the manager the in the loop
            $data = [];
            for ($i = 1; $i <= 50; $i++) {
                $data[] = [
                    'sales_manager_id' => $salesManager->getKey(),
                    'current_working_route_id' => (clone $workingRoutes)->random()->id,
                    'full_name' => fake()->firstName . ' ' . fake()->lastName,
                    'email' => fake()->email,
                    'telephone' => fake()->phoneNumber,
                    'joined_date' => fake()->date(),
                    'comment' => fake()->sentence(),
                    'created_at' => now()
                ];
            }
            SalesRepresentative::insert($data);
            echo "**** 50 sales representatives added for sales manager : {$salesManager->name} **** \n";
        }

    }
}
