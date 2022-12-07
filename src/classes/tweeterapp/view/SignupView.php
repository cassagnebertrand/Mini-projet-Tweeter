<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;

class SignupView extends TweeterView implements Renderer
{
    public function render(): string
    {
        $signupUrl = $this->router->urlFor('signup');
        return "
        <article class='theme-backcolor2'>
            <form action='$signupUrl' method='post'>
                <input class='forms-text' type='text' name='fullname' placeholder='Nom et Prénom'>
                <input class='forms-text' type='text' name='username' placeholder='Pseudo'>
                <input class='forms-text' type='password' name='password' placeholder='Mot de passe (minimum 6 caracteres)'>
                <input class='forms-text' type='password' name='password_verify' placeholder='Réécrire le mot de passe'>
                
                <button class='forms-button' name='login_button' type='submit'>S'inscrire</button>
            </form>
       </article>";
    }
}