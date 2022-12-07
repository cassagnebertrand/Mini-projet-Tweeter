<?php

namespace iutnc\tweeterapp\control;

use iutnc\mf\exceptions\AuthentificationException;
use iutnc\mf\router\Router;
use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\tweeterapp\view\LoginView;

class LogoutController extends \iutnc\mf\control\AbstractController
{
    public function execute(): void
    {

            TweeterAuthentification::logout();
            session_destroy();
            Router::Executeroute('home');

    }
}