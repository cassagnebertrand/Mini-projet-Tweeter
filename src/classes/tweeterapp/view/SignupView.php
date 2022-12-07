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
                <input class='forms-text' type='text' name='fullname' placeholder='full Name'>
                <input class='forms-text' type='text' name='username' placeholder='username'>
                <input class='forms-text' type='password' name='password' placeholder='password'>
                <input class='forms-text' type='password' name='password_verify' placeholder='retype password'>
                
                <button class='forms-button' name='login_button' type='submit'>Create</button>
            </form>
       </article>";
    }
}