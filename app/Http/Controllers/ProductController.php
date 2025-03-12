<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // Produits actifs et les catégories
        $products = Product::where('active', true)->inRandomOrder()->limit(5)->get();
        $categories = Category::whereNull('parent_id')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        // Récupérer le produit par slug et image
        $product = Product::where('slug', $slug)->with('images')->firstOrFail();

        // Produits similaires
        $similarProducts = Product::whereHas('categories', function ($query) use ($product) {
            $query->whereIn('id', $product->categories->pluck('id'));
        })->where('id', '!=', $product->id)->inRandomOrder()->limit(5)->get();

        return view('products.show', compact('product', 'similarProducts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'active' => 'nullable|boolean',
            'slug' => 'required|unique:products,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Créer le produit
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

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');
    }
}
