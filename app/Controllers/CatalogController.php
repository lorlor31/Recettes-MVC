<?php

namespace recettes\Controllers ;
use recettes\Models\Recipe ;
use recettes\Models\Ingredients_list ;
use recettes\Models\Step ;
use recettes\Models\Comment ;
use recettes\Utils\Database ;
use recettes\Models\CoreModel;

class CatalogController extends CoreController {

    function recettes($params) {
        $recipeId=$params['id'] ;
// Récupération des infos de la recette $id
        $recipeModel= new Recipe () ;
        $currentRecipe = $recipeModel->find($recipeId) ;
//A CONTINUER ATTENTION LES METHODES N ONT OAS ETE ATTRIBUEES
// Récupération des ingrédients de la recette $id     
        $ingredients_listModel= new Ingredients_list() ;
        $ingredients_list = $ingredients_listModel->findAllIngredientsByRecipeID($recipeId) ;
// Récupération des steps de la recette $id     
        $stepModel= new Step() ;
        $steps = $stepModel->findAllStepsByRecipeID($recipeId) ;
// Récupération des commentaires de la recette $id          
        $comments=Comment::findAllCommentsWithUserNameByRecipeID($recipeId) ;
        return $this->show('recipe/recipe',[
                'currentRecipe'=>$currentRecipe,
                'ingredients_list'=>$ingredients_list,
                'steps'=>$steps,
                'comments'=>$comments,
            ]
        ) ;
    }

}
