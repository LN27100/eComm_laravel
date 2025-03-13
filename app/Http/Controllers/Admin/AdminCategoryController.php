<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'slug' => 'required|unique:categories,slug',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès');
    }

    public function edit(Category $category)
{
    $categories = Category::all();
    return view('admin.categories.edit', compact('category', 'categories'));
}


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy(Category $category)
{
    if ($category->children->isNotEmpty() || $category->products->isNotEmpty()) {
        return redirect()->route('categories.index')->with('error', 'La catégorie contient des sous-catégories ou des produits et ne peut pas être supprimée.');
    }

    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
}

}
