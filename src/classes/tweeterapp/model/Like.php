<?php

namespace iutnc\tweeterapp\model;

class Like extends \Illuminate\Database\Eloquent\Model
{
    protected $table      = 'like';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    protected $user_id = 'user_id';
    protected $tweet_id = 'tweet_id';
}