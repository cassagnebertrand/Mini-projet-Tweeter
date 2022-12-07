<?php

namespace iutnc\tweeterapp\control;

use iutnc\mf\router\Router;
use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\tweeterapp\model\Tweet;
use iutnc\tweeterapp\view\PostView;

class PostController extends \iutnc\mf\control\AbstractController
{

    public function execute(): void
    {
        if ($this->request->method == 'GET'){
            $view = new PostView();
            $view->makePage();
        }elseif ($this->request->method == 'POST'){

            if (!empty($_POST['tweet'])){
                $tweetToPost = htmlspecialchars($_POST['tweet'], ENT_QUOTES, 'UTF-8');
                $newTweet = new Tweet();
                $newTweet->text = $tweetToPost;
                $newTweet->author = TweeterAuthentification::connectedUser();
                $newTweet->save();
                Router::executeRoute('home');
            }else{
                $view = new PostView();
                $view->makePage();
            }
        }
    }
}