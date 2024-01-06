<?php

namespace App\Console;

use App\Console\Commands\SendHalloweenGames;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendHalloweenGames::class,
    ];
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:send-halloween-games-05')
            ->timezone('America/Sao_Paulo');
            //->yearlyOn(10, 31, '8:00')
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
