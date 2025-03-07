<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaOAuths extends Model
{
    protected $table = 'social_media_oauth';

    protected $fillable = ['user_id', 'provider', 'social_id', 'access_token', 'refresh_token', 'token_expiration'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}