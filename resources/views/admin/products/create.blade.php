@extends('layouts.app')

@section('title', 'Créer un produit')

@section('content')
    <h1>Créer un produit</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        <label for="price">Prix</label>
        <input type="number" name="price" id="price" step="0.01" required>
        <label for="active">Actif</label>
        <input type="checkbox" name="active" id="active">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" required>
        <label for="categories">Catégories</label>
        <select name="categories[]" id="categories" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <button type="submit">Créer</button>
    </form>
@endsection
