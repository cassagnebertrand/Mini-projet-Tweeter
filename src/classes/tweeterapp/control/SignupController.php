<?php

namespace iutnc\tweeterapp\control;

use iutnc\mf\exceptions\AuthentificationException;
use iutnc\mf\router\Router;
use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\tweeterapp\model\Tweet;
use iutnc\tweeterapp\view\SignupView;
use mysql_xdevapi\Exception;

class SignupController extends \iutnc\mf\control\AbstractController
{

    public function execute(): void
    {
        try {

            if ($this->request->method == 'GET'){
                $view = new SignupView();
                $view->makePage();
            }elseif ($this->request->method == 'POST'){

                if (!empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['password'] && !empty($_POST['password_verify']))){

                    if ($_POST['password'] === $_POST['password_verify']){
                            TweeterAuthentification::register($_POST['username'],$_POST['fullname'],$_POST['password']);
                            Router::executeRoute('login');
                    }else{
                        throw new AuthentificationException('Les deux champs Mot de passe ne sont pas identiques');
                    }
                }else{
                    throw new AuthentificationException('Un champ est vide');
                }
            }
        }catch (AuthentificationException $e){
            echo $e->getMessage();
            $view = new SignupView();
            $view->makePage();
        }
    }

}