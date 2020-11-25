<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function twitters() {
        return $this->hasMany(Twitter::class);
    }

    public function followings() {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }

    public function follow($userId) {
        //  既にフォローしているかの確認
        $exist = $this->is_following($userId);
        //  相手が自分自身ではないかの確認
        $its_me = $this->id === $userId;

        if ($exist || $its_me) {
            //  既にフォローしていれば何もしない
            return false;
        } else {
            //  未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }

    public function unfollow($userId) {
        //  既にフォローしているかの確認
        $exist = $this->is_following($userId);
        //  相手が自分自身でないかの確認
        $its_me = $this->id === $userId;

        if ($exist && !$its_me) {
            //  既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            //  未フォローであれば何もしない
            return false;
        }
    }

    public function is_following($userId) {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function feed_twitters() {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Twitter::whereIn('user_id', $follow_user_ids);
    }

    public function favorites() {
        return $this->belongsToMany(Twitter::class, 'favorites', 'user_id', 'twitter_id')->withTimestamps();
    }

    public function favorite($userId) {
        //  既にお気に入り登録しているかの確認
        $exist = $this->is_favorite($userId);

        if ($exist) {
            //  既にお気に入り登録済みだったら何もしない
            return false;
        } else {
            //  お気に入り登録されていなかったら
            $this->favorites()->attach($userId);
            return true;
        }
    }

    public function unfavorite($userId) {
        //  既にお気に入り登録しているかの確認
        $exist = $this->is_favorite($userId);

        if ($exist) {
            //  既にお気に入り登録済みだったらお気に入りを解除する
            $this->favorites()->detach($userId);
            return true;
        } else {
            //  お気に入り登録されていなかったら
            return false;
        }
    }

    public function is_favorite($userId) {
        return $this->favorites()->where('twitter_id', $userId)->exists();
    }
}
