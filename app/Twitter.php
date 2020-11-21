<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function favorites_user() {
        return $this->belongsToMany(User::class, 'favorites', 'twitter_id', 'user_id')->withTimestamps();
    }
}
