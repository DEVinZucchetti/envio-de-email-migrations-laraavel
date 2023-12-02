<?php

namespace App\Console;

use App\Console\Commands\SendGamesWithValues;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendGamesWithValues::class
    ];
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:send-games-with-values')
        ->timezone('America/Sao_Paulo')
        ->at('22:17');
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
