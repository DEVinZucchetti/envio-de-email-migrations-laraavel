<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithHalloweenGames;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendHalloweenGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-halloween-games-05';
    protected $description = 'Command description';

    public function handle()
    {
        $result = DB::select("select p.id as game_id, p.name as product_name, p.price, m.name from products p
        join products_markers pm ON pm.product_id = p.id
        join markers m on m.id  = pm.marker_id
        where
            price between 30 and 300
            and m.name = 'terror'");
        Log::info($result);
            if(count($result) > 0) {

                Mail::to('guiduartesbs@hotmail.com', 'Guilherme Duarte')
                ->send(new SendEmailWithHalloweenGames($result));
            }
    }
}

