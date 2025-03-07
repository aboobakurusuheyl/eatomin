<?php

namespace Modules\Vendors\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItemCustomization extends Model
{
    // TYPES
    static $TYPE_SIZE = 'size';
    static $TYPE_TOPPING = 'topping';
    static $TYPE_SIDE = 'side';

    protected $fillable = ['menu_item_id', 'name', 'type', 'options', 'calories'];

    protected $casts = [
        'options' => 'json',
    ];

    public function item() {
        return $this->belongsTo(MenuItem::class);
    }
}