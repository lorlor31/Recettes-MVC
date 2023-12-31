<?php

class Ingredients_list {

    private $id ;
    private $recipe_id ;
    private $ingredient_id ;
    private $amount ;
    private $ingredient_order ;


//Fetcher sélection de champs de la table ingredients pour la recette $id 
// Leur quantité
// Leur nom
// Je peux pas utiliser FetchObject ds ce cas car le résultat a 
// un nb de propriétés différent selon la recette

    public function findAllStepsByRecipeID($recipeId)
	{
		$sql = "SELECT 
        ingredients_list.recipe_id,
        ingredients_list.ingredient_order,
        ingredients_list.amount,
        ingredients.unit,
        ingredients.name  
        FROM ingredients_list
        INNER JOIN recipes ON recipes.id = ingredients_list.recipe_id
        INNER JOIN ingredients ON ingredients.id = ingredients_list.ingredient_id
        WHERE recipes.id=$recipeId;";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$ingredients_list = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        dump($ingredients_list);
		return $ingredients_list;
	}

}