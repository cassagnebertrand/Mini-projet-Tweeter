<?php

namespace iutnc\tweeterapp\control;

use iutnc\tweeterapp\view\HomeView;

class HomeController extends \iutnc\mf\control\AbstractController
{
    public function __construct()
    {
        parent::__construct();
    }

    /* Algorithme de execute:
 *
 *  1 Récupérer tous les tweets en utilisant le modèle Tweet
 *  2 Parcourir le résultat
 *      construire la chaine HTML qui contien :
 *      le text du tweet, l'auteur et la date de création
 *  3 Retourner un block HTML qui met en forme la liste
 *
 */

    public function execute():void
    {
        $reqGetAllTweets = \iutnc\tweeterapp\model\Tweet::select()->orderByDesc('updated_at')->get();
        $view = new HomeView($reqGetAllTweets);
        $view->makePage();

    }
}