@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')
    <h1>Liste des catégories</h1>
    <a href="{{ route('admin.categories.create') }}">Créer une catégorie</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('admin.categories.edit', $category) }}">Modifier</a>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
