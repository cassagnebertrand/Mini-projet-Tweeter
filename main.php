<?php

session_start();

/* pour le chargement automatique des classes d'Eloquent (dans le répertoire vendor) */
require_once 'vendor/autoload.php';

$db_config = parse_ini_file("conf/config.ini");

/* une instance de connexion  */
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection( $db_config ); /* configuration avec nos paramètres */
$db->setAsGlobal();            /* rendre la connexion visible dans tout le projet */
$db->bootEloquent();           /* établir la connexion */

\iutnc\mf\view\AbstractView::addStyleSheet("./styles/styles.css");
// \iutnc\mf\view\AbstractView::setAppTitle('Titre page');


use \iutnc\tweeterapp\auth as AUTH;
use iutnc\tweeterapp\auth\TweeterAuthentification;

$router = new \iutnc\mf\router\Router();

$router->addRoute('post',
    'post_tweet',
    '\iutnc\tweeterapp\control\PostController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_USER);
$router->addRoute('home',
    'list_tweets',
    '\iutnc\tweeterapp\control\HomeController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('view',
    'view_tweet',
    '\iutnc\tweeterapp\control\TweetController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('user',
    'view_user_tweets',
    '\iutnc\tweeterapp\control\UserController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('signup',
    'signup',
    '\iutnc\tweeterapp\control\SignupController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('login',
    'login',
    '\iutnc\tweeterapp\control\LoginController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('logout',
    'logout',
    '\iutnc\tweeterapp\control\LogoutController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_USER);
$router->addRoute('following',
    'view_following',
    '\iutnc\tweeterapp\control\FollowingController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_USER);
$router->addRoute('following-tweet',
    'view_following_tweet',
    '\iutnc\tweeterapp\control\FollowingTweetController',
    AUTH\TweeterAuthentification::ACCESS_LEVEL_USER);

$router->setDefaultRoute('list_tweets');




$router->run();




/*
$idUser = TweeterAuthentification::connectedUser();
$user = \iutnc\tweeterapp\model\User::where('id', '=', $idUser)->first();
$follow = $user->follows()->get();

foreach ($follow as $follo){
    var_dump($follo->username);
}
*/


