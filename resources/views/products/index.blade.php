@extends('layouts.app')

@section('title', 'Liste des produits')

@section('nav-links')
@foreach ($categories as $category)
        <li><a href="{{ url('/categories/' . $category->slug) }}">{{ $category->name }}</a></li>
    @endforeach
@endsection

@section('content')
    <h1>Produits mis en avant</h1>

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $product->name }} - {{ $product->price }} €
                </a>
            </li>
        @endforeach
    </ul>
@endsection
