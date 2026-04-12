<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV4 extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    public function store(): JsonResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }
}
