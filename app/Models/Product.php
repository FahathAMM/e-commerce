<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'qty',
        'tex',
        'status',
        'trending',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'image',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
