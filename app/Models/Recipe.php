<?php

class Recette {
    private $id ;
    private $title ;
    private $picture ;
    private $persons ;

    public function find($recipeId)
	{
		$sql = "SELECT recipes.* FROM recipes WHERE id=$recipeId";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$recipe = $pdoStatement->fetchObject('Recipe');
		return $recipe;
	}
	
    public function findAll(){
            $sql = 'SELECT recipes.* FROM recipes';
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
            $recipesList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Recipe');
            return $recipesList;
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
     * Get the value of titre
     */ 
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitle($Title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of persons
     */ 
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set the value of persons
     *
     * @return  self
     */ 
    public function setPersons($persons)
    {
        $this->persons = $persons;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->Picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
}