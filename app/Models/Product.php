<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id',
        'name',
        'slug',
        'sku',
        'image',
        'quantity',
        'is_visible',
        'description',
        'price',
        'is_featured',
        'type',
        'published_at',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories() 
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
