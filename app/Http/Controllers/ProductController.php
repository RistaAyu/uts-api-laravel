<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return response()->json($product);
    }

    // READ
    public function index()
    {
        return Product::all();
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return response()->json(['message' => 'Product updated']);
    }

    // DELETE
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
