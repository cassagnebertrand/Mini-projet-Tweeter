<?php

namespace iutnc\tweeterapp\model;

class Tweet extends \Illuminate\Database\Eloquent\Model
{
    protected $table      = 'tweet';
    protected $primaryKey = 'id';
    public    $timestamps = true;
    protected $text = 'text';
    protected $author = 'author';
    protected $score = 'score';


    public function author(){
        return $this->belongsTo('\iutnc\tweeterapp\model\User', 'author');
    }

    public function likedBy(){
        return $this->belongsToMany('\iutnc\tweeterapp\model\User', 'like', 'tweet_id', 'user_id');
    }


}