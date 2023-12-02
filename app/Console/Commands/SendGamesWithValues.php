<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class SendGamesWithValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-games-with-values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia 10 jogos com valores entre $20 e 100';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::query()
        ->inRandonOrder()
        ->take(10)
        ->whereBetween('price',[20 , 100])
        ->get();


    }
}