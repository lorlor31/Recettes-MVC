<?php

namespace recettes\Controllers;

use recettes\Models\User;

class UserController extends CoreController
{

    public function list(){
        $users = User::findAll();
        $this->show('user/list', [
            'users' => $users
        ]);
    }
//AREVOIR
    public function space(){
        //$users = User::findAll();
        $this->show('user/space', [
            
        ]);
    }

    public function add(){
        $user = new User();
        $this->show('user/add', [
            'user' => $user,
            'errors' => []
        ]);
    }

    public function addPost(){
        $errorList = [];
        $login = filter_input(INPUT_POST, 'login');
        $pwd = filter_input(INPUT_POST, 'pwd');
        $role = filter_input(INPUT_POST, 'role');
        //var_dump($_POST) ;
        if(is_null($login) || is_null($pwd) || is_null($role)) {
            $errors[] = "Formulaire incomplet (champ manquant !)";
        }
        if(empty($login)) {
            $errors[] = "Le login ne peut pas être vide !";
        }

        if(empty($pwd)) {
        $errors[] = "Le mot de passe ne peut pas être vide !";
        }
        if(User::findByLogin($login) !== false) {
        $errors[] = "Ce login est déjà utilisé !";
        }

     

        $user = new User();
        $user->setLogin($login);
        $user->setPwd($pwd);
        $user->setRole($role);


        if(empty($errors)) {
            $hash = password_hash($pwd, PASSWORD_DEFAULT);
            $user->setPwd($hash);
            if($user->save()) {
                header("Location: " . $this->router->generate('user-list'));
                exit;
            } else {
                $errors[] = "Erreur lors de l'ajout en BDD.";
            }
        }

        $this->show('user/add', [
            'user' => $user,
            'errors' => $errors
        ]);

    }
}