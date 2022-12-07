<?php

namespace iutnc\tweeterapp\model;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    protected $fullname = 'fullname';
    protected $username = 'username';
    protected $password = 'password';
    protected $level = 'level';
    protected $followers = 'followers';

    public function tweets(){
        return $this->hasMany('\iutnc\tweeterapp\model\Tweet', 'author');
    }

    public function liked(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\Tweet', 'like', 'user_id', 'tweet_id');
    }

    public function followedBy(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\User', 'follow', 'follower', 'followee');
    }

    public function follows(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\User', 'follow', 'followee', 'follower');
    }


}