<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['slug', 'name', 'context', 'description'];
    
    public function roles() {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}