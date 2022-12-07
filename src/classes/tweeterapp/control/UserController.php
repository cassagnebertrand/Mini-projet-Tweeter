<?php

namespace iutnc\tweeterapp\control;

use iutnc\tweeterapp\view\UserView;

class UserController extends \iutnc\mf\control\AbstractController
{

    /*
*
*  1 L'identifiant de l'utilisateur en question est passé en
*      paramètre (id) d'une requête GET
*  2 Récupérer l'utilisateur et ses Tweets depuis le modèle
*      Tweet et User
*  3 Afficher les informations de l'utilisateur
*      (non, login, nombre de suiveurs)
*  4 Afficher ses Tweets (text, auteur, date)
*  5 Retourner un block HTML qui met en forme la liste
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
            $userId = $this->request->get['id'];
            $user = \iutnc\tweeterapp\model\User::where('id', '=', $userId)->first();
            $view = new UserView($user);
            $view->makePage();
        }
    }
}