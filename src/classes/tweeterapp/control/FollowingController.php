<?php

namespace iutnc\tweeterapp\control;

use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\tweeterapp\view\FollowingView;

class FollowingController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {

        $idUser = TweeterAuthentification::connectedUser();
        $user = \iutnc\tweeterapp\model\User::where('id', '=', $idUser)->first();
        $view = new FollowingView($user);
        $view->makePage();

    }
}