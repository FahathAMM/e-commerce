<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tracking_no',
        'status',
        'message',
        'message',
        'total',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }
}
