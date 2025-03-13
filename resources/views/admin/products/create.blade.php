@extends('layouts.app')

@section('title', 'Créer un produit')

@section('content')
    <h1>Créer un produit</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-input"></textarea>

        <label for="price">Prix</label>
        <input type="number" name="price" id="price" step="0.01" required class="form-input">

        <label for="active">Actif</label>
        <input type="checkbox" name="active" id="active" class="form-checkbox">

        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" required class="form-input">

        <label for="categories">Catégories</label>
        <select name="categories[]" id="categories" multiple class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-input">

        <button type="submit" class="submit-button">Créer</button>
    </form>
@endsection
