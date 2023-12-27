<?php

class MainController {

    public $router ;

    public function show($template,$viewData=[]) { 

        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;

        $recipeModel=new Recette() ;
        $recipesList=$recipeModel->findAll();
        $viewData['recipesList']=$recipesList ;

        require __DIR__.'/../Views/header.tpl.php' ;
        require __DIR__."/../Views/$template.tpl.php" ;
        require __DIR__.'/../Views/footer.tpl.php' ;
    } 

    public function home($params) {  //meme si on t=utilse  pas params on le met en arg
        //pour injecter les data à afficher
/*            // on créé un tableau vide
           $dataToSend = []; // facultatif
        
           // puis on ajoute nos données dans ce tableau associatif
           $dataToSend['clé'] = "valeur";
        
           // puis on l'envoie à la vue
           $this->show('home', $dataToSend); */
        
        
        $this->show('home') ;

    }

    public function informations($params) {  //meme soi on t=utilse  pas parmas on le met en arg
        $this->show('informations') ;

    }

    function __construct($router) {
        $this->router=$router ;
    }
}