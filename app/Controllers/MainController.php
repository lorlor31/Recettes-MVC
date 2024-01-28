<?php

namespace recettes\Controllers ;

use recettes\Models\Recipe ;
use recettes\Models\User;

class MainController extends CoreController {

    public function home($params) {
        $errors = [];
        $this->show('main/home',['errors'=>$errors]); 
    }

    public function login($params) {

    /**
     * Réceptionne le formulaire de login
     */
    //    public function loginPost()
    //{
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'pwd');

        $errors = [];
        if(is_null($login) || is_null($password)) {
            $errors[] = "Formulaire erronné.";
        }
        if(empty($login)) {
            $errorList[] = "Le login ne peut pas être vide !";
        }
        if(empty($password)) {
            $errorList[] = "Le password ne peut pas être vide !";
        }
        $user = User::findBylogin($login);
        // dump("bonjour $user->getLogin()") ;
        if($user == false) {
            $errors[] = "Adresse email ou mot de passe incorrect.";
        } 
        else {
            if (password_verify($password, $user->getPwd())) {
                echo "Bienvenue". $user->getLogin()." !";
                $_SESSION['userId'] = $user->getId();
                $_SESSION['userObject'] = $user;
                $login=$user->getLogin() ;
                //dump ($_SESSION) ;
                header("Location: " . $this->router->generate('user-space',['login' => $user->getLogin()]));
                //header("Location: " .$this->router->generate('user-space', ['login' => $user->getLogin()]));
                exit;       
            } 
            else {
                // le mot de passe fourni ne correspond pas à celui en BDD
                //! ATTENTION : on ne doit JAMAIS préciser si c'est l'email ou le mdp qui est incorrect.
                //die("Adresse email ou mot de passe incorrect.");
                $errors[] = "Adresse email ou mot de passe incorrect.";
            }
        }
        //dump ($_SESSION) ;
        $this->show('main/home',[
            'errors'=>$errors,
            'login'=>$login,
        ]); 
    }

    public function logout()
    {
        // pour déconnecter l'utilisateur, on "détruit" (on ferme complètement) sa session
        //session_destroy();

        // problème de session_destroy : on vire vraiment tout ! (donc si on a d'autres données dedans, ça peut poser problème)
        // si on veut éviter de détruire complètement la session, on peut simplement supprimer les données 'userId' et 'userObject'
        unset($_SESSION['userId']);
        unset($_SESSION['userObject']);
        //dump ($_SESSION) ;
        // une fois l'utilisateur déconnecté, on le redirige !
        header('Location: ' . $this->router->generate('main-home'));
        exit;
    }

} 
