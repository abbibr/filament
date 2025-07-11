<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'is_visible',
        'description',
    ];

    public function parent() 
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function child() 
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products() 
    {
        return $this->belongsToMany(Product::class);
    }
}
