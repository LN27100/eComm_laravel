@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}" class="create-button">Créer une catégorie</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                <span class="item-name">{{ $category->name }}</span>
                <div class="actions">
                    <form action="{{ route('categories.edit', $category) }}" method="GET" style="display:inline;">
                        <button type="submit" class="edit-button">Modifier</button>
                    </form>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="delete-form" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
