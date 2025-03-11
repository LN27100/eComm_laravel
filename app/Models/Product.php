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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
