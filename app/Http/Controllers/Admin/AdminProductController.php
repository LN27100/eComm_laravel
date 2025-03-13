<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'active' => 'nullable|boolean',
            'slug' => 'required|unique:products,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create($request->only(['name', 'description', 'price', 'active', 'slug']));

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->images()->create([
                'url' => $path,
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'active' => 'nullable|boolean',
            'slug' => 'required|unique:products,slug,' . $product->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->update($request->only(['name', 'description', 'price', 'active', 'slug']));

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->images()->create([
                'url' => $path,
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès');
    }
}
