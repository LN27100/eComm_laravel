<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>

    <!-- Formulaire d'ajout de produit -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Nom du produit</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required>
        </div>

        <div>
            <label for="categories">Catégories</label>
            <select name="categories[]" id="categories" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image">Image du produit</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <button type="submit">Ajouter le produit</button>
        </div>
    </form>

    <a href="{{ route('products.index') }}">Retour à la liste des produits</a>
</body>
</html>
