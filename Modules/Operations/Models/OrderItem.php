<?php

namespace Modules\Operations\Models;

use Modules\Vendors\Models\MenuItem;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'menu_item_id',
        'quantity',
        'customizations',
        'description',
        'price',
        'calories'
    ];

    protected $with = ['menuItem'];

    protected $casts = [
        'customizations' => 'json'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function menuItem() {
        return $this->belongsTo(MenuItem::class);
    }
}