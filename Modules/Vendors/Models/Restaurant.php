<?php

namespace Modules\Vendors\Models;

use App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['profile_id', 'name', 'address', 'latitude', 'longitude', 'logo_url'];
    
    public function owner() {
        return $this->belongsTo(Profile::class);
    }
    
    public function menus() {
        return $this->hasMany(Menu::class);
    }
}