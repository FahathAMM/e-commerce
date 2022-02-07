<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'popular',
        'meta_keywords',
        'meta_describe',
        'description',
        'meta_title',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products()
    {
        return $this->HasMany(Product::class);
    }
}
