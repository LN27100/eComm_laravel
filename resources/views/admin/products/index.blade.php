@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
    <h1>Liste des produits</h1>
    <a href="{{ route('products.create') }}" class="create-button">Créer un produit</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <span class="item-name">{{ $product->name }}</span>
                <div class="actions">
                    <form action="{{ route('products.edit', $product) }}" method="GET" style="display:inline;">
                        <button type="submit" class="edit-button">Modifier</button>
                    </form>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="delete-form" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
