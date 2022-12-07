<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;

class TweetView extends TweeterView implements Renderer
{

    public function render(): string
    {

        $tweet = $this->data;

        if (isset($tweet)){
            $author = $tweet->author()->first();
            $tweetUrl = $this->router->urlFor('view',[['id',$tweet->id]]);
            $authorUrl = $this->router->urlFor('user',[['id',$author->id]]);
            return "<article class='theme-backcolor2'>
                    <div class='tweet'>
                        <a href='$tweetUrl'>
                            <div class='tweet-text'>$tweet->text</div>
                        </a>
                        <div class='tweet-footer'>
                            <span class='tweet-timestamp'>$tweet->created_at</span>
                            <span class='tweet-author'>
                            <a href='$authorUrl'>$author->username</a>
                            </span>
                            </div>
                            <div class='tweet-footer'>
                            <hr>
                            <span class='tweet-score tweet-control'>$tweet->score</span>
                        </div>
                    </div>
                    </article>";
        }else{
            return "<article class='theme-backcolor2'><div>Aucune information</div></article>";

        }
    }
}