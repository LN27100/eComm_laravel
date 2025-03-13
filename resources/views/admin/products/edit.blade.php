@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
    <h1>Modifier un produit</h1>
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="create-form">
    @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required class="form-input">

        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-input">{{ $product->description }}</textarea>

        <label for="price">Prix</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required class="form-input">

        <label for="active">Actif</label>
        <input type="checkbox" name="active" id="active" {{ $product->active ? 'checked' : '' }} class="form-checkbox">

        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $product->slug }}" required class="form-input">

        <label for="categories">Catégories</label>
        <select name="categories[]" id="categories" multiple class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-input">

        <button type="submit" class="submit-button">Mettre à jour</button>
    </form>
@endsection
