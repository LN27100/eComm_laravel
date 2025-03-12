@extends('layouts.app')

@section('title', 'Créer une catégorie')

@section('content')
    <h1>Créer une catégorie</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        <label for="parent_id">Catégorie parente</label>
        <select name="parent_id" id="parent_id">
            <option value="">Aucune</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" required>
        <button type="submit">Créer</button>
    </form>
@endsection
