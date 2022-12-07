<?php

namespace iutnc\tweeterapp\control;

use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\tweeterapp\view\FollowingTweetView;
use iutnc\tweeterapp\view\FollowingView;

class FollowingTweetController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {

        $idUser = TweeterAuthentification::connectedUser();
        $user = \iutnc\tweeterapp\model\User::where('id', '=', $idUser)->first();

        $follows = $user->follows()->get();
        $allFollowsId = [];
        foreach ($follows as $follow){
            $allFollowsId[] = $follow['id'];
        }
        $reqGetAllTweets = \iutnc\tweeterapp\model\Tweet::select()->whereIn('author',$allFollowsId)->orderByDesc('updated_at')->get();



        $view = new FollowingTweetView($reqGetAllTweets);
        $view->makePage();

    }
}