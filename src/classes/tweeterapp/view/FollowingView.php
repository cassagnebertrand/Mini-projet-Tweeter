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


        $html="<article class='theme-backcolor2'>
                <h2>Currently following</h2>
                    <ul id='followees'>";
        foreach ($follows as $follow){
            $username = $follow->username;
            $userUrl = $this->router->urlFor('user',[['id',$follow->id]]);
            $html.="<li>
                        <a href='$userUrl'>$username</a>
                    </li>";
        }
        $html.="</ul>
                </article>";
        return $html;
    }
}