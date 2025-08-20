<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();

        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;
        $viewData["comments"] = $product->comments; // <-- Agrega esta línea

        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
    $viewData = [];
    $viewData["title"] = "Create product";
    return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|min:1"
        ]);

        $product = new Product();
        $product->setName($request->input('name'));
        $product->setPrice($request->input('price'));
        $product->save();

        return redirect()->route('product.index');
    }
    public function saveComment(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        $comment = new \App\Models\Comment();
        $comment->setDescription($request->input('description'));
        $comment->setProductId($product->getId());
        $comment->save();

        return redirect()->route('product.show', ['id' => $id]);
    }
}
