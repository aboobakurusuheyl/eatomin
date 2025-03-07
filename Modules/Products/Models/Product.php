<?php

namespace Modules\Products\Models;

use Modules\Restaurants\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'description',
        'price',
        'meta',
        'image_url',
    ];

    protected $with = ['category'];

    protected $casts = [
        'meta' => 'json',
    ];

    public function category() {
        return $this->belongsTo(ProductCategory::class);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}