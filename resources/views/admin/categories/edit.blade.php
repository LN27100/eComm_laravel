@extends('layouts.app')

@section('title', 'Modifier une catégorie')

@section('content')
    <h1>Modifier une catégorie</h1>
    
    <form action="{{ route('categories.update', $category) }}" method="POST" class="create-form">
        @csrf
        @method('PUT')

        <!-- Champ Nom -->
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required class="form-input">

        <!-- Champ Description -->
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-input">{{ old('description', $category->description) }}</textarea>

        <!-- Sélection de la catégorie parente -->
        <label for="parent_id">Catégorie parente</label>
        <select name="parent_id" id="parent_id" class="form-select">
            <option value="">Aucune</option>
            @foreach ($categories as $cat)
                @if ($cat->id !== $category->id) {{-- Empêche la sélection de soi-même --}}
                    <option value="{{ $cat->id }}" {{ $cat->id == old('parent_id', $category->parent_id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endif
            @endforeach
        </select>

        <!-- Champ Slug -->
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" required class="form-input">

        <!-- Bouton de soumission -->
        <button type="submit" class="submit-button">Mettre à jour</button>
    </form>
@endsection
