<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users will be assigned as sales managers
        for ($i = 1; $i <= 10; $i++) {
            if ($i === 1) {
                $email = 'parker@example.com';
                $name = "Parker";
            } else {
                $email = "salesmanager{$i}@example.com";
                $name = "Sales Manager {$i}";
            }
            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10)
                ]);
        }
    }
}
