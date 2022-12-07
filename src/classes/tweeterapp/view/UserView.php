<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;

class UserView extends TweeterView implements Renderer
{

    public function render(): string
    {
        $user = $this->data;
        if (isset($user)){
            $liste_tweets = $user->tweets()->get();
            $countTweets = count($liste_tweets);

            $html = "<article class='theme-backcolor2'>
                    <div class='tweet'>
                    <hr>
                        <span>Nom de l'utilisateur: $user->fullname</span><br>
                        <span>Pseudo de l'utilisateur: $user->username</span><br>
                        <span>Nombre de followers de l'utilisateur: $user->followers</span><br>
                        <span>Nombre de tweet: $countTweets</span>
                    <hr>
                    </div>";

            if ($countTweets==0){

                $html .="<div class='noTweet'>Cet utilisateur n'a pas de tweet</div>";

            } else{

                $html .="<div class='tweets'>";
                foreach ($liste_tweets as $tweet){
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
                    </div>";
                }

            }
            $html .="</article>";
            return $html;

        }else{
            return "<article class='theme-backcolor2'><div>Aucune information</div></article>";
        }

    }

}