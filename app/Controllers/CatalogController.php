<?php

namespace recettes\Controllers ;
use recettes\Models\Recipe ;
use recettes\Models\Ingredients_list ;
use recettes\Models\Step ;
use recettes\Models\Comment ;
//use recettes\Models\Ingredients_list ;
use recettes\Utils\Database ;

class CatalogController {

    public $router ;
    

    function show($viewname,$viewData=[]) {

        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;
        
// Récupération de toutes les recettes pour le menu du header       
    $recipeModel=new Recipe() ;
    $recipesList=$recipeModel->findAll();
    $viewData['recipesList']=$recipesList ;
        require __DIR__.'/../Views/header.tpl.php' ;
        require __DIR__."/../Views/$viewname.tpl.php" ;
        require __DIR__.'/../Views/footer.tpl.php' ;
    }

    function recettes($params) {
        $recipeId=$params['id'] ;
// Récupération des infos de la recette $id
        $recipeModel= new Recipe () ;
        $currentRecipe = $recipeModel->find($recipeId) ;
        $viewData['currentRecipe']=$currentRecipe;
//A CONTINUER ATTENTION LES METHODES N ONT OAS ETE ATTRIBUEES
// Récupération des ingrédients de la recette $id     
        $ingredients_listModel= new Ingredients_list() ;
        $ingredients_list = $ingredients_listModel->findAllIngredientsByRecipeID($recipeId) ;
        $viewData['ingredients_list']=$ingredients_list;
// Récupération des steps de la recette $id     
        $stepModel= new Step() ;
        $steps = $stepModel->findAllStepsByRecipeID($recipeId) ;
        $viewData['steps']=$steps;
// Récupération des commentaires de la recette $id          
        $comments=Comment::findAllCommentsWithUserNameByRecipeID($recipeId) ;
        $viewData['comments']=$comments;
        return $this->show('recipe',$viewData) ;
    }

    function __construct($router) {
        $this->router=$router ;
    }
}
