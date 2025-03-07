<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'sort_order',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}