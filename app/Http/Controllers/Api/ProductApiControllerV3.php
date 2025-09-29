<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {
        $products = new ProductCollection(Product::all());
        return response()->json($products, 200);
    }
    public function paginate(): JsonResponse
    {
        $products = new ProductCollection(Product::paginate(5));
        return response()->json($products, 200);
    }
    public function store(StoreProductRequest $request): JsonResponse
    {
        $data = $request->validated();              // name, price
        $product = Product::create($data);

        // Si usas Resources (como en la parte B/C), responde con Resource y 201:
        return response()->json(new ProductResource($product), 201);
    }
}