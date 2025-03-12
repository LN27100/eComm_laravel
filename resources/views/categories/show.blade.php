@extends('layouts.app')

@section('title', $category->name)

@section('nav-links')
    @foreach ($breadcrumbs as $breadcrumb)
        <li><a href="{{ url('/categories/' . \App\Models\Category::where('name', $breadcrumb)->first()->slug) }}">{{ $breadcrumb }}</a></li>
    @endforeach
@endsection

@section('content')
    <h1>{{ $category->name }}</h1>

    @if ($category->children->isNotEmpty())
        <h2>Sous-catégories</h2>
        <ul>
            @foreach ($category->children as $childCategory)
                <li><a href="{{ url('/categories/' . $childCategory->slug) }}">{{ $childCategory->name }}</a></li>
            @endforeach
        </ul>
    @endif


    <!-- Pagination -->
    {{ $products->links() }}
@endsection
