<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductPurchaseController extends Controller
{
    public function __invoke(Product $product): JsonResponse
    {
        if ($product->quantity <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'It is not possible to purchase a product',
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'success' => $product->update([
                'quantity' => $product->quantity - 1,
            ]),
        ]);
    }
}
