<?php

namespace recettes\Controllers ;
// require __DIR__."/../Models/User.php" ;
// $login='lor' ;

class MainController {

    public $router ;

    public function show($template,$viewData=[]) { 

//Variables dont on a besoin partout
        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;
// Essayer d'utiliser un tabl asso ds viewData//
// Récupération de toutes les recettes pour le menu du header       
        $recipeModel=new Recipe() ;
        $recipesList=$recipeModel->findAll();
        $viewData['recipesList']=$recipesList ;

        require __DIR__.'/../Views/header.tpl.php' ;
        require __DIR__."/../Views/$template.tpl.php" ;
        require __DIR__.'/../Views/footer.tpl.php' ;
    } 

    public function home($params) {  //meme si on t=utilse  pas params on le met en arg
        // $userModel =new User() ;
    //  $login=$params['login'] ?? null ;
        // $isinDB= $userModel->findByLogin($login)  ;
        // if(empty($login)){
        //     $message= "Rentrez votre login !" ;
        // }
        // else if ($isinDB==false) {
        //     $message= "Vous etes pas ds la bd !" ;
        //     $login="";
        // }
        // else {
        //     if(empty($pwd)){
        //     $message= "Rentrez votre mot de passe !" ;
        //     }
        //     else if($usersLoginID[$login]!=$pwd) {
        //         $message= "Mot de passe invalide!" ;
        //     }
        //     else {
        //         $message= "Bienvenue {$login} !" ;
        //     }
        // }
        // //Retour 
        // if(!empty($GET)){
        //     header("Location: index.php");
        // }
           
        $this->show('home'); 

    }

    public function informations($params) {  //meme soi on t=utilse  pas parmas on le met en arg
        $this->show('informations') ;

    }

    function __construct($router) {
        $this->router=$router ;
    }
}