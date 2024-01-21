<?php

namespace recettes\Controllers ;
use recettes\Models\Recipe ;

class MainController extends CoreController {

    public function home($params) {  //meme si on t=utilse  pas params on le met en arg
 
        $this->show('home',['errors'=>$errorList]); 

    /**
     * Réceptionne le formulaire de login
     */
    //    public function loginPost()
    //{
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'password');

        $errorList = [];
        if(is_null($login) || is_null($password)) {
            dd("Erreur !");
            $errorList[] = "Formulaire erronné.";
        }

        $user = User::findBylogin($login);

        if($user == false) {
            $errorList[] = "Adresse email ou mot de passe incorrect.";
        } else {
            if (password_verify($password, $user->getPassword())) {
                echo "Bienvenue " . $user->getFirstname() . ' ' . $user->getLastname() . " !";
                $_SESSION['userId'] = $user->getId();
                $_SESSION['userObject'] = $user;
                header("Location: " . $this->router->generate('user-space'),['user' => $user->getID()]);
                exit;       
            } else {
                // le mot de passe fourni ne correspond pas à celui en BDD
                //! ATTENTION : on ne doit JAMAIS préciser si c'est l'email ou le mdp qui est incorrect.
                //die("Adresse email ou mot de passe incorrect.");
                $errorList[] = "Adresse email ou mot de passe incorrect.";
            }
        }


        // si on arrive ici, c'est qu'il y a eu une erreur, donc on ré-affiche le formulaire AVEC les erreurs !
        // donc on réutilise ici la méthode show() et lui on passe le tableau errorList ! 
        $this->show('security/login', [
            'errorList' => $errorList
        ]);
    }

} 
