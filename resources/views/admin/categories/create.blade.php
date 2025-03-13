@extends('layouts.app')

@section('title', 'Créer une catégorie')

@section('content')
    <h1>Créer une catégorie</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="create-form">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required class="form-input">

        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-input"></textarea>

        <label for="parent_id">Catégorie parente</label>
        <select name="parent_id" id="parent_id" class="form-select">
            <option value="">Aucune</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" required class="form-input">

        <button type="submit" class="submit-button">Créer</button>
    </form>
@endsection
