<?php

namespace App\Console\Commands;

use App\Mail\halloweenGamesEmail;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendHalloweenEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-halloween-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia email com jogos especiais de Halloween';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::query()
            ->where('marker_id', 1) // Marcador de terror
            ->inRandomOrder()
            ->take(3)
            ->get();

        $searchProducts = $products->filter(function ($product) {
            return $product->price >= 30 && $product->price <= 300 &&
                $product->avaliations()->where('recommended', true)->count() >= 5;
        });
        Mail::to('matheus_goncalves16@estudante.sesisenai.org.br', 'Matheus')->send(new halloweenGamesEmail($searchProducts));
        // foreach ($searchProducts as $product) {
        //     Log::info([
        //         'Jogo' => $product->name,
        //         'cover' => $product->cover,
        //         'Preço' => $product->price,
        //         'Descrição' => $product->description
        //     ]);
        // }
    }
}