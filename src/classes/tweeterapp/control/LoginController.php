<?php

namespace iutnc\tweeterapp\control;

use iutnc\mf\exceptions\AuthentificationException;
use iutnc\mf\router\Router;
use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\tweeterapp\view\LoginView;
use iutnc\tweeterapp\view\SignupView;

class LoginController extends \iutnc\mf\control\AbstractController
{

    public function execute(): void
    {
        try {

            if ($this->request->method == 'GET'){
                $view = new LoginView();
                $view->makePage();
            }elseif ($this->request->method == 'POST'){

                if (!empty($_POST['username']) && !empty($_POST['password'])){

                    TweeterAuthentification::login($_POST['username'],$_POST['password']);

                    Router::Executeroute('following');
                }else{
                    throw new AuthentificationException('Un champ est vide');
                }
            }
        }catch (AuthentificationException $e){
            echo $e->getMessage();
            $view = new LoginView();
            $view->makePage();
        }
    }

}