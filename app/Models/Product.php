<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'active', 'slug'
    ];

    /**
     * Relations : Un produit peut avoir plusieurs catégories
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Relations : Un produit peut avoir plusieurs images
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Scope pour récupérer uniquement les produits actifs
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
