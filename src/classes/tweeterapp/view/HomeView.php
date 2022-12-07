<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\router\Router;
use iutnc\mf\view\AbstractView;
use iutnc\mf\view\Renderer;
use iutnc\tweeterapp\control\HomeController;

class HomeView extends TweeterView implements Renderer
{

    public function render(): string
    {

        $tweets = $this->data;

        $html='<article class="theme-backcolor2"><h2>Derniers Tweets</h2>';
        foreach ($tweets as $tweet){
            $author = $tweet->author()->first();
            $tweetUrl = $this->router->urlFor('view',[['id',$tweet->id]]);
            $authorUrl = $this->router->urlFor('user',[['id',$author->id]]);
            $html.="<div class='tweet'>
                        <a href='$tweetUrl'>
                            <div class='tweet-text'>$tweet->text</div>
                        </a>
                        <div class='tweet-footer'>
                            <span class='tweet-timestamp'>$tweet->created_at</span>
                            <span class='tweet-author'>
                                <a href='$authorUrl'>$author->username</a>
                            </span>
                        </div>
                    </div>" ;
        }
        $html.='</article>';
        return $html;

    }
}