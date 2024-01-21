<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends CoreController
{

    public function list(){
        $users = User::findAll();
        $this->show('appuser/list', [
            'users' => $users
        ]);
    }

    public function add(){
        $user = new User();
        $this->show('appuser/add', [
            'user' => $user
        ]);
    }

    public function addPost(){
        $email = filter_input(INPUT_POST, 'email');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $password = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status');


        $errorList = [];

        if(is_null($email) || is_null($firstname) || is_null($lastname) || is_null($password) || is_null($role) || is_null($status)) {
            $errorList[] = "Formulaire incomplet (champ manquant !)";
        }

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

        if(User::findByEmail($email) !== false) {
            $errorList[] = "L'adresse email est déjà utilisée !";
        }


        if(mb_strlen($password) < 8) {
            $errorList[] = "Le mot de passe doit faire au minimum 8 caractères.";
        }

        if(strtolower($password) === $password) {
            $errorList[] = "Le mot de passe doit contenir au moins une lettre majuscule.";
        }

        if(strtoupper($password) === $password) {
            $errorList[] = "Le mot de passe doit contenir au moins une lettre minuscule.";
        }

        if(ctype_alpha($password)) {
            $errorList[] = "Le mot de passe doit contenir au moins un chiffre.";
        }

        $user = new User();
        $user->setEmail($email);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setRole($role);
        $user->setStatus($status);

        if(empty($errorList)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user->setPassword($hash);
            if($user->save()) {
                header("Location: " . $this->router->generate('user-list'));
                exit;
            } else {
                $errorList[] = "Erreur lors de l'ajout en BDD.";
            }
        }

        $this->show('appuser/add', [
            'user' => $user,
            'errorList' => $errorList
        ]);

    }
}