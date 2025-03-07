<?php

namespace Modules\Vendors\Models;

use Modules\Restaurants\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['restaurant_id', 'name', 'description', 'image_url', 'available_from', 'available_to', 'is_default'];
    
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
    
    public function items() {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }
}