@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
    <h1>Liste des produits</h1>
    <a href="{{ route('admin.products.create') }}">Créer un produit</a>
    <ul>
        @foreach ($products as $product)
            <li>
                {{ $product->name }}
                <a href="{{ route('admin.products.edit', $product) }}">Modifier</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
