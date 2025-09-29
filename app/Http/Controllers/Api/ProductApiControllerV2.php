<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV2 extends Controller
{
    public function index(): JsonResponse {
        return response()->json(ProductResource::collection(Product::all()), 200);
    }

    public function show(string $id): JsonResponse {
        return response()->json(new ProductResource(Product::findOrFail($id)), 200);
    }
}
