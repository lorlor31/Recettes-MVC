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


//ADD POUR UTILISATEUR LAMBDA    
    public function add(){
        $user = new User();
        $this->show('user/add', [
            'user' => $user,
            'errors' => []
        ]);
    }

    public function addPost(){
        $errors = [];
        $login = filter_input(INPUT_POST, 'login');
        $pwd = filter_input(INPUT_POST, 'pwd');
        $role = 'user';
        //var_dump($_POST) ;
        if(is_null($login) || is_null($pwd) ) {
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


//ADD POUR ADMIN - CHOISIT UN ROLE

    public function addAdmin(){
        $user = new User();
        $this->show('user/addAdmin', [
            'user' => $user,
            'errors' => []
        ]);
    }

    public function addAdminPost(){
        $errors = [];
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


    //COPIER COLLER A MODIFIER


    public function update($id) //BUG PORQUOI ID EST UN ARRAY
    // {   $idInt=$id['id'] ; va faaloir que je fasse ça partout ?? Altodispatcher
        $userToUpdate = User::find($id);
        dump($idInt) ;
        $this->show('user/update', [
            'userToUpdate' => $userToUpdate
        ]);
    }

    public function updatePost($id)
    {
        $login = filter_input(INPUT_POST, 'login');
        $pwd = filter_input(INPUT_POST, 'pwd');
        $role = filter_input(INPUT_POST, 'role');

        $errors = [];

        if(is_null($login) || is_null($pwd) || is_null($role)) {
            $errors[] = "Formulaire erronné.";
        }

        if(empty($login)) {
            $errors[] = "Sans login, comment tu vas t'identifier ? ";
        }
        if(empty($pwd)) {
            $errors[] = "Sans mot de passe, ça va être compliqué !";
        }

        if(mb_strlen($name) > 64) {
            $errors[] = "Aurais-tu des origines martiennes ? ";
        }
        if(mb_strlen($name) < 1) {
            $errors[] = "On n'a pas demandé ton initiale mais un login...";
        }

        $userToUpdate = Category::find($id);
        $userToUpdate->setLogin($login);
        $userToUpdate->setPwd($pwd);
        $userToUpdate->setRole($role);

        if(empty($errors)) {
            if($category->save()) {
                header('Location: ' . $this->router->generate('user-list'));
                exit;
            } else {
                $errors[] = "Erreur lors de la sauvegarde en base de données.";
            }
        }
        
        // si on arrive ici, c'est que quelque-chose s'est mal passé
        $this->show('user/update', [
            'userToUpdate' => $userToUpdate,
            'errors' => $errors
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        header("Location: " . $this->router->generate('user-list'));
    }

}