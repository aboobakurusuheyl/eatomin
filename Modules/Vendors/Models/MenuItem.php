<?php

namespace Modules\Vendors\Models;

use Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['restaurant_id', 'product_id', 'name', 'description', 'meta', 'image_url', 'is_heading', 'is_available', 'is_customizable', 'sort_order'];

    protected $casts = [
        'meta' => 'json',
    ];

    protected $with = ['product'];
    
    public function menu() {
        return $this->belongsTo(Menu::class);
    }
    
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function customizations() {
        return $this->hasMany(MenuItemCustomization::class);
    }
}