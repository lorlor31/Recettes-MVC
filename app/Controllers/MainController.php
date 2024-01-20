<?php

namespace recettes\Controllers ;
use recettes\Models\Recipe ;

class MainController {

    public $router ;

    public function show($template,$viewData=[]) { 

//Variables dont on a besoin partout
        
        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;
        dump($router->match());
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
      
           
        $this->show('home'); 

    }

    public function informations($params) {  //meme soi on t=utilse  pas parmas on le met en arg
        $this->show('informations') ;

    }

    function __construct($router) {
        $this->router=$router ;
    }
}