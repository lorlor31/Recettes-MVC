<?php

class CatalogController {

    public $router ;

    function show($viewname,$viewData=[]) {

        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;
        
        $recipeModel=new Recette() ;
        $recipesList=$recipeModel->findAll();
        $viewData['recipesList']=$recipesList ;

        require __DIR__.'/../Views/header.tpl.php' ;
        require __DIR__."/../Views/$viewname.tpl.php" ;
        require __DIR__.'/../Views/footer.tpl.php' ;
    }

    function recettes($params) {
        $recetteModel= new Recette () ;
        $currentRecette = $recetteModel->find($params['id']) ;
        $viewData['currentRecette']=$currentRecette;
        return $this->show('recipe',$viewData) ;

    }

    function __construct($router) {
        $this->router=$router ;
    }
}
