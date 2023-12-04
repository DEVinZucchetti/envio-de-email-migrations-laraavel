<?php

namespace App\Console;

use App\Console\Commands\SendEmailWithGamesToUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        SendEmailWithGamesToUsers::class
    ];
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:send-email-with-games-to-users')
        ->timezone('America/Sao_Paulo')
        ->at('08:00');
    }


    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
