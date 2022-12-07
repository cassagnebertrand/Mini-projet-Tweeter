<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;
use iutnc\tweeterapp\auth\TweeterAuthentification;

class FollowingView extends TweeterView implements Renderer
{

    public function render(): string
    {
        $user = $this->data;

        $follows = $user->follows()->get();
        $followers = $user->followedBy()->get();
        $followersCount = $followers->count();


        $html="<article class='theme-backcolor2'>
                <h2>Nombre de follower : $followersCount</h2>
                <div class='flex-container'>
                <div>
                <h3>Liste des follows</h3>
                    <ul id='followees'>";
        foreach ($follows as $follow){
            $username = $follow->username;
            $userUrl = $this->router->urlFor('user',[['id',$follow->id]]);
            $html.="<li>
                        <a href='$userUrl'>$username</a>
                    </li>";
        }
        $html.="</ul></div><div><h3>Liste des followers</h3><ul>";
        foreach ($followers as $follower){
            $username = $follower->username;
            $userUrl = $this->router->urlFor('user',[['id',$follower->id]]);
            $html.="<li>
                        <a href='$userUrl'>$username</a>
                    </li>";
        }

$html.="</ul></div></div></article>";
        return $html;
    }
}