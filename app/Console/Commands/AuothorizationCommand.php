<?php

namespace App\Console\Commands;

use App\Services\AuthorizationService;
use Illuminate\Console\Command;

class AuothorizationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authorize:me {email} {password}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AuthorizationService $service)
    {
        $email =  $this->argument('email');
        $password = $this->argument('password');
        $token =  $service->signIn($email, $password);
        $this->line('Personal access token:');
        $this->info($token);
        return Command::SUCCESS;
    }
}
