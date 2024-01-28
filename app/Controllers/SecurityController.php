<?php

namespace recettes\Controllers;

use recettes\Models\User;

class SecurityController extends CoreController
{
    /**
     * Affiche le formulaire de login
     */
    public function login()
    {
        $this->show('main/login');
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout()
    {
        // pour déconnecter l'utilisateur, on "détruit" (on ferme complètement) sa session
        //session_destroy();

        // problème de session_destroy : on vire vraiment tout ! (donc si on a d'autres données dedans, ça peut poser problème)
        // si on veut éviter de détruire complètement la session, on peut simplement supprimer les données 'userId' et 'userObject'
        unset($_SESSION['userId']);
        unset($_SESSION['userObject']);

        // une fois l'utilisateur déconnecté, on le redirige !
        header('Location: ' . $this->router->generate('security-login'));
        exit;
    }

    
    
}
