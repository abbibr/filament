<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'number',
        'total_price',
        'status',
        'shipping_price',
        'notes',
    ];

    public function customer() 
    {
        return $this->belongsTo(Customer::class);
    }

    public function items() 
    {
        return $this->hasMany(OrderItem::class);
    }
}
