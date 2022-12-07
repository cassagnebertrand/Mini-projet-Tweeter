<?php

namespace iutnc\tweeterapp\view;

use iutnc\mf\view\Renderer;

class PostView extends TweeterView implements Renderer
{

    public function render(): string
    {
        $postUrl = $this->router->urlFor('post');
       return "
        <article class='theme-backcolor2'>
            <form action='$postUrl' method='post'>
               <div>
                   <label for='tweet'>Texte du nouveau tweet:</label><br>
                   <textarea type='text' id='tweet' name='tweet' ></textarea>
               </div>
               <div>
                   <button type='submit'>Envoyer <i class='far fa-paper-plane'></i></button>
               </div>
            </form>
       </article>";
    }
}