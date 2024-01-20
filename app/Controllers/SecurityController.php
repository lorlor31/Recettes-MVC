<?php

namespace recettes\Controllers;

use App\Models\AppUser;

class SecurityController extends CoreController
{
    /**
     * Affiche le formulaire de login
     */
    public function login()
    {
        $this->show('security/login');
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

    /**
     * Réceptionne le formulaire de login
     */
    public function loginPost()
    {
        //dd($_POST);

        //! filter_input permet de faire la même chose qu'isset()

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        // on créé un tableau vide errorList
        $errorList = [];

        // on peut vérifier si le champ est null ou pas
        if(is_null($email) || is_null($password)) {
            //dd("Erreur !");
            $errorList[] = "Formulaire erronné.";
        }

        $user = AppUser::findByEmail($email);

        if($user == false) {
            // adresse email non trouvée !
            //! ATTENTION : on ne doit JAMAIS préciser si c'est l'email ou le mdp qui est incorrect.
            //die("Adresse email ou mot de passe incorrect.");
            $errorList[] = "Adresse email ou mot de passe incorrect.";
        } else {
            // adresse email correcte ! 
            // on vérifie le mot de passe !
            //if($password !== $user->getPassword()) {
            //* maintenant que les mots de passe sont hachés en BDD, il faut utiliser password_verify() pour comparer le mdp avec son hash !
            if (password_verify($password, $user->getPassword())) {
                // mot de passe correct, utilisateur connecté ! 
                //echo "Bienvenue " . $user->getFirstname() . ' ' . $user->getLastname() . " !";
                
                // on stocke en session l'ID et l'objet utilisateur
                $_SESSION['userId'] = $user->getId();
                $_SESSION['userObject'] = $user;

                header("Location: " . $this->router->generate('main-home'));
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
