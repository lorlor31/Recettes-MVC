<?php

class Step {

    private $id ;
    private $recipe_id ;
    private $step_order ;
    private $description ;

//Fetcher toutes les steps de la recette $id 

    public function findAllStepsByRecipeID($recipeId)
	{
		$sql = "SELECT steps.* FROM steps
        INNER JOIN recipes ON recipes.id = steps.recipe_id
        WHERE recipes.id=$recipeId";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$recipe = $pdoStatement->fetchObject('Recipe');
		return $recipe;
	}

//////////////////////////////////////////////////////

    public function find($stepId)
	{
		$sql = "SELECT steps.* FROM steps WHERE id=$recipeId";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$step = $pdoStatement->fetchObject('Step');
		return $step;
	}
	
    public function findAll(){
            $sql = 'SELECT steps.* FROM steps';
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
            $stepsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Step');
            return $stepsList;
        }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of recipe_id
     */ 
    public function getRecipe_id()
    {
        return $this->recipe_id;
    }

    /**
     * Set the value of recipe_id
     *
     * @return  self
     */ 
    public function setRecipe_id($recipe_id)
    {
        $this->recipe_id = $recipe_id;

        return $this;
    }

    /**
     * Get the value of step_order
     */ 
    public function getStep_order()
    {
        return $this->step_order;
    }

    /**
     * Set the value of step_order
     *
     * @return  self
     */ 
    public function setStep_order($step_order)
    {
        $this->step_order = $step_order;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
