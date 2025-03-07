<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['slug', 'name', 'context', 'description'];
    
    public function users() {
        return $this->belongsToMany(UserProfile::class, 'profile_role');
    }
    
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}