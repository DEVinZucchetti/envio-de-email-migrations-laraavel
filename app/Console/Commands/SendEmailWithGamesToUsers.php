<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithGames;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailWithGamesToUsers extends Command
{

    protected $signature = 'app:send-email-with-games-to-users';

    protected $description = 'Envia uma email com um pdf contendo 10 jogos aleatórios ás 08:00 todos os dia';


    public function handle()
    {
        $products = Product::query()
        ->inRandomOrder()
        ->take(10)
        ->get();

        Mail::to('thiago_barroso@estudante.sesisenai.org.br', 'Thiago Rios')
        ->send(new SendEmailWithGames($products));
    }
}
