@extends('layouts.app')

@section('title', 'Modifier une catégorie')

@section('content')
    <h1>Modifier une catégorie</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ $category->description }}</textarea>
        <label for="parent_id">Catégorie parente</label>
        <select name="parent_id" id="parent_id">
            <option value="">Aucune</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $category->slug }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
