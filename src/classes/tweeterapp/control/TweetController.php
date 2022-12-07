<?php

namespace iutnc\tweeterapp\control;

use iutnc\tweeterapp\view\TweetView;

class TweetController extends \iutnc\mf\control\AbstractController
{

    /* Algorithme de execute :
*
*  1 L'identifiant du Tweet en question est passé en paramètre (id)
*      d'une requête GET
*  2 Récupérer le Tweet depuis le modèle Tweet
*  3 Afficher toutes les informations du tweet
*      (text, auteur, date, score)
*  4 Retourner un block HTML qui met en forme le Tweet
*
*  Erreurs possibles : (*** à implanter ultérieurement ***)
*    - pas de paramètre dans la requête
*    - le paramètre passé ne correspond pas a un identifiant existant
*    - le paramètre passé n'est pas un entier
*
*/

    public function execute(): void
    {
        if (isset($this->request->get['id'])){
            $tweetId = $this->request->get['id'];
            $reqGetATweets = \iutnc\tweeterapp\model\Tweet::select()->where('id','=',$tweetId)->first();
            $view = new TweetView($reqGetATweets);
            $view->makePage();
        }
    }
}