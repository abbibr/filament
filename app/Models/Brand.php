<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'url',
        'primary_hex',
        'is_visible',
        'description',
    ];

    public function products() 
    {
        return $this->hasMany(Product::class);
    }
}
