<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
        foreach ($searchProducts as $product) {
            Log::info("Preço: {$product->price}, Marcador: {$product->marker->name}, Nome do Jogo: {$product->name}");
        }
    }
}
