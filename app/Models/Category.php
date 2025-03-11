<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'parent_id', 'slug'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function ancestors()
    {
        $ancestors = collect();
        $parent = $this->parent;

        while ($parent) {
            $ancestors->prepend($parent);
            $parent = $parent->parent;
        }

        return $ancestors;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function allProducts()
    {
        return $this->products()->where('active', true);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
