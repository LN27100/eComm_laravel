@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
    <h1>Modifier un produit</h1>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ $product->description }}</textarea>
        <label for="price">Prix</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
        <label for="active">Actif</label>
        <input type="checkbox" name="active" id="active" {{ $product->active ? 'checked' : '' }}>
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $product->slug }}" required>
        <label for="categories">Catégories</label>
        <select name="categories[]" id="categories" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
