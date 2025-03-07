<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'profile_type', 'display_name', 'profile_details'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function roles() {
        return $this->belongsToMany(Role::class, 'profile_role');
    }
    
    public function restaurants() {
        return $this->hasMany(Restaurant::class);
    }
    
    public function orders() {
        return $this->hasMany(Order::class, 'customer_profile_id');
    }
    
    public function deliveries() {
        return $this->hasMany(Order::class, 'delivery_profile_id');
    }
}