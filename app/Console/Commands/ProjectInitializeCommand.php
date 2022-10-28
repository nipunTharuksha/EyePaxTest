<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ProjectInitializeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initialize:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will initialize the project from ground level of setup';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('**** Running migrations ****');
        $this->newLine();
        Artisan::call('migrate:fresh');
        $this->info(Artisan::output());

        $this->line('**** Seeding DB****');
        $this->newLine();
        Artisan::call('db:seed');
        $this->info(Artisan::output());

        $salesManagers = User::all(['name', 'email'])->map(function ($user) {
            $user['user_password'] = "password";
            return $user;
        })->toArray();

        $this->table(
            ['Name', 'Email', 'Manager Password'],
            $salesManagers
        );

        return Command::SUCCESS;
    }
}
