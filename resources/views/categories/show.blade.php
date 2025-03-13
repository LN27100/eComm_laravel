@extends('layouts.app')

@section('title', $category->name)

@section('nav-links')
    @foreach ($breadcrumbs as $breadcrumb)
        <li><a href="{{ url('/categories/' . \App\Models\Category::where('name', $breadcrumb)->first()->slug) }}">{{ $breadcrumb }}</a></li>
    @endforeach
@endsection

@section('content')
   

    @if ($category->children->isNotEmpty())
        <h2>Sous-catégories</h2>
        <ul>
            @foreach ($category->children as $childCategory)
                <li><a href="{{ url('/categories/' . $childCategory->slug) }}">{{ $childCategory->name }}</a></li>
            @endforeach
        </ul>
    @endif

    @if ($products->isNotEmpty())
        <h2>Produits</h2>
        <ul>
            @foreach ($products as $product)
                <li><a href="{{ url('/products/' . $product->slug) }}">{{ $product->name }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Aucun produit trouvé dans cette catégorie.</p>
    @endif

    <!-- Pagination -->
    <div class="">
        {{ $products->links() }}
    </div>
@endsection
