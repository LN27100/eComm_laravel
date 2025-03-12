<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $breadcrumbs = $category->ancestors()->pluck('name')->push($category->name);
    $products = $category->allProducts()->paginate(7);

    return view('categories.show', compact('category', 'products', 'breadcrumbs'));
}

}
