<?php

namespace App\Controllers;

use App\Models\AppUser;

class AppUserController extends CoreController
{
    /**
     * Affiche la liste des utilisateurs
     */
    public function list()
    {
        //* pour restreindre l'accès à cette route aux admins uniquement, on utilise checkAuthorization() !
        // $this->checkAuthorization([
        //     'admin'
        // ]);

        // si l'user n'a pas le rôle admin, il n'atteindra jamais cet endroit dans le code !

        $users = AppUser::findAll();

        $this->show('appuser/list', [
            'users' => $users
        ]);
    }

    /**
     * Méthode qui affiche le formulaire d'ajout d'utilisateur
     */
    public function add()
    {
        //* pour restreindre l'accès à cette route aux admins uniquement, on utilise checkAuthorization() !
        // $this->checkAuthorization([
        //     'admin'
        // ]);

        // on créé un nouvel utilisateur vide
        // cet user vide sert à juste à éviter les erreurs vu qu'on essaye de pré-remplir le form en cas d'erreur et pour la modification.
        $user = new AppUser();

        $this->show('appuser/add', [
            'user' => $user
        ]);
    }

    /**
     * Méthode qui réceptionne le formulaire d'ajout d'utilisateur
     */
    public function addPost()
    {
        //dd($_POST);

        $email = filter_input(INPUT_POST, 'email');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $password = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status');

        // un tableau vide pour stocker les erreurs éventuelles
        $errorList = [];

        // on vérifie si filter_input a renvoyé null (c'est à dire si la donnée était absente du $_POST !)
        if(is_null($email) || is_null($firstname) || is_null($lastname) || is_null($password) || is_null($role) || is_null($status)) {
            $errorList[] = "Formulaire incomplet (champ manquant !)";
        }

        // tous les champs doivent être remplis
        if(empty($email)) {
            $errorList[] = "L'email ne peut pas être vide !";
        }
        if(empty($firstname)) {
            $errorList[] = "Le prénom ne peut pas être vide !";
        }
        if(empty($lastname)) {
            $errorList[] = "Le nom ne peut pas être vide !";
        }
        if(empty($password)) {
            $errorList[] = "Le mot de passe ne peut pas être vide !";
        }

        // l'adresse ne doit pas déjà avoir été utilisée dans la BDD
        if(AppUser::findByEmail($email) !== false) {
            $errorList[] = "L'adresse email est déjà utilisée !";
        }

        // le mot de passe doit faire 8 caractères minimum
        if(mb_strlen($password) < 8) {
            $errorList[] = "Le mot de passe doit faire au minimum 8 caractères.";
        }

        if(strtolower($password) === $password) {
            // tout est en minuscule dans le password
            $errorList[] = "Le mot de passe doit contenir au moins une lettre majuscule.";
        }

        if(strtoupper($password) === $password) {
            // tout est en majuscule dans le password
            $errorList[] = "Le mot de passe doit contenir au moins une lettre minuscule.";
        }

        if(ctype_alpha($password)) {
            // tous les caractères sont des lettres
            $errorList[] = "Le mot de passe doit contenir au moins un chiffre.";
        }

        // on créé un nouvel objet utilisateur vide
        $user = new AppUser();

        // on remplit les propriétés de cet utilisateur avec les données du form
        $user->setEmail($email);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setRole($role);
        $user->setStatus($status);

        // s'il n'y a pas d'erreurs, on ajoute en BDD
        if(empty($errorList)) {
            // si le tableau est vide, c'est qu'il n'y a pas eu d'erreur !

            // on hash le mot de passe 
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // et on stocke le hash dans notre objet utilisateur
            $user->setPassword($hash);

            // on sauvegarde notre objet en BDD avec la méthode save() !
            if($user->save()) {
                // save() a retourné true, c'est que tout s'est bien passé !

                header("Location: " . $this->router->generate('appuser-list'));
                exit;
            } else {
                $errorList[] = "Erreur lors de l'ajout en BDD.";
            }
        }

        // si on arrive ici, c'est qu'au moins une erreur a été rencontrée
        // donc, on ré-affiche le formulaire d'ajout !
        // et on lui envoie les données saisies par l'utilisateur ainsi que les messages d'erreur !
        $this->show('appuser/add', [
            'user' => $user,
            'errorList' => $errorList
        ]);

        // TODO : faire démo envoi requête HTTP sans passer par le form !
    }
}