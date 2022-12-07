<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;
use iutnc\tweeterapp\auth\TweeterAuthentification;

abstract class TweeterView extends \iutnc\mf\view\AbstractView implements Renderer
{
    protected function makeHeader(): string
    {
        $homeUrl = $this->router->urlFor('home');
        $loginUrl = $this->router->urlFor('login');
        $followsUrl = $this->router->urlFor('following');
        $logoutUrl = $this->router->urlFor('logout');
        return " 
            <h1> MiniTweeTR</h1>
            <nav id='navbar'>
                <a class='tweet-control' href='$homeUrl'>
                    <img alt='home' src='#'>
                </a>
                <a class='tweet-control' href='$loginUrl'>
                    <img alt='login' src='#'>
                </a>
                <a class='tweet-control' href='$followsUrl'>
                    <img alt='follows' src='#'>
                </a>
                <a class='tweet-control' href='$logoutUrl'>
                    <img alt='logout' src='#'>
                </a>
            </nav>";
    }
    protected function makeFooter(): string
    {
        return "La super app créée en Licence Pro ©2022";
    }

    protected function renderBottomMenu(): string{

        $postUrl = $this->router->urlFor('post');

        $user = TweeterAuthentification::connectedUser();
        if (isset($user)){
            return "<nav id='menu' class='theme-backcolor1'>
                        <div id='nav-menu'>
                           <div class='button theme-backcolor2'><a href='$postUrl'>Nouveau tweet</a></div>
                        </div>
                    </nav>";
        }else{
            return'';
        }


    }

    protected function renderTopMenu(): string{
        $homeUrl = $this->router->urlFor('home');
        $loginUrl = $this->router->urlFor('login');
        $followsUrl = $this->router->urlFor('following');
        $logoutUrl = $this->router->urlFor('logout');
        $followsTweetUrl = $this->router->urlFor('following-tweet');



        $user = TweeterAuthentification::connectedUser();
        if (isset($user)){
            return "
                <h1>MiniTweeTR</h1>
                <nav id='navbar'>
                    <a class='tweet-control' href='$homeUrl'>
                        <i class='fas fa-house-user'></i>
                    </a>
                    <a class='tweet-control' href='$followsTweetUrl'>
                        <i class='fas fa-users'></i>
                    </a>
                    <a class='tweet-control' href='$followsUrl'>
                        <i class='fas fa-user'></i>
                    </a>
                    <a class='tweet-control' href='$logoutUrl'>
                        <i class='fas fa-sign-out-alt'></i>
                    </a>
                </nav>";
        }else{
            return "
                <h1>MiniTweeTR</h1>
                <nav id='navbar'>
                    <a class='tweet-control' href='$homeUrl'>
                        <i class='fas fa-house-user'></i>
                    </a>

                    <a class='tweet-control' href='$loginUrl'>
                        <i class='fas fa-sign-in-alt'></i>
                    </a>
                </nav>";
        }

    }





    protected function makeBody(): string
    {

        $header = $this->renderTopMenu();
        $section=$this->render();
        $footer = $this->makeFooter();
        $bottomMenu = $this->renderBottomMenu();




        $html = <<<EOT

<header class="theme-backcolor1"> ${header} </header>
<section>

    ${section}
    ${bottomMenu}

</section>
<footer class="theme-backcolor1"> ${footer} </footer>

EOT;
        return $html;
    }


}