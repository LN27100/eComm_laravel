@extends('layouts.app')

@section('title', $product->name)

@section('nav-links')
    @foreach ($product->categories as $category)
        <li><a href="{{ url('/categories/' . $category->slug) }}">{{ $category->name }}</a></li>
    @endforeach
    <li>{{ $product->name }}</li>
@endsection

@section('content')
    <h1>{{ $product->name }}</h1>

    <p>{{ $product->description }}</p>
    <p>{{ $product->price }} €</p>

    @foreach ($product->images as $image)
        <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $product->name }}" style="width: 200px;">
    @endforeach

    <h2>Produits similaires</h2>
    <ul>
        @foreach ($similarProducts as $similarProduct)
            <li>{{ $similarProduct->name }} - {{ $similarProduct->price }} €</li>
        @endforeach
    </ul>
@endsection
