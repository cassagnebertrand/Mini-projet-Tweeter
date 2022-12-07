<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;

class LoginView extends TweeterView implements Renderer
{

    public function render(): string
    {
        $loginUrl = $this->router->urlFor('login');
        $signupUrl = $this->router->urlFor('signup');
        return "
        <article class='theme-backcolor2'>
            <form action='$loginUrl' method='post'>
                <input class='forms-text' type='text' name='username' placeholder='username'>
                <input class='forms-text' type='password' name='password' placeholder='password'>
                
                <button class='forms-button' name='login_button' type='submit'>Se connecter</button>
            </form>
            <a href='$signupUrl'>S'inscrire</a>
       </article>";
    }
}