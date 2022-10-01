<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RestockProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const PRODUCT_QUANTITY_RESTOCK = 10;

    public function handle(): void
    {
        Product::all()->each(function (Product $product) {
            $product->update([
                'quantity' => $product->quantity + self::PRODUCT_QUANTITY_RESTOCK,
            ]);
        });
    }
}
